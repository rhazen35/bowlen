CREATE TABLE `customers`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `insertion` VARCHAR(25) NOT NULL,
  `last_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `hash` VARCHAR(256) NOT NULL,
  `customer_number` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;