CREATE SCHEMA `develery` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `develery`.`contact_form` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `message` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_contact_form_email` (`email` ASC) VISIBLE);
