-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost:8080
-- Generation Time: Aug 31, 2015 at 10:58 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnd`
--
CREATE DATABASE IF NOT EXISTS `dnd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dnd`;

-- --------------------------------------------------------

--
-- Table structure for table `adventures`
--

CREATE TABLE IF NOT EXISTS `adventures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `adventures_locations`
--

CREATE TABLE IF NOT EXISTS `adventures_locations` (
  `id` int(11) NOT NULL,
  `adventure_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `adventures_npcs`
--

CREATE TABLE IF NOT EXISTS `adventures_npcs` (
  `id` int(11) NOT NULL,
  `adventure_id` int(11) DEFAULT NULL,
  `npc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `gm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns_players`
--

CREATE TABLE IF NOT EXISTS `campaigns_players` (
  `id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL,
  `race_id` int(11) DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `stat_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `characters_classes`
--

CREATE TABLE IF NOT EXISTS `characters_classes` (
  `id` int(11) NOT NULL,
  `character_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `characters_equipments`
--

CREATE TABLE IF NOT EXISTS `characters_equipments` (
  `id` int(11) NOT NULL,
  `character_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `characters_spells`
--

CREATE TABLE IF NOT EXISTS `characters_spells` (
  `id` int(11) NOT NULL,
  `character_id` int(11) DEFAULT NULL,
  `spell_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `characters_weapons`
--

CREATE TABLE IF NOT EXISTS `characters_weapons` (
  `id` int(11) NOT NULL,
  `character_id` int(11) DEFAULT NULL,
  `weapon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE IF NOT EXISTS `descriptions` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alignment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `height` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `eye_color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `hair_color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `skin_tone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `gms`
--

CREATE TABLE IF NOT EXISTS `gms` (
  `id` int(11) NOT NULL,
  `sign_in_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `npcs`
--

CREATE TABLE IF NOT EXISTS `npcs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `campaign_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sign_in_id` int(11) DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE IF NOT EXISTS `races` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `signIns`
--

CREATE TABLE IF NOT EXISTS `signIns` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `spells`
--

CREATE TABLE IF NOT EXISTS `spells` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `school` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `component` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `range` int(11) DEFAULT NULL,
  `time_to_cast` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL,
  `str` int(11) DEFAULT NULL,
  `dex` int(11) DEFAULT NULL,
  `con` int(11) DEFAULT NULL,
  `int` int(11) DEFAULT NULL,
  `wis` int(11) DEFAULT NULL,
  `cha` int(11) DEFAULT NULL,
  `initiative` int(11) DEFAULT NULL,
  `max_hp` int(11) DEFAULT NULL,
  `ac` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `acrobatics` int(11) DEFAULT NULL,
  `arcana` int(11) DEFAULT NULL,
  `animal_handling` int(11) DEFAULT NULL,
  `athletics` int(11) DEFAULT NULL,
  `deception` int(11) DEFAULT NULL,
  `history` int(11) DEFAULT NULL,
  `insight` int(11) DEFAULT NULL,
  `intimidation` int(11) DEFAULT NULL,
  `investigation` int(11) DEFAULT NULL,
  `medicine` int(11) DEFAULT NULL,
  `nature` int(11) DEFAULT NULL,
  `perception` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `persuasion` int(11) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `sleight_of_hand` int(11) DEFAULT NULL,
  `stealth` int(11) DEFAULT NULL,
  `survival` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE IF NOT EXISTS `weapons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `base_damage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `damage_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `special_attributes` mediumtext CHARACTER SET utf8,
  `description` mediumtext CHARACTER SET utf8,
  `range` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adventures`
--
ALTER TABLE `adventures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `adventures_locations`
--
ALTER TABLE `adventures_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adventure_id` (`adventure_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `adventures_npcs`
--
ALTER TABLE `adventures_npcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adventure_id` (`adventure_id`),
  ADD KEY `npc_id` (`npc_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gm_id` (`gm_id`);

--
-- Indexes for table `campaigns_players`
--
ALTER TABLE `campaigns_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_id` (`race_id`),
  ADD KEY `description_id` (`description_id`),
  ADD KEY `stat_id` (`stat_id`);

--
-- Indexes for table `characters_classes`
--
ALTER TABLE `characters_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `character_id` (`character_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `characters_equipments`
--
ALTER TABLE `characters_equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `character_id` (`character_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `characters_spells`
--
ALTER TABLE `characters_spells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `character_id` (`character_id`),
  ADD KEY `spell_id` (`spell_id`);

--
-- Indexes for table `characters_weapons`
--
ALTER TABLE `characters_weapons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `character_id` (`character_id`),
  ADD KEY `weapon_id` (`weapon_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gms`
--
ALTER TABLE `gms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sign_in_id` (`sign_in_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `npcs`
--
ALTER TABLE `npcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sign_in_id` (`sign_in_id`),
  ADD KEY `character_id` (`character_id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signIns`
--
ALTER TABLE `signIns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spells`
--
ALTER TABLE `spells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adventures`
--
ALTER TABLE `adventures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adventures_locations`
--
ALTER TABLE `adventures_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adventures_npcs`
--
ALTER TABLE `adventures_npcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaigns_players`
--
ALTER TABLE `campaigns_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `characters_classes`
--
ALTER TABLE `characters_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `characters_equipments`
--
ALTER TABLE `characters_equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `characters_spells`
--
ALTER TABLE `characters_spells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `characters_weapons`
--
ALTER TABLE `characters_weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gms`
--
ALTER TABLE `gms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `npcs`
--
ALTER TABLE `npcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `signIns`
--
ALTER TABLE `signIns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spells`
--
ALTER TABLE `spells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adventures`
--
ALTER TABLE `adventures`
  ADD CONSTRAINT `adventures_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`);

--
-- Constraints for table `adventures_locations`
--
ALTER TABLE `adventures_locations`
  ADD CONSTRAINT `adventures_locations_ibfk_1` FOREIGN KEY (`adventure_id`) REFERENCES `adventures` (`id`),
  ADD CONSTRAINT `adventures_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `adventures_npcs`
--
ALTER TABLE `adventures_npcs`
  ADD CONSTRAINT `adventures_npcs_ibfk_1` FOREIGN KEY (`adventure_id`) REFERENCES `adventures` (`id`),
  ADD CONSTRAINT `adventures_npcs_ibfk_2` FOREIGN KEY (`npc_id`) REFERENCES `npcs` (`id`);

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`id`) REFERENCES `npcs` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_2` FOREIGN KEY (`gm_id`) REFERENCES `gms` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_3` FOREIGN KEY (`id`) REFERENCES `npcs` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_4` FOREIGN KEY (`gm_id`) REFERENCES `gms` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_5` FOREIGN KEY (`id`) REFERENCES `npcs` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_6` FOREIGN KEY (`gm_id`) REFERENCES `gms` (`id`);

--
-- Constraints for table `campaigns_players`
--
ALTER TABLE `campaigns_players`
  ADD CONSTRAINT `campaigns_players_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `campaigns_players_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`);

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `characters_ibfk_2` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `characters_ibfk_3` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`),
  ADD CONSTRAINT `characters_ibfk_4` FOREIGN KEY (`stat_id`) REFERENCES `stats` (`id`);

--
-- Constraints for table `characters_classes`
--
ALTER TABLE `characters_classes`
  ADD CONSTRAINT `characters_classes_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `characters_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `characters_equipments`
--
ALTER TABLE `characters_equipments`
  ADD CONSTRAINT `characters_equipments_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `characters_equipments_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`);

--
-- Constraints for table `characters_spells`
--
ALTER TABLE `characters_spells`
  ADD CONSTRAINT `characters_spells_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `characters_spells_ibfk_2` FOREIGN KEY (`spell_id`) REFERENCES `spells` (`id`);

--
-- Constraints for table `characters_weapons`
--
ALTER TABLE `characters_weapons`
  ADD CONSTRAINT `characters_weapons_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `characters_weapons_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `weapons` (`id`);

--
-- Constraints for table `gms`
--
ALTER TABLE `gms`
  ADD CONSTRAINT `gms_ibfk_1` FOREIGN KEY (`sign_in_id`) REFERENCES `signins` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `locations_ibfk_3` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`);

--
-- Constraints for table `npcs`
--
ALTER TABLE `npcs`
  ADD CONSTRAINT `npcs_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`sign_in_id`) REFERENCES `signins` (`id`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `players_ibfk_3` FOREIGN KEY (`sign_in_id`) REFERENCES `signins` (`id`),
  ADD CONSTRAINT `players_ibfk_4` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `players_ibfk_5` FOREIGN KEY (`sign_in_id`) REFERENCES `signins` (`id`),
  ADD CONSTRAINT `players_ibfk_6` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
