<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Initial.php";
    require_once "Skill.php";
    require_once "Race.php";
    require_once "CharClass.php";
    require_once "Background.php";
    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class InitialTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            CharClass::deleteAll();
            Skill::deleteAll();
            Race::deleteAll();
            Background::deleteAll();
        }

        function test_addData_raceCheck() {
            Initial::addData();

            $race = Race::getAll();

            $result = ["Good all around, well balanced, adventurer.  Easy to role play and fits most roles well.", "Human", 1];

            $this->assertEquals($race[0], $result);
        }

    }
?>
