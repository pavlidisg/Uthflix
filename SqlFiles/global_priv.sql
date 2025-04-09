-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Μάη 2021 στις 17:09:28
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
-- Δομή πίνακα για τον πίνακα `global_priv`
--

CREATE TABLE `global_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Priv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{}' CHECK (json_valid(`Priv`))
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `global_priv`
--

INSERT INTO `global_priv` (`Host`, `User`, `Priv`) VALUES
('localhost', 'root', '{\"access\":18446744073709551615}'),
('localhost', 'simple_user', '{\"access\":0,\"plugin\":\"mysql_native_password\",\"authentication_string\":\"*CC67043C7BCFF5EEA5566BD9B1F3C74FD9A5CF5D\",\"password_last_changed\":1621952449,\"ssl_type\":0,\"ssl_cipher\":\"\",\"x509_issuer\":\"\",\"x509_subject\":\"\",\"max_questions\":0,\"max_updates\":0,\"max_connections\":0,\"max_user_connections\":0}'),
('127.0.0.1', 'root', '{\"access\":18446744073709551615}'),
('::1', 'root', '{\"access\":18446744073709551615}'),
('localhost', 'pma', '{\"access\":0,\"plugin\":\"mysql_native_password\",\"authentication_string\":\"\",\"password_last_changed\":1571661132}'),
('localhost', 'guest_user', '{\"access\":0,\"plugin\":\"mysql_native_password\",\"authentication_string\":\"*CC67043C7BCFF5EEA5566BD9B1F3C74FD9A5CF5D\",\"password_last_changed\":1621952514,\"ssl_type\":0,\"ssl_cipher\":\"\",\"x509_issuer\":\"\",\"x509_subject\":\"\",\"max_questions\":0,\"max_updates\":0,\"max_connections\":0,\"max_user_connections\":0}'),
('localhost', 'producers', '{\"access\":0,\"plugin\":\"mysql_native_password\",\"authentication_string\":\"*CC67043C7BCFF5EEA5566BD9B1F3C74FD9A5CF5D\",\"password_last_changed\":1621952534,\"ssl_type\":0,\"ssl_cipher\":\"\",\"x509_issuer\":\"\",\"x509_subject\":\"\",\"max_questions\":0,\"max_updates\":0,\"max_connections\":0,\"max_user_connections\":0}'),
('localhost', 'admins', '{\"access\":0,\"plugin\":\"mysql_native_password\",\"authentication_string\":\"*CC67043C7BCFF5EEA5566BD9B1F3C74FD9A5CF5D\",\"password_last_changed\":1622100656,\"ssl_type\":0,\"ssl_cipher\":\"\",\"x509_issuer\":\"\",\"x509_subject\":\"\",\"max_questions\":0,\"max_updates\":0,\"max_connections\":0,\"max_user_connections\":0}');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `global_priv`
--
ALTER TABLE `global_priv`
  ADD PRIMARY KEY (`Host`,`User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
