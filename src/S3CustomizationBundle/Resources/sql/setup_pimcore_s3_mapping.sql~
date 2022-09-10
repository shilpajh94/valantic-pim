CREATE TABLE `pimcore_s3_path_mapping` (
  `pimcore_object_id` int(11) DEFAULT NULL,
  `pimcore_path` varchar(700) NOT NULL,
  `s3_path` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`pimcore_path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `pimcore_s3_path_mapping`(`pimcore_object_id`,`pimcore_path`,`s3_path`)
( SELECT `id`,CONCAT(`path`,`filename`),CONCAT(`path`,`filename`) FROM assets );
