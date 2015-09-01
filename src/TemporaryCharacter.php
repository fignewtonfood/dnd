<?php
    class TemporaryCharacter {

        private $id;
        private $race_id;
        private $class_id;
        private $background_id;
        private $str;
        private $dex;
        private $con;
        private $int;
        private $wis;
        private $cha;
        private $skill_one;
        private $skill_two;



        function __construct($race_id, $class_id =null, $background_id =null, $str =null, $dex =null, $con =null, $int =null, $wis =null, $cha =null, $skill_one =null, $skill_two =null, $id = null) {
            $this->id = $id;
            $this->race_id =  $race_id;
            $this->class_id =  $class_id;
            $this->background_id =  $background_id;
            $this->str =  $str;
            $this->dex =  $dex;
            $this->con =  $con;
            $this->int =  $int;
            $this->wis =  $wis;
            $this->cha =  $cha;
            $this->skill_one =  $skill_one;
            $this->skill_two =  $skill_two;
        }


//setters
    function setRaceId()
    {
        $this->race_id = (int) $race_id;
    }

    function setClassId()
    {
        $this->class_id = (int) $class_id;
    }

    function setBackgroundId()
    {
        $this->background_id = (int) $background_id;
    }

    function setStr()
    {
        $this->str = (int) $str;
    }

    function setDex()
    {
        $this->dex = (int) $dex;
    }

    function setCon()
    {
        $this->con = (int) $con;
    }

    function setInt()
    {
        $this->int = (int) $int;
    }

    function setWis()
    {
        $this->wis = (int) $wis;
    }

    function setCha()
    {
        $this->cha = (int) $cha;
    }

    function setSkillOne()
    {
        $this->skill_one = (int) $skill_one;
    }

    function setSkillTwo()
    {
        $this->skill_two = (int) $skillTwo;
    }


//getters
    function getRaceId()
    {
        return $this->race_id;
    }

    function getClassId()
    {
        return $this->class_id;
    }

    function getBackgroundId()
    {
        return $this->background_id;
    }

    function getStr()
    {
        return $this->str;
    }

    function getDex()
    {
        return $this->dex;
    }

    function getCon()
    {
        return $this->con;
    }

    function getInt()
    {
        return $this->int;
    }

    function getWis()
    {
        return $this->wis;
    }

    function getCha()
    {
        return $this->cha;
    }

    function getSkillOne()
    {
        return $this->skill_one;
    }

    function getSkillTwo()
    {
        return $this->skill_two;
    }


//save to cookies
    function sessionSave()
    {
        array_push($_SESSION['temporary_character'], $this);
    }


//clear cookies
    static function deleteAll()
    {
        $_SESSION['temporary_charater'] = array();
    }

?>
