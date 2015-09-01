<?php

    class Stat
    {
        private $id;
        private $str;
        private $dex;
        private $con;
        private $intel;
        private $wis;
        private $cha;
        private $init;
        private $max_hp;
        private $speed;
        private $ac;
        private $proficiency;
        private $stat_gen;

        function __construct($id, $str, $dex, $con, $intel, $wis, $cha, $init, $max_hp, $speed, $ac, $proficiency, $stat_gen)
        {
            $this->id = $id;
            $this->str = $str;
            $this->dex = $dex;
            $this->con = $con;
            $this->intel = $intel;
            $this->wis = $wis;
            $this->cha = $cha;
            $this->init = $init;
            $this->max_hp = $max_hp;
            $this->speed = $speed;
            $this->ac = $ac;
            $this->proficiency = $proficiency;
            $this->stat_gen = $stat_gen;

        }

        function setStr($new_str)
        {
            $this->str = $new_str;
        }

        function setDex($new_dex)
        {
            $this->dex = $new_dex;
        }

        function setCon($new_con)
        {
            $this->con = $new_con;
        }

        function setIntel($new_intel)
        {
            $this->intel = $new_intel;
        }

        function setWis($new_wis)
        {
            $this->wis = $new_wis;
        }

        function setCha($new_cha)
        {
            $this->cha = $new_cha;
        }

        function setInit($new_init)
        {
            $this->init = $new_init;
        }

        function setMax_hp($new_max_hp)
        {
            $this->max_hp = $new_max_hp;
        }

        function setSpeed($new_speed)
        {
            $this->speed = $new_speed;
        }

        function setAc($new_ac)
        {
            $this->ac = $new_ac;
        }

        function setProficiency($new_proficiency)
        {
            $this->proficiency = $new_proficiency;
        }

        function getId()
        {
            return $this->id;
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

        function getIntel()
        {
            return $this->intel;
        }

        function getWis()
        {
            return $this->wis;
        }

        function getCha()
        {
            return $this->cha;
        }

        function getInit()
        {
            return $this->init;
        }

        function getMax_hp()
        {
            return $this->max_hp;
        }

        function getSpeed()
        {
            return $this->speed;
        }

        function getAc()
        {
            return $this->ac;
        }

        function getProficiency()
        {
            return $this->proficiency;
        }

        function save()
        {
              $GLOBALS['DB']->exec("INSERT INTO stats (str, dex, con, intel, wis, cha, init, max_hp, speed, ac, proficiency) VALUES ({$this->getStr()}, {$this->getDex()}, {$this->getCon()}, {$this->getIntel()}, {$this->getWis()}, {$this->getCha()}, {$this->getInit()}, {$this->getMax_Hp()}, {$this->getSpeed()}, {$this->getAc()}, '{$this->getProficiency()}');");
              $this->id = $GLOBALS['DB']->lastInsertId();
        }
    }
 ?>
