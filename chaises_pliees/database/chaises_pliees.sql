-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 fév. 2024 à 19:21
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chaises_pliees`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `libellé` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libellé`) VALUES
(1, 'spectacle'),
(2, 'actualite'),
(3, 'histoire'),
(4, 'accueil'),
(5, 'rejoindre');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `date_contenu` datetime NOT NULL,
  `contenu` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id_page`, `titre`, `date_contenu`, `contenu`, `id_categorie`, `date`) VALUES
(1, 'A L\'ORIGINE', '2024-02-21 12:22:02', '<p>La Compagnie des Chaises pli&eacute;es est une association loi 1901 cr&eacute;&eacute;e en 2001 &agrave; l\'initiative<br>du com&eacute;dien et metteur en sc&egrave;ne S&eacute;bastien NICOT. Le but de l\'association est de d&eacute;velopper les<br>talents d\'expression sc&eacute;nique de chacun par une pratique r&eacute;guli&egrave;re des outils qu\'il a naturellement &agrave; sa<br>disposition : son corps et sa voix.</p>', 3, NULL),
(6, 'caroussel Section1', '2024-02-22 12:31:57', '<div class=\"carousel-item active\"><img src=\"assets/imgs/bandeau_accueil.png\" alt=\"\" class=\"d-block w-100\"></div>\r\n<div class=\"carousel-item\"><img src=\"assets/imgs/bandeau_accueil.png\" alt=\"\" class=\"d-block w-100\"></div>\r\n<div class=\"carousel-item\"><img src=\"assets/imgs/bandeau_accueil.png\" alt=\"\" class=\"d-block w-100\"></div>\r\n<p>&nbsp;</p>', 4, NULL),
(7, 'NOTRE RYTHME', '2024-02-22 16:44:40', '<p>Nos ateliers sont ouverts &agrave; tous. Ils ont lieu &agrave; la salle des f&ecirc;tes de Vouneuil-sur-Vienne et sont anim&eacute;s par<br>S&eacute;bastien NICOT, com&eacute;dien, metteur en sc&egrave;ne et pr&eacute;sident de l\'association. Chaque semaine, les cours<br>seront r&eacute;alis&eacute; le jeudi de 20h15 &agrave; 22h15</p>', 5, NULL),
(8, 'CONDITIONS D\'ADHESION', '2024-02-22 16:45:26', '<p>L&rsquo;adh&eacute;sion &agrave; l&rsquo;ann&eacute;e est de 180&euro;. Si le montant est trop &eacute;lev&eacute; pour vous, vous avez la possibilit&eacute;<br>d&rsquo;avoir des paiements &eacute;chelonn&eacute;s sur l&rsquo;ann&eacute;e</p>', 5, NULL),
(9, 'Nouvelle pièce 2024', '2024-02-22 18:32:46', '<div class=\"d-flex mp-3 mx-2 flex-column border-bottom\" style=\"width: 24rem;\">\r\n<div class=\"flex-shrink-0\"><img src=\"assets/imgs/accueil_article1.png\" alt=\"\" width=\"450\" height=\"300\"></div>\r\n<div class=\"flex-grow-1 ms-3\">\r\n<h3 class=\"text-primary text-uppercase\">Vaincre le Stress pour le jour J !</h3>\r\n<div class=\"row flex-md-column flex-lg-row\">\r\n<div class=\"col-12 col-lg-7\">\r\n<p>Les com&eacute;diens ont tous une faiblesse. D&eacute;couvrez comment vaincre votre stress &hellip;</p>\r\n</div>', 2, NULL),
(10, 'Vaincre le Stress pour le jour J !', '2024-02-22 18:50:09', '<div class=\"d-flex mp-3 mx-2 flex-column border-bottom\" style=\"width: 24rem;\">\r\n<div class=\"flex-shrink-0\"><img src=\"assets/imgs/accueil_article2.png\" alt=\"\" width=\"450\" height=\"300\"></div>\r\n<div class=\"flex-grow-1 ms-3\">\r\n<h3 class=\"text-primary text-uppercase\">Vaincre le Stress pour le jour J !</h3>\r\n<div class=\"row flex-md-column flex-lg-row\">\r\n<div class=\"col-12 col-lg-7\">\r\n<p>Les com&eacute;diens ont tous une faiblesse. D&eacute;couvrez comment vaincre votre stress &hellip;</p>\r\n</div>', 2, NULL),
(11, 'Coup d’éclat dans la Nouvelle République* !', '2024-02-22 18:51:48', '<div class=\"d-flex mp-3 mx-3 flex-column border-bottom\" style=\"width: 24rem;\">\r\n<div class=\"flex-shrink-0\"><img src=\"assets/imgs/accueil_article3.png\" alt=\"\" width=\"450\" height=\"300\"></div>\r\n<div class=\"flex-grow-1 ms-3\">\r\n<h3 class=\"text-primary text-uppercase\">Vaincre le Stress pour le jour J !</h3>\r\n<div class=\"row  flex-md-column flex-lg-row\">\r\n<div class=\"col-12 col-lg-7\">\r\n<p>Les com&eacute;diens ont tous une faiblesse. D&eacute;couvrez comment vaincre votre stress &hellip;</p>\r\n</div>', 2, NULL),
(12, 'caroussel section2', '2024-02-22 19:00:59', '<div class=\"carousel-item active\"><img src=\"assets/imgs/bandeau_rejoindre.png\" alt=\"\" width=\"600\" height=\"400\"></div>\r\n<div class=\"carousel-item\"><img src=\"assets/imgs/bandeau_rejoindre.png\" alt=\"\" width=\"600\" height=\"400\"></div>\r\n<div class=\"carousel-item\"><img src=\"assets/imgs/bandeau_rejoindre.png\" alt=\"\" width=\"600\" height=\"400\"></div>\r\n<p>&nbsp;</p>', 4, NULL),
(13, 'Aujourd’hui', '2024-02-22 19:09:02', '<p>L&rsquo;association est compos&eacute;e d&rsquo;une dizaine de com&eacute;diens amateurs de tous &acirc;ges et de tous horizons. Ils<br>souhaitent tous utiliser le th&eacute;&acirc;tre pour d&eacute;velopper leur expressivit&eacute;, enrichir leur palette cr&eacute;ative ou tout<br>simplement s\'amuser dans un climat de d&eacute;tente et de confiance. Chaque ann&eacute;e nous avons la chance<br>de nous produire aux environs de poitiers, chasseneuil du poitou ou encore ch&acirc;tellerault dans des<br>th&eacute;&acirc;tres ainsi que dans des festivals* de th&eacute;&acirc;tre &agrave; travers la France.</p>', 3, NULL),
(14, ' “Coups de théâtres” - Salle des fêtes de Vouneuil sur Vienne', '2024-02-22 00:00:00', '<div class=\"row g-5\">\r\n<div class=\"col-md-4\"><img src=\"assets/imgs/affiche .png\" alt=\"\" class=\"w-100\"></div>\r\n<div class=\"col-md-6\">\r\n<div class=\"card-body\">\r\n<h4 class=\"card-title\">&nbsp;&ldquo;Coups de th&eacute;&acirc;tres&rdquo; - Salle des f&ecirc;tes de Vouneuil sur Vienne</h4>\r\n<h5 class=\"card-text\">SAMEDI 6 avril - 20H30</h5>\r\n<p class=\"card-text\">Venez d&eacute;couvrir notre repr&eacute;sentation &ldquo;Coup de th&eacute;&acirc;tres&rdquo; &eacute;crite par S&eacute;bastien AZZOPARDI et Sacha<br>DANINO dans la salle des f&ecirc;tes de Vouneuil sur Vienne</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2024-04-06'),
(15, '“Coups de théâtres” - Salle des fêtes de Vouneuil sur Vienne', '2024-02-22 00:00:00', '<div class=\"row g-5\">\r\n<div class=\"col-md-4\"><img src=\"assets/imgs/affiche .png\" alt=\"\" class=\"w-100\"></div>\r\n<div class=\"col-md-6\">\r\n<div class=\"card-body\">\r\n<h4 class=\"card-title\">&nbsp;&ldquo;Coups de th&eacute;&acirc;tres&rdquo; - Salle des f&ecirc;tes de Vouneuil sur Vienne</h4>\r\n<h5 class=\"card-text\">Dimanche 7 avril - 20H30</h5>\r\n<p class=\"card-text\">Venez d&eacute;couvrir notre repr&eacute;sentation &ldquo;Coup de th&eacute;&acirc;tres&rdquo; &eacute;crite par S&eacute;bastien AZZOPARDI et Sacha<br>DANINO dans la salle des f&ecirc;tes de Vouneuil sur Vienne</p>\r\n</div>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 1, '2024-04-07'),
(16, '“Coups de théâtres” - Salle des fêtes de Saint Georges les Baillargeaux', '2024-02-22 00:00:00', '<div class=\"row g-5\">\r\n<div class=\"col-md-4\"><img src=\"assets/imgs/affiche .png\" alt=\"\" class=\"w-100\"></div>\r\n<div class=\"col-md-6\">\r\n<div class=\"card-body\">\r\n<h4 class=\"card-title\">&nbsp;&ldquo;Coups de th&eacute;&acirc;tres&rdquo; - Salle des f&ecirc;tes de Vouneuil sur Vienne</h4>\r\n<h5 class=\"card-text\">MERCREDI 21 avril - 20H30</h5>\r\n<p class=\"card-text\">Venez d&eacute;couvrir notre repr&eacute;sentation &ldquo;Coup de th&eacute;&acirc;tres&rdquo; &eacute;crite par S&eacute;bastien AZZOPARDI et Sacha<br>DANINO dans la salle des f&ecirc;tes de Vouneuil sur Vienne</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2024-04-21'),
(17, ' “Coups de théâtres” - Salle des fêtes de Saint Georges les Baillargeaux', '2024-02-22 00:00:00', '<div class=\"row g-5\">\r\n<div class=\"col-md-4\"><img src=\"assets/imgs/affiche .png\" alt=\"\" class=\"w-100\"></div>\r\n<div class=\"col-md-6\">\r\n<div class=\"card-body\">\r\n<h4 class=\"card-title\">&nbsp;&ldquo;Coups de th&eacute;&acirc;tres&rdquo; - Salle des f&ecirc;tes de Vouneuil sur Vienne</h4>\r\n<h5 class=\"card-text\">MARDI 20 avril - 20H30</h5>\r\n<p class=\"card-text\">Venez d&eacute;couvrir notre repr&eacute;sentation &ldquo;Coup de th&eacute;&acirc;tres&rdquo; &eacute;crite par S&eacute;bastien AZZOPARDI et Sacha<br>DANINO dans la salle des f&ecirc;tes de Vouneuil sur Vienne</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2024-04-20'),
(18, ' “Coups de théâtres” - Théâtre de la Montjoie / Monts-Sur-Guesnes', '2024-02-22 00:00:00', '<div class=\"row g-5\">\r\n<div class=\"col-md-4\"><img src=\"assets/imgs/affiche .png\" alt=\"\" class=\"w-100\"></div>\r\n<div class=\"col-md-6\">\r\n<div class=\"card-body\">\r\n<h4 class=\"card-title\">&nbsp;&ldquo;Coups de th&eacute;&acirc;tres&rdquo; - Salle des f&ecirc;tes de Vouneuil sur Vienne</h4>\r\n<h5 class=\"card-text\">MERCREDI 14 avril - 20H30</h5>\r\n<p class=\"card-text\">Venez d&eacute;couvrir notre repr&eacute;sentation &ldquo;Coup de th&eacute;&acirc;tres&rdquo; &eacute;crite par S&eacute;bastien AZZOPARDI et Sacha<br>DANINO dans la salle des f&ecirc;tes de Vouneuil sur Vienne</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2024-04-14');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `mot_de_passe`) VALUES
(1, 'admin', '$2y$10$9PSwFs.1.8JliMK1DywaTuaJ5JHrdwTeAplGh32AAoWst.ybENed.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
