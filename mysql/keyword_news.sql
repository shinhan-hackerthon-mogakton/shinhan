CREATE TABLE `contract_info` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` text,
  `skill_name` text,
  `comp_name` text,
  `comp_phonenum` text,
  `ceonsult_name` text NOT NULL,
  `ceonsultant_name` text,
  `ceonsultant_phonenum` text,
  `contract_state` text,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;