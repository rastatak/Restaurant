-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 nov. 2019 à 22:06
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_resa` int(11) NOT NULL AUTO_INCREMENT,
  `jour` date NOT NULL,
  `crenau` varchar(35) NOT NULL COMMENT '1=  11-13h---  2=  13-15h---  3=  19-21h---  4=  21-23h',
  `nb_pers` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `mail` varchar(140) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `presence` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_resa`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_resa`, `jour`, `crenau`, `nb_pers`, `nom`, `prenom`, `mail`, `tel`, `commentaire`, `presence`) VALUES
(1, '2019-10-18', '3', 1, 'boulanger', 'Eric', 'eeee@gt.fr', '0652415263', 'iuerS', 0),
(63, '2019-10-25', '2', 6, 'AB3', 'uuu', 'ytttty@foze.gt', '0689652365', 'eg', 0),
(3, '2019-10-22', '3', 7, 'Xavier', 'charles', 'prof@xmen.org', '0685963214', '', 0),
(7, '2019-10-26', '1', 13, 'nez pas grand ', 'kirikou', 'ptikirikou@gmail.fr', '0698563214', 'j\'y suis tout pti ', 0),
(8, '2019-10-26', '1', 13, 'nez pas grand ', 'kirikou', 'ptikirikou@gmail.fr', '0698563214', 'j\'y suis tout pti ', 0),
(62, '2019-10-25', '2', 6, 'AB3', 'uuu', 'ytty@foze.gt', '0689652365', 'eg', 0),
(61, '2019-10-25', '1', 6, 'AB3', 'uuu', 'tt@foze.gt', '0689652365', 'eg', 0),
(11, '2019-10-31', '1', 13, 'nez pas grand ', 'kirikou', 'ptikirikou@gmail.fr', '0698563214', 'j\'y suis tout pti ', 0),
(13, '2019-12-12', '1', 13, 'nez pas grand ', 'toto', 'ptikirikou@gmail.fr', '0698563214', 'j\'y suis tout pti ', 0),
(14, '2019-12-12', '1', 13, 'nez pas grand ', 'toto', 'ptikirikou@gmail.fr', '0698563214', 'j\'y suis tout pti ', 0),
(20, '2019-10-24', '1', 13, 'nez pas grand ', 'toto', 'ptikirikou@gmail.fr', '0698563214', 'c\'est mon anniversaire =D ', 0),
(44, '2019-10-24', '4', 25, 'LESAINT', 'JÃ©rÃ´me', 'm@gg.com', '0698563244', 'FUCK OFF', 0),
(68, '2019-10-25', '4', 6, 'AB3', 'uuudth', 'hhhhbhy@foze.gt', '0689652365', 'eg', 0),
(81, '2019-11-03', '2', 5, 'Blanquart', 'Victor', 'V.Blanblank@hotmqil.fr', '0687951278', 'Bliiiiifezffze', 0),
(57, '2019-10-25', '1', 6, 'AB3', 'ERqRwdb', 'kd5ds@foze.gt', '0689652365', 'eg', 0),
(70, '2019-10-25', '4', 6, 'AB3', 'uuudth', 'hhhhy@foze.gt', '0689652365', 'eg', 0),
(71, '2019-11-01', '1', 5, 'qte', 'getq', 'qet@ht.fr', '0789562341', '', 0),
(73, '2019-11-01', '3', 4, 'qfe', 'dfg', 'fqe@gr.fr', '0698562341', '', 0),
(74, '2019-11-01', '3', 5, 'a', 'a', 'a@a.fr', '0489562314', 'aa', 0),
(80, '2019-11-01', '4', 5, 'sdfgh', 'sdfghj', 'sdf@d.ju', '0498563241', '', 1),
(76, '2019-11-01', '4', 6, 'n v', ' n', 'nv@a.fr', '0498562341', '', 0),
(77, '2019-11-01', '4', 7, 'rr', 'rxx', 'rr@gt.gt', '0698562314', '', 0),
(78, '2019-11-01', '4', 6, 'test', 'test', 'test@ol.po', '0489562314', '', 0),
(79, '2019-11-01', '3', 5, 'rssr', 'ss', 'rssr@po.ki', '06589652365', '', 0),
(83, '2019-11-03', '2', 2, 'test', 'michel', 'test@ht.fr', '0678787699', 'truc muchesss test test tes tte tetetet', 1),
(84, '2019-11-03', '3', 6, 'FEA', 'aef', 'fea@frer.gt', '0489562341', '', 0),
(85, '2019-11-20', '1', 5, 'eee', 'eeee', 'eee@ee.gtz', '0489562314', '', 0),
(86, '2019-11-20', '1', 5, 'eee', 'eeee', 'ejhgfee@ee.gtz', '0489562314', '', 0),
(87, '2019-11-20', '1', 5, 'eee', 'eeee', 'ejhtgfee@ee.gtz', '0489562314', '', 0),
(88, '2019-11-03', '1', 5, 'eee', 'eeee', 'ejhtgtfee@ee.gtz', '0489562314', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
