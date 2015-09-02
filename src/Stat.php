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

        function setIntel($new_int)
        {
            $this->int = $new_int;
        }

        function setWis($new_wis)
        {
            $this->wis = $new_wis;
        }

        function setCha($new_cha)
        {
            $this->cha = $new_cha;
        }


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




        // UPDATE STAT FUNCTIONS:
        function updateStr($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET str = {$number} WHERE id = {$this->getId()};");
            $this->setStr($number);
        }

        function updateIntel($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET intel = {$number} WHERE id = {$this->getId()};");
            $this->setIntel($number);
        }

        function updateCon($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET con = {$number} WHERE id = {$this->getId()};");
            $this->setCon($number);
        }

        function updateWis($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET wis = {$number} WHERE id = {$this->getId()};");
            $this->setWis($number);
        }

        function updateCha($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET cha = {$number} WHERE id = {$this->getId()};");
            $this->setCha($number);
        }

        function updateDex($number) {
            $GLOBALS["DB"]->exec("UPDATE stats SET dex = {$number} WHERE id = {$this->getId()};");
            $this->setDex($number);
        }


        // SKILL COMPUTERS:

        function updateInit() {
            $mod = $this->getModifier($this->getDex());
            $GLOBALS["DB"]->exec("UPDATE stats SET init = {$mod} WHERE id = {$this->getId()};");
            $this->setDex($mod);
        }



        // DICE ROLL ASSIGN FUNCTION:
        function assignRolls($six_rolls, $classname, $race) {
            $classname = strtolower ($classname);
            if ($classname == "fighter") {
                $this->updateStr($six_rolls[0]);
                $this->updateCon($six_rolls[1]);
                $this->updateDex($six_rolls[2]);
                $this->updateCha($six_rolls[3]);
                $this->updateWis($six_rolls[4]);
                $this->updateIntel($six_rolls[5]);
            }
            elseif ($classname == "rogue") {
                $this->updateDex($six_rolls[0]);
                $this->updateCon($six_rolls[1]);
                $this->updateCha($six_rolls[2]);
                $this->updateIntel($six_rolls[3]);
                $this->updateStr($six_rolls[4]);
                $this->updateWis($six_rolls[5]);
            }
            elseif ($classname == "wizard") {
                $this->updateIntel($six_rolls[0]);
                $this->updateCon($six_rolls[1]);
                $this->updateDex($six_rolls[2]);
                $this->updateWis($six_rolls[3]);
                $this->updateCha($six_rolls[4]);
                $this->updateStr($six_rolls[5]);
            }
            elseif ($classname == "cleric") {
                $this->updateWis($six_rolls[0]);
                $this->updateCon($six_rolls[1]);
                $this->updateStr($six_rolls[2]);
                $this->updateCha($six_rolls[3]);
                $this->updateIntel($six_rolls[4]);
                $this->updateDex($six_rolls[5]);
            }
            else {
                var_dump("ERROR");
            }
            $race = strtolower ($race);
            if ($race == "human") {
                $this->updateStr($this->getStr() + 1);
                $this->updateIntel($this->getIntel() + 1);
                $this->updateDex($this->getDex() + 1);
                $this->updateWis($this->getWis() + 1);
                $this->updateCha($this->getCha() + 1);
                $this->updateCon($this->getCon() + 1);
            }
            elseif ($race == "lightfoot halfling") {
                $this->updateDex($this->getDex() + 2);
                $this->updateCha($this->getCha() + 1);
            }
            elseif ($race == "stout halfling") {
                $this->updateDex($this->getDex() + 2);
                $this->updateCon($this->getCon() + 1);
            }
            elseif ($race == "high elf") {
                $this->updateDex($this->getDex() + 2);
                $this->updateInt($this->getInt() + 1);
            }
            elseif ($race == "wood elf") {
                $this->updateDex($this->getDex() + 2);
                $this->updateWis($this->getWis() + 1);
            }
            elseif ($race == "hill dwarf") {
                $this->updateCon($this->getCon() + 2);
                $this->updateWis($this->getWis() + 1);
            }
            elseif ($race == "mountain dwarf") {
                $this->updateCon($this->getCon() + 2);
                $this->updateStr($this->getStr() + 2);
            }
            else {
                var_dump("ERROR");
            }





            // MODIFIER FINDER:

            function getModifier($stat_number) {
                if ($stat_number == 3) {
                    $mod = -4;
                } elseif ($stat_number == 4 | 5) {
                    $mod = -3;
                } elseif ($stat_number == 6 | 7) {
                    $mod = -2;
                } elseif ($stat_number == 8 | 9) {
                    $mod = -1;
                } elseif ($stat_number == 10 | 11) {
                    $mod = 0;
                } elseif ($stat_number == 12 | 13) {
                    $mod = 1;
                } elseif ($stat_number == 14 | 15) {
                    $mod = 2;
                } elseif ($stat_number == 16 | 17) {
                    $mod = 3;
                } else {
                    $mod = 4;
                }
                return $mod;
            }
        }




    }

    // DICE ROLLER

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
