<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Character.php";
    require_once "src/CharClass.php";
    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CharacterTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Character::deleteAll();
            CharClass::deleteAll();
        }

        function test_save() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);

            //Act
            $test_character->save();
            $result = Character::getAll();

            //Assert
            $this->assertEquals($test_character, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();
            $description_id2 = 2;
            $race_id2 = 2;
            $stat_id2 = 2;
            $test_character2 = new Character($description_id2, $race_id2, $stat_id2);
            $test_character2->save();

            //Act
            $result = Character::getAll();

            //Assert
            $this->assertEquals([$test_character, $test_character2], $result);
        }

        function test_deleteAll() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();
            $description_id2 = 2;
            $race_id2 = 2;
            $stat_id2 = 2;
            $test_character2 = new Character($description_id2, $race_id2, $stat_id2);
            $test_character2->save();

            //Act
            Character::deleteAll();
            $result = Character::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            //Act
            $result = $test_character->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();
            $description_id2 = 2;
            $race_id2 = 2;
            $stat_id2 = 2;
            $test_character2 = new Character($description_id2, $race_id2, $stat_id2);
            $test_character2->save();

            //Act
            $result = Character::find($test_character->getId());

            //Assert
            $this->assertEquals($test_character, $result);
        }

        function testAddCharClass() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            $class_id = 1;
            $test_class = new CharClass($class_id);
            $test_class->save();

            //Act
            $test_character->addCharClass($test_class);

            //Assert
            $this->assertEquals($test_character->getCharClasses(), [$test_class]);
        }

        function testGetCharClasses() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();
            $class_id = 1;
            $test_class = new CharClass($class_id);
            $test_class->save();
            $class_id2 = 2;
            $test_class2 = new CharClass($class_id2);
            $test_class2->save();

            //Act
            $test_character->addCharClass($test_class);
            $test_character->addCharClass($test_class2);

            //Assert
            $this->assertEquals($test_character->getCharClasses(), [$test_class, $test_class2]);
        }
    }
?>
