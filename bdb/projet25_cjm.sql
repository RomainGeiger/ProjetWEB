-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 22 avr. 2025 à 10:07
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet25_cjm`
--

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `contenu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `nom`, `age`, `contenu`) VALUES
(1, 'Romain', 19, 'Je recommande !'),
(2, 'Thomas', 19, 'Pas mal mais peut mieux faire'),
(9, 'Georges', 51, 'Votre astuce pour ‘muscler le doigt en changeant de chaîne TV’ m’a changé la vie ! Fini la culpabilité du sport ! Maintenant, je passe des heures à zapper tout en prenant soin de ma forme. Qui a besoin de courir quand on peut télécommander ?'),
(20, 'Martine', 54, 'Vous m\'avez libérée des \"5 fruits et légumes\" avec votre article \"Les pizzas comptent-elles comme salade composée ?\" Maintenant, je mange mon \"salade tomate oignon\" tous les jours ! Merci pour cette découverte !'),
(21, 'Tom', 18, 'Depuis que j\'ai adopté la technique du snacking à volonté, c\'est simple : je n\'ai jamais faim ! Pourquoi attendre l\'heure des repas ? Maintenant, j\'ai toujours un paquet de chips à portée de main. Merci pour la liberté !'),
(22, 'Alex', 29, 'Dormir juste après chaque repas ? Une révolution ! Avant, j’avais de l’insomnie. Maintenant, je dors toute la journée. Qui aurait cru que les siestes post-repas étaient la solution miracle ? Merci, la vie est douce.'),
(23, 'Fatima', 38, 'Votre guide \"10 excuses pour éviter l’exercice\" est tout simplement brillant ! Avant, je me sentais coupable de ne pas courir. Maintenant, je suis sereine et repose mes chevilles sur le canapé. Vive la relaxation !'),
(24, 'Olivier', 41, 'Depuis que j’ai remplacé le lait par la crème glacée dans mes céréales, chaque matin est un bonheur. Mon petit-déjeuner a le goût du dessert, et je me sens comme un roi ! Ma balance est peut-être moins fan, mais moi je suis ravi !');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
