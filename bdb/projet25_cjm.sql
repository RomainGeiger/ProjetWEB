-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 mai 2025 à 13:59
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
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_panier` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `panier` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `request` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_clients`, `feedback`) VALUES
(8, 2, '\"Votre astuce pour \'muscler le doigt en changeant de chaîne TV\' m\'a changé la vie ! Fini la culpabilité du sport ! Maintenant, je passe des heures à zapper tout en prenant soin de ma forme. Qui a besoin de courir quand on peut télécommander ?\"'),
(9, 3, '\"Vous m\'avez libérée des \'5 fruits et légumes\' avec votre article \'Les pizzas comptent-elles comme salade composée ?\' Maintenant, je mange mon \'salade tomate oignon\' tous les jours ! Merci pour cette découverte !\"'),
(10, 4, '\"Depuis que j\'ai adopté la technique du snacking à volonté, c\'est simple : je n\'ai jamais faim ! Pourquoi attendre l\'heure des repas ? Maintenant, j\'ai toujours un paquet de chips à portée de main. Merci pour la liberté !\"'),
(11, 5, '\"Dormir juste après chaque repas ? Une révolution ! Avant, j’avais de l’insomnie. Maintenant, je dors toute la journée. Qui aurait cru que les siestes post-repas étaient la solution miracle ? Merci, la vie est douce.\"'),
(12, 6, '\"Votre guide \'10 excuses pour éviter l’exercice\' est tout simplement brillant ! Avant, je me sentais coupable de ne pas courir. Maintenant, je suis sereine et repose mes chevilles sur le canapé. Vive la relaxation !\"'),
(13, 7, '\"Depuis que j’ai remplacé le lait par la crème glacée dans mes céréales, chaque matin est un bonheur. Mon petit-déjeuner a le goût du dessert, et je me sens comme un roi ! Ma balance est peut-être moins fan, mais moi je suis ravi !\"'),
(14, 14, 'aaa'),
(15, 14, 'test\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_historique` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `historique` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `id_order` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `programme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `numero_de_tel` varchar(64) NOT NULL,
  `adresse_email` varchar(64) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `numero_de_tel`, `adresse_email`, `mot_de_passe`, `estAdmin`, `age`) VALUES
(1, 'Dupont', 'Bertrand', '0606060606', 'test@gmail.com', 'testtest2025', 0, 19),
(2, 'Dupont', 'Georges', '065489794', 'dupont.georges@gmail.com', 'test1', 0, 51),
(3, 'Dupont', 'Martine', '064794165', 'dupont.martine@gmail.com', 'test2', 0, 54),
(4, 'Dupont', 'Tom', '064598714', 'dupont.tom@gmail.com', 'test3', 0, 18),
(5, 'Dupont', 'Alex', '065449413', 'dupont.alex@gmail.com', 'test4', 0, 29),
(6, 'Dupont', 'Fatima', '06494949', 'dupont.fatima@gmail.com', '079494649', 0, 38),
(7, 'Dupont', 'Olivier', '06499841', 'dupont.olivier@gmail.com', '067949741', 0, 41),
(14, 'Geiger', 'Romain', '0671464791', 'geigerromain@gmail.com', '$2y$10$.yW6iNixIP/BUhA4u9ARuucLxH3jjRREjZXwABKE.uv3PRmAxYFYa', 0, 19),
(15, 'Client', 'Client', '067569762', 'compteclient@gmail.com', '$2y$10$uZ18.mii9aclvmExHW9yWez/ILcNUUOFUuOCw2X17FALC10EtxfVK', 0, 25),
(16, 'Admin', 'Admin', '067797895', 'compteadmin@gmail.com', '$2y$10$Nf537ZTQKal/4cSCowgiEO0Yf6DOwV6dbtkD4ML36Sbs4QHXV/Qm6', 1, 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `LiaisonClientBoutique` (`id_clients`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `LiaisonClientContact` (`id_clients`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `LiaisonClientFeedback` (`id_clients`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `LiaisonClientHistorique` (`id_clients`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `LiaisonClientProgramme` (`id_clients`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id_historique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `programme`
--
ALTER TABLE `programme`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `LiaisonClientBoutique` FOREIGN KEY (`id_clients`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `LiaisonClientContact` FOREIGN KEY (`id_clients`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `LiaisonClientFeedback` FOREIGN KEY (`id_clients`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `LiaisonClientHistorique` FOREIGN KEY (`id_clients`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `LiaisonClientProgramme` FOREIGN KEY (`id_clients`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
