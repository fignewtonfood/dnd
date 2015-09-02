<?php

    class Finalize()
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
            
        }
    }
 ?>
