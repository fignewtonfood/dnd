<?php
    class Finalize() {

        require_once __DIR__."/../src/Race.php";
        require_once __DIR__."/../src/CharClass.php";
        require_once __DIR__."/../src/Background.php";
        require_once __DIR__."/../src/Stat.php";
        require_once __DIR__."/../src/Skill.php";
        require_once __DIR__."/../src/Description.php";
        require_once __DIR__."/../src/Character.php";


        // $_SESSION['temporary_character'] = array(
        //
        // $_SESSION['race'] => "",
        //
        // $_SESSION['background'] => "",

        // $_SESSION['name'] => "",

        // RUN ON FINAL PAGE :

        function finalize() {


            // DESCRIPTION :

            $description = new Description($_SESSION['gender'],
                $_SESSION['age'], $_SESSION['alignment'], $_SESSION['height'],
                $_SESSION['eye_color'], $_SESSION['hair_color'],
                $_SESSION['skin_tone'], $_SESSION['other_information'], null);

            $description->save();

            $description_id = $description->getId();


            // STAT VARIABLES :

            $dex = $_SESSION['dex'];
            $dex_mod = Stat::getModifier($dex);

            $con = $_SESSION['con'];
            $con_mod = Stat::getModifier($con);

            $str = $_SESSION['str'];
            $str_mod = Stat::getModifier($str);

            $wis = $_SESSION['wis'];
            $wis_mod = Stat::getModifier($wis);

            $int = $_SESSION['int'];
            $int_mod = Stat::getModifier($int);

            $cha = $_SESSION['cha'];
            $cha_mod = Stat::getModifier($cha);

            $initiative = Stat::getModifier($_SESSION['dex']);


            // MAKES A CLASS VARIABLE, MAXHP, AC :

            if ($_SESSION['class'] == 1) {
                $class = "cleric";
                $class_hp = 8;
            } elseif ($_SESSION['class'] == 2) {
                $class = "fighter";
                $class_hp = 10;
            } elseif ($_SESSION['class'] == 3) {
                $class = "rogue";
                $class_hp = 8;
            } elseif ($_SESSION['class'] == 4) {
                $class = "wizard";
                $class_hp = 6;
            }

            $max_hp = $con_mod + $class_hp;

            $ac = 10 + $dex_mod;


            // MAKES A RACE VARIABLE, SPEED :

            if ($_SESSION['race'] == 1) {
                $race = "human";
                $speed = 30;
                $race_id = 1;
            } elseif ($_SESSION['race'] == 2) {
                $race = "hill dwarf";
                $speed = 25;
                $race_id = 2;
            } elseif ($_SESSION['race'] == 3) {
                $race = "mountain dwarf";
                $speed = 25;
                $race_id = 3;
            } elseif ($_SESSION['race'] == 4) {
                $race = "high elf";
                $speed = 30;
                $race_id = 4;
            } elseif ($_SESSION['race'] == 5) {
                $race = "wood elf";
                $speed = 35;
                $race_id = 5;
            } elseif ($_SESSION['race'] == 6) {
                $race = "lightfoot halfling";
                $speed = 25;
                $race_id = 6;
            } elseif ($_SESSION['race'] == 7) {
                $race = "stout halfling";
                $speed = 25;
                $race_id = 7;
            }


            // PROFICIENCY :

            $proficiency_array = [$_SESSION['skill1'], $_SESSION['skill2'],
                $_SESSION['skill2'], $_SESSION['skill2']];

            $stat = new Stat($ac, 1, 1, 1, 1, $cha, $con,  1, $dex, 1,
                $initiative, 1, $int, 1, 1, $max_hp, 1, 1, 1, 1, 1, 1, 1,
                $speed, 1, $stealth, $str, 1, $wis, null);
            $stat->save();

            $stat->updateAcrobatics($proficiency_array);
            $stat->updateAnimalHandling($proficiency_array);
            $stat->updateArcana($proficiency_array);
            $stat->updateAthletics($proficiency_array);
            $stat->updateDeception($proficiency_array);
            $stat->updateHistory($proficiency_array);
            $stat->updateInsight($proficiency_array);
            $stat->updateIntimidation($proficiency_array);
            $stat->updateInvestigation($proficiency_array);
            $stat->updateMedicine($proficiency_array);
            $stat->updateNature($proficiency_array);
            $stat->updatePerception($proficiency_array);
            $stat->updatePerformance($proficiency_array);
            $stat->updatePersuasion($proficiency_array);
            $stat->updateReligion($proficiency_array);
            $stat->updateSleightOfHand($proficiency_array);
            $stat->updateStealth($proficiency_array);
            $stat->updateSurvival($proficiency_array);

            $stat_id = $stat->getId();


            // CREATE CHARACTER, ADD JOINS :

            $character = new Character($description_id, $race_id, $stat_id, $campaign_id, null);
            $character->save();

            $character->addCharClass($charclass);
            $character->addBackground($background);
            $character->addProficiency($proficiency);


        }


    //     private $save_race;
    //     private $save_class;
    //     private $save_background;
    //     private $save_stats;
    //     private $save_description;
    //
    //
    //     function __construct($save_race, $save_class, $save_background, $save_stats, $save_description)
    //     {
    //         $this->save_race = $save_race;
    //         $this->save_class = $save_class;
    //         $this->save_background = $save_background;
    //         $this->save_stats = $save_stats;
    //         $this->save_description = $save_description;
    //     }
    //
    //     function setSaveRace($new_save_race)
    //     {
    //         $this->save_race = $new_save_race;
    //     }
    //
    //     function setSaveClass($new_save_class)
    //     {
    //         $this->save_class = $new_save_class;
    //     }
    //
    //     function setSaveBackground($new_save_background)
    //     {
    //         $this->save_background = $new_save_background;
    //     }
    //
    //     function setSaveStats()
    //     {
    //         $this->save_stats = $new_save_stats;
    //     }
    //
    //     function setSaveDescription($new_save_description)
    //     {
    //         $this->save_description = $new_save_description;
    //     }
    //
    //     function getSaveRace()
    //     {
    //         return $this->save_race;
    //     }
    //
    //     function getSaveClass()
    //     {
    //         return $this->save_class;
    //     }
    //
    //     function getSaveBackground()
    //     {
    //         return $this->save_background;
    //     }
    //
    //     function getSaveStats()
    //     {
    //         return $this->save_stats;
    //     }
    //
    //     function getSaveDescription()
    //     {
    //         return $this->save_description;
    //     }
    //
    //     function save()
    //     {
    //         $GLOBALS['DB']->exec("INSERT INTO races (description, name) VALUES ('{Race::getDescription()}', '{Race::getName()}');");
    //         $this->id = $GLOBALS['DB']->lastInsertId();
    //
    //         $GLOBALS['DB']->exec("INSERT INTO classes (name, description) VALUES ('{$this->getName()}', '{$this->getDescription()}')");
    //         $this->id = $GLOBALS['DB']->lastInsertId();
    //
    //         $GLOBALS['DB']->exec("INSERT INTO backgrounds (name, description) VALUES ('{$this->getName()}', '{$this->getDescription()}')");
    //         $this->id = $GLOBALS['DB']->lastInsertId();
    //
    //         $GLOBALS['DB']->exec("INSERT INTO stats (ac, acrobatics,
    //             animal_handling, arcana, athletics, cha, con, deception,
    //             dex, history, init, insight, intel, intimidation,
    //             investigation, max_hp, medicine, nature, perception,
    //             performance, persuasion, proficiency, religion, speed,
    //             sleight_of_hand, stealth, str, survival, wis) VALUES
    //             ({$this->getAc()}, {$this->getAcrobatics()},
    //             {$this->getAnimalHandling()}, {$this->getArcana()},
    //             {$this->getAthletics()}, {$this->getCha()}, {$this->getCon()},
    //             {$this->getDeception()}, {$this->getDex()},
    //             {$this->getHistory()}, {$this->getInit()},
    //             {$this->getInsight()}, {$this->getIntel()},
    //             {$this->getIntimidation()}, {$this->getInvestigation()},
    //             {$this->getMaxHp()}, {$this->getMedicine()},
    //             {$this->getNature()}, {$this->getPerception()},
    //             {$this->getPerformance()}, {$this->getPersuasion()},
    //             {$this->getProficiency()}, {$this->getReligion()},
    //             {$this->getSpeed()}, {$this->getSleightOfHand()},
    //             {$this->getStealth()}, {$this->getStr()},
    //             {$this->getSurvival()}, {$this->getWis()});");
    //         $this->id = $GLOBALS['DB']->lastInsertId();
    //
    //         $GLOBALS['DB']->exec("INSERT INTO descriptions (gender, age,
    //         alignment, height, eye_color, hair_color, skin_tone, other)
    //         VALUES ('{$this->getGender()}', '{$this->getAge()}',
    //         '{$this->getAlignment()}', '{$this->getHeight()}',
    //         '{$this->getEyeColor()}', '{$this->getHairColor()}',
    //         '{$this->getSkinTone()}',  '{$this->getOther()}');");
    //         $this->id = $GLOBALS["DB"]->lastInsertId();
    //
    //         $GLOBALS['DB']->exec("INSERT INTO characters (description_id, race_id, stat_id) VALUES ({$this->getDescriptionId()}, {$this->getRaceId()}, {$this->getStatId()})");
    //         $this->id = $GLOBALS['DB']->lastInsertId();
    //     }
    //
    //     function deleteAll()
    //     {
    //
    //     }
    //
    //     function getAll()
    //     {
    //         $raw_info = $GLOBALS["DB"]->query("SELECT * FROM races;");
    //         $raw_info = $GLOBALS["DB"]->query("SELECT * FROM classes;");
    //         $raw_info = $GLOBALS["DB"]->query("SELECT * FROM backgrounds;");
    //         $raw_info = $GLOBALS["DB"]->query("SELECT * FROM stats;");
    //         $raw_info = $GLOBALS["DB"]->query("SELECT * FROM characters;");
    //     }
    // }



?>
