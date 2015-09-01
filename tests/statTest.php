S<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stat.php";

    $server = 'mysql:host=localhost;dbname=dnd_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StatTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stat::deleteAll();
        }

        function testGetId()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getId();
            //Assert
            $this->assertEquals(is_numeric($result), $result);
        }

        function testGetStr()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getStr();
            //Assert
            $this->assertEquals($str, $result);
        }

        function testGetDex()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getDex();
            //Assert
            $this->assertEquals($dex, $result);
        }

        function testGetCon()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getCon();
            //Assert
            $this->assertEquals($con, $result);
        }

        function testGetIntel()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getIntel();
            //Assert
            $this->assertEquals($intel, $result);
        }

        function testGetWis()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getWis();
            //Assert
            $this->assertEquals($wis, $result);
        }

        function testGetCha()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getCha();
            //Assert
            $this->assertEquals($cha, $result);
        }

        function testGetInit()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getInit();
            //Assert
            $this->assertEquals($init, $result);
        }

        function testGetMaxHp()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getMaxHp();
            //Assert
            $this->assertEquals($max_hp, $result);
        }

        function testGetSpeed()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getSpeed();
            //Assert
            $this->assertEquals($speed, $result);
        }

        function testGetAc()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getAc();
            //Assert
            $this->assertEquals($ac, $result);
        }


        function testGetAcrobatics()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getAcrobatics();
            //Assert
            $this->assertEquals($acrobatics, $result);
        }

        function testGetArcana()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getArcana();
            //Assert
            $this->assertEquals($arcana, $result);
        }

        function testGetAnimalHandling()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getAnimalHandling();
            //Assert
            $this->assertEquals($animal_handling, $result);
        }

        function testGetAthletics()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getAthletics();
            //Assert
            $this->assertEquals($athletics, $result);
        }

        function testGetDeception()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getDeception();
            //Assert
            $this->assertEquals($deception, $result);
        }



        function testGetHistory()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getHistory();
            //Assert
            $this->assertEquals($history, $result);
        }

        function testGetInsight()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getInsight();
            //Assert
            $this->assertEquals($insight, $result);
        }

        function testGetIntimidation()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getIntimidation();
            //Assert
            $this->assertEquals($investigation, $result);
        }

        function testGetMedicine()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getMedicine();
            //Assert
            $this->assertEquals($medicine, $result);
        }

        function testGetNature()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getNature();
            //Assert
            $this->assertEquals($nature, $result);
        }


        function testGetPerception()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getPerception();
            //Assert
            $this->assertEquals($perception, $result);
        }

        function testGetPerformance()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getPerformance();
            //Assert
            $this->assertEquals($performance, $result);
        }

        function testGetPersuasion()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getPersuasion();
            //Assert
            $this->assertEquals($persuasion, $result);
        }

        function testGetReligion()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getReligion();
            //Assert
            $this->assertEquals($religion, $result);
        }

        function testGetSleightOfHand()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getSleightOfHand();
            //Assert
            $this->assertEquals($sleight_of_hand, $result);
        }

        function testGetStealth()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getStealth();
            //Assert
            $this->assertEquals($stealth, $result);
        }

        function testGetSurvival()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $result = $test_stat->getSurvival();
            //Assert
            $this->assertEquals($survival, $result);
        }



        function testGetAll()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            $test_stat->save();

            $str2 = 2;
            $dex2 = 2;
            $con2 = 2;
            $int2 = 2;
            $wis2 = 2;
            $cha2 = 2;
            $init2 = 2;
            $max_hp2 = 2;
            $speed2 = 2;
            $ac2 = 2;
            $acrobatics2 = 2;
            $arcana2 = 2;
            $animal_handling2 = 2;
            $athletics2 = 2;
            $deception2 = 2;
            $history2 = 2;
            $insight2 = 2;
            $intimidation2 = 2;
            $investigation2 = 2;
            $medicine2 = 2;
            $nature2 = 2;
            $perception2 = 2;
            $performance2 = 2;
            $persuasion2 = 2;
            $proficiency2 = 2;
            $religion2 = 2;
            $sleight_of_hand2 = 2;
            $stealth2 = 2;
            $survival2 = 2;
            $test_stat2 = new Stat($ac2, $acrobatics2, $animal_handling2, $arcana2, $athletics2, $cha2, $con2, $deception2, $dex2, $history2, $init2, $insight2, $int2, $intimidation2, $investigation2, $max_hp2, $medicine2, $nature2, $perception2, $performance2, $persuasion2, $proficiency2, $religion2, $speed2, $sleight_of_hand2, $stealth2, $str2, $survival2, $wis2);
            $test_stat2->save();
            //Act
            $result = Stat::getAll();
            //Assert
            $this->assertEquals([$test_stat, $test_stat2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            $test_stat->save();

            $str2 = 2;
            $dex2 = 2;
            $con2 = 2;
            $int2 = 2;
            $wis2 = 2;
            $cha2 = 2;
            $init2 = 2;
            $max_hp2 = 2;
            $speed2 = 2;
            $ac2 = 2;
            $acrobatics2 = 2;
            $arcana2 = 2;
            $animal_handling2 = 2;
            $athletics2 = 2;
            $deception2 = 2;
            $history2 = 2;
            $insight2 = 2;
            $intimidation2 = 2;
            $investigation2 = 2;
            $medicine2 = 2;
            $nature2 = 2;
            $perception2 = 2;
            $performance2 = 2;
            $persuasion2 = 2;
            $proficiency2 = 2;
            $religion2 = 2;
            $sleight_of_hand2 = 2;
            $stealth2 = 2;
            $survival2 = 2;
            $test_stat2 = new Stat($ac2, $acrobatics2, $animal_handling2, $arcana2, $athletics2, $cha2, $con2, $deception2, $dex2, $history2, $init2, $insight2, $int2, $intimidation2, $investigation2, $max_hp2, $medicine2, $nature2, $perception2, $performance2, $persuasion2, $proficiency2, $religion2, $speed2, $sleight_of_hand2, $stealth2, $str2, $survival2, $wis2);
            $test_stat2->save();
            //Act
            Stat::deleteAll();
            //Assert
            $result = Stat::getAll();
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            $test_stat->save();

            $str2 = 2;
            $dex2 = 2;
            $con2 = 2;
            $int2 = 2;
            $wis2 = 2;
            $cha2 = 2;
            $init2 = 2;
            $max_hp2 = 2;
            $speed2 = 2;
            $ac2 = 2;
            $acrobatics2 = 2;
            $arcana2 = 2;
            $animal_handling2 = 2;
            $athletics2 = 2;
            $deception2 = 2;
            $history2 = 2;
            $insight2 = 2;
            $intimidation2 = 2;
            $investigation2 = 2;
            $medicine2 = 2;
            $nature2 = 2;
            $perception2 = 2;
            $performance2 = 2;
            $persuasion2 = 2;
            $proficiency2 = 2;
            $religion2 = 2;
            $sleight_of_hand2 = 2;
            $stealth2 = 2;
            $survival2 = 2;
            $test_stat2 = new Stat($ac2, $acrobatics2, $animal_handling2, $arcana2, $athletics2, $cha2, $con2, $deception2, $dex2, $history2, $init2, $insight2, $int2, $intimidation2, $investigation2, $max_hp2, $medicine2, $nature2, $perception2, $performance2, $persuasion2, $proficiency2, $religion2, $speed2, $sleight_of_hand2, $stealth2, $str2, $survival2, $wis2);
            $test_stat2->save();
            //Act
            $result = Stat::find($test_stat->getId());
            //Assert
            $this->assertEquals($test_stat, $result);
        }

        function testSave()
        {
            //Arrange
            $str = 2;
            $dex = 2;
            $con = 2;
            $intel = 2;
            $wis = 2;
            $cha = 2;
            $init = 2;
            $max_hp = 2;
            $speed = 2;
            $ac = 2;
            $acrobatics = 2;
            $arcana = 2;
            $animal_handling = 2;
            $athletics = 2;
            $deception = 2;
            $history = 2;
            $insight = 2;
            $intimidation = 2;
            $investigation = 2;
            $medicine = 2;
            $nature = 2;
            $perception = 2;
            $performance = 2;
            $persuasion = 2;
            $proficiency = 2;
            $religion = 2;
            $sleight_of_hand = 2;
            $stealth = 2;
            $survival = 2;
            $test_stat = new Stat($ac, $acrobatics, $animal_handling, $arcana, $athletics, $cha, $con, $deception, $dex, $history, $init, $insight, $intel, $intimidation, $investigation, $max_hp, $medicine, $nature, $perception, $performance, $persuasion, $proficiency, $religion, $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);
            //Act
            $test_stat->save();
            //Assert
            $result = Stat::getAll();
            $this->assertEquals($test_stat, $result[0]);
        }







        // Test for Dice Roll Assign function:
        function test_assignRolls_fighter() {

                $str = 2;
                $dex = 2;
                $con = 2;
                $intel = 2;
                $wis = 2;
                $cha = 2;
                $init = 2;
                $max_hp = 2;
                $speed = 2;
                $ac = 2;
                $acrobatics = 2;
                $arcana = 2;
                $animal_handling = 2;
                $athletics = 2;
                $deception = 2;
                $history = 2;
                $insight = 2;
                $intimidation = 2;
                $investigation = 2;
                $medicine = 2;
                $nature = 2;
                $perception = 2;
                $performance = 2;
                $persuasion = 2;
                $proficiency = 2;
                $religion = 2;
                $sleight_of_hand = 2;
                $stealth = 2;
                $survival = 2;
                $test_stat = new Stat($ac, $acrobatics, $animal_handling,
                    $arcana, $athletics, $cha, $con, $deception, $dex,
                    $history, $init, $insight, $intel, $intimidation,
                    $investigation, $max_hp, $medicine, $nature, $perception,
                    $performance, $persuasion, $proficiency, $religion,
                    $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);

                $test_stat->save();

                $six_rolls = [18, 16, 14, 12, 10, 8];
                $classname = "fighter";

                $test_stat->assignRolls($six_rolls, $classname);
                $strength = $test_stat->getStr();
                $result = 18;

                $this->assertEquals($strength, $result);
            }

            function test_assignRolls_cleric() {

                    $str = 2;
                    $dex = 2;
                    $con = 2;
                    $intel = 2;
                    $wis = 2;
                    $cha = 2;
                    $init = 2;
                    $max_hp = 2;
                    $speed = 2;
                    $ac = 2;
                    $acrobatics = 2;
                    $arcana = 2;
                    $animal_handling = 2;
                    $athletics = 2;
                    $deception = 2;
                    $history = 2;
                    $insight = 2;
                    $intimidation = 2;
                    $investigation = 2;
                    $medicine = 2;
                    $nature = 2;
                    $perception = 2;
                    $performance = 2;
                    $persuasion = 2;
                    $proficiency = 2;
                    $religion = 2;
                    $sleight_of_hand = 2;
                    $stealth = 2;
                    $survival = 2;
                    $test_stat = new Stat($ac, $acrobatics, $animal_handling,
                        $arcana, $athletics, $cha, $con, $deception, $dex,
                        $history, $init, $insight, $intel, $intimidation,
                        $investigation, $max_hp, $medicine, $nature, $perception,
                        $performance, $persuasion, $proficiency, $religion,
                        $speed, $sleight_of_hand, $stealth, $str, $survival, $wis);

                    $test_stat->save();

                    $six_rolls = [18, 16, 14, 12, 10, 8];
                    $classname = "cleric";

                    $test_stat->assignRolls($six_rolls, $classname);
                    $strength = $test_stat->getStr();
                    $result = 14;

                    $this->assertEquals($strength, $result);
                }
    }
?>
