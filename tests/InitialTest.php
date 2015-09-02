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

            $result = new Race("Good all around, well balanced, adventurer.  Easy to role play and fits most roles well.", "Human", 1);

            $this->assertEquals($race[0], $result);
        }

        function test_addData_backgroundCheck() {
            Initial::addData();

            $background = Background::getAll();

            $result = new Background("Hermit", "Medicine and religion. Your life has been lonely and you have a secret knowledge.", 1);

            $this->assertEquals($background[0], $result);
        }

        function test_addData_charClassCheck() {
            Initial::addData();

            $char_class = CharClass::getAll();

            $result = new CharClass("Cleric", "Wise and charismatic. Typically a healer who wields divine power in the service of their diety.", 1);

            $this->assertEquals($char_class[0], $result);
        }

        function test_addData_skillCheck() {
            Initial::addData();

            $skill = Skill::getAll();

            $result = new Skill("Acrobatics", "Balancing and tumbling", 1);

            $this->assertEquals($skill[0], $result);
        }

    }
?>
