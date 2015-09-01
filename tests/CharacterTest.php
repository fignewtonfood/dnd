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

            $name = "Wizard";
            $description = "stuff";
            $test_class = new CharClass($name, $description);
            $test_class->save();

            //Act
            $test_character->addCharClass($test_class);
            $result = $test_character->getCharClasses();

            //Assert
            $this->assertEquals([$test_class], $result);
        }

        function testGetCharClasses() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();
            $name = "Wizard";
            $description = "stuff";
            $test_class = new CharClass($name, $description);
            $test_class->save();
            $name2 = "Fighter";
            $description2 = "other stuff";
            $test_class2 = new CharClass($name2, $description2);
            $test_class2->save();

            //Act
            $test_character->addCharClass($test_class);
            $test_character->addCharClass($test_class2);

            //Assert
            $this->assertEquals($test_character->getCharClasses(), [$test_class, $test_class2]);
        }

        function testAddBackground() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            $name = "Noble";
            $description = "stuff";
            $test_background = new Background($name, $description);
            $test_background->save();

            //Act
            $test_character->addBackground($test_background);
            $result = $test_character->getBackgrounds();

            //Assert
            $this->assertEquals([$test_background], $result);
        }

        function testGetBackgrounds() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            $name = "Noble";
            $description = "stuff";
            $test_background = new Background($name, $description);
            $test_background->save();

            $name2 = "Urchin";
            $description2 = "other stuff";
            $test_background2 = new Background($name2, $description2);
            $test_background2->save();

            //Act
            $test_character->addBackground($test_background);
            $test_character->addBackground($test_background2);

            //Assert
            $this->assertEquals($test_character->getBackgrounds(), [$test_background, $test_background2]);
        }

        function testAddSkill() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            $name = "Acrobatics";
            $description = "stuff";
            $test_skill = new Skill($name, $description);
            $test_skill->save();

            //Act
            $test_character->addSkill($test_skill);
            $result = $test_character->getSkills();

            //Assert
            $this->assertEquals([$test_skill], $result);
        }

        function testGetSkills() {
            //Arrange
            $description_id = 1;
            $race_id = 1;
            $stat_id = 1;
            $test_character = new Character($description_id, $race_id, $stat_id);
            $test_character->save();

            $name = "Acrobatics";
            $description = "stuff";
            $test_skill = new Skill($name, $description);
            $test_skill->save();
            $name2 = "Athletics";
            $description2 = "other stuff";
            $test_skill2 = new Skill($name2, $description2);
            $test_skill2->save();

            //Act
            $test_character->addSkill($test_skill);
            $test_character->addSkill($test_skill2);

            //Assert
            $this->assertEquals($test_character->getSkills(), [$test_skill, $test_skill2]);
        }
    }
?>
