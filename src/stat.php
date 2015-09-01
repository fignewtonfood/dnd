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
        private $acrobatics;
        private $arcana;
        private $animal_handling;
        private $athletics;
        private $deception;
        private $history;
        private $insight;
        private $intimidation;
        private $investigation;
        private $medicine;
        private $nature;
        private $perception;
        private $performance;
        private $persuasion;
        private $proficiency;
        private $religion;
        private $sleight_of_hand;
        private $stealth;
        private $survival;


        function __construct($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis,  $id = null)
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
            $this->acrobatics = $acrobatics;
            $this->arcana = $arcana;
            $this->animal_handling = $animal_handling;
            $this->athletics = $athletics;
            $this->deception = $deception;
            $this->history = $history;
            $this->insight = $insight;
            $this->intimidation = $intimidation;
            $this->investigation = $investigation;
            $this->medicine = $medicine;
            $this->nature = $nature;
            $this->perception = $perception;
            $this->performance = $performance;
            $this->persuasion = $persuasion;
            $this->proficiency = $proficiency;
            $this->religion = $religion;
            $this->sleight_of_hand = $sleight_of_hand;
            $this->stealth = $stealth;
            $this->survival = $survival;

        }

        // function setStr($new_str)
        // {
        //     $this->str = $new_str;
        // }
        //
        // function setDex($new_dex)
        // {
        //     $this->dex = $new_dex;
        // }
        //
        // function setCon($new_con)
        // {
        //     $this->con = $new_con;
        // }
        //
        // function setint($new_int)
        // {
        //     $this->int = $new_int;
        // }
        //
        // function setWis($new_wis)
        // {
        //     $this->wis = $new_wis;
        // }
        //
        // function setCha($new_cha)
        // {
        //     $this->cha = $new_cha;
        // }
        //
        // function setInit($new_init)
        // {
        //     $this->init = $new_init;
        // }
        //
        // function setMax_hp($new_max_hp)
        // {
        //     $this->max_hp = $new_max_hp;
        // }
        //
        // function setSpeed($new_speed)
        // {
        //     $this->speed = $new_speed;
        // }
        //
        // function setAc($new_ac)
        // {
        //     $this->ac = $new_ac;
        // }
        //
        // function setProficiency($new_proficiency)
        // {
        //     $this->proficiency = $new_proficiency;
        // }

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

        function getMaxHp()
        {
            return $this->max_hp;
        }

        function getAc()
        {
            return $this->ac;
        }

        function getSpeed()
        {
            return $this->speed;
        }

        function getProficiency()
        {
            return $this->proficiency;
        }

        function getAcrobatics()
        {
            return $this->acrobatics;
        }

        function getArcana()
        {
            return $this->arcana;
        }

        function getAnimalHandling()
        {
            return $this->animal_handling;
        }

        function getAthletics()
        {
            return $this->athletics;
        }

        function getDeception()
        {
            return $this->deception;
        }

        function getHistory()
        {
            return $this->history;
        }

        function getInsight()
        {
            return $this->insight;
        }

        function getIntimidation()
        {
            return $this->intimidation;
        }

        function getInvestigation()
        {
            return $this->investigation;
        }

        function getMedicine()
        {
            return $this->medicine;
        }

        function getNature()
        {
            return $this->nature;
        }

        function getPerception()
        {
            return $this->perception;
        }

        function getPerformance()
        {
            return $this->performance;
        }

        function getPersuasion()
        {
            return $this->persuasion;
        }

        function getReligion()
        {
            return $this->religion;
        }

        function getSleightOfHand()
        {
            return $this->sleight_of_hand;
        }
        function getStealth()
        {
            return $this->stealth;
        }
        function getSurvival()
        {
            return $this->survival;
        }

        function save()
        {
              $GLOBALS['DB']->exec("INSERT INTO stats (ac, acrobatics, animal_handling, arcana, athletics, cha, con, deception, dex, history, init, insight, intel, intimidation, investigation, max_hp, medicine, nature, perception, performance, persuasion, proficiency, religion, speed, sleight_of_hand, stealth, str, survival, wis) VALUES ({$this->getAc()}, {$this->getAcrobatics()}, {$this->getAnimalHandling()}, {$this->getArcana()}, {$this->getAthletics()}, {$this->getCha()}, {$this->getCon()},  {$this->getDeception()}, {$this->getDex()}, {$this->getHistory()}, {$this->getInit()}, {$this->getInsight()}, {$this->getIntel()}, {$this->getIntimidation()}, {$this->getInvestigation()}, {$this->getMaxHp()}, {$this->getMedicine()}, {$this->getNature()}, {$this->getPerception()}, {$this->getPerformance()}, {$this->getPersuasion()}, {$this->getProficiency()}, {$this->getReligion()}, {$this->getSpeed()}, {$this->getSleightOfHand()}, {$this->getStealth()}, {$this->getStr()}, {$this->getSurvival()}, {$this->getWis()});");
              $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM stats;");
        }

        static function getAll()
        {
            $returned_stats = $GLOBALS['DB']->query("SELECT * FROM stats;");
            $stats = array();
            foreach($returned_stats as $stat) {
                $id = $stat['id'];
                $str = $stat['str'];
                $dex = $stat['dex'];
                $con = $stat['con'];
                $intel = $stat['intel'];
                $wis = $stat['wis'];
                $cha = $stat['cha'];
                $init = $stat['init'];
                $max_hp = $stat['max_hp'];
                $speed = $stat['speed'];
                $ac = $stat['ac'];
                $acrobatics = $stat['acrobatics'];
                $arcana = $stat['arcana'];
                $animal_handling = $stat['animal_handling'];
                $athletics = $stat['athletics'];
                $deception = $stat['deception'];
                $history = $stat['history'];
                $insight = $stat['insight'];
                $intimidation = $stat['intimidation'];
                $investigation = $stat['investigation'];
                $medicine = $stat['medicine'];
                $nature = $stat['nature'];
                $perception = $stat['perception'];
                $performance = $stat['performance'];
                $persuasion = $stat['persuasion'];
                $proficiency = $stat['proficiency'];
                $religion = $stat['religion'];
                $sleight_of_hand = $stat['sleight_of_hand'];
                $stealth = $stat['stealth'];
                $survival = $stat['survival'];
                $new_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis, $id);
                array_push($stats, $new_stat);
            }
            return $stats;
        }

        static function find($search_id)
        {
            $found_stat = null;
            $stats = Stat::getAll();
            foreach($stats as $stat) {
                $stat_id = $stat->getId();
                if ($stat_id == $search_id) {
                  $found_stat = $stat;
                }
            }
            return $found_stat;
        }


    }

    function statRoll()
    {
        $stats = array();
        $statcounter = 0;
        while($statcounter < 6)
        {
            $numbers = array();
            $counter = 0;
            while($counter < 4)
            {
                $number = rand(1, 6);
                array_push($numbers, $number);
                $counter++;
            }
            asort($numbers);
            unset($numbers[0]);
            $number_sum = array_sum($numbers);
            array_push($stats, $number_sum);
            $statcounter++;
        }
        arsort($stats);
        return $stats;
    }
 ?>
