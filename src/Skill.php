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
?>
