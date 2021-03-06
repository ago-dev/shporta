-- MySQL Script generated by MySQL Workbench
-- Sat 02 Apr 2022 05:255:15 PM CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema shporta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema shporta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shporta` ;
USE `shporta` ;

-- -----------------------------------------------------
-- Table `shporta`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `date_created` TIMESTAMP NOT NULL,
  `role_id` INT,
  `is_active` TINYINT NOT NULL DEFAULT 1,
  `remember_token` VARCHAR(100),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `role_id_idx` (`role_id` ASC) VISIBLE,
  CONSTRAINT `fk_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `shporta`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `employee_type_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  INDEX `employee_type_id_idx` (`employee_type_id` ASC) VISIBLE,
  CONSTRAINT `fk_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `shporta`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_type`
    FOREIGN KEY (`employee_type_id`)
    REFERENCES `shporta`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`employee_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`employee_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`payment_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`payment_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `customer_points` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_user_customer_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_customer`
    FOREIGN KEY (`user_id`)
    REFERENCES `shporta`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_datetime` DATETIME NOT NULL,
  `delivery_datetime` DATETIME NULL,
  `address` VARCHAR(255) NOT NULL,
  `order_points` INT NOT NULL DEFAULT 0,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_customer_idx` (`customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer`
    FOREIGN KEY (`customer_id`)
    REFERENCES `shporta`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`payments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `payment_datetime` TIMESTAMP NOT NULL,
  `order_id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  `payment_type_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `payment_type_id_idx` (`payment_type_id` ASC) VISIBLE,
  INDEX `fk_customer_idx` (`customer_id` ASC) VISIBLE,
  INDEX `fk_order_idx` (`order_id` ASC) VISIBLE,
  CONSTRAINT `fk_payment_type_payment`
    FOREIGN KEY (`payment_type_id`)
    REFERENCES `shporta`.`payment_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_payment`
    FOREIGN KEY (`customer_id`)
    REFERENCES `shporta`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_payment`
    FOREIGN KEY (`order_id`)
    REFERENCES `shporta`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`restaurants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`restaurants` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`menus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`menus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `restaurant_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_restaurant_idx` (`restaurant_id` ASC) VISIBLE,
  CONSTRAINT `fk_restaurant`
    FOREIGN KEY (`restaurant_id`)
    REFERENCES `shporta`.`restaurants` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`food_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`food_categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `healthy_rate` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`food_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`food_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `price` DECIMAL NOT NULL,
  `menu_id` INT NOT NULL,
  `food_category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_menu_idx` (`menu_id` ASC) VISIBLE,
  INDEX `fk_food_category_idx` (`food_category_id` ASC) VISIBLE,
  CONSTRAINT `fk_menu`
    FOREIGN KEY (`menu_id`)
    REFERENCES `shporta`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_food_category`
    FOREIGN KEY (`food_category_id`)
    REFERENCES `shporta`.`food_categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`order_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`order_items` (
  `quantity` INT NOT NULL DEFAULT 1,
  `item_rating` INT NULL,
  `order_id` INT NOT NULL,
  `food_item_id` INT NOT NULL,
  PRIMARY KEY (`order_id`, `food_item_id`),
  INDEX `fk_food_item_idx` (`food_item_id` ASC) VISIBLE,
  CONSTRAINT `fk_order`
    FOREIGN KEY (`order_id`)
    REFERENCES `shporta`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_food_item`
    FOREIGN KEY (`food_item_id`)
    REFERENCES `shporta`.`food_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`customer_discounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`customer_discounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `end_date` TIMESTAMP NOT NULL,
  `customer_id` INT NOT NULL,
  `discount_rate_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_customer_discount_idx` (`customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer_discount`
    FOREIGN KEY (`customer_id`)
    REFERENCES `shporta`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`discount_rates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`discount_rates` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_points_limit` INT NOT NULL,
  `order_price_limit` INT NOT NULL,
  `discount_percentage` DECIMAL NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `customer_points_limit_UNIQUE` (`customer_points_limit` ASC) VISIBLE,
  UNIQUE INDEX `order_price_limit_UNIQUE` (`order_price_limit` ASC) VISIBLE,
  UNIQUE INDEX `discount_percentage_UNIQUE` (`discount_percentage` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `shporta`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shporta`.`password_resets` (
  `email` VARCHAR(255),
  `token` VARCHAR(255),
  `created_at` TIMESTAMP NOT NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
