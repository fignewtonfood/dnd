<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Background.php";
    require_once "src/Character.php";

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BackgroundTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Background::deleteAll();
            Character::deleteAll();
        }

        function test_get() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Background($name, $description);

            //Act
            $result = $test_class->getName();
            $result2 = $test_class->getDescription();

            //Assert
            $this->assertEquals($name, $result);
            $this->assertEquals($description, $result2);
        }

        function test_save() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $id = 1;
            $test_class = new Background($name, $description, $id);

            //Act
            $test_class->save();
            $result = Background::getAll();

            //Assert
            $this->assertEquals($test_class, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $id = 1;
            $test_class = new Background($name, $description, $id);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $id2 = 2;
            $test_class2 = new Background($name2, $description2, $id2);
            $test_class2->save();

            //Act
            $result = Background::getAll();
            //Assert
            $this->assertEquals([$test_class, $test_class2], $result);
        }

        function test_deleteAll() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Background($name, $description);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $test_class2 = new Background($name2, $description2);
            $test_class2->save();

            //Act
            Background::deleteAll();
            $result = Background::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId() {
            //Arrange

            $name = "Fighter";
            $description = "stuff";
            $id = 1;
            
            $test_class = new Background($name, $description, $id);
            $test_class->save();

            //Act
            $result = $test_class->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $id = 1;
            $test_class = new Background($name, $description, $id);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $test_class2 = new Background($name2, $description2);
            $test_class2->save();

            //Act
            $result = Background::find($test_class->getId());

            //Assert
            $this->assertEquals($test_class, $result);
        }
    }
?>
