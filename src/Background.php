<?php

    // require_once __DIR__."src/Character.php";

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

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO backgrounds (name, description, id) VALUES ('{$this->getName()}', '{$this->getDescription()}', {$this->getId()});");
        }

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
