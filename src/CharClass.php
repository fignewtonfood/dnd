<?php

    require_once "Character.php";

    class CharClass {

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
//Get Characters from Class method using join statement
        function getCharacters()
        {
//Join statement saved into returned_characters; query selects all characters columns and joins data across tables to return all matching characters that fit a specific class id
            $returned_characters = $GLOBALS['DB']->query("SELECT characters.* FROM classes
                JOIN classes_characters ON (classes.id = classes_characters.class_id)
                JOIN characters ON (classes_characters.character_id = characters.id)
                WHERE classes.id = {$this->getId()};");
            $characters = array();
            foreach ($returned_characters as $character) {
                $description = $character['description'];
                $id = $character['id'];
                $new_character = new Character($description, $id);
                array_push($characters, $new_character);
            }
            return $characters;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO classes (description) VALUES ('{$this->getDescription()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
//Save a class and character at the same time to join table
        function addCharacter($character) {
            $GLOBALS['DB']->exec("INSERT INTO classes_characters (class_id, character_id) VALUES ({$this->getId()}, {$character->getId()});");
        }

        static function getAll() {
            $returned_classes = $GLOBALS['DB']->query("SELECT * FROM classes;");
            $classes = array();
            foreach($returned_classes as $class) {
                $description = $class['description'];
                $id = $class['id'];
                $new_class = new Class($description, $id);
                array_push($classes, $new_class);
            }
            return $classes;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM classes;");
        }

        static function find($search_id){
            $found_class = null;
            $classes = Class::getAll();
            foreach($classes as $class) {
                $class_id = $class->getId();
                if ($class_id == $search_id) {
                    $found_class = $class;
                }
            }
            return $found_class;
        }
    }
?>
