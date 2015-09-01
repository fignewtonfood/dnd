<?php

    require_once "Character.php";

    class Background {

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

        // //  unneeded method at this time maybe needed lateer
        // =======================================================
        // //Get Characters from Class method using join statement
        //         function getCharacters()
        //         {
        // //Join statement saved into returned_characters; query selects all characters columns and joins data across tables to return all matching characters that fit a specific class id
        //             $returned_characters = $GLOBALS['DB']->query("SELECT characters.* FROM classes
        //                 JOIN classes_characters ON (classes.id = classes_characters.class_id)
        //                 JOIN characters ON (classes_characters.character_id = characters.id)
        //                 WHERE classes.id = {$this->getId()};");
        //             $characters = array();
        //             foreach ($returned_characters as $character) {
        //
        //                  // add correct arguments for Character class
        //
        //                 $new_character = new Character();
        //                 array_push($characters, $new_character);
        //             }
        //             return $characters;
        //         }
        // ==========================================================

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO backgrounds (name, description) VALUES ('{$this->getName()}', '{$this->getDescription()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //=============================== unused method
        // //Save a class and character at the same time to join table
        //         function addCharacter($character) {
        //             $GLOBALS['DB']->exec("INSERT INTO classes_characters (class_id, character_id) VALUES ({$this->getId()}, {$character->getId()});");
        //         }
        //===============================

        static function getAll() {
            $returned_backgrounds = $GLOBALS['DB']->query("SELECT * FROM backgrounds;");
            $backgrounds = array();
            foreach($returned_backgrounds as $background) {
                $name = $background['name'];
                $description = $background['description'];
                $id = $background['id'];
                $new_background = new Background($name, $description, $id);
                array_push($backgrounds, $new_background);
            }
            return $backgrounds;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM backgrounds;");
        }

        static function find($search_id){
            $found_background = null;
            $backgrounds = Background::getAll();
            foreach($backgrounds as $background) {
                $background_id = $background->getId();
                if ($background_id == $search_id) {
                    $found_background = $background;
                }
            }
            return $found_background;
        }
    }
?>
