CREATE TABLE `bowling_lanes`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lane` INT(11) NOT NULL,
  `available` VARCHAR(3) NOT NULL,
  `glow_in_dark` VARCHAR(3) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bowling_customers`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `lane_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(customer_id) REFERENCES customers(id),
  FOREIGN KEY(lane_id) REFERENCES bowling_lanes(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;