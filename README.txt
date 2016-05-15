Edit the development.php in the app>config-folders and add the following SQL-code to the database:

--
-- SQL
--

CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- DUMP
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Anders', 'anders@andersen.dk', 'Anders', 'Andersen', '$2y$10$ySGtdTbYdaiXZwFYVrHCGOwpBDGgHVVNuqn43gE9kLs4vFxsZ/hX2', '2016-05-15 19:17:38', '2016-05-15 19:17:38'),
(2, 'Bent', 'bent@bentsen.dk', 'Bent', 'Bentsen', '$2y$10$ycEOFtL2ezHYc/zl/tDZ/eTcfRjDyqtScbn0OFUNpPoFpXXT98QaS', '2016-05-15 19:17:15', '2016-05-15 19:17:15'),
(3, 'Christian', 'christian@christiansen.dk', 'Christian', 'Christiansen', '$2y$10$67oZRyw3Hn9hJL4/LUBygOqFhwF1GqKLZ.7.XFoQ1U24sGo7D3HA6', '2016-05-15 19:18:00', '2016-05-15 19:18:00');
