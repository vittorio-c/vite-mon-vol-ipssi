CREATE TABLE IF NOT EXISTS `users` (
   id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `username` VARCHAR(255) NOT NULL,
   `email` VARCHAR(255) NOT NULL,
   `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
   `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,
   `password` VARCHAR(255) NOT NULL
);