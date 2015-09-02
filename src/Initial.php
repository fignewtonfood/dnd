<?php
    // RUN THIS FUNCTION WHEN YOU FIRST START THE PROGRAM
    // TO INITIALIZE DATA IN THE DATABASE.
    
    require_once "Skill.php";
    require_once "Race.php";
    require_once "CharClass.php";
    require_once "Background.php";

    class Initial {

        static function addData() {
            // SKILLS:
            $skill1  = new Skill("Acrobatics", "Balancing and tumbling", 1);
            $skill2  = new Skill("Animal Handling", "Using or interacting with domesticated animals.", 2);
            $skill3  = new Skill("Arcana", "Magic related lore and knowledge.", 3);
            $skill4  = new Skill("Athletics", "Climbing, jumping, and swimming.", 4);
            $skill5  = new Skill("Deception", "Hide the truth.", 5);
            $skill6  = new Skill("History", "Recall historical events.", 6);
            $skill7  = new Skill("Insight", "Determine a creature's true intentions.", 7);
            $skill8  = new Skill("Intimidation", "Influence by using threats.", 8);
            $skill9  = new Skill("Investigation", "Look for clues and find hidden things.", 9);
            $skill10 = new Skill("Medicine", "Stabilize the dying or diagnose a disease.", 10);
            $skill11 = new Skill("Nature", "Recall weather, plant, or animal lore.", 11);
            $skill12 = new Skill("Perception", "See, hear, or smell the presence or something.", 12);
            $skill13 = new Skill("Performance", "Ability in dancing, singing, or storytelling.", 13);
            $skill14 = new Skill("Persuasion", "Influence by using goodwill.", 14);
            $skill15 = new Skill("Religion", "Recall religious lore.", 15);
            $skill16 = new Skill("Sleight of Hand", "Concealing items or stealing things.", 16);
            $skill17 = new Skill("Stealth", "Sneaking or hiding.", 17);
            $skill18 = new Skill("Survival", "Track and hunt, avoid hazards, or predict weather.", 18);

            $skill1->save();
            $skill2->save();
            $skill3->save();
            $skill4->save();
            $skill5->save();
            $skill6->save();
            $skill7->save();
            $skill8->save();
            $skill9->save();
            $skill10->save();
            $skill11->save();
            $skill12->save();
            $skill13->save();
            $skill14->save();
            $skill15->save();
            $skill16->save();
            $skill17->save();
            $skill18->save();


            // RACES:
            $race1 = new Race("Good all around, well balanced, adventurer.  Easy to role play and fits most roles well.", "Human", 1);
            $race2 = new Race("Tough and wise. Good clerics. Bearded and can live to over 400. A bit more open than mountain dwarves.", "Hill Dwarf", 2);
            $race3 = new Race("Strong and tough. Good fighters. Bearded and can live to over 400. Likes to keep to their own.", "Mountain Dwarf", 3);
            $race4 = new Race("Fast and intelligent. Good fighters, rogues or wizards. Bronze skin. Has air of superiority.", "High Elf", 4);
            $race5 = new Race("Fast and wise. Good clerics and fighters. Copper/green skin. Very in tune with nature.", "Wood Elf", 5);
            $race6 = new Race("Fast and charismatic. Good rogues. Easily overlooked. Wanderers. Around 3 feet tall.", "Lightfoot Halfling", 6);
            $race7 = new Race("Tough and fast. Good fighters or rogues. Strong natured and boisterous.", "Stout Halfling", 7);

            $race1->save();
            $race2->save();
            $race3->save();
            $race4->save();
            $race5->save();
            $race6->save();
            $race7->save();


            // CLASSES:
            $class1 = new CharClass("Cleric", "Wise and charismatic. Typically a healer who wields divine power in the service of their diety.", 1);
            $class2 = new CharClass("Fighter", "Strong and tough or fast and tough. Master of combat and knowledgable in weapons and armor.", 2);
            $class3 = new CharClass("Rogue", "Fast and intelligent. Highly skilled and commonly duplicitous. Commonly a seeker of treasures.", 3);
            $class4 = new CharClass("Wizard", "Intelligent and wise. Weaves magic spells that manipulate reality using long studied arcane knowledge.", 4);

            $class1->save();
            $class2->save();
            $class3->save();
            $class4->save();


            // BACKGROUNDS:
            $background1 = new Background("Hermit", "Medicine and religion. Your life has been lonely and you have a secret knowledge.", 1);
            $background2 = new Background("Noble", "History and persuasion. Your life has been luxurious and you benefit from your position of privilege.", 2);
            $background3 = new Background("Soldier", "Athletics and intimidation. Your life has been touched by war and you are recognized by your military rank.", 3);
            $background4 = new Background("Urchin", "Sleight of Hand and Stealth. Your life has been impoverished and you are intimately familiar with city workings.", 4);

            $background1->save();
            $background2->save();
            $background3->save();
            $background4->save();

        }
    }
?>
