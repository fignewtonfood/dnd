<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Description.php';
    require_once 'src/Character.php';

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class DescriptionTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown() {
            Description::deleteAll();
            Character::deleteAll();
        }

        function test_save() {
            //Arrange
            $gender = "male";
            $age = "25";
            $alignment = "LG";
            $height = "6ft 1in";
            $eye_color = "hazel";
            $hair_color = "brown";
            $skin_tone = "dark";
            $other = "stuff";
            $test_description = new Description($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other);

            //Act
            $test_description->save();
            $result = Description::getAll();

            //Assert
            $this->assertEquals($test_description, $result[0]);
        }

        function test_getAll() {
            //Arrange
            $gender = "male";
            $age = "25";
            $alignment = "LG";
            $height = "6ft 1in";
            $eye_color = "hazel";
            $hair_color = "brown";
            $skin_tone = "dark";
            $other = "stuff";
            $test_description = new Description($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other);
            $test_description->save();

            $gender2 = "female";
            $age2 = "30";
            $alignment2 = "CG";
            $height2 = "6ft 1in";
            $eye_color2 = "brown";
            $hair_color2 = "black";
            $skin_tone2 = "copper";
            $other2 = "more stuff";
            $test_description2 = new Description($gender2, $age2, $alignment2, $height2, $eye_color2, $hair_color2, $skin_tone2, $other2);
            $test_description2->save();

            //Act
            $result = Description::getAll();

            //Assert
            $this->assertEquals([$test_description, $test_description2], $result);
        }

        function test_deleteAll() {
            //Arrange
            $gender = "male";
            $age = "25";
            $alignment = "LG";
            $height = "6ft 1in";
            $eye_color = "hazel";
            $hair_color = "brown";
            $skin_tone = "dark";
            $other = "stuff";
            $test_description = new Description($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other);
            $test_description->save();

            $gender2 = "female";
            $age2 = "30";
            $alignment2 = "CG";
            $height2 = "6ft 1in";
            $eye_color2 = "brown";
            $hair_color2 = "black";
            $skin_tone2 = "copper";
            $other2 = "more stuff";
            $test_description2 = new Description($gender2, $age2, $alignment2, $height2, $eye_color2, $hair_color2, $skin_tone2, $other2);
            $test_description2->save();

            //Act
            Description::deleteAll();
            $result = Description::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId() {
            //Arrange
            $gender = "male";
            $age = "25";
            $alignment = "LG";
            $height = "6ft 1in";
            $eye_color = "hazel";
            $hair_color = "brown";
            $skin_tone = "dark";
            $other = "stuff";
            $test_description = new Description($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other);
            $test_description->save();

            //Act
            $result = $test_description->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find() {
            //Arrange
            $gender = "male";
            $age = "25";
            $alignment = "LG";
            $height = "6ft 1in";
            $eye_color = "hazel";
            $hair_color = "brown";
            $skin_tone = "dark";
            $other = "stuff";
            $test_description = new Description($gender, $age, $alignment, $height, $eye_color, $hair_color, $skin_tone, $other);
            $test_description->save();

            $gender2 = "female";
            $age2 = "30";
            $alignment2 = "CG";
            $height2 = "6ft 1in";
            $eye_color2 = "brown";
            $hair_color2 = "black";
            $skin_tone2 = "copper";
            $other2 = "more stuff";
            $test_description2 = new Description($gender2, $age2, $alignment2, $height2, $eye_color2, $hair_color2, $skin_tone2, $other2);
            $test_description2->save();

            //Act
            $result = Description::find($test_description->getId());

            //Assert
            $this->assertEquals($test_description, $result);
        }
    }
?>
