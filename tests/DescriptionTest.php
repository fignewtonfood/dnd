<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Description.php';

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class DescriptionTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown() {
            Description::deleteAll();
        }

        function test_save_and_getAll() {
            $id = null;
            $gender1 = "male";
            $test_description = new Description($id, $gender1);
            $test_description->save();

            $gender2 = "female";
            $test_description2 = new Description($id, $gender2);
            $test_description2->save();

            $result = Description::getAll();

            $this->assertEquals([$test_description, $test_description2], $result);
        }

        function test_find() {
            $id = null;
            $gender1 = "male";
            $test_description = new Description($id, $gender1);
            $test_description->save();

            $gender2 = "female";
            $test_description2 = new Description($id, $gender2);
            $test_description2->save();

            $id = $test_description2->getId();

            $result = Description::find($id);

            $this->assertEquals($test_description2, $result);
        }

        function test_deleteThis() {
            $id = null;
            $gender1 = "male";
            $test_description = new Description($id, $gender1);
            $test_description->save();

            $gender2 = "female";
            $test_description2 = new Description($id, $gender2);
            $test_description2->save();

            $test_description2->deleteThis();

            $result = Description::getAll();

            $this->assertEquals([$test_description], $result);
        }


        // Database needs to be changed to reflect changes in class.


    }
?>
