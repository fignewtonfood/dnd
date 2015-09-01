<?php

    require_once "CharClass.php";

    class Character {

        private $description_id;
        private $race_id;
        private $stat_id;
        private $campaign_id;
        private $id;

        function __construct($description_id, $race_id, $stat_id, $campaign_id = null, $id = null) {
            $this->description_id = $description_id;
            $this->race_id = $race_id;
            $this->stat_id = $stat_id;
            $this->campaign_id = $campaign_id;
            $this->id = $id;
        }

        function setDescriptionId($new_description_id) {
            $this->description_id = (string) $new_description_id;
        }

        function getDescriptionId() {
            return $this->description_id;
        }

        function setRaceId($new_race_id) {
            $this->race_id = (string) $new_race_id;
        }

        function getRaceId() {
            return $this->race_id;
        }

        function setStatId($new_stat_id) {
            $this->stat_id = (string) $new_stat_id;
        }

        function getStatId() {
            return $this->stat_id;
        }

        // function setCampaignId($new_campaign_id) {
        //     $this->campaign_id = (string) $new_campaign_id;
        // }

        function getCampaignId() {
            return $this->campaign_id;
        }

        function getId() {
            return $this->id;
        }

        function getCharClasses()
        {
            $returned_classes = $GLOBALS['DB']->query("SELECT classes.* FROM characters
                JOIN characters_classes ON (characters.id = characters_classes.character_id)
                JOIN classes ON (characters_classes.class_id = classes.id)
                WHERE characters.id = {$this->getId()};");
            $classes = array();
            foreach ($returned_classes as $class) {
                $name = $class['name'];
                $description = $class['description'];
                $id = $class['id'];
                $new_class = new CharClass($name, $description, $id);
                array_push($classes, $new_class);
            }
            return $classes;
        }

        // function getBackground()
        // {
        //     $returned_backgrounds = $GLOBALS['DB']->query("SELECT backgrounds.* FROM characters
        //         JOIN characters_backgrounds ON (characters.id = characters_backgrounds.character_id)
        //         JOIN backgrounds ON (characters_backgrounds.background_id = backgrounds.id)
        //         WHERE characters.id = {$this->getId()};");
        //     $classes = array();
        //     foreach ($returned_backgrounds as $background) {
        //         $name = $background['name'];
        //         $description = $background['description'];
        //         $id = $background['id'];
        //         $new_background = new Background($name, $description, $id);
        //         array_push($backgrounds, $new_background);
        //     }
        //     return $backgrounds;
        // }

        // function getSkills()
        // {
        //     $returned_classes = $GLOBALS['DB']->query("SELECT skills.* FROM characters
        //         JOIN proficiencies ON (characters.id = proficiencies.character_id)
        //         JOIN skills ON (proficiencies.skill_id = skills.id)
        //         WHERE characters.id = {$this->getId()};");
        //     $skills = array();
        //     foreach ($returned_skills as $skill) {
        //         $name = $skill['name'];
        //         $description = $skill['description'];
        //         $id = $skill['id'];
        //         $new_skill = new Skill($name, $description, $id);
        //         array_push($skills, $new_skill);
        //     }
        //     return $classes;
        // }


        function save() {
            $GLOBALS['DB']->exec("INSERT INTO characters (description_id, race_id, stat_id) VALUES ({$this->getDescriptionId()}, {$this->getRaceId()}, {$this->getStatId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

//Save a character and class at the same time to join table
        function addCharClass($class) {
            $GLOBALS['DB']->exec("INSERT INTO characters_classes (character_id, class_id) VALUES ({$this->getId()}, {$class->getId()});");
        }

        // function addBackground($background) {
        //     $GLOBALS['DB']->exec("INSERT INTO characters_backgrounds (character_id, background_id) VALUES ({$this->getId()}, {$background->getId()});");
        // }

        // function addSkill($skill) {
        //     $GLOBALS['DB']->exec("INSERT INTO proficiencies (character_id, skill_id) VALUES ({$this->getId()}, {$skill->getId()});");
        // }

        static function getAll() {
            $returned_characters = $GLOBALS['DB']->query("SELECT * FROM characters;");
            $characters = array();
            foreach($returned_characters as $character) {
                $description_id = $character['description_id'];
                $race_id = $character['race_id'];
                $stat_id = $character['stat_id'];
                $id = $character['id'];
                $new_character = new Character($description_id, $race_id, $stat_id, $campaign_id= null, $id);
                array_push($characters, $new_character);
            }
            return $characters;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM characters;");
        }

        static function find($search_id){
            $found_character = null;
            $characters = Character::getAll();
            foreach($characters as $character) {
                $character_id = $character->getId();
                if ($character_id == $search_id) {
                    $found_character = $character;
                }
            }
            return $found_character;
        }
    }
?>
