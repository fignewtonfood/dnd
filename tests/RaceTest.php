<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Race.php";
    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class RaceTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Race::deleteAll();
        }

        function testGetDescription()
        {
            //Arrange
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            //Act
            $result = $test_race->getDescription();
            //Assert
            $this->assertEquals($description, $result);
        }

        function testGetName()
        {
            //Arrange
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            //Act
            $result = $test_race->getName();
            //Assert
            $this->assertEquals($name, $result);
        }

        function testGetAll()
        {
            //Arrange
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            $test_race->save();
            $description2 = "Cool Dude";
            $name2 = "Elf";
            $test_race2 = new Race($description2, $name2);
            $test_race2->save();
            //Act
            $result = Race::getAll();
            //Assert
            $this->assertEquals([$test_race, $test_race2], $result);
        }

        function testDeleteAll()
        {
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            $test_race->save();
            $description2 = "Cool Dude";
            $name2 = "Elf";
            $test_race2 = new Race($description2, $name2);
            $test_race2->save();
            //Act
            Race::deleteAll();
            //Assert
            $result = Race::getAll();
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            $test_race->save();
            $description2 = "Cool Dude";
            $name2 = "Elf";
            $test_race2 = new Race($description2, $name2);
            $test_race2->save();
            //Act
            $result = Race::find($test_race->getId());
            //Assert
            $this->assertEquals($test_race, $result);
        }

        function testSave()
        {
            //Arrange
            $description = "Average Joe";
            $name = "Human";
            $test_race = new Race($description, $name);
            //Act
            $test_race->save();
            //Assert
            $result = Race::getAll();
            $this->assertEquals($test_race, $result[0]);
        }
    }
?>
