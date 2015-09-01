<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Skill.php";
    require_once "src/Character.php";

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class SkillTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Skill::deleteAll();
            Character::deleteAll();
        }
        function test_get() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);

            //Act
            $result = $test_class->getName();
            $result2 = $test_class->getDescription();

            //Assert
            $this->assertEquals($name, $result);
            $this->assertEquals($description, $result2);
        }

        function test_save() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);

            //Act
            $test_class->save();
            $result = Skill::getAll();

            //Assert
            $this->assertEquals($test_class, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);
            $test_class->save();
            $name2 = "Athletics";
            $description2 = "other stuff";
            $test_class2 = new Skill($name2, $description2);
            $test_class2->save();

            //Act
            $result = Skill::getAll();

            //Assert
            $this->assertEquals([$test_class, $test_class2], $result);
        }

        function test_deleteAll() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);
            $test_class->save();
            $name2 = "Athletics";
            $description2 = "other stuff";
            $test_class2 = new Skill($name2, $description2);
            $test_class2->save();

            //Act
            Skill::deleteAll();
            $result = Skill::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);
            $test_class->save();

            //Act
            $result = $test_class->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find() {
            //Arrange
            $name = "Acrobatics";
            $description = "stuff";
            $test_class = new Skill($name, $description);
            $test_class->save();
            $name2 = "Athletics";
            $description2 = "other stuff";
            $test_class2 = new Skill($name2, $description2);
            $test_class2->save();

            //Act
            $result = Skill::find($test_class->getId());

            //Assert
            $this->assertEquals($test_class, $result);
        }

    }
?>
