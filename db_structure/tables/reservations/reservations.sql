CREATE TABLE `reservations`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  `lane_id` INT(11) NOT NULL,
  `menu_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(staff_id) REFERENCES staff(id),
  FOREIGN KEY(customer_id) REFERENCES customers(id),
  FOREIGN KEY(lane_id) REFERENCES bowling_lanes(id),
  FOREIGN KEY(menu_id) REFERENCES menu(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;