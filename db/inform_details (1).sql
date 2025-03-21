-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 07:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inform_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `h_id` int(50) NOT NULL,
  `h_unit` int(50) NOT NULL,
  `h_blk` varchar(200) NOT NULL,
  `h_sn` varchar(200) NOT NULL,
  `h_sub` varchar(200) NOT NULL,
  `h_brgy` varchar(200) NOT NULL,
  `h_city` varchar(200) NOT NULL,
  `h_province` varchar(200) NOT NULL,
  `h_country` varchar(200) NOT NULL,
  `h_zip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`h_id`, `h_unit`, `h_blk`, `h_sn`, `h_sub`, `h_brgy`, `h_city`, `h_province`, `h_country`, `h_zip`) VALUES
(19, 0, 'Quod nihil id sint m', 'Lacey Mercado', 'Exercitation a hic c', 'Voluptas voluptatem', 'Balamban', 'Cebu', 'Philippines (the)', 21542),
(20, 0, 'Velit nemo est qui', 'Chancellor Hampton', 'Magnam omnis deserun', 'Consequat Laboris s', 'Balamban', 'Cebu', 'Philippines (the)', 45608),
(21, 0, 'Dolorem est omnis a', 'Patricia Maxwell', 'Eveniet fuga Molli', 'Rerum voluptatibus i', 'Balamban', 'Cebu', 'Philippines (the)', 46623),
(22, 0, 'Non labore ut conseq', 'Tyrone Norman', 'Aliqua Non ipsam ac', 'Eaque veniam deseru', 'Balamban', 'Cebu', 'Philippines (the)', 39397),
(23, 0, 'Architecto voluptate', 'Fulton Reynolds', 'Irure non sunt numqu', 'Similique aliquip vo', 'Balamban', 'Cebu', 'Philippines (the)', 24925),
(24, 0, 'Cumque quae ut sint', 'Martin Dotson', 'Adipisci sapiente vo', 'Velit assumenda qui', 'Balamban', 'Cebu', 'Philippines (the)', 84750),
(25, 0, 'Et adipisicing adipi', 'Chadwick Kramer', 'Sint quis minus ad b', 'Fugiat optio saepe', 'San Fernando', 'Cebu', 'Philippines (the)', 54133),
(26, 0, 'Omnis esse exceptur', 'Jerry Greer', 'Et fugit temporibus', 'Ullam facere qui ess', 'San Fernando', 'Cebu', 'Philippines (the)', 79321),
(27, 0, 'Adipisci tenetur vel', 'Brenda Farley', 'Officia id laborum', 'Est laborum Vero cu', 'San Fernando', 'Cebu', 'Philippines (the)', 66164),
(28, 0, 'Explicabo Explicabo', 'Lyle Buckner', 'Sit vitae non fugia', 'Quod quo unde saepe', 'San Fernando', 'Cebu', 'Philippines (the)', 67518),
(29, 0, 'Voluptatum pariatur', 'Oliver Michael', 'Delectus facilis ap', 'Est totam esse cumq', 'San Fernando', 'Cebu', 'Philippines (the)', 32413),
(30, 0, 'Velit nisi et non e', 'Arden Rios', 'Animi quaerat ratio', 'Quia elit perferend', 'San Fernando', 'Cebu', 'Equatorial Guinea', 74448),
(31, 0, 'Necessitatibus adipi', 'Dolan Neal', 'Amet dolores quidem', 'Est nulla consequat', 'Carcar', 'Cebu', 'Philippines (the)', 39832),
(32, 0, 'Incididunt in in qua', 'Dillon Hayden', 'Voluptas nostrum ven', 'Esse omnis ut in iur', 'Carcar', 'Cebu', 'Philippines (the)', 21150),
(33, 0, 'Voluptas vel officia', 'Wallace Pennington', 'Ullam cum atque quo', 'In omnis voluptatem', 'Carcar', 'Cebu', 'Philippines (the)', 28722),
(34, 0, 'Ipsam quis nisi offi', 'Naida Chandler', 'Vel sunt eos eos do', 'Vero iste earum eum', 'Carcar', 'Cebu', 'Philippines (the)', 70848),
(35, 0, 'Sint quis dolore eo', 'Tyler Alvarado', 'Id corporis magni a', 'Fugiat magnam ullamc', 'Carcar', 'Cebu', 'Philippines (the)', 53959),
(36, 0, 'Ipsam rerum totam ip', 'Vielka Cole', 'Et esse quis volupta', 'Consectetur do sequi', 'Carcar', 'Cebu', 'Philippines (the)', 38593),
(37, 0, 'Vel aut aspernatur n', 'Plato Oconnor', 'Provident ea aut sa', 'Facere ut dicta a ac', 'Moalboal', 'Cebu', 'Philippines (the)', 26926),
(38, 0, 'Eligendi rerum dolor', 'Rana Paul', 'Mollitia ea animi l', 'Atque lorem voluptat', 'Moalboal', 'Cebu', 'Philippines (the)', 19734),
(39, 0, 'Nam ut id facere mag', 'Rebecca Callahan', 'Repellendus Obcaeca', 'Placeat rerum ab ip', 'Moalboal', 'Cebu', 'Philippines (the)', 90363),
(40, 0, 'Non excepturi non re', 'Lawrence Fuller', 'Ipsam neque quo cupi', 'Nihil culpa vitae m', 'Moalboal', 'Cebu', 'Philippines (the)', 26312),
(41, 0, 'Aliquid laudantium', 'Basia Russo', 'Laborum Omnis tempo', 'Voluptatem qui nemo', 'Moalboal', 'Cebu', 'Philippines (the)', 33861),
(42, 0, 'Quia iusto nesciunt', 'Armand Mendoza', 'Qui proident maiore', 'Libero tenetur conse', 'Moalboal', 'Cebu', 'Philippines (the)', 65782),
(43, 0, 'Aperiam impedit lab', 'Kevyn Goff', 'Labore iure minima i', 'Corporis recusandae', 'Barili', 'Cebu', 'Philippines (the)', 31806),
(44, 0, 'Praesentium eum volu', 'Anne Winters', 'Voluptate laudantium', 'Nobis ad temporibus', 'Barili', 'Cebu', 'Philippines (the)', 47945),
(45, 0, 'Voluptas qui velit i', 'Jana Keith', 'Perspiciatis eum de', 'Sed consequuntur cul', 'Barili', 'Cebu', 'Philippines (the)', 23286),
(46, 0, 'Magna culpa exceptu', 'Benedict Knight', 'Consequatur Digniss', 'Ut assumenda eiusmod', 'Barili', 'Cebu', 'Philippines (the)', 53004),
(47, 0, 'Alias sint sed ipsa', 'Madison Mcmahon', 'Repudiandae nostrud', 'Esse est dolorem s', 'Barili', 'Cebu', 'Philippines (the)', 92743),
(48, 0, 'Necessitatibus imped', 'Hope Macias', 'Magnam minim sint s', 'Sunt odit eu ut nisi', 'Barili', 'Cebu', 'Philippines (the)', 62202),
(49, 0, 'Minim molestiae veni', 'Sylvia Stein', 'Magni ratione debiti', 'Occaecat suscipit nu', 'Minglanilla', 'Cebu', 'Philippines (the)', 66675),
(50, 0, 'Excepteur ipsum quib', 'Yen Walton', 'Doloremque duis vero', 'Velit voluptatem con', 'Minglanilla', 'Cebu', 'Philippines (the)', 76469),
(51, 0, 'Officia natus maiore', 'Allistair Galloway', 'Exercitation eu amet', 'Et exercitationem et', 'Minglanilla', 'Cebu', 'Philippines (the)', 82755),
(52, 0, 'Sint velit quisquam', 'Katell Campos', 'Doloribus nesciunt', 'Quae repellendus Vo', 'Minglanilla', 'Cebu', 'Philippines (the)', 14353),
(53, 0, 'Possimus vero ipsum', 'Victor Graham', 'Sit temporibus bland', 'Consequatur Vel per', 'Minglanilla', 'Cebu', 'Philippines (the)', 73180),
(54, 0, 'Officiis neque inven', 'Eden Conway', 'Saepe et molestias d', 'Minima ipsum amet', 'Minglanilla', 'Cebu', 'Philippines (the)', 16017);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birth`
--

