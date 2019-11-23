CREATE TABLE `skill_apply` (
  `apply_id` int(11) NOT NULL,
  `apply_comp_code` text,
  `apply_comp_name` text,
  `apply_human_name` text,
  `apply_phonenum` text,
  `apply_conseoltname` text,
  `skill_ntb_code` text NOT NULL,
  `skill_title` text,
  `comp_phonenum` text,
  `requirement` text,
  PRIMARY KEY (`apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;