
-- -----------------------------------------------------
-- Table `distribution_hub_filter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_filter`;

CREATE TABLE `distribution_hub_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objectType` enum('object','variant') DEFAULT NULL,
  `filterConfig` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `distribution_hub_channel`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `distribution_hub_channel`;

CREATE TABLE `distribution_hub_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pimcoreClassId` varchar(50) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `headerMappingFileAssetId` int(11) DEFAULT NULL,
  `headerMappingFileType` enum('Csv','Excel') DEFAULT NULL,
  `sheetNumberInMappingFile` int(3) DEFAULT NULL,
  `headerRowNumberInMappingFile` int(11) DEFAULT NULL,
  `mappingFileCSVDelimiter` varchar(1) DEFAULT NULL,
  `exportFileCSVDelimiter` varchar(1) DEFAULT NULL,
  `exportFilePath` varchar(1000) DEFAULT NULL,
  `columnAttributeMapping` longtext DEFAULT NULL,
  `showInGridMapping` longtext DEFAULT NULL,
  `filterId` int(11) DEFAULT NULL,
  `userOwner` int(11) NOT NULL,
  `shareGlobally` tinyint(1) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `expiryDate` int(11) DEFAULT NULL,
  `creationDate` int(11) DEFAULT NULL,
  `modificationDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_distribution_hub_channel_distribution_hub_filter1_idx` (`filterId`),
  KEY `channel_user_owner` (`userOwner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `distribution_hub_FTPDetail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_FTPDetail` ;

CREATE TABLE IF NOT EXISTS `distribution_hub_FTPDetail` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `serverAddress` VARCHAR(190) NOT NULL,
  `serverPort` INT(5) NOT NULL,
  `userName` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `distribution_hub_schedule`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_schedule` ;

CREATE TABLE IF NOT EXISTS `distribution_hub_schedule` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `downloadFileName` VARCHAR(100) NULL,
  `time` INT(11) NOT NULL,
  `exportFormat` VARCHAR(10) NULL,
  `exportLocation` VARCHAR(10) NOT NULL,
  `expiryTime` INT(11) NULL,
  `exportResource` VARCHAR(20) NULL,
  `exportImageCols` VARCHAR(1000) NULL,
  `status` VARCHAR(20) NULL,
  `exportFilePimcoreAssetId` INT(11) NULL,
  `exportAssetFilePimcoreAssetId` INT(11) NULL,
  `userOwner` INT(11) NULL,
  `exportProcessStartTime` INT(11) NULL,
  `exportProcessEndTime` INT(11) NULL,
  `channelId` INT(11) NOT NULL,
  `creationDate` INT(11) NULL,
  `ftpDetailId` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_schedule_channel1_idx` (`channelId` ASC),
  INDEX `fk_distribution_hub_schedule_distribution_hub_FTPDetail1_idx` (`ftpDetailId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `distribution_hub_channel_user_share`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_channel_user_share`;

CREATE TABLE `distribution_hub_channel_user_share` (
  `channelId` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  `expiryDate` int(11) DEFAULT NULL,
  `creationDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`channelId`,`sharedWithUserId`),
  KEY `sharedWithUserId` (`sharedWithUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `distribution_hub_statistics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_statistics` ;

CREATE TABLE IF NOT EXISTS `distribution_hub_statistics` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `scheduleOwnerUserId` INT(11) NULL,
  `exportTime` INT(11) NULL,
  `exportFormat` VARCHAR(10) NULL,
  `exportStatus` VARCHAR(10) NULL,
  `exportLocation` VARCHAR(10) NULL,
  `channelId` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_distribution_hub_statistics_distribution_hub_channel1_idx` (`channelId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `distribution_hub_channel_ftp_map`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `distribution_hub_channel_ftp_map` ;

CREATE TABLE IF NOT EXISTS `distribution_hub_channel_ftp_map` (
  `channelId` INT(11) NOT NULL,
  `ftpDetailId` INT(11) NOT NULL,
  PRIMARY KEY (`channelId`, `ftpDetailId`),
  INDEX `fk_distribution_hub_channel_has_distribution_hub_FTPDetail__idx` (`ftpDetailId` ASC),
  INDEX `fk_distribution_hub_channel_has_distribution_hub_FTPDetail__idx1` (`channelId` ASC))
ENGINE = InnoDB;