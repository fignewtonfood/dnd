<?php

    require_once "Character.php";

    class Skill {

        private $name;
        private $description;
        private $id;

        function __construct($name, $description, $id = null) {
            $this->name = $name;
            $this->description = $description;
            $this->id = $id;
        }

        function setName($new_name) {
            $this->name = (string) $new_name;
        }

        function getName() {
            return $this->name;
        }

        function setDescription($new_description) {
            $this->description = (string) $new_description;
        }

        function getDescription() {
            return $this->description;
        }

        function getId() {
            return $this->id;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO skills (name, description, id) VALUES ('{$this->getName()}', '{$this->getDescription()}', {$this->getId()})");
        }

        function addCharacter($character) {
            $GLOBALS['DB']->exec("INSERT INTO proficiencies (skill_id, character_id) VALUES ({$this->getId()}, {$character->getId()});");
        }

        static function getAll() {
            $returned_skills = $GLOBALS['DB']->query("SELECT * FROM skills;");
            $skills = array();
            foreach($returned_skills as $skill) {
                $name = $skill['name'];
                $description = $skill['description'];
                $id = $skill['id'];
                $new_skill = new Skill($name, $description, $id);
                array_push($skills, $new_skill);
            }
            return $skills;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM skills;");
        }

        static function find($search_id){
            $found_skill = null;
            $skills = Skill::getAll();
            foreach($skills as $skill) {
                $skill_id = $skill->getId();
                if ($skill_id == $search_id) {
                    $found_skill = $skill;
                }
            }
            return $found_skill;
        }
    }

    function loadOuts($class_id, $background_id)
    {
        switch($class_id)
        {
            case 1:
                switch($background_id)
                {
                    case 1:
                        $loadout = 1;
                        break;
                    case 2:
                        $loadout = 2;
                        break;
                    case 3:
                        $loadout = 3;
                        break;
                    case 4:
                        $loadout = 4;
                        break;
                }
                break;
            case 2:
                switch($background_id)
                {
                    case 1:
                        $loadout = 5;
                        break;
                    case 2:
                        $loadout = 6;
                        break;
                    case 3:
                        $loadout = 7;
                        break;
                    case 4:
                        $loadout = 8;
                        break;
                }
                break;
            case 3:
                switch($background_id)
                {
                    case 1:
                        $loadout = 9;
                        break;
                    case 2:
                        $loadout = 10;
                        break;
                    case 3:
                        $loadout = 11;
                        break;
                    case 4:
                        $loadout = 12;
                        break;
                }
                break;
            case 4:
                switch($background_id)
                {
                    case 1:
                        $loadout = 13;
                        break;
                    case 2:
                        $loadout = 14;
                        break;
                    case 3:
                        $loadout = 15;
                        break;
                    case 4:
                        $loadout = 16;
                        break;
                }
                break;
        }
        switch($loadout)
        {
            case 1:
                $maxed = [1, "Insight",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
                $utility = [2, "Insight",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
                break;
            case 2:
                $maxed = [3, "History",
                        "Insight",
                        "Medicine",
                        "Persuasion"];
                $utility = [4, "History",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
            case 3:
                $maxed = [5, "Athletics",
                        "Insight",
                        "Intimidation",
                        "Medicine"];
                $utility = [6, "Athletics",
                        "Intimidation",
                        "Persuasion",
                        "Religion"];
                break;
            case 4:
                $maxed = [7, "Insight",
                        "Medicine",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = [8, "Persuasion",
                        "Religion",
                        "Sleight of Hand",
                        "Stealth"];
                break;
            case 5;
                $maxed = [9, "Acrobatics",
                        "Athletics",
                        "Medicine",
                        "Religion"];
                $utility = [10, "Animal Handling",
                        "Medicine",
                        "Religion",
                        "Survival"];
                break;
            case 6:
                $maxed = [11, "Acrobatics",
                        "Athletics",
                        "History",
                        "Persuasion"];
                $utility = [12, "Animal Handling",
                        "History",
                        "Persuasion",
                        "Survival"];
                break;
            case 7:
                $maxed = [13, "Acrobatics",
                        "Athletics",
                        "Intimidation",
                        "Stealth"];
                $utility = [14, "Animal Handling",
                        "Athletics",
                        "Intimidation",
                        "Survival"];
                break;
            case 8:
                $maxed = [15, "Acrobatics",
                        "Athletics",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = [16, "Animal Handling",
                        "Sleight of Hand",
                        "Stealth",
                        "Survival"];
                break;
            case 9:
                $maxed = [17, "Acrobatics",
                        "Medicine",
                        "Investigation",
                        "Religion", "Selight of Hand", "Stealth"];
                $utility = [18, "Deception",
                        "Investigation",
                        "medicine",
                        "Performance", "Religion", "Stealth"];
                break;
            case 10:
                $maxed = [19, "Acrobatics",
                        "History",
                        "Investigation",
                        "Persuasion", "Sleight of Hand", "Stealth"];
                $utility = [20, "Deception",
                        "History",
                        "Investigation",
                        "Performance", "Persuasion", "Stealth"];
                break;
            case 11:
                $maxed = [21, "Acrobatics",
                        "Athletics",
                        "Investigation",
                        "Intimidation", "Sleight of Hand", "Stealth"];
                $utility = [22, "Acrobatics",
                        "Deception",
                        "Investigation",
                        "Intimidation", "Performance", "Stealth"];
                break;
            case 12:
                $maxed = [23, "Acrobatics",
                        "Deception",
                        "Investigation",
                        "Perception", "Sleight of Hand", "Stealth"];
                $utility = [24, "Acrobatics",
                        "Deception",
                        "Investigation",
                        "Performance", "Sleight of Hand", "Stealth"];
                break;
            case 13:
                $maxed = [25, "Arcana",
                        "History",
                        "Medicine",
                        "Religion"];
                $utility = [26, "Arcana",
                        "Investigation",
                        "Medicine",
                        "Religion"];
                break;
            case 14:
                $maxed = [27, "Arcana",
                        "History",
                        "Persuasion",
                        "Religion"];
                $utility = [28, "Arcana",
                        "History",
                        "Investigation",
                        "Persuasion"];
                break;
            case 15:
                $maxed = [29, "Arcana",
                        "Athletics",
                        "History",
                        "Intimidation"];
                $utility = [30, "Arcana",
                        "Athletics",
                        "Intimidation",
                        "Investigation"];
                break;
            case 16:
                $maxed = [31, "Arcana",
                        "Religion",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = [32, "Arcana",
                        "Investigation",
                        "Sleight of Hand",
                        "Stealth"];
                break;
        }
        $loadout_array = [$maxed, $utility];
        return $loadout_array;

    }
?>
