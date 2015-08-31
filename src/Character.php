<?php

    require_once "CharClass.php";

    class Character {

        private $description_id;
        private $race_id;
        private $stat_id;
        private $campaign_id
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
        //
        // function getCampaignId() {
        //     return $this->campaign_id;
        // }

        function getId() {
            return $this->id;
        }
//Get Classes from Character method using join statement
        function getClasses()
        {
//Join statement saved into returned_classes; query selects all classes columns and joins data across tables to return all matching classes that fit a specific character id
            $returned_classes = $GLOBALS['DB']->query("SELECT classes.* FROM characters
                JOIN characters_classes ON (characters.id = characters_classes.character_id)
                JOIN classes ON (characters_classes.class_id = classes.id)
                WHERE characters.id = {$this->getId()};");
            $classes = array();
            foreach ($returned_classes as $class) {
                $description = $class['description'];
                $id = $class['id'];
                $new_class = new Class($description, $id);
                array_push($classes, $new_class);
            }
            return $classes;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO characters (description) VALUES ('{$this->getDescription()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
//Save a character and class at the same time to join table
        function addClass($class) {
            $GLOBALS['DB']->exec("INSERT INTO characters_classes (character_id, class_id) VALUES ({$this->getId()}, {$class->getId()});");
        }

        static function getAll() {
            $returned_characters = $GLOBALS['DB']->query("SELECT * FROM characters;");
            $characters = array();
            foreach($returned_characters as $character) {
                $description = $character['description'];
                $id = $character['id'];
                $new_character = new Character($description, $id);
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
