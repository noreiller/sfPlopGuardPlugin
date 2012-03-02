
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sf_guard_user_profile
-- ---------------------------------------------------------------------

ALTER TABLE `sf_guard_user_profile` ADD `theme` VARCHAR( 255 ) NULL DEFAULT NULL AFTER `is_public`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
