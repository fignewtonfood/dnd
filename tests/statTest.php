<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";
    $server = 'mysql:host=localhost;dbname=test_dnd';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StatTest extends PHPUnit_Framework_TestCase
    {
        
    }

?>