CREATE TABLE `tbl_birth` (
  `b_id` int(50) NOT NULL,
  `b_unit` int(50) NOT NULL,
  `b_blk` varchar(200) NOT NULL,
  `b_sn` varchar(200) NOT NULL,
  `b_sub` varchar(200) NOT NULL,
  `b_brgy` varchar(200) NOT NULL,
  `b_city` varchar(200) NOT NULL,
  `b_province` varchar(200) NOT NULL,
  `b_country` varchar(200) NOT NULL,
  `b_zip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_birth`
--

INSERT INTO `tbl_birth` (`b_id`, `b_unit`, `b_blk`, `b_sn`, `b_sub`, `b_brgy`, `b_city`, `b_province`, `b_country`, `b_zip`) VALUES
(19, 0, 'Exercitation sit la', 'Tamara Marshall', 'Proident sint sequi', 'Labore quam nemo sed', 'Balamban', 'Cebu', 'Philippines (the)', 33864),
(20, 0, 'Ut ab sit laborum ar', 'Gretchen Sears', 'Quis lorem explicabo', 'Quisquam illo sint m', 'Balamban', 'Cebu', 'Philippines (the)', 98756),
(21, 0, 'Sed quisquam nisi Na', 'Merritt Calderon', 'Velit explicabo Et', 'Aliquam non voluptas', 'Balamban', 'Cebu', 'Philippines (the)', 29884),
(22, 0, 'Veniam sunt volupt', 'Joan Pollard', 'Facere labore labori', 'Et animi veniam la', 'Balamban', 'Cebu', 'Philippines (the)', 15356),
(23, 0, 'Veritatis culpa des', 'Ori Rhodes', 'Non quod expedita et', 'Ipsum velit id nequ', 'Balamban', 'Cebu', 'Philippines (the)', 83680),
(24, 0, 'Tempora lorem earum', 'Madeline Sharpe', 'Veniam dolores cons', 'Quis sit nisi non al', 'Balamban', 'Cebu', 'Philippines (the)', 42673),
(25, 0, 'Soluta ad dolor labo', 'Roary Payne', 'Quas dolor et in sed', 'Aut vel duis rerum q', 'San Fernando', 'Cebu', 'Philippines (the)', 40472),
(26, 0, 'Omnis ipsum voluptas', 'Zane Joyner', 'A sit in sit dolore', 'Laboris accusamus id', 'San Fernando', 'Cebu', 'Philippines (the)', 70151),
(27, 0, 'Saepe quibusdam labo', 'May Reid', 'Sit eveniet odit d', 'Neque non magna anim', 'San Fernando', 'Cebu', 'Philippines (the)', 16460),
(28, 0, 'Aliqua Minus adipis', 'Helen Ortiz', 'Ut delectus eum com', 'Atque non voluptate', 'San Fernando', 'Cebu', 'Philippines (the)', 23928),
(29, 0, 'Et eum porro facere', 'Jasper Goff', 'Est sed consequatur', 'Consequatur minima', 'San Fernando', 'Cebu', 'Philippines (the)', 73696),
(30, 0, 'Dolorem quidem nihil', 'Austin Fuller', 'Aut quia enim volupt', 'Optio sint tempor q', 'San Fernando', 'Cebu', 'Philippines (the)', 60509),
(31, 0, 'Voluptatibus lorem e', 'Roary Lynch', 'Dolores commodi inci', 'Aut rerum laudantium', 'Carcar', 'Cebu', 'Philippines (the)', 33778),
(32, 0, 'Ullam occaecat paria', 'Rana Sutton', 'Facere adipisicing v', 'Iure incidunt deser', 'Facere sit non earu', 'Ipsam quis qui iure', 'Wallis and Futuna', 42043),
(33, 0, 'Enim sit dolorum cor', 'Lareina Cole', 'Autem ipsum est dol', 'Sunt ex doloremque e', 'Labore earum sint ha', 'Odit exercitation si', 'United Arab Emirates (the)', 18832),
(34, 0, 'Labore odit exercita', 'Jamal Fitzgerald', 'Fugiat ut quia labor', 'Exercitation autem t', 'Odit assumenda a asp', 'Distinctio Tempora', 'Bosnia and Herzegovina', 75212),
(35, 0, 'Veritatis enim aut v', 'Alfonso Finch', 'Consequatur Et arch', 'Qui porro iste enim', 'Libero quae qui mole', 'Officiis dolore qui', 'Bouvet Island', 36976),
(36, 0, 'Ut voluptatem quia v', 'Perry Vega', 'Atque minima molliti', 'Et illum deleniti t', 'Consequatur Sunt es', 'Quis facilis volupta', 'United Arab Emirates (the)', 75329),
(37, 0, 'Laudantium commodo', 'Reese Wooten', 'Porro repellendus D', 'Ea dolores aut dolor', 'Commodo asperiores i', 'Omnis veniam tenetu', 'United Arab Emirates (the)', 41472),
(38, 0, 'Enim laboriosam quo', 'Marvin Soto', 'Sit culpa consecte', 'Ut corporis consecte', 'Consequatur Itaque', 'Molestiae adipisicin', 'Albania', 59697),
(39, 0, 'Repellendus Accusan', 'Lavinia Stafford', 'Deserunt quibusdam a', 'Velit ut nulla ducim', 'Aut incididunt dolor', 'Ut corrupti est mo', 'Canada', 26029),
(40, 0, 'Error placeat magna', 'Otto Whitaker', 'Ab voluptas sit anim', 'Vitae corrupti et o', 'Dolorem delectus es', 'Quis omnis velit dol', 'Anguilla', 60775),
(41, 0, 'Quis sapiente dolore', 'Ainsley Stuart', 'Aut illum reprehend', 'Est quia officiis ve', 'In aspernatur dolore', 'Voluptate ea dolor v', 'Lebanon', 63397),
(42, 0, 'Ut deleniti animi q', 'Derek Hodge', 'Ex amet pariatur N', 'Ut ut molestias omni', 'Minus rerum et hic c', 'Commodi modi dolores', 'Iraq', 93628),
(43, 0, 'Ea molestias nostrum', 'Azalia Gilbert', 'Expedita occaecat au', 'Lorem quis fugiat es', 'Est a et aut non dol', 'Occaecat deserunt nu', 'Austria', 87061),
(44, 0, 'Unde omnis minima as', 'Demetrius Waters', 'Et culpa error accus', 'Aut tempor voluptas', 'Et excepteur non vol', 'Dolore nulla ullam m', 'Peru', 99523),
(45, 0, 'Asperiores voluptate', 'Steven Stokes', 'Eos ex doloribus po', 'Esse nesciunt labor', 'Totam eos architect', 'Atque veniam itaque', 'British Indian Ocean Territory (the)', 71090),
(46, 0, 'Molestiae alias ut a', 'Lillian Houston', 'Obcaecati rem dolor', 'Architecto magnam al', 'Duis natus delectus', 'Numquam quia id exer', 'Saudi Arabia', 36684),
(47, 0, 'Obcaecati quae itaqu', 'Lyle Howe', 'Quo et ipsum fugiat', 'Et voluptate unde et', 'Lorem placeat labor', 'Accusantium cumque f', 'Bermuda', 47543),
(48, 0, 'Eum sit non minim pe', 'Minerva Morgan', 'Sit mollitia earum e', 'Veniam ut inventore', 'Molestiae pariatur', 'Enim sint enim eius', 'Republic of North Macedonia', 48512),
(49, 0, 'Minus eos consectet', 'Erich Boyle', 'Vel eu aut velit co', 'Exercitation maiores', 'Voluptatum aliquam p', 'Laborum ut rerum dig', 'Indonesia', 20330),
(50, 0, 'Quo sapiente aut bla', 'Colorado Mcneil', 'Qui sed qui exercita', 'Tenetur error deleni', 'Distinctio Sunt dol', 'Duis tempor et dolor', 'Japan', 37849),
(51, 0, 'Ex libero veniam om', 'Linus Oneill', 'Ea incididunt mollit', 'Excepturi sit volup', 'Vero est aliquid vi', 'Dolores impedit sun', 'Burundi', 97941),
(52, 0, 'Reprehenderit sed d', 'Jarrod Washington', 'Qui voluptas hic sit', 'Debitis quis harum s', 'Et dolores labore qu', 'Delectus repudianda', 'Burkina Faso', 31270),
(53, 0, 'Est in aspernatur q', 'Adria Sparks', 'Saepe sunt quis atqu', 'Et quia non est vit', 'Magnam nisi do offic', 'Pariatur Consectetu', 'Mauritius', 64192),
(54, 0, 'Numquam et modi amet', 'Cedric Weiss', 'Consequatur aute ei', 'Quia ex incidunt ha', 'At doloremque quia a', 'Voluptate aperiam re', 'Solomon Islands', 34289);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `c_id` int(50) NOT NULL,
  `c_mobile` int(50) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_tel` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`c_id`, `c_mobile`, `c_email`, `c_tel`) VALUES
(19, 1211212, 'wylubam@mailinator.com', 121212),
(20, 1212112, 'xako@mailinator.com', 121212),
(21, 1212112, 'nyrijyq@mailinator.com', 121212),
(22, 121212, 'qikimobi@mailinator.com', 121212),
(23, 12121212, 'hufyg@mailinator.com', 12121212),
(24, 12121212, 'hiweviz@mailinator.com', 12121212),
(25, 12121212, 'pase@mailinator.com', 121212),
(26, 121212121, 'wicami@mailinator.com', 121212),
(27, 121212, 'nibewuz@mailinator.com', 1211212),
(28, 1212112, 'bejetuzy@mailinator.com', 121212),
(29, 12121212, 'nuhuhedab@mailinator.com', 12121212),
(30, 12112121, 'pefib@mailinator.com', 12121212),
(31, 1212121212, 'hybatasu@mailinator.com', 1212112),
(32, 121212121, 'ravatidax@mailinator.com', 1212112),
(33, 121212, 'biqu@mailinator.com', 12121212),
(34, 212121, 'runy@mailinator.com', 121212),
(35, 112121212, 'radefuboq@mailinator.com', 121212),
(36, 1121212, 'ferafe@mailinator.com', 121212),
(37, 1212121212, 'difoqefas@mailinator.com', 1212112),
(38, 212121212, 'qatubema@mailinator.com', 121212),
(39, 12121212, 'zufito@mailinator.com', 1212122),
(40, 12121212, 'kuwo@mailinator.com', 121212),
(41, 1212112, 'xynubij@mailinator.com', 12121),
(42, 121212, 'votujix@mailinator.com', 12121),
(43, 12121212, 'qodicowy@mailinator.com', 1212112),
(44, 12121212, 'laxyra@mailinator.com', 1121212),
(45, 121212, 'pokep@mailinator.com', 121212),
(46, 12121212, 'junaci@mailinator.com', 11212),
(47, 121212, 'fajowev@mailinator.com', 121212),
(48, 112121, 'pijevucij@mailinator.com', 121212),
(49, 121212, 'habutafu@mailinator.com', 121212),
(50, 1212112, 'kafi@mailinator.com', 12121212),
(51, 1212112, 'tunar@mailinator.com', 121212),
(52, 12121212, 'fehar@mailinator.com', 121212),
(53, 121212, 'byrimy@mailinator.com', 121212),
(54, 1121212, 'tynikyvisi@mailinator.com', 1212112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_formation`
--

CREATE TABLE `tbl_formation` (
  `u_id` int(50) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_middle` varchar(50) NOT NULL,
  `u_dob` date NOT NULL,
  `u_sex` varchar(50) NOT NULL,
  `u_status` varchar(100) NOT NULL,
  `u_tax` int(50) NOT NULL,
  `u_nationality` varchar(200) NOT NULL,
  `u_religion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_formation`
--

INSERT INTO `tbl_formation` (`u_id`, `u_lname`, `u_fname`, `u_middle`, `u_dob`, `u_sex`, `u_status`, `u_tax`, `u_nationality`, `u_religion`) VALUES
(19, 'Dalton', 'Nasim', 'Voluptatem fuga In', '2000-05-08', 'Male', 'Married', 121212112, 'Velit saepe fugiat', 'Alias omnis molestia'),
(20, 'Mcfadden', 'Levi', 'Labore vitae invento', '1971-02-11', 'Female', 'Legally Separated', 12121212, 'Cupidatat anim qui m', 'Totam officia magna'),
(21, 'Kidd', 'Gabriel', 'Tenetur aut sint sun', '1991-12-10', 'Female', 'Married', 121212, 'Cupiditate dolores c', 'Similique excepteur'),
(22, 'Strong', 'Edward', 'Commodo est labore d', '2000-09-16', 'Male', 'Married', 12121212, 'Repellendus Amet m', 'Repellendus Laboris'),
(23, 'Curry', 'Karly', 'Reiciendis voluptate', '1988-12-20', 'Male', 'Single', 1212121212, 'Sunt ratione natus e', 'Illo praesentium sae'),
(24, 'Lang', 'Maggie', 'Tenetur exercitation', '1984-03-30', 'Female', 'Widowed', 1212121212, 'Doloribus cupidatat', 'A enim eum velit eiu'),
(25, 'Guerra', 'Ebony', 'Dolore distinctio M', '1970-01-25', 'Male', 'Married', 12121212, 'Voluptatem Ut cillu', 'Unde numquam quisqua'),
(26, 'Michael', 'Talon', 'Mollit ratione maxim', '2000-04-15', 'Male', 'Single', 121212122, 'Itaque qui accusamus', 'Officia occaecat eli'),
(27, 'Horton', 'Amanda', 'Est sunt explicabo', '2000-03-04', 'Male', 'Legally Separated', 12121212, 'Perspiciatis iure m', 'Amet ad placeat si'),
(28, 'Meyer', 'Kiara', 'Molestiae provident', '2000-12-06', 'Female', 'Widowed', 121212112, 'Quibusdam quo id fu', 'Ea sit praesentium'),
(29, 'Carter', 'Phelan', 'Cupiditate sed et se', '1996-08-10', 'Male', 'Married', 12121212, 'Nostrud eum nulla al', 'Rem natus sed esse c'),
(30, 'Roman', 'Bertha', 'Sunt excepturi simil', '1996-05-18', 'Male', 'Single', 121212121, 'Vel nihil obcaecati', 'Possimus exercitati'),
(31, 'Townsend', 'Karleigh', 'Aperiam quis aut dol', '1998-12-07', 'Female', 'Legally Separated', 12121212, 'Tempora delectus od', 'Tempora est ducimus'),
(32, 'Jenkins', 'Stewart', 'Et doloribus et aliq', '1990-07-08', 'Female', 'Legally Separated', 121212, 'Optio quae ullamco', 'Omnis quo aut sit au'),
(33, 'Powell', 'Oleg', 'Nisi soluta ut incid', '1972-10-20', 'Male', 'Married', 1212122, 'Sint minim fugiat r', 'Labore nobis eum aut'),
(34, 'Dunlap', 'Irene', 'Sit voluptate cillu', '2000-02-28', 'Female', 'Married', 1212112, 'Aliquip et incidunt', 'Sunt modi dolore of'),
(35, 'Randall', 'Dillon', 'Velit ipsa quia hi', '1991-12-11', 'Male', 'Widowed', 12121212, 'Consectetur nisi ci', 'Veritatis fugit est'),
(36, 'Harris', 'Sandra', 'Ex voluptatibus mini', '1986-11-24', 'Female', 'Widowed', 12121212, 'Amet voluptas conse', 'Dolorum autem volupt'),
(37, 'Delgado', 'Jeanette', 'Eiusmod optio beata', '1995-11-16', 'Female', 'Single', 12121212, 'Repellendus Lorem d', 'Quibusdam totam est'),
(38, 'Mendez', 'Katell', 'Consequat Molestiae', '2004-12-05', 'Male', 'Widowed', 12121212, 'Est reprehenderit d', 'Nisi et est eum temp'),
(39, 'Marquez', 'Dawn', 'Facere qui consequat', '2000-09-23', 'Female', 'Legally Separated', 1212121212, 'Minus in ullamco arc', 'Commodo placeat qui'),
(40, 'Frank', 'Kylynn', 'Ea dolorem recusanda', '2000-01-01', 'Male', 'Widowed', 12121212, 'Obcaecati quos repel', 'Nostrud suscipit ver'),
(41, 'Dominguez', 'Nina', 'Voluptates iste non', '2000-09-12', 'Male', 'Legally Separated', 11212, 'Quos exercitationem', 'Consectetur quaerat'),
(42, 'Fulton', 'Eric', 'Ut explicabo Ad sim', '1972-04-14', 'Male', 'Widowed', 1212121, 'Nobis corporis nihil', 'Aut sunt minus et ul'),
(43, 'Hickman', 'Phoebe', 'Eligendi qui volupta', '2000-12-03', 'Male', 'Single', 121212122, 'Rerum sit autem cup', 'Aliquam aspernatur s'),
(44, 'Pennington', 'Jameson', 'Sunt sit qui do lore', '2000-01-09', 'Female', 'Widowed', 121211212, 'Voluptatem praesenti', 'Alias modi do assume'),
(45, 'Scott', 'Piper', 'Iste a omnis volupta', '2000-07-08', 'Female', 'Married', 121212, 'Fugit non officia l', 'Enim quo ut facere i'),
(46, 'Stanton', 'Bo', 'Quia consectetur la', '1990-03-10', 'Female', 'Single', 11212112, 'Sunt odio adipisci q', 'Commodi voluptas nos'),
(47, 'Barry', 'Iliana', 'In quaerat nisi ea a', '1986-11-20', 'Female', 'Single', 121212, 'Possimus numquam no', 'Nostrud quo error qu'),
(48, 'Allison', 'Constance', 'Blanditiis debitis p', '1974-11-26', 'Female', 'Married', 121212, 'Est aspernatur enim', 'Ex exercitation minu'),
(49, 'York', 'Bradley', 'Tenetur necessitatib', '2000-07-25', 'Female', 'Widowed', 121212, 'Aperiam eum saepe re', 'Quo ducimus iste di'),
(50, 'Sawyer', 'Ferris', 'Iure pariatur Itaqu', '1983-05-10', 'Female', 'Widowed', 12121212, 'Rerum perferendis qu', 'Debitis quia volupta'),
(51, 'Flynn', 'Julie', 'Quam in magni assume', '2000-07-04', 'Male', 'Single', 12121212, 'Nemo consequat Quos', 'Dolore explicabo Qu'),
(52, 'Garza', 'Alice', 'Ipsum provident ex', '1976-06-21', 'Male', 'Single', 1121212, 'Labore non incidunt', 'Laudantium fugiat N'),
(53, 'Bentley', 'Raymond', 'Sed debitis quod asp', '1993-08-06', 'Female', 'Single', 122121, 'Et hic sit dolore p', 'Et proident non ips'),
(54, 'Donaldson', 'Addison', 'Omnis et cumque est', '2000-11-18', 'Female', 'Married', 121212, 'Sunt aute non et dol', 'Molestias cupiditate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `p_id` int(50) NOT NULL,
  `f_lname` varchar(200) NOT NULL,
  `f_fname` varchar(200) NOT NULL,
  `f_middle` varchar(200) NOT NULL,
  `m_lname` varchar(200) NOT NULL,
  `m_fname` varchar(200) NOT NULL,
  `m_middle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_parents`
--

INSERT INTO `tbl_parents` (`p_id`, `f_lname`, `f_fname`, `f_middle`, `m_lname`, `m_fname`, `m_middle`) VALUES
(19, 'Whitehead', 'Ina', 'Kirby Gonzales', 'Lindsey', 'Justin', 'Karleigh Martinez'),
(20, 'Rich', 'Tatyana', 'Emma Summers', 'Mullins', 'Emery', 'Summer Sharpe'),
(21, 'Glass', 'Jerry', 'Felicia Chan', 'Cooley', 'Dacey', 'Jamalia Chang'),
(22, 'Cain', 'Tarik', 'Iona Obrien', 'Brock', 'Stephanie', 'Charlotte Hebert'),
(23, 'Moran', 'Madaline', 'Chaim Burns', 'Durham', 'Brady', 'Maile Christensen'),
(24, 'Kirkland', 'Myles', 'McKenzie Gaines', 'Gutierrez', 'Octavia', 'Xandra Simon'),
(25, 'Reyes', 'Ima', 'George Pope', 'Ballard', 'Jeanette', 'Tanek Cummings'),
(26, 'Haney', 'Samantha', 'Christine Wilcox', 'Gilliam', 'Indira', 'Quamar Kirk'),
(27, 'Jordan', 'Channing', 'Mira Charles', 'Puckett', 'Hilda', 'Roanna Nelson'),
(28, 'Cox', 'Alexander', 'Kiara Padilla', 'Robinson', 'Luke', 'Keefe Franco'),
(29, 'Mcdonald', 'Nita', 'Breanna Middleton', 'Griffin', 'Ciaran', 'Ulysses Franklin'),
(30, 'Lindsay', 'Salvador', 'Kadeem Hutchinson', 'Dodson', 'Emi', 'Lani Hopkins'),
(31, 'Blevins', 'Taylor', 'Karly Ryan', 'Zamora', 'Quon', 'Cora Peterson'),
(32, 'Stevens', 'Martena', 'Taylor Todd', 'Price', 'Ora', 'Benjamin Barrera'),
(33, 'Pacheco', 'Mia', 'Jocelyn Wyatt', 'Pittman', 'Petra', 'Brian Prince'),
(34, 'Waters', 'Jenna', 'Joseph Lindsay', 'Ewing', 'Serena', 'Rahim Russo'),
(35, 'Knox', 'Tyler', 'Ethan Guthrie', 'Riley', 'Lavinia', 'Emma Wall'),
(36, 'Fox', 'Heather', 'Patricia Barrett', 'Warren', 'Raphael', 'Rigel Nieves'),
(37, 'Guzman', 'Candace', 'Colleen Santiago', 'Carey', 'Cecilia', 'Xenos Little'),
(38, 'Cotton', 'Medge', 'Micah Richmond', 'Marshall', 'Leila', 'Quinn Larsen'),
(39, 'Warner', 'Quincy', 'Acton Pacheco', 'Weeks', 'Jameson', 'Quincy Mueller'),
(40, 'Morton', 'Quintessa', 'Robert Mccall', 'Chase', 'Alea', 'George Beasley'),
(41, 'Baldwin', 'Caryn', 'Carol Mcfarland', 'Hood', 'Hoyt', 'Brady Chavez'),
(42, 'Vasquez', 'Virginia', 'Murphy Joyce', 'Christensen', 'Hop', 'Yen Burton'),
(43, 'Dennis', 'Yetta', 'Regan Sanders', 'Hooper', 'Madeson', 'Ethan Gay'),
(44, 'Gutierrez', 'Larissa', 'Kiona Sutton', 'Gibson', 'Alden', 'Phyllis Kennedy'),
(45, 'Dixon', 'Bradley', 'Walker Charles', 'Lloyd', 'Hedley', 'Sonya Mueller'),
(46, 'Cash', 'Lester', 'Tamekah Hendricks', 'Reynolds', 'Farrah', 'Beverly Sanford'),
(47, 'Vega', 'Karleigh', 'Damon Hudson', 'Velasquez', 'Lydia', 'Kieran Fry'),
(48, 'Aguirre', 'Upton', 'Nathan Marks', 'Evans', 'Aspen', 'Minerva Williamson'),
(49, 'Vazquez', 'Brody', 'Imani Donaldson', 'Whitfield', 'Orson', 'Stephanie Goodwin'),
(50, 'Graves', 'Sandra', 'Quon Matthews', 'Leblanc', 'Raja', 'David Mclaughlin'),
(51, 'Clayton', 'Patience', 'Simon Gibson', 'Martinez', 'Ross', 'Alisa Barrera'),
(52, 'Clarke', 'Georgia', 'Kyla Mendoza', 'Stone', 'Kasimir', 'Cole Workman'),
(53, 'Park', 'Wing', 'Zelenia Chandler', 'Cruz', 'Nina', 'Velma Mack'),
(54, 'Vaughan', 'Odysseus', 'Wallace Hawkins', 'Cunningham', 'Lucius', 'Zelenia Kelley');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_formation`
--
ALTER TABLE `tbl_formation`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `h_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  MODIFY `b_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_formation`
--
ALTER TABLE `tbl_formation`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
