<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stat.php";
    require_once "src/Character.php";
    require_once "src/CharClass.php";
    require_once "src/Description.php";
    require_once "src/Finalize.php";
    require_once "src/Race.php";
    require_once "src/Initial.php";

    session_start();
        $_SESSION['race'] = 2;
        $_SESSION['class'] = 2;
        $_SESSION['background'] = 2;
        $_SESSION['skill'] = ["Acrobatics", "Animal Handling",
            "Stealth", "Intimidation"];
        $_SESSION['str'] = 12;
        $_SESSION['dex'] = 12;
        $_SESSION['con'] = 12;
        $_SESSION['wis'] = 12;
        $_SESSION['int'] = 12;
        $_SESSION['cha'] = 12;
        $_SESSION['name'] = "Jack";
        $_SESSION['age'] = "21";
        $_SESSION['gender'] = "male";
        $_SESSION['height'] = "3 feet";
        $_SESSION['weight'] = "190 lbs";
        $_SESSION['eye_color'] = "brown";
        $_SESSION['hair_color'] = "brown";
        $_SESSION['skin_tone'] = "brown";
        $_SESSION['alignment'] = "chaotic neutral";
        $_SESSION['other_information'] = "This character is a BAMF.";

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class FinalizeTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            CharClass::deleteAll();
            Character::deleteAll();
            Race::deleteAll();
            Skill::deleteAll();
            Stat::deleteAll();
            Description::deleteAll();
            Background::deleteAll();
        }

        function test_run_raceIsThere() {
            Initial::addData();
            $character = Finalize::run();
            $race = $character->getRaceId();

            $result = 2;

            $this->assertEquals($race, $result);
        }

        function test_run_ageIsThere() {
            Initial::addData();
            $character = Finalize::run();
            $id = $character->getDescriptionId();
            $description = Description::find($id);
            $age = $description->getAge();

            $result = "21";

            $this->assertEquals($age, $result);
        }

        function test_run_maxHpIsThere() {
            Initial::addData();
            $character = Finalize::run();
            $id = $character->getStatId();
            $stat = Stat::find($id);
            $max_hp = $stat->getMaxHp();

            $result = 11;

            $this->assertEquals($max_hp, $result);
        }

    }
 ?>
