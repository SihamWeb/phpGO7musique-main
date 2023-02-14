-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 17 déc. 2022 à 11:56
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groupe7`
--

-- --------------------------------------------------------

--
-- Structure de la table `chansons`
--

CREATE TABLE `chansons` (
  `id` int(11) NOT NULL,
  `artiste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre_chanson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_cd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_sortie` year(4) NOT NULL,
  `duree` time NOT NULL,
  `couverture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `chansons`
--

INSERT INTO `chansons` (`id`, `artiste`, `titre_chanson`, `nom_cd`, `annee_sortie`, `duree`, `couverture`) VALUES
(1, 'Taylor Swift', 'Lavender Haze', 'Midnights', 2022, '00:03:22', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(2, 'Taylor Swift', 'Maroon', 'Midnights', 2022, '00:03:38', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(3, 'Taylor Swift', 'Anti-Hero', 'Midnights', 2022, '00:03:21', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(4, 'Taylor Swift', 'Snow on the Beach', 'Midnights', 2022, '00:04:16', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(5, 'Taylor Swift', 'You’re on Your Own, Kid', 'Midnights', 2022, '00:03:14', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(6, 'Taylor Swift', 'Midnight Rain', 'Midnights', 2022, '00:02:55', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(7, 'Taylor Swift', 'Question…?', 'Midnights', 2022, '00:03:31', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(8, 'Taylor Swift', 'Vigilante Shit', 'Midnights', 2022, '00:02:45', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(9, 'Taylor Swift', 'Bejeweled', 'Midnights', 2022, '00:03:14', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(10, 'Taylor Swift', 'Labyrinth', 'Midnights', 2022, '00:04:08', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(11, 'Taylor Swift', 'Karma', 'Midnights', 2022, '00:03:25', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(12, 'Taylor Swift', 'Sweet Nothing', 'Midnights', 2022, '00:03:08', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(13, 'Taylor Swift', 'Mastermind', 'Midnights', 2022, '00:03:11', 'https://charts-static.billboard.com/img/2022/11/taylor-swift-824-midnights-shg-180x180.jpg'),
(14, '21 Savage et Drake', 'Rich Flex', 'Her Loss', 2022, '00:04:00', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(15, '21 Savage et Drake', 'Major Distribution', 'Her Loss', 2022, '00:02:51', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(16, '21 Savage et Drake', 'On BS', 'Her Loss', 2022, '00:04:22', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(17, 'Drake', 'BackOutsideBoyz', 'Her Loss', 2022, '00:02:33', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(18, '21 Savage et Drake', 'Privileged Rappers', 'Her Loss', 2022, '00:02:41', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(19, '21 Savage et Drake', 'Spin Bout U', 'Her Loss', 2022, '00:03:35', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(20, '21 Savage et Drake', 'Hours In Silence', 'Her Loss', 2022, '00:06:40', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(21, '21 Savage et Drake', 'Treacherous Twins', 'Her Loss', 2022, '00:03:01', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(22, '21 Savage et Drake', 'Circo Loco', 'Her Loss', 2022, '00:03:57', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(23, '21 Savage et Drake', 'Pussy & Millions', 'Her Loss', 2022, '00:04:03', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(24, '21 Savage et Drake', 'Broke Boys', 'Her Loss', 2022, '00:03:46', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(25, 'Drake', 'Middle of the Ocean', 'Her Loss', 2022, '00:05:57', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(26, 'Drake', 'Jumbotron Shit Poppin', 'Her Loss', 2022, '00:02:18', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(27, '21 Savage et Drake', 'More M\'s', 'Her Loss', 2022, '00:03:42', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(28, '21 Savage', '3AM on Glenwood', 'Her Loss', 2022, '00:02:59', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(29, 'Drake', 'I Guess It\'s Fuck Me', 'Her Loss', 2022, '00:04:24', 'https://charts-static.billboard.com/img/2022/11/drake-04g-herloss-gqr-180x180.jpg'),
(30, 'Bad Bunny', 'Moscow Mule', 'Un Verano Sin Ti', 2022, '00:04:06', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(31, 'Bad Bunny', 'Después de la Playa', 'Un Verano Sin Ti', 2022, '00:03:51', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(32, 'Bad Bunny', 'Me Porto Bonito', 'Un Verano Sin Ti', 2022, '00:02:59', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(33, 'Bad Bunny', 'Tití Me Preguntó', 'Un Verano Sin Ti', 2022, '00:04:04', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(34, 'Bad Bunny', 'Un Ratito', 'Un Verano Sin Ti', 2022, '00:02:57', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(35, 'Bad Bunny', 'Yo No Soy Celoso', 'Un Verano Sin Ti', 2022, '00:03:51', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(36, 'Bad Bunny', 'Tarot', 'Un Verano Sin Ti', 2022, '00:03:58', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(37, 'Bad Bunny', 'Neverita', 'Un Verano Sin Ti', 2022, '00:02:54', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(38, 'Bad Bunny', 'La Corriente', 'Un Verano Sin Ti', 2022, '00:03:19', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(39, 'Bad Bunny', 'Efecto', 'Un Verano Sin Ti', 2022, '00:03:34', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(40, 'Bad Bunny', 'Party', 'Un Verano Sin Ti', 2022, '00:03:48', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(41, 'Bad Bunny', 'Aguacero', 'Un Verano Sin Ti', 2022, '00:03:31', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(42, 'Bad Bunny', 'Enséñame a Bailar', 'Un Verano Sin Ti', 2022, '00:02:56', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(43, 'Bad Bunny', 'Ojitos Lindos', 'Un Verano Sin Ti', 2022, '00:04:19', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(44, 'Bad Bunny', 'Dos Mil 16', 'Un Verano Sin Ti', 2022, '00:03:29', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(45, 'Bad Bunny', 'El Apagón', 'Un Verano Sin Ti', 2022, '00:03:22', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(46, 'Bad Bunny', 'Otro Atardecer', 'Un Verano Sin Ti', 2022, '00:04:05', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(47, 'Bad Bunny', 'Un Coco', 'Un Verano Sin Ti', 2022, '00:03:17', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(48, 'Bad Bunny', 'Andrea', 'Un Verano Sin Ti', 2022, '00:05:40', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(49, 'Bad Bunny', 'Me Fui de Vacaciones', 'Un Verano Sin Ti', 2022, '00:03:01', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(50, 'Bad Bunny', 'Un Verano Sin Ti', 'Un Verano Sin Ti', 2022, '00:02:29', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(51, 'Bad Bunny', 'Agosto', 'Un Verano Sin Ti', 2022, '00:02:20', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(52, 'Bad Bunny', 'Callaita', 'Un Verano Sin Ti', 2022, '00:04:11', 'https://charts-static.billboard.com/img/2022/05/bad-bunny-c3m-un-verano-sin-ti-3ib-180x180.jpg'),
(53, 'Michael Bublé', 'It\'s Beginning To Look A Lot Like Christmas', 'Christmas', 2011, '00:03:27', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(54, 'Michael Bublé', 'Santa Claus Is Coming to Town', 'Christmas', 2011, '00:02:51', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(55, 'Michael Bublé', 'Jingle Bells', 'Christmas', 2011, '00:02:40', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(56, 'Michael Bublé', 'White Christmas', 'Christmas', 2011, '00:03:37', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(57, 'Michael Bublé', 'All I Want for Christmas Is You', 'Christmas', 2011, '00:02:52', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(58, 'Michael Bublé', 'Holly Jolly Christmas', 'Christmas', 2011, '00:02:00', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(59, 'Michael Bublé', 'Santa Baby', 'Christmas', 2011, '00:03:52', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(60, 'Michael Bublé', 'Have Yourself a Merry Little Christmas', 'Christmas', 2011, '00:03:50', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(61, 'Michael Bublé', 'Christmas (Baby Please Come Home)', 'Christmas', 2011, '00:03:08', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(62, 'Michael Bublé', 'Silent Night', 'Christmas', 2011, '00:03:48', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(63, 'Michael Bublé', 'Blue Christmas', 'Christmas', 2011, '00:03:42', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(64, 'Michael Bublé', 'Cold December Night', 'Christmas', 2011, '00:03:18', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(65, 'Michael Bublé', 'I\'ll Be Home for Christmas', 'Christmas', 2011, '00:04:25', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(66, 'Michael Bublé', 'Ave Maria', 'Christmas', 2011, '00:04:00', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(67, 'Michael Bublé', 'Mis Deseos / Feliz Navidad', 'Christmas', 2011, '00:04:24', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(68, 'Michael Bublé', 'Michael\'s Christmas Greeting (Hidden Track)', 'Christmas', 2011, '00:00:05', 'https://charts-static.billboard.com/img/2011/11/michael-buble-auc-christmas-ft9-180x180.jpg'),
(69, 'Lil Baby', 'Real Spill', 'It\'s Only Me', 2022, '00:03:19', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(70, 'Lil Baby', 'Stand On It', 'It\'s Only Me', 2022, '00:02:47', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(71, 'Lil Baby', 'Pop Out', 'It\'s Only Me', 2022, '00:03:16', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(72, 'Lil Baby', 'Heyy', 'It\'s Only Me', 2022, '00:03:13', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(73, 'Lil Baby', 'California Breeze', 'It\'s Only Me', 2022, '00:02:58', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(74, 'Lil Baby', 'Perfect Timing', 'It\'s Only Me', 2022, '00:02:42', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(75, 'Lil Baby', 'Never Hating', 'It\'s Only Me', 2022, '00:02:41', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(76, 'Lil Baby', 'Forever', 'It\'s Only Me', 2022, '00:02:48', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(77, 'Lil Baby', 'Not Finished', 'It\'s Only Me', 2022, '00:02:44', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(78, 'Lil Baby', 'In A Minute', 'It\'s Only Me', 2022, '00:03:21', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(79, 'Lil Baby', 'Waterfall Flow', 'It\'s Only Me', 2022, '00:02:45', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(80, 'Lil Baby', 'Everything', 'It\'s Only Me', 2022, '00:02:21', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(81, 'Lil Baby', 'From Now On', 'It\'s Only Me', 2022, '00:03:00', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(82, 'Lil Baby', 'Double Down', 'It\'s Only Me', 2022, '00:03:23', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(83, 'Lil Baby', 'Cost To Be Alive', 'It\'s Only Me', 2022, '00:02:20', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(84, 'Lil Baby', 'Top Priority', 'It\'s Only Me', 2022, '00:03:08', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(85, 'Lil Baby', 'Danger', 'It\'s Only Me', 2022, '00:02:32', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(86, 'Lil Baby', 'Stop Playin', 'It\'s Only Me', 2022, '00:02:38', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(87, 'Lil Baby', 'FR', 'It\'s Only Me', 2022, '00:02:56', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(88, 'Lil Baby', 'Back and Forth', 'It\'s Only Me', 2022, '00:02:02', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(89, 'Lil Baby', 'Shiest Talk', 'It\'s Only Me', 2022, '00:02:04', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(90, 'Lil Baby', 'No Fly Zone', 'It\'s Only Me', 2022, '00:03:35', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(91, 'Lil Baby', 'Russian Roulette', 'It\'s Only Me', 2022, '00:02:56', 'https://charts-static.billboard.com/img/2017/11/lilbaby-kyx-180x180.jpg'),
(92, 'Harry Styles', 'Music for a Sushi Restaurant\r\n', 'Harry\'s House', 2022, '00:03:14', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(94, 'Harry Styles', 'Late Night Talking\r\n', 'Harry\'s House', 2022, '00:02:58', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(95, 'Harry Styles', 'Grapejuice\r\n', 'Harry\'s House', 2022, '00:03:12', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(96, 'Harry Styles', 'As It Was\r\n', 'Harry\'s House', 2022, '00:02:47', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(97, 'Harry Styles', 'Daylight\r\n', 'Harry\'s House', 2022, '00:02:45', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(98, 'Harry Styles', 'Little Freak\r\n', 'Harry\'s House', 2022, '00:03:22', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(99, 'Harry Styles', 'Matilda\r\n', 'Harry\'s House', 2022, '00:04:06', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(100, 'Harry Styles', 'Daydreaming\r\n', 'Harry\'s House', 2022, '00:03:07', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(101, 'Harry Styles', 'Keep Driving\r\n', 'Harry\'s House', 2022, '00:02:20', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(102, 'Harry Styles', 'Satellite', 'Harry\'s House', 2022, '00:03:39', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(103, 'Harry Styles', 'Boyfriends\r\n', 'Harry\'s House', 2022, '00:03:15', 'https://charts-static.billboard.com/img/2022/06/harry-styles-6jk-harryshouse-9jt-180x180.jpg'),
(122, 'Morgan Wallen', 'Not Finished', 'Dangerous', 2021, '00:02:44', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(123, 'Morgan Wallen', 'In A Minute', 'Dangerous', 2021, '00:03:21', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(124, 'Morgan Wallen', 'Waterfall Flow', 'Dangerous', 2021, '00:02:45', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(125, 'Morgan Wallen', 'Everything', 'Dangerous', 2021, '00:02:21', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(126, 'Morgan Wallen', 'From Now On', 'Dangerous', 2021, '00:03:00', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(127, 'Morgan Wallen', 'Double Down', 'Dangerous', 2021, '00:03:23', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(128, 'Morgan Wallen', 'Cost To Be Alive', 'Dangerous', 2021, '00:02:20', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(129, 'Morgan Wallen', 'Top Priority', 'Dangerous', 2021, '00:03:08', 'https://charts-static.billboard.com/img/2021/01/morgan-wallen-nlu-dangerous-the-double-album-zbn-180x180.jpg'),
(130, 'The Weeknd', 'Save Your Tears\r\n', 'The Highlights', 2021, '00:03:36', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(131, 'The Weeknd', 'Blinding Lights\r\n', 'The Highlights', 2021, '00:03:20', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(132, 'The Weeknd', 'FR', 'In Your Eyes\r\n', 2021, '00:03:58', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(133, 'The Weeknd', 'Can’t Feel My Face', 'The Highlights', 2021, '00:03:34', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(134, 'The Weeknd', 'I Feel It Coming', 'The Highlights', 2021, '00:04:29', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(135, 'The Weeknd', 'Starboy\r\n', 'The Highlights', 2021, '00:03:50', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(136, 'The Weeknd', 'Pray for Me', 'The Highlights', 2021, '00:03:31', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(137, 'The Weeknd', 'Heartless', 'The Highlights', 2021, '00:03:18', 'https://charts-static.billboard.com/img/2021/02/the-weeknd-xmx-the-highlights-ax5-180x180.jpg'),
(138, 'Nat King Cole', 'Silent Night', 'Christmas With Nat King Cole', 2022, '00:02:10', 'https://charts-static.billboard.com/img/1985/12/nat-king-cole-xik-the-christmas-song-577-180x180.jpg'),
(139, 'Nat King Cole', 'The First Noel\r\n', 'Christmas With Nat King Cole', 2022, '00:01:58', 'https://charts-static.billboard.com/img/1985/12/nat-king-cole-xik-the-christmas-song-577-180x180.jpg'),
(140, 'Nat King Cole', 'O Holy Night', 'Christmas With Nat King Cole', 2022, '00:02:57', 'https://charts-static.billboard.com/img/1985/12/nat-king-cole-xik-the-christmas-song-577-180x180.jpg'),
(141, 'Nat King Cole', 'O Little Town of Bethlehem', 'Christmas With Nat King Cole', 2022, '00:02:19', 'https://charts-static.billboard.com/img/1985/12/nat-king-cole-xik-the-christmas-song-577-180x180.jpg'),
(142, 'Mariah Carey', 'Silent Night\r\n', 'Merry Christmas', 1994, '00:03:14', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(143, 'Mariah Carey', 'All I Want for Christmas Is You', 'Merry Christmas', 1994, '00:04:01', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(144, 'Mariah Carey', 'O Holy Night', 'Merry Christmas', 1994, '00:04:27', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(145, 'Mariah Carey', 'Christmas (Baby Please Come Home)', 'Merry Christmas', 1994, '00:02:35', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(146, 'Mariah Carey', 'Miss You Most (At Christmas Time)', 'Merry Christmas', 1994, '00:04:33', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(147, 'Mariah Carey', 'Joy to the World\r\n', 'Merry Christmas', 1994, '00:04:20', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(148, 'Mariah Carey', 'Jesus Born on This Day', 'Merry Christmas', 1994, '00:03:43', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(149, 'Mariah Carey', 'Santa Claus Is Comin\' to Town', 'Merry Christmas', 1994, '00:03:25', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(150, 'Mariah Carey', 'Hark! The Herald Angels Sing / Gloria (In Excelsis Deo)', 'Merry Christmas', 1994, '00:03:01', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg'),
(151, 'Mariah Carey', 'Jesus Oh What a Wonderful Child\r\n', 'Merry Christmas', 1994, '00:04:29', 'https://charts-static.billboard.com/img/1994/11/mariah-carey-tgq-merry-christmas-df2-180x180.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `requetes`
--

CREATE TABLE `requetes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artiste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `identifiant`, `motdepasse`) VALUES
(1, 'Administrateur', '83CCutv8');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chansons`
--
ALTER TABLE `chansons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `requetes`
--
ALTER TABLE `requetes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chansons`
--
ALTER TABLE `chansons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT pour la table `requetes`
--
ALTER TABLE `requetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
