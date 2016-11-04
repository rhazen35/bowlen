CREATE TABLE `reservations`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user` INT(11) NOT NULL,
  `customer` INT(11) NOT NULL,
  `lane_id` INT(11) NOT NULL,
  `menu` INT(11) NOT NULL,
  `glow_in_dark` VARCHAR(5) NOT NULL,
  `reservation` DATE,
  `time` TIME,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(lane_id) REFERENCES bowling_lanes(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;