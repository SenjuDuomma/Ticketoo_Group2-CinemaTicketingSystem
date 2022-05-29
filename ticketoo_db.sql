CREATE TABLE users (
    usersID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersName varchar(128)  NOT NULL,
    usersEmail varchar(128)  NOT NULL,
    usersUid varchar(128)  NOT NULL,
    usersPwd varchar(128)  NOT NULL
);

CREATE TABLE `movies` (
  `movieID` int(30) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `title` text NOT NULL,
  `cover_img` text NOT NULL,
  `duration` float NOT NULL,
  `date_showing` date NOT NULL,
  `end_date` date NOT NULL,
  `trailer_yt_link` text NOT NULL,
  `price` int(255) NOT NULL,
  `genreID` varchar(150)  NOT NULL
);

INSERT INTO `movies` (`title`, `cover_img`, `duration`, `date_showing`, `end_date`, `trailer_yt_link`, `price`, `genreID`) VALUES
('The Matrix', '1600221180_matrix.jpg', 2.5, '2022-06-15', '2022-11-30', '', 200, 1),
('The Adam Projects', 'AdamProjects.jpg', 2.4, '2022-07-15', '2022-8-01', '', 180, 1),
('Ambulance', 'ambulance.jpg', 2.3, '2022-07-15', '2022-8-01', '', 180, 1),
('Fantastic Beast: The Secrets of Dumbledore', 'fantastic-beasts-the-secrets-of-dumbledore.jpg', 2.3, '2022-07-15', '2022-8-01', '', 250, 1),
('Jurassic World: Dominion', 'jurassicworld_dominion.jpg', 2.3, '2022-07-15', '2022-8-01', '', 235, 1),
('Morbius', 'morbius.jpg', 2.1, '2022-07-15', '2022-8-01', '', 195, 1),
('The Bad Guys', 'the-bad-guys-movie-poster.jpg', 2.3, '2022-07-15', '2022-8-01', '', 225, 1),
('The Ice Age: The Adventures of Buck Wild', 'The-Ice-Age-Adventures-of-Buck-Wild.webp', 2.3, '2022-07-15', '2022-8-01', '', 200, 1),
('The Lost City', 'theLostCity.webp', 2.2, '2022-07-15', '2022-8-01', '', 180, 1),
('Uncharted', 'Uncharted.jpg', 2.3, '2022-07-15', '2022-8-01', '', 245, 1);

CREATE TABLE `reservation` (
  `reservationID` varchar(30) PRIMARY KEY NOT NULL,
  `usersID` int(11) NOT NULL,
  `cinemaID` int(4) NOT NULL,
  `movieID` int(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
  
);



CREATE TABLE `cinema` (
  `cinemaID` int(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `cinemaName` text NOT NULL
);

INSERT INTO `cinema` (`cinemaName`) VALUES
('Cinema1'), ('Cinema2'), ('Cinema3'), ('Cinema4');

