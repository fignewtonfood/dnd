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
                $maxed = ["Insight",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
                $utility = ["Insight",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
                break;
            case 2:
                $maxed = ["History",
                        "Insight",
                        "medicine",
                        "Persuasion"];
                $utility = ["History",
                        "Medicine",
                        "Persuasion",
                        "Religion"];
            case 3:
                $maxed = ["Athletics",
                        "Insight",
                        "Intimidation",
                        "Medicine"];
                $utility = ["Athletics",
                        "Intimidation",
                        "Persuasion",
                        "Religion"];
                break;
            case 4:
                $maxed = ["Insight",
                        "Medicine",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = ["Persuasion",
                        "Religion",
                        "Sleight of Hand",
                        "Stealth"];
                break;
            case 5;
                $maxed = ["Acrobatics",
                        "Athletics",
                        "Medicine",
                        "Religion"];
                $utility = ["Animal Handling",
                        "Medicine",
                        "Religion",
                        "Survival"];
                break;
            case 6:
                $maxed = ["Acrobatics",
                        "Athletics",
                        "History",
                        "Persuasion"];
                $utility = ["Animal Handling",
                        "History",
                        "Persuasion",
                        "Survival"];
                break;
            case 7:
                $maxed = ["Acrobatics",
                        "Athletics",
                        "Intimidation",
                        "Stealth"];
                $utility = ["Animal Handling",
                        "Athletics",
                        "Intimidation",
                        "Survival"];
                break;
            case 8:
                $maxed = ["Acrobatics",
                        "Athletics",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = ["Animal Handling",
                        "Sleight of Hand",
                        "Stealth",
                        "Survival"];
                break;
            case 9:
                $maxed = ["Acrobatics",
                        "Medicine",
                        "Investigation",
                        "Religion", "Selight of Hand", "Stealth"];
                $utility = ["Deception",
                        "Investigation",
                        "medicine",
                        "Performance", "Religion", "Stealth"];
                break;
            case 10:
                $maxed = ["Acrobatics",
                        "History",
                        "Investigation",
                        "Persuasion", "Sleight of Hand", "Stealth"];
                $utility = ["Deception",
                        "History",
                        "Investigation",
                        "Performance", "Persuasion", "Stealth"];
                break;
            case 11:
                $maxed = ["Acrobatics",
                        "Athletics",
                        "Investigation",
                        "Intimidation", "Sleight of Hand", "Stealth"];
                $utility = ["Acrobatics",
                        "Deception",
                        "Investigation",
                        "Intimidation", "Performance", "Stealth"];
                break;
            case 12:
                $maxed = ["Acrobatics",
                        "Deception",
                        "Investigation",
                        "Perception", "Sleight of Hand", "Stealth"];
                $utility = ["Acrobatics",
                        "Deception",
                        "Investigation",
                        "Performance", "Sleight of Hand", "Stealth"];
                break;
            case 13:
                $maxed = ["Arcana",
                        "History",
                        "Medicine",
                        "Religion"];
                $utility = ["Arcana",
                        "Investigation",
                        "Medicine",
                        "Religion"];
                break;
            case 14:
                $maxed = ["Arcana",
                        "History",
                        "Persuasion",
                        "Religion"];
                $utility = ["Arcana",
                        "History",
                        "Investigation",
                        "Persuasion"];
                break;
            case 15:
                $maxed = ["Arcana",
                        "Athletics",
                        "History",
                        "Intimidation"];
                $utility = ["Arcana",
                        "Athletics",
                        "Intimidation",
                        "Investigation"];
                break;
            case 16:
                $maxed = ["Arcana",
                        "Religion",
                        "Sleight of Hand",
                        "Stealth"];
                $utility = ["Arcana",
                        "Investigation",
                        "Sleight of Hand",
                        "Stealth"];
                break;
        }
        $loadout_array = [$maxed, $utility];
        return $loadout_array;

    }
?>
