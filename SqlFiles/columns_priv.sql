-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Μάη 2021 στις 17:09:24
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
-- Δομή πίνακα για τον πίνακα `columns_priv`
--

CREATE TABLE `columns_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Column_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `columns_priv`
--

INSERT INTO `columns_priv` (`Host`, `Db`, `User`, `Table_name`, `Column_name`, `Timestamp`, `Column_priv`) VALUES
('localhost', 'db2', 'guest_user', 'users', 'username', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'guest_user', 'users', 'password', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'guest_user', 'users', 'role', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'fav_series_list', 'user_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'fav_series_list', 'series_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'favms_list', 'user_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'favms_list', 'ms_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'movie_comments', 'm_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'movie_comments', 'comment', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'movie_comments', 'name', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'movie_comments', 'user_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_movies', 'user_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_movies', 'm_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_movies', 'datetime', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_series', 'user_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_series', 's_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'notif_series', 'datetime', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 's_comments', 's_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_comments', 'comment', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_comments', 'name', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_comments', 'user_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'user_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'ep_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'comment', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'name', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 's_ep_comments', 'season', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_movies', 'user_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_movies', 'm_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_movies', 'rating', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'users_rating_series', 'user_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_series', 's_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_rating_series', 'rating', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'simple_user', 'users_s_ep_rate', 'user_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_s_ep_rate', 'ep_id', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'simple_user', 'users_s_ep_rate', 'rating', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast', 'name', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'producers', 'movies', 'name', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'movies', 'duration', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'movies', 'release_date', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'movies', 'description', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_movies', 'c_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_movies', 'm_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_series', 's_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cast_series', 'c_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_movies', 'c_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_movies', 'm_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_series', 'c_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'cat_series', 's_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'categories', 'cat', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'producers', 'dir_movies', 'mov_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'dir_movies', 'dir_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'dir_series', 's_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'dir_series', 'dir_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'directors', 'name', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'producers', 'series', 'name', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'series', 'seasons', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'series', 'episodes', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'series', 'release_date', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'series', 'description', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers', 'name', '0000-00-00 00:00:00', 'Insert'),
('localhost', 'db2', 'producers', 's_episodes', 'name', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 's_episodes', 'ep_number', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 's_episodes', 'duration', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 's_episodes', 'series_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 's_episodes', 'season', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 's_episodes', 'description', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_movies', 'wr_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_movies', 'mov_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_series', 's_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'writers_series', 'wr_id', '0000-00-00 00:00:00', 'Insert,Update'),
('localhost', 'db2', 'producers', 'fav_series_list', 'series_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'producers', 'favms_list', 'ms_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'producers', 'movie_comments', 'm_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'producers', 'notif_movies', 'm_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'producers', 'notif_series', 's_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'producers', 's_comments', 's_id', '0000-00-00 00:00:00', 'Select'),
('localhost', 'db2', 'admins', 'users', 'role', '0000-00-00 00:00:00', 'Update');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `columns_priv`
--
ALTER TABLE `columns_priv`
  ADD PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
