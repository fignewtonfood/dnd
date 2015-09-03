<?php

    require_once "Race.php";
    require_once "CharClass.php";
    require_once "Background.php";
    require_once "Stat.php";
    require_once "Skill.php";
    require_once "Description.php";
    require_once "Character.php";

    class Finalize {

        // RUN ON FINAL PAGE :

        static function run() {


            // DESCRIPTION :

            $description = new Description($_SESSION['name'],
                $_SESSION['gender'], $_SESSION['age'],
                $_SESSION['alignment'], $_SESSION['height'],
                $_SESSION['eye_color'], $_SESSION['hair_color'],
                $_SESSION['skin_tone'], $_SESSION['other'],
                null);

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

            $initiative = $dex_mod;


            // MAKES A CLASS VARIABLE, MAXHP, AC, BACKGROUND ID :

            if ($_SESSION['class'] == 1) {
                $class = "cleric";
                $class_hp = 8;
                $class_id = 1;
            } elseif ($_SESSION['class'] == 2) {
                $class = "fighter";
                $class_hp = 10;
                $class_id = 2;
            } elseif ($_SESSION['class'] == 3) {
                $class = "rogue";
                $class_hp = 8;
                $class_id = 3;
            } elseif ($_SESSION['class'] == 4) {
                $class = "wizard";
                $class_hp = 6;
                $class_id = 4;
            }

            $max_hp = $con_mod + $class_hp;

            $ac = 10 + $dex_mod;


            $proficiency_array = $_SESSION['skill'];

            $background_id = $_SESSION['background'];

            $proficiency_array = $_SESSION['skill'];
            $skill_ids = array();
            foreach ($proficiency_array as $proficiency) {
                if ($proficiency == "Acrobatics") {
                    $skill_id = 1;
                } elseif ($proficiency == "Animal Handling") {
                    $skill_id = 2;
                } elseif ($proficiency == "Arcana") {
                    $skill_id = 3;
                } elseif ($proficiency == "Athletics") {
                    $skill_id = 4;
                } elseif ($proficiency == "Deception") {
                    $skill_id = 5;
                } elseif ($proficiency == "History") {
                    $skill_id = 6;
                } elseif ($proficiency == "Insight") {
                    $skill_id = 7;
                } elseif ($proficiency == "Intimidation") {
                    $skill_id = 8;
                } elseif ($proficiency == "Investigation") {
                    $skill_id = 9;
                } elseif ($proficiency == "Medicine") {
                    $skill_id = 10;
                } elseif ($proficiency == "Nature") {
                    $skill_id = 11;
                } elseif ($proficiency == "Perception") {
                    $skill_id = 12;
                } elseif ($proficiency == "Performance") {
                    $skill_id = 13;
                } elseif ($proficiency == "Persuasion") {
                    $skill_id = 14;
                } elseif ($proficiency == "Religion") {
                    $skill_id = 15;
                } elseif ($proficiency == "Sleight of Hand") {
                    $skill_id = 16;
                } elseif ($proficiency == "Stealth") {
                    $skill_id = 17;
                } elseif ($proficiency == "Survival") {
                    $skill_id = 18;
                }
                array_push($skill_ids, $skill_id);
            }


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


            // MAKE STAT CLASS :

            $stat = new Stat($ac, 1, 1, 1, 1, $cha, $con,  1, $dex, 1,
                $initiative, 1, $int, 1, 1, $max_hp, 1, 1, 1, 1, 1, 1, 1,
                $speed, 1, 1, $str, 1, $wis);
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

            $character = new Character($description_id, $race_id, $stat_id);
            $character->save();

            $character->addCharClass($class_id);
            $character->addBackground($background_id);

            foreach ($skill_ids as $id) {
                $character->addSkill($id);
            }

            return $character;

        }

    }
?>
