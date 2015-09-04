<?php

require_once "Race.php";
require_once "CharClass.php";
require_once "Background.php";
require_once "Stat.php";
require_once "Skill.php";
require_once "Description.php";
require_once "Character.php";

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
            $this->description_id = $new_description_id;
        }

        function getDescriptionId() {
            return $this->description_id;
        }

        function setRaceId($new_race_id) {
            $this->race_id = $new_race_id;
        }

        function getRaceId() {
            return $this->race_id;
        }

        function setStatId($new_stat_id) {
            $this->stat_id = $new_stat_id;
        }

        function getStatId() {
            return $this->stat_id;
        }

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

        function getBackgrounds()
        {
            $returned_backgrounds = $GLOBALS['DB']->query("SELECT backgrounds.* FROM characters
                JOIN backgrounds_characters ON (characters.id = backgrounds_characters.character_id)
                JOIN backgrounds ON (backgrounds_characters.background_id = backgrounds.id)
                WHERE characters.id = {$this->getId()};");

            $backgrounds = array();
            foreach ($returned_backgrounds as $background) {
                $name = $background['name'];
                $description = $background['description'];
                $id = $background['id'];
                $new_background = new Background($name, $description, $id);
                array_push($backgrounds, $new_background);
            }
            return $backgrounds;
        }

        function getSkills()
        {
            $returned_skills = $GLOBALS['DB']->query("SELECT skills.* FROM characters
                JOIN proficiencies ON (characters.id = proficiencies.character_id)
                JOIN skills ON (proficiencies.skill_id = skills.id)
                WHERE characters.id = {$this->getId()};");
            $skills = array();
            foreach ($returned_skills as $skill) {
                $name = $skill['name'];
                $description = $skill['description'];
                $id = $skill['id'];
                $new_skill = new Skill($name, $description, $id);
                array_push($skills, $new_skill);
            }
            return $skills;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO characters (description_id, race_id, stat_id) VALUES ({$this->getDescriptionId()}, {$this->getRaceId()}, {$this->getStatId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

//Save a character and class at the same time to join table
        function addCharClass($class_id) {
            $GLOBALS['DB']->exec("INSERT INTO characters_classes (character_id, class_id) VALUES ({$this->getId()}, {$class_id});");
        }

        function addBackground($background_id) {
            $GLOBALS['DB']->exec("INSERT INTO backgrounds_characters (character_id, background_id) VALUES ({$this->getId()}, {$background_id});");
        }

        function addSkill($skill_id) {
            $GLOBALS['DB']->exec("INSERT INTO proficiencies (character_id, skill_id) VALUES ({$this->getId()}, {$skill_id});");
        }

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
            $GLOBALS['DB']->exec("DELETE FROM proficiencies;");
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

        // GETTERS FOR OUTSIDE CLASS PROPERTIES :

        function getName() {
            $id = $this->getDescriptionId();
            $description = Description::find($id);
            $name = $description->getName();
            return $name;
        }

        function getOther() {
            $id = $this->getDescriptionId();
            $description = Description::find($id);
            $other = $description->getOther();
            return $other;
        }

        function getAc() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getAc();
            return $stat_total;
        }

        function getInit() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getInit();
            return $stat_total;
        }

        function getSpeed() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getSpeed();
            return $stat_total;
        }

        function getMaxHp() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getMaxHp();
            return $stat_total;
        }

        function getAcrobatics() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getAcrobatics();
            return $stat_total;
        }

        function getAnimalHandling() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getAnimalHandling();
            return $stat_total;
        }

        function getArcana() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getArcana();
            return $stat_total;
        }

        function getAthletics() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getAthletics();
            return $stat_total;
        }

        function getDeception() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getAcrobatics();
            return $stat_total;
        }

        function getHistory() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getHistory();
            return $stat_total;
        }

        function getInsight() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getInsight();
            return $stat_total;
        }

        function getIntimidation() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getIntimidation();
            return $stat_total;
        }

        function getInvestigation() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getInvestigation();
            return $stat_total;
        }

        function getMedicine() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getMedicine();
            return $stat_total;
        }

        function getNature() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getNature();
            return $stat_total;
        }

        function getPerception() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getPerception();
            return $stat_total;
        }

        function getPerformance() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getPerformance();
            return $stat_total;
        }

        function getPersuasion() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getPersuasion();
            return $stat_total;
        }

        function getReligion() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getReligion();
            return $stat_total;
        }

        function getSleightOfHand() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getSleightOfHand();
            return $stat_total;
        }

        function getStealth() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getStealth();
            return $stat_total;
        }

        function getSurvival() {
            $id = $this->getStatId();
            $stat = Stat::find($id);
            $stat_total = $stat->getSurvival();
            return $stat_total;
        }



    }

    function saveProficiencies($loadout_id, $character_id)
    {
        switch($loadout_id)
        {
            case 1:
                $skills = [7, 10, 14, 15];
                break;
            case 2:
                $skills = [7, 10, 14, 15];
                break;
            case 3:
                $skills = [6, 7, 10, 14];
                break;
            case 4:
                $skills = [6, 10, 14, 15];
                break;
            case 5:
                $skills = [4, 7, 8, 10];
                break;
            case 6:
                $skills = [4, 8, 14, 15];
                break;
            case 7:
                $skills = [7, 10, 16, 17];
                break;
            case 8:
                $skills = [14, 15, 16, 17];
                break;
            case 9:
                $skills = [1, 4, 10, 15];
                break;
            case 10:
                $skills = [2, 10, 15, 18];
                break;
            case 11:
                $skills = [1, 4, 6, 14];
                break;
            case 12:
                $skills = [2, 6, 14, 18];
                break;
            case 13:
                $skills = [1, 5, 8, 17];
                break;
            case 14:
                $skills = [2, 4, 8, 18];
                break;
            case 15:
                $skills = [1, 4, 16, 17];
                break;
            case 16:
                $skills = [2, 16, 17, 18];
                break;
            case 17:
                $skills = [1, 10, 9, 15, 16, 17];
                break;
            case 18:
                $skills = [5, 9, 10, 13, 15, 17];
                break;
            case 19:
                $skills = [1, 6, 9, 14, 16, 17];
                break;
            case 20:
                $skills = [5, 6, 9, 13, 14, 17];
                break;
            case 21:
                $skills = [1, 4, 9, 8, 16, 17];
                break;
            case 22:
                $skills = [1, 5, 9, 8, 13, 17];
                break;
            case 23:
                $skills = [1, 5, 9, 12, 16, 17];
                break;
            case 24:
                $skills = [1, 5, 9, 13, 16, 17];
                break;
            case 25:
                $skills = [3, 6, 10, 15];
                break;
            case 26:
                $skills = [3, 9, 10, 15];
                break;
            case 27:
                $skills = [3, 6, 14, 15];
                break;
            case 28:
                $skills = [3, 6, 9, 14];
                break;
            case 29:
                $skills = [3, 4, 8, 8];
                break;
            case 30:
                $skills = [3, 4, 8, 9];
                break;
            case 31:
                $skills = [3, 15, 16, 17];
                break;
            case 32:
                $skills = [3, 9, 16, 17];
                break;
        }
        foreach($skills as $skill)
        {
            $GLOBALS['DB']->exec("INSERT INTO proficiencies (skill_id, character_id) VALUES ($skill, $character_id);");
        }
    }

    function getProficiencies($character_id) {
        $returned_proficiencies = $GLOBALS['DB']->query("SELECT * FROM proficiencies WHERE character_id = $character_id ;");
        $proficiencies = array();
        foreach($returned_proficiencies as $proficiency) {
            $skill_id = $proficiency['skill_id'];
            array_push($proficiencies, $skill_id);
        }
        return $proficiencies;
    }
?>
