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


    class FinalizeTest extends PHPUnit_Framework_TestCase {

        function test_finalize() {

        }

    }
 ?>
