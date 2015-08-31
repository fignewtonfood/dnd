<?php
    class Race
    {
        private $description;
        private $name;
        private $id;

        function __construct($description, $name, $id = null)
        {
            $this->description = $description;
            $this->name = $name;
            $this->id = $id;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
              $GLOBALS['DB']->exec("INSERT INTO races (description, name) VALUES ('{$this->getDescription()}', '{$this->getName()}');");
              $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM races;");
        }

        static function getAll()
        {
            $returned_races = $GLOBALS['DB']->query("SELECT * FROM races;");
            $races = array();
            foreach($returned_races as $race) {
                $name = $race['name'];
                $description = $race['description'];
                $id = $race['id'];
                $new_race = new Race($description, $name, $id);
                array_push($races, $new_race);
            }
            return $races;
        }

        static function find($search_id)
        {
            $found_race = null;
            $races = Race::getAll();
            foreach($races as $race) {
                $race_id = $race->getId();
                if ($race_id == $search_id) {
                  $found_race = $race;
                }
            }
            return $found_race;
        }

    }
?>
