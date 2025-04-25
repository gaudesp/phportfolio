CREATE TABLE IF NOT EXISTS `admins` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `admin_id` INT UNSIGNED NOT NULL,
  `type_file` VARCHAR(50) DEFAULT NULL,
  `name_id` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`name_id`),
  KEY `fk_articles_admin` (`admin_id`),
  CONSTRAINT `fk_articles_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `admin_id` INT UNSIGNED NOT NULL,
  `type_file` VARCHAR(50) DEFAULT NULL,
  `name_id` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`name_id`),
  KEY `fk_projects_admin` (`admin_id`),
  CONSTRAINT `fk_projects_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `admin_id` INT UNSIGNED NOT NULL,
  `type_file` VARCHAR(50) DEFAULT NULL,
  `name_id` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`name_id`),
  KEY `fk_experiences_admin` (`admin_id`),
  CONSTRAINT `fk_experiences_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `formations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `admin_id` INT UNSIGNED NOT NULL,
  `type_file` VARCHAR(50) DEFAULT NULL,
  `name_id` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`name_id`),
  KEY `fk_formations_admin` (`admin_id`),
  CONSTRAINT `fk_formations_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
