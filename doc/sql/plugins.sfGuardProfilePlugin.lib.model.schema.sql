
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sf_guard_user_profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;

CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER NOT NULL,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`role` VARCHAR(255),
	`email` VARCHAR(255),
	`phone` VARCHAR(255),
	`is_public` TINYINT DEFAULT 0 NOT NULL,
	`theme` VARCHAR(255),
	`culture` VARCHAR(7),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
