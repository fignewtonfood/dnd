<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */


    require_once "src/Stat.php";

    $server = 'mysql:host=localhost:8889;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    

?>
