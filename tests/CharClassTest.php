<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Class.php";
    require_once "src/Character.php";
    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    character ClassTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Class::deleteAll();
            Character::deleteAll();
        }

        function test_save() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Class($name, $description);

            //Act
            $test_class->save();
            $result = Class::getAll();

            //Assert
            $this->assertEquals($test_class, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Class($name, $description);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $test_class2 = new Class($name2, $description2);
            $test_class2->save();

            //Act
            $result = Class::getAll();

            //Assert
            $this->assertEquals([$test_class, $test_class2], $result);
        }

        function test_deleteAll() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Class($name, $description);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $test_class2 = new Class($name2, $description2);
            $test_class2->save();

            //Act
            Class::deleteAll();
            $result = Class::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Class($name, $description);
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
            $test_class = new Class($name, $description);
            $test_class->save();
            $name2 = "Wizard";
            $description2 = "other stuff";
            $test_class2 = new Class($name2, $description2);
            $test_class2->save();

            //Act
            $result = Class::find($test_class->getId());

            //Assert
            $this->assertEquals($test_class, $result);
        }

        function testAddCharacter() {
            //Arrange
            $name = "Fighter";
            $description = "stuff";
            $test_class = new Class($name, $description);
            $test_class->save();

            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            //Act
            $test_class->addCharacter($test_character);

            //Assert
            $this->assertEquals($test_class->getCharacters(), [$test_character]);
        }

        // function testGetCharacters() {
        //     //Arrange
        //     $description_id = 1;
        //     $race_id = 1;
        //     $stat_id = 1;
        //     $test_class = new Class($description_id, $race_id, $stat_id);
        //     $test_class->save();
        //     $character_id = 1;
        //     $test_character = new Character($character_id);
        //     $test_character->save();
        //     $character_id2 = 2;
        //     $test_character2 = new Character($character_id2);
        //     $test_character2->save();
        //
        //     //Act
        //     $test_class->addCharacter($test_character);
        //     $test_class->addCharacter($test_character2);
        //
        //     //Assert
        //     $this->assertEquals($test_class->getCharacters(), [$test_character, $test_character2]);
        // }
    }
?>
