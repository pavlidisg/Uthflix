-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Μάη 2021 στις 17:09:35
-- Έκδοση διακομιστή: 10.4.19-MariaDB
-- Έκδοση PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `mysql`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tables_priv`
--

CREATE TABLE `tables_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Grantor` char(141) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Table_priv` set('Select','Insert','Update','Delete','Create','Drop','Grant','References','Index','Alter','Create View','Show view','Trigger','Delete versioning rows') CHARACTER SET utf8 NOT NULL DEFAULT '',
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `tables_priv`
--

INSERT INTO `tables_priv` (`Host`, `Db`, `User`, `Table_name`, `Grantor`, `Timestamp`, `Table_priv`, `Column_priv`) VALUES
('localhost', 'db2', 'guest_user', 'users', 'root@localhost', '0000-00-00 00:00:00', 'Select', 'Insert'),
('localhost', 'db2', 'simple_user', 'cast', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'writers', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'writers_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'writers_series', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'categories', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'cat_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'cat_series', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'directors', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'dir_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'dir_series', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'movies', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'series', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 's_episodes', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'cast_series', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'cast_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select', ''),
('localhost', 'db2', 'simple_user', 'fav_series_list', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'favms_list', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'movie_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 's_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'users_rating_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'users_s_ep_rate', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast', 'root@localhost', '0000-00-00 00:00:00', 'Select', 'Insert'),
('localhost', 'db2', 'producers', 'movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'categories', 'root@localhost', '0000-00-00 00:00:00', 'Select', 'Insert'),
('localhost', 'db2', 'producers', 'dir_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'dir_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'directors', 'root@localhost', '0000-00-00 00:00:00', 'Select', 'Insert'),
('localhost', 'db2', 'producers', 'series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers', 'root@localhost', '0000-00-00 00:00:00', 'Select', 'Insert'),
('localhost', 'db2', 'producers', 's_episodes', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Insert,Update'),
('localhost', 'db2', 'producers', 'users_rating_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'producers', 'fav_series_list', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 'users_s_ep_rate', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'producers', 'notif_series', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 'users_rating_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'producers', 'favms_list', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 'movie_comments', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 'notif_movies', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 's_comments', 'root@localhost', '0000-00-00 00:00:00', 'Delete', 'Select'),
('localhost', 'db2', 'producers', 's_ep_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'users', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', 'Update'),
('localhost', 'db2', 'admins', 'fav_series_list', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'favms_list', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'movie_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'notif_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'notif_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 's_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 's_ep_comments', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'users_rating_movies', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'users_rating_series', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', ''),
('localhost', 'db2', 'admins', 'users_s_ep_rate', 'root@localhost', '0000-00-00 00:00:00', 'Select,Delete', '');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `tables_priv`
--
ALTER TABLE `tables_priv`
  ADD PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`),
  ADD KEY `Grantor` (`Grantor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
