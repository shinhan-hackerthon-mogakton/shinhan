CREATE TABLE `stockmarket_news` (
  `news_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_date` varchar(12) DEFAULT NULL,
  `news_in_time` varchar(12) DEFAULT NULL,
  `news_titl` varchar(200) DEFAULT NULL,
  `news_cls` varchar(12) DEFAULT NULL,
  `news_data` blob,
  `shrt_code` varchar(12) DEFAULT NULL,
  `commitment_bidsize` varchar(12) DEFAULT NULL,
  `news_no1` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  UNIQUE KEY `shrt_code` (`shrt_code`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;