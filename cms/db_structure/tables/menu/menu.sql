CREATE TABLE `menu`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `menu` INT(11) NOT NULL,
  `dish` VARCHAR(150) NOT NULL,
  `allergic` VARCHAR(150) NOT NULL,
  `price` DECIMAL(19,4) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `menu_customers`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `menu_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(customer_id) REFERENCES customers(id),
  FOREIGN KEY(menu_id) REFERENCES menu(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;