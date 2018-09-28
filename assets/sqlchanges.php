
/* agent  */

Create Table

CREATE TABLE `agent` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_email_id` varchar(250) DEFAULT NULL,
  `a_username` varchar(250) DEFAULT NULL,
  `a_password` varchar(250) DEFAULT NULL,
  `a_org_password` varchar(250) DEFAULT NULL,
  `a_status` int(12) DEFAULT NULL,
  `a_create_at` datetime DEFAULT NULL,
  `a_updated_at` datetime DEFAULT NULL,
  `create_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `executive_list` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `bank_account` varchar(250) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `ifsccode` varchar(250) DEFAULT NULL,
  `bank_holder_name` varchar(250) DEFAULT NULL,
  `kyc` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
