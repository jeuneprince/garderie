-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 09 déc. 2020 à 15:31
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `garderie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cadeaux`
--

CREATE TABLE `cadeaux` (
  `idcadeaux` int(11) NOT NULL,
  `nomfete` varchar(45) NOT NULL,
  `nomcadeau` varchar(45) NOT NULL,
  `enfants_idenfants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cadeaux`
--

INSERT INTO `cadeaux` (`idcadeaux`, `nomfete`, `nomcadeau`, `enfants_idenfants`) VALUES
(1, 'noel', 'voiture', 1),
(2, 'noel', 'poupee', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idcommentaires` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `commentaire` longtext NOT NULL,
  `note` float NOT NULL,
  `gardiennes_idgardiennes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idcommentaires`, `nom`, `prenom`, `commentaire`, `note`, `gardiennes_idgardiennes`) VALUES
(1, 'Akré', 'Akissi', 'Tres bonne ', 93, 1),
(2, 'Traore', 'Fatim', 'Mauvaise gardienne', 16, 2),
(3, 'traore', 'Akissi', 'bien', 80, 1),
(4, 'kouame', 'Gabrielle', 'bien', 75, 2),
(8, 'Anonyme', 'Anonyme', 'Je veux inscrire mon fils car le site est trop beau', 97, 3),
(11, 'traore', 'Akissi', 'HJHJ', 93, 1),
(12, 'traore', 'Akissi', 'SAJS', 95, 1);

--
-- Déclencheurs `commentaires`
--
DELIMITER $$
CREATE TRIGGER `prioriteemploye` AFTER INSERT ON `commentaires` FOR EACH ROW BEGIN
UPDATE priorite
SET classement =
(SELECT ROUND (AVG (note), 2)
FROM commentaires
WHERE gardiennes_idgardiennes = NEW.gardiennes_idgardiennes)
WHERE id_gardienne =  NEW.gardiennes_idgardiennes;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

CREATE TABLE `enfants` (
  `idenfants` int(11) NOT NULL,
  `nomenfant` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenomenfant` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `parents_idparents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfants`
--

INSERT INTO `enfants` (`idenfants`, `nomenfant`, `prenomenfant`, `datedenaissance`, `parents_idparents`) VALUES
(1, 'Soumare', 'Amanda', '2020-11-09', 1),
(2, 'Soumare', 'Fatim', '2016-06-19', 1),
(6, 'Traore', 'Jacob', '2018-11-16', 2),
(7, 'Soumare', 'Jean', '2020-11-10', 1),
(12, 'Sande', 'Marc', '2020-11-10', 2),
(13, 'kdkd', 'Amandaa', '2020-11-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gardiennes`
--

CREATE TABLE `gardiennes` (
  `idgardiennes` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `session` varchar(45) NOT NULL,
  `trancheage` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gardiennes`
--

INSERT INTO `gardiennes` (`idgardiennes`, `nom`, `prenom`, `session`, `trancheage`) VALUES
(1, 'Konan', 'Jacqueline', 'automne', 'de 0 a 2 ans'),
(2, 'Kouame', 'Gabrielle', 'automne', 'de 0 a 2 ans'),
(3, 'Seri', 'Akissi', 'automne', 'de 3 a 5 ans'),
(4, 'Ouattara', 'Marie', 'automne', 'de 3 a 5 ans'),
(5, 'souleymane', 'soumare', 'automne', 'de 2 a 6 ans');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `idinscriptions` int(11) NOT NULL,
  `dateincription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enfants_idenfants` int(11) NOT NULL,
  `gardiennes_idgardiennes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`idinscriptions`, `dateincription`, `enfants_idenfants`, `gardiennes_idgardiennes`) VALUES
(1, '2020-11-28 00:00:00', 7, 1),
(2, '2020-11-30 15:56:03', 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `idparents` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `adresse` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`idparents`, `nom`, `prenom`, `contact`, `adresse`) VALUES
(1, 'Soumare', 'Souleymane', '4383572519', '454 boulevard jutras '),
(2, 'Traore', 'Seydou', '4383572520', '598 bois francs'),
(5, 'Sande', 'Joel', '3659871452', 'de la creche');

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

CREATE TABLE `priorite` (
  `id` int(11) NOT NULL,
  `classement` float NOT NULL,
  `id_gardienne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `priorite`
--

INSERT INTO `priorite` (`id`, `classement`, `id_gardienne`) VALUES
(1, 90.25, 1),
(2, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
  `id` int(11) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nomdefamille` varchar(50) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_les_enfants`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_les_enfants` (
`nomenfant` varchar(45)
,`prenomenfant` varchar(45)
,`datedenaissance` date
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_les_enfants`
--
DROP TABLE IF EXISTS `v_les_enfants`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_les_enfants`  AS  select `enfants`.`nomenfant` AS `nomenfant`,`enfants`.`prenomenfant` AS `prenomenfant`,`enfants`.`datedenaissance` AS `datedenaissance` from `enfants` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD PRIMARY KEY (`idcadeaux`),
  ADD KEY `fk_cadeaux_enfants1_idx` (`enfants_idenfants`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idcommentaires`),
  ADD KEY `fk_commentaires_gardiennes1_idx` (`gardiennes_idgardiennes`);

--
-- Index pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD PRIMARY KEY (`idenfants`),
  ADD KEY `fk_enfants_parents_idx` (`parents_idparents`);

--
-- Index pour la table `gardiennes`
--
ALTER TABLE `gardiennes`
  ADD PRIMARY KEY (`idgardiennes`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`idinscriptions`),
  ADD KEY `fk_inscriptions_enfants1_idx` (`enfants_idenfants`),
  ADD KEY `fk_inscriptions_gardiennes1_idx` (`gardiennes_idgardiennes`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`idparents`);

--
-- Index pour la table `priorite`
--
ALTER TABLE `priorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gardienne` (`id_gardienne`);

--
-- Index pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cadeaux`
--
ALTER TABLE `cadeaux`
  MODIFY `idcadeaux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idcommentaires` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `enfants`
--
ALTER TABLE `enfants`
  MODIFY `idenfants` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `gardiennes`
--
ALTER TABLE `gardiennes`
  MODIFY `idgardiennes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `idinscriptions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `parents`
--
ALTER TABLE `parents`
  MODIFY `idparents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `priorite`
--
ALTER TABLE `priorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD CONSTRAINT `fk_cadeaux_enfants1` FOREIGN KEY (`enfants_idenfants`) REFERENCES `enfants` (`idenfants`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_gardiennes1` FOREIGN KEY (`gardiennes_idgardiennes`) REFERENCES `gardiennes` (`idgardiennes`);

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `fk_enfants_parents` FOREIGN KEY (`parents_idparents`) REFERENCES `parents` (`idparents`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `fk_inscriptions_enfants1` FOREIGN KEY (`enfants_idenfants`) REFERENCES `enfants` (`idenfants`),
  ADD CONSTRAINT `fk_inscriptions_gardiennes1` FOREIGN KEY (`gardiennes_idgardiennes`) REFERENCES `gardiennes` (`idgardiennes`);

--
-- Contraintes pour la table `priorite`
--
ALTER TABLE `priorite`
  ADD CONSTRAINT `id_gardienne` FOREIGN KEY (`id_gardienne`) REFERENCES `gardiennes` (`idgardiennes`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
