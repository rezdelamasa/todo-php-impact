CREATE TABLE `todo`.`todos` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `completed_at` TIMESTAMP NOT NULL , `status` TEXT NOT NULL DEFAULT 'Incomplete' , PRIMARY KEY (`id`)) ENGINE = InnoDB; 