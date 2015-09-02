<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Initial.php";
    require_once "src/Skill.php";
    require_once "src/Race.php";
    require_once "src/CharClass.php";
    require_once "src/Background.php";
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
            var_dump($race[0]);
            var_dump($result);

            $this->assertEquals($race[0], $result);
        }

    }
?>
