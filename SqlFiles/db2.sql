-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Μάη 2021 στις 17:09:07
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
-- Βάση δεδομένων: `db2`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cast`
--

INSERT INTO `cast` (`id`, `name`) VALUES
(1, 'Adam Sandler'),
(3, 'Burt Reynolds'),
(2, 'Chris Rock'),
(6, 'Christian Bale'),
(5, 'Hugh Dancy'),
(8, 'Hugh Jackman'),
(4, 'Mads Mikkelsen'),
(7, 'Scarlett Johansson'),
(59, 'test actor');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cast_movies`
--

CREATE TABLE `cast_movies` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cast_movies`
--

INSERT INTO `cast_movies` (`id`, `c_id`, `m_id`) VALUES
(3, 1, 1),
(4, 2, 1),
(5, 3, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cast_series`
--

CREATE TABLE `cast_series` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cast_series`
--

INSERT INTO `cast_series` (`id`, `s_id`, `c_id`) VALUES
(1, 1, 4),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `cat`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Crime'),
(6, 'Drama'),
(7, 'Horror'),
(10, 'Mystery'),
(9, 'Sci-Fi'),
(4, 'Sport'),
(16, 'Test category');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cat_movies`
--

CREATE TABLE `cat_movies` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cat_movies`
--

INSERT INTO `cat_movies` (`id`, `c_id`, `m_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 9, 2),
(5, 10, 2),
(6, 6, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cat_series`
--

CREATE TABLE `cat_series` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cat_series`
--

INSERT INTO `cat_series` (`id`, `c_id`, `s_id`) VALUES
(1, 1, 1),
(2, 6, 1),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `directors`
--

INSERT INTO `directors` (`id`, `name`) VALUES
(4, 'Christopher Nolan'),
(3, 'Guillermo Navarro'),
(2, 'Michael Rymer'),
(1, 'Peter Segal'),
(9, 'Test Director');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dir_movies`
--

CREATE TABLE `dir_movies` (
  `id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `dir_movies`
--

INSERT INTO `dir_movies` (`id`, `mov_id`, `dir_id`) VALUES
(1, 1, 1),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dir_series`
--

CREATE TABLE `dir_series` (
  `id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `dir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `dir_series`
--

INSERT INTO `dir_series` (`id`, `s_id`, `dir_id`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `favms_list`
--

CREATE TABLE `favms_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ms_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `favms_list`
--

INSERT INTO `favms_list` (`id`, `user_id`, `ms_id`) VALUES
(9, 1, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `fav_series_list`
--

CREATE TABLE `fav_series_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `fav_series_list`
--

INSERT INTO `fav_series_list` (`id`, `user_id`, `series_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(4) NOT NULL,
  `release_date` int(4) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `name`, `duration`, `release_date`, `description`) VALUES
(1, 'The Longest Yard', 113, 2005, 'Paul \"Wrecking\" Crewe was a revered football superstar back in his day, but that time has since faded. But when a messy drunk driving incident lands him in jail, Paul finds he was specifically requested by Warden Hazen (James Cromwell), a duplicitous prison official well aware of Paul\'s athletic skills. Paul has been assigned the task of assembling a team of convicts, to square off in a big football game against the sadistic guards. With the help of fellow convict Caretaker, and an old legend named Nate Scarborough to coach, Crewe is ready for what promises to be a very interesting game. It\'s only the warden and the guards who have no idea who or what they\'re up against, with Paul the driving force behind the new team.'),
(2, 'The Prestige', 130, 2006, 'In the end of the nineteenth century, in London, Robert Angier, his beloved wife Julia McCullough, and Alfred Borden are friends and assistants of a magician. When Julia accidentally dies during a performance, Robert blames Alfred for her death, and they become enemies. Both become famous and rival magicians, sabotaging the performance of the other on the stage. When Alfred performs a successful trick, Robert becomes obsessed trying to disclose the secret of his competitor with tragic consequences.');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movie_comments`
--

CREATE TABLE `movie_comments` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `movie_comments`
--

INSERT INTO `movie_comments` (`id`, `m_id`, `comment`, `name`, `user_id`) VALUES
(9, 1, 'test ', 'user', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `notif_movies`
--

CREATE TABLE `notif_movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `datetime` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `notif_movies`
--

INSERT INTO `notif_movies` (`id`, `user_id`, `m_id`, `datetime`) VALUES
(20, 1, 1, '2021-05-27 18:08');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `notif_series`
--

CREATE TABLE `notif_series` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `datetime` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `seasons` int(2) NOT NULL,
  `episodes` int(2) NOT NULL,
  `release_date` int(4) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `series`
--

INSERT INTO `series` (`id`, `name`, `seasons`, `episodes`, `release_date`, `description`) VALUES
(1, 'Hannibal', 3, 39, 2013, 'Explores the early relationship between renowned psychiatrist Hannibal Lecter and a young FBI criminal profiler who is haunted by his ability to empathize with serial killers.');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `s_comments`
--

CREATE TABLE `s_comments` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `s_episodes`
--

CREATE TABLE `s_episodes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ep_number` int(4) NOT NULL,
  `duration` int(3) NOT NULL,
  `series_id` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `s_episodes`
--

INSERT INTO `s_episodes` (`id`, `name`, `ep_number`, `duration`, `series_id`, `season`, `description`) VALUES
(1, 'Apéritif', 1, 42, 1, 1, 'The head of the FBI Behavioral Science unit, Jack Crawford, calls on profiler Will Graham to assist them catch a serial killer. The killer has now kidnapped eight women, all similar in appearance and always on a Friday. His most recent victim is Elise Nichols. Graham has been teaching at the FBI academy and isn\'t too keen on going out into the field. He is particularly empathetic and has a tendency to get far too involved in these types of cases. Crawford arranges for a well-known psychiatrist, Hannibal Lecter, to work with him and ease the stress. It seems Lecter has...'),
(2, 'Amuse-Bouche', 2, 42, 1, 1, 'Will and Jack hunt a killer who is burying his victims alive, so they will become fertilizer for his garden of fungus. While the tabloid journalist Freddie sets targets in on Will.'),
(3, 'Kaiseki ', 1, 42, 1, 2, 'While Will continues to assert his innocence, Hannibal and Jack try to come to terms with the fact that he\'s in jail; Kade Purnell visits Will.'),
(4, 'Sakizuke ', 2, 42, 1, 2, 'The BAU team narrows in on the origin of the discarded bodies from the soupy crime scene, working to discover the killer\'s artful plan, while Will Graham begins an artful plan of his own from within the asylum.'),
(5, 'Antipasto ', 1, 43, 1, 3, 'After the devastating bloodbath at Lecters home Hannibal establishes a new life for himself in Italy along with the company of his own psychiatrist Bedelia.'),
(6, 'Primavera ', 2, 44, 1, 3, 'Will Graham awakes from his coma and begins to piece together the events that took place after the bloodbath at Lecters home.');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `s_ep_comments`
--

CREATE TABLE `s_ep_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(55) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(2, 'prod', '81dc9bdb52d04dc20036dbd8313ed055', 'prods'),
(8, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

--
-- Δείκτες `users`
--
DELIMITER $$
CREATE TRIGGER `t` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.password = MD5(NEW.password)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users_rating_movies`
--

CREATE TABLE `users_rating_movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users_rating_movies`
--

INSERT INTO `users_rating_movies` (`id`, `user_id`, `m_id`, `rating`) VALUES
(8, 1, 1, 10);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users_rating_series`
--

CREATE TABLE `users_rating_series` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users_s_ep_rate`
--

CREATE TABLE `users_s_ep_rate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `writers`
--

INSERT INTO `writers` (`id`, `name`) VALUES
(1, 'Albert S. Ruddy'),
(4, 'Bryan Fuller'),
(7, 'Christopher Nolan'),
(8, 'Jonathan Nolan'),
(6, 'Scott Nimerfro'),
(3, 'Sheldon Turner'),
(32, 'Sheldon Turner 2'),
(5, 'Steve Lightfoot'),
(13, 'Test  writer'),
(2, 'Tracy Keenan Wynn');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `writers_movies`
--

CREATE TABLE `writers_movies` (
  `id` int(11) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `writers_movies`
--

INSERT INTO `writers_movies` (`id`, `wr_id`, `mov_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 7, 2),
(5, 8, 2),
(18, 3, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `writers_series`
--

CREATE TABLE `writers_series` (
  `id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `wr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `writers_series`
--

INSERT INTO `writers_series` (`id`, `s_id`, `wr_id`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 6);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Ευρετήρια για πίνακα `cast_movies`
--
ALTER TABLE `cast_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cast_movies_ibfk_1` (`m_id`),
  ADD KEY `cast_movies_ibfk_2` (`c_id`);

--
-- Ευρετήρια για πίνακα `cast_series`
--
ALTER TABLE `cast_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cast_series_ibfk_1` (`s_id`),
  ADD KEY `cast_series_ibfk_2` (`c_id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat` (`cat`);

--
-- Ευρετήρια για πίνακα `cat_movies`
--
ALTER TABLE `cat_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `cat_id` (`c_id`);

--
-- Ευρετήρια για πίνακα `cat_series`
--
ALTER TABLE `cat_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Ευρετήρια για πίνακα `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Ευρετήρια για πίνακα `dir_movies`
--
ALTER TABLE `dir_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mov_id` (`mov_id`),
  ADD KEY `dir_id` (`dir_id`);

--
-- Ευρετήρια για πίνακα `dir_series`
--
ALTER TABLE `dir_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `dir_id` (`dir_id`);

--
-- Ευρετήρια για πίνακα `favms_list`
--
ALTER TABLE `favms_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_ms_id` (`ms_id`);

--
-- Ευρετήρια για πίνακα `fav_series_list`
--
ALTER TABLE `fav_series_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_u_id` (`user_id`),
  ADD KEY `FK_series_id` (`series_id`);

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `movie_comments`
--
ALTER TABLE `movie_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Ευρετήρια για πίνακα `notif_movies`
--
ALTER TABLE `notif_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2_m_id` (`m_id`),
  ADD KEY `fk22_u_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `notif_series`
--
ALTER TABLE `notif_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2_s_id` (`s_id`),
  ADD KEY `fk2_u_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `s_comments`
--
ALTER TABLE `s_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Ευρετήρια για πίνακα `s_episodes`
--
ALTER TABLE `s_episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_id` (`series_id`);

--
-- Ευρετήρια για πίνακα `s_ep_comments`
--
ALTER TABLE `s_ep_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ep_id` (`ep_id`),
  ADD KEY `user_id_fk4` (`user_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `users_rating_movies`
--
ALTER TABLE `users_rating_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `m_id_fk` (`m_id`);

--
-- Ευρετήρια για πίνακα `users_rating_series`
--
ALTER TABLE `users_rating_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id_fk` (`user_id`),
  ADD KEY `s_id_fk` (`s_id`);

--
-- Ευρετήρια για πίνακα `users_s_ep_rate`
--
ALTER TABLE `users_s_ep_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk3` (`user_id`),
  ADD KEY `ep_id_fk3` (`ep_id`);

--
-- Ευρετήρια για πίνακα `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Ευρετήρια για πίνακα `writers_movies`
--
ALTER TABLE `writers_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writers_movies_ibfk_1` (`mov_id`),
  ADD KEY `writers_movies_ibfk_2` (`wr_id`);

--
-- Ευρετήρια για πίνακα `writers_series`
--
ALTER TABLE `writers_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `wr_id` (`wr_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT για πίνακα `cast_movies`
--
ALTER TABLE `cast_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT για πίνακα `cast_series`
--
ALTER TABLE `cast_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT για πίνακα `cat_movies`
--
ALTER TABLE `cat_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT για πίνακα `cat_series`
--
ALTER TABLE `cat_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT για πίνακα `dir_movies`
--
ALTER TABLE `dir_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT για πίνακα `dir_series`
--
ALTER TABLE `dir_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `favms_list`
--
ALTER TABLE `favms_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `fav_series_list`
--
ALTER TABLE `fav_series_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT για πίνακα `movie_comments`
--
ALTER TABLE `movie_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `notif_movies`
--
ALTER TABLE `notif_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT για πίνακα `notif_series`
--
ALTER TABLE `notif_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `s_comments`
--
ALTER TABLE `s_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `s_episodes`
--
ALTER TABLE `s_episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT για πίνακα `s_ep_comments`
--
ALTER TABLE `s_ep_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT για πίνακα `users_rating_movies`
--
ALTER TABLE `users_rating_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `users_rating_series`
--
ALTER TABLE `users_rating_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `users_s_ep_rate`
--
ALTER TABLE `users_s_ep_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT για πίνακα `writers_movies`
--
ALTER TABLE `writers_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT για πίνακα `writers_series`
--
ALTER TABLE `writers_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `cast_movies`
--
ALTER TABLE `cast_movies`
  ADD CONSTRAINT `cast_movies_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `cast_movies_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `cast` (`id`);

--
-- Περιορισμοί για πίνακα `cast_series`
--
ALTER TABLE `cast_series`
  ADD CONSTRAINT `cast_series_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `cast_series_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `cast` (`id`);

--
-- Περιορισμοί για πίνακα `cat_movies`
--
ALTER TABLE `cat_movies`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `m_id` FOREIGN KEY (`m_id`) REFERENCES `movies` (`id`);

--
-- Περιορισμοί για πίνακα `cat_series`
--
ALTER TABLE `cat_series`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`);

--
-- Περιορισμοί για πίνακα `dir_movies`
--
ALTER TABLE `dir_movies`
  ADD CONSTRAINT `dir_movies_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `dir_movies_ibfk_2` FOREIGN KEY (`dir_id`) REFERENCES `directors` (`id`);

--
-- Περιορισμοί για πίνακα `dir_series`
--
ALTER TABLE `dir_series`
  ADD CONSTRAINT `dir_series_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `dir_series_ibfk_2` FOREIGN KEY (`dir_id`) REFERENCES `directors` (`id`);

--
-- Περιορισμοί για πίνακα `favms_list`
--
ALTER TABLE `favms_list`
  ADD CONSTRAINT `FK_ms_id` FOREIGN KEY (`ms_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `fav_series_list`
--
ALTER TABLE `fav_series_list`
  ADD CONSTRAINT `FK_series_id` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `FK_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `movie_comments`
--
ALTER TABLE `movie_comments`
  ADD CONSTRAINT `movie_comments_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `notif_movies`
--
ALTER TABLE `notif_movies`
  ADD CONSTRAINT `fk22_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk2_m_id` FOREIGN KEY (`m_id`) REFERENCES `movies` (`id`);

--
-- Περιορισμοί για πίνακα `notif_series`
--
ALTER TABLE `notif_series`
  ADD CONSTRAINT `fk2_s_id` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `fk2_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `s_comments`
--
ALTER TABLE `s_comments`
  ADD CONSTRAINT `s_comments_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`);

--
-- Περιορισμοί για πίνακα `s_episodes`
--
ALTER TABLE `s_episodes`
  ADD CONSTRAINT `s_episodes_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`);

--
-- Περιορισμοί για πίνακα `s_ep_comments`
--
ALTER TABLE `s_ep_comments`
  ADD CONSTRAINT `s_ep_comments_ibfk_1` FOREIGN KEY (`ep_id`) REFERENCES `s_episodes` (`id`),
  ADD CONSTRAINT `user_id_fk4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `users_rating_movies`
--
ALTER TABLE `users_rating_movies`
  ADD CONSTRAINT `m_id_fk` FOREIGN KEY (`m_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `users_rating_series`
--
ALTER TABLE `users_rating_series`
  ADD CONSTRAINT `s_id_fk` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `u_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `users_s_ep_rate`
--
ALTER TABLE `users_s_ep_rate`
  ADD CONSTRAINT `ep_id_fk3` FOREIGN KEY (`ep_id`) REFERENCES `s_episodes` (`id`),
  ADD CONSTRAINT `user_id_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `writers_movies`
--
ALTER TABLE `writers_movies`
  ADD CONSTRAINT `writers_movies_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `writers_movies_ibfk_2` FOREIGN KEY (`wr_id`) REFERENCES `writers` (`id`);

--
-- Περιορισμοί για πίνακα `writers_series`
--
ALTER TABLE `writers_series`
  ADD CONSTRAINT `writers_series_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `writers_series_ibfk_2` FOREIGN KEY (`wr_id`) REFERENCES `writers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
