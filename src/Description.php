<?php
    class Description {
        private $id;
        private $gender;
        private $age;
        private $alignment;
        private $height;
        private $eye_color;
        private $hair_color;
        private $skin_tone;
        private $other;

        function __construct($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other, $id = null) {
            $this->id = $id;
            $this->gender = $gender;
            $this->age = $age;
            $this->alignment = $alignment;
            $this->height = $height;
            $this->eye_color = $eye_color;
            $this->hair_color = $hair_color;
            $this->skin_tone = $skin_tone;
            $this->other = $other;
        }

        // GETTERS AND SETTERS:

        function getId() {
            return $this->id;
        }

        function setGender($gender) {
            $this->gender = (string) $gender;
        }

        function getGender() {
            return $this->gender;
        }

        function setAge($age) {
            $this->age = (string) $age;
        }

        function getAge() {
            return $this->age;
        }

        function setAlignment($alignment) {
            $this->alignment = $alignment;
        }

        function getAlignment() {
            return $this->alignment;
        }

        function setHeight($height) {
            $this->height = $height;
        }

        function getHeight() {
            return $this->height;
        }

        function setEyeColor($eye_color) {
            $this->eye_color = $eye_color;
        }

        function getEyeColor() {
            return $this->eye_color;
        }

        function setHairColor($hair_color) {
            $this->hair_color = $hair_color;
        }

        function getHairColor() {
            return $this->hair_color;
        }

        function setSkinTone($skin_tone) {
            $this->skin_tone = $skin_tone;
        }

        function getSkinTone() {
            return $this->skin_tone;
        }

        function setOther($other) {
            $this->other = $other;
        }

        function getOther() {
            return $this->other;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO descriptions (gender, age,
            alignment, height, eye_color, hair_color, skin_tone, other)
            VALUES ('{$this->getGender()}', '{$this->getAge()}',
            '{$this->getAlignment()}', '{$this->getHeight()}',
            '{$this->getEyeColor()}', '{$this->getHairColor()}',
            '{$this->getSkinTone()}',  '{$this->getOther()}');");
            $this->id = $GLOBALS["DB"]->lastInsertId();
        }

        static function getAll() {
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM descriptions;");
            $all = array();
            foreach($raw_info as $details) {
                $id = $details["id"];
                $gender = $details["gender"];
                $age = $details["age"];
                $alignment = $details["alignment"];
                $height = $details["height"];
                $eye_color = $details["eye_color"];
                $hair_color = $details["hair_color"];
                $skin_tone = $details["skin_tone"];
                $other = $details["other"];
                $full_description = new Description($gender, $age,
                $alignment, $height, $eye_color, $hair_color, $skin_tone,
                $other, $id);
                array_push($all, $full_description);
            }
            return $all;
        }

        static function find($search_id) {
            $found_description = null;
            $all_descriptions = Description::getAll();
            foreach($all_descriptions as $description) {
                $possible_id = $description->getId();
                if ($possible_id == $search_id) {
                    $found_description = $description;
                }
            }
            return $found_description;
        }

        static function deleteAll() {
            $GLOBALS["DB"]->exec("DELETE FROM descriptions;");
        }
    }
?>
