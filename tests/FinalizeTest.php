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

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class FinalizeTest extends PHPUnit_Framework_TestCase
    {


        function testSetSaveRace($new_save_race)
        {
            $this->save_race = $new_save_race;
        }

        function testSetSaveClass($new_save_class)
        {
            $this->save_class = $new_save_class;
        }

        function testSetSaveBackground($new_save_background)
        {
            $this->save_background = $new_save_background;
        }

        function testSetSaveStats()
        {
            $this->save_stats = $new_save_stats;
        }

        function testSetSaveDescription($new_save_description)
        {
            $this->save_description = $new_save_description;
        }

        function getSaveRace()
        {
            return $this->save_race;
        }

        function getSaveClass()
        {
            return $this->save_class;
        }

        function getSaveBackground()
        {
            return $this->save_background;
        }

        function getSaveStats()
        {
            return $this->save_stats;
        }

        function getSaveDescription()
        {
            return $this->save_description;
        }

        function save()
        {

        }

        function deleteAll()
        {

        }

        function getAll()
        {

        }
    }
 ?>
