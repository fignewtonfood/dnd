<?php

    class Finalize
    {
        private $save_race;
        private $save_class;
        private $save_background;
        private $save_stats;
        private $save_description;


        function __construct($save_race, $save_class, $save_background, $save_stats, $save_description)
        {
            $this->save_race = $save_race;
            $this->save_class = $save_class;
            $this->save_background = $save_background;
            $this->save_stats = $save_stats;
            $this->save_description = $save_description;
        }

        function setSaveRace($new_save_race)
        {
            $this->save_race = $new_save_race;
        }

        function setSaveClass($new_save_class)
        {
            $this->save_class = $new_save_class;
        }

        function setSaveBackground($new_save_background)
        {
            $this->save_background = $new_save_background;
        }

        function setSaveStats()
        {
            $this->save_stats = $new_save_stats;
        }

        function setSaveDescription($new_save_description)
        {
            $this->save_description = $new_save_description;
        }

        function getSaveRace()
        {
            return $this->save_race;
        }

        function getSaveClass()
        {
            return $this->save_class;
        }

        function getSaveBackground()
        {
            return $this->save_background;
        }

        function getSaveStats()
        {
            return $this->save_stats;
        }

        function getSaveDescription()
        {
            return $this->save_description;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO races (description, name) VALUES ('{Race::getDescription()}', '{Race::getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();

            $GLOBALS['DB']->exec("INSERT INTO classes (name, description) VALUES ('{$this->getName()}', '{$this->getDescription()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();

            $GLOBALS['DB']->exec("INSERT INTO backgrounds (name, description) VALUES ('{$this->getName()}', '{$this->getDescription()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();

            $GLOBALS['DB']->exec("INSERT INTO stats (ac, acrobatics,
                animal_handling, arcana, athletics, cha, con, deception,
                dex, history, init, insight, intel, intimidation,
                investigation, max_hp, medicine, nature, perception,
                performance, persuasion, proficiency, religion, speed,
                sleight_of_hand, stealth, str, survival, wis) VALUES
                ({$this->getAc()}, {$this->getAcrobatics()},
                {$this->getAnimalHandling()}, {$this->getArcana()},
                {$this->getAthletics()}, {$this->getCha()}, {$this->getCon()},
                {$this->getDeception()}, {$this->getDex()},
                {$this->getHistory()}, {$this->getInit()},
                {$this->getInsight()}, {$this->getIntel()},
                {$this->getIntimidation()}, {$this->getInvestigation()},
                {$this->getMaxHp()}, {$this->getMedicine()},
                {$this->getNature()}, {$this->getPerception()},
                {$this->getPerformance()}, {$this->getPersuasion()},
                {$this->getProficiency()}, {$this->getReligion()},
                {$this->getSpeed()}, {$this->getSleightOfHand()},
                {$this->getStealth()}, {$this->getStr()},
                {$this->getSurvival()}, {$this->getWis()});");
            $this->id = $GLOBALS['DB']->lastInsertId();

            $GLOBALS['DB']->exec("INSERT INTO descriptions (gender, age,
            alignment, height, eye_color, hair_color, skin_tone, other)
            VALUES ('{$this->getGender()}', '{$this->getAge()}',
            '{$this->getAlignment()}', '{$this->getHeight()}',
            '{$this->getEyeColor()}', '{$this->getHairColor()}',
            '{$this->getSkinTone()}',  '{$this->getOther()}');");
            $this->id = $GLOBALS["DB"]->lastInsertId();

            $GLOBALS['DB']->exec("INSERT INTO characters (description_id, race_id, stat_id) VALUES ({$this->getDescriptionId()}, {$this->getRaceId()}, {$this->getStatId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function deleteAll()
        {

        }

        function getAll()
        {
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM races;");
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM classes;");
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM backgrounds;");
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM stats;");
            $raw_info = $GLOBALS["DB"]->query("SELECT * FROM characters;");
        }
    }
 ?>
