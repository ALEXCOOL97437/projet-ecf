-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 17, 2023 at 05:55 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamesoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `id_jeu` int(11) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `games_avis` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `id_jeu`, `pseudo`, `games_avis`, `date`) VALUES
(4, 1, 'cra', 'mal', NULL),
(10, 1, 'cra', 'tres bien', NULL),
(11, 1, 'cra', 'mal', NULL),
(12, 1, 'cra', 'gtr', NULL),
(14, 1, 'cra', 'gtr', NULL),
(19, 1, 'feca', 'kkkkkkk', NULL),
(20, 1, 'poi', 'moi', '2023-09-15 00:00:00'),
(21, 1, 'feca', 'Dès les premières minutes de jeu, j\'ai été frappé par la médiocrité des graphismes et de l\'animation. Les textures sont floues, les modèles de personnages manquent de détails et l\'environnement est d\'une monotonie décourageante.', '2023-09-16 17:55:09'),
(22, 6, 'yukioh', 'Le gameplay est tout aussi décevant. Les mécaniques de combat sont répétitives et peu innovantes. Les contrôles sont maladroits et peu intuitifs, ce qui rend l\'expérience de jeu frustrante et peu engageante.  L\'histoire est insipide et prévisible, ne parvenant pas à susciter le moindre intérêt pour le scénario ou les personnages. Les dialogues sont clichés et manquent d\'originalité, ne parvenant pas à immerger le joueur dans l\'univers du jeu.  De plus, le jeu est truffé de bugs et de problèmes techniques. J\'ai rencontré des chutes de framerate, des plantages fréquents, et même des problèmes de sauvegarde qui ont effacé mes progrès, ce qui a grandement affecté mon expérience globale.', '2023-09-16 21:28:57'),
(23, 8, 'cra', 'J\'ai récemment joué à \'The The story of lien\' et je dois dire que c\'est une expérience de jeu exceptionnelle. L\'histoire est profondément émotionnelle, complexe et bien écrite, ce qui m\'a vraiment captivé du début à la fin. ', '2023-09-17 21:03:12'),
(24, 8, 'feca', 'Les graphismes sont à couper le souffle et contribuent à l\'immersion totale dans ce monde post-apocalyptique. ', '2023-09-17 21:11:03'),
(25, 7, 'yukioh', ' Les mécaniques de jeu sont fluides et bien pensées, offrant un mélange parfait d\'action, de stratégie et de réflexion. De plus, la bande sonore est époustouflante, ajoutant une dimension supplémentaire à l\'atmosphère du jeu.', '2023-09-17 21:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_jeu`, `id_membre`) VALUES
(2, 1, 41),
(3, 6, 43);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `descriptif` text,
  `studio` varchar(255) DEFAULT NULL,
  `support` varchar(255) DEFAULT NULL,
  `priorite_developpement` int(11) DEFAULT NULL,
  `moteur` varchar(100) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_maj` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `nombre_joueurs` int(11) DEFAULT NULL,
  `créateur_du_jeu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `titre`, `descriptif`, `studio`, `support`, `priorite_developpement`, `moteur`, `date_creation`, `date_maj`, `date_sortie`, `budget`, `statut`, `genre`, `nombre_joueurs`, `créateur_du_jeu`) VALUES
(1, 'BioSphere: The Green Quest', 'Explorez un monde fantastique dans notre RPG épique où vous incarnez une héroïne éco-guerrière. Protégez la nature, affrontez les ennemis de l\'écosystème, et apprenez les pouvoirs de la biodiversité pour sauver la planète. Votre mission consistera à résoudre des énigmes environnementales, guider les animaux en danger vers des zones sûres, et affronter les adversaires qui cherchent à détruire les sanctuaires naturels. Interagissez avec des personnages non-joueurs pour sensibiliser à la préservation de la nature et encourager les changements positifs dans le comportement humain.', 'gamesoft', 'ordinateur', 1, 'unity', '2023-09-13', '2023-09-13', '2024-10-13', '54000.00', 'en développement', 'action, aventure', 1, 'développeur 1, développeur 2'),
(2, 'Morceau Salami : Gardien de la jungle', 'Incarnez le célèbre Morceau Salami dans une aventure épique où la préservation de la nature est au cœur de chaque action. Plongez dans un univers luxuriant et magique où vous devrez défendre votre jungle bien-aimée des menaces qui pèsent sur elle. En tant que gardien de la jungle, vous utiliserez les incroyables pouvoirs et capacités du Marsupial pour affronter les ennemis qui cherchent à détruire l\'équilibre naturel. Utilisez votre queue extensible pour vous balancer à travers la canopée, attraper des objets et repousser les intrus. Résolvez des énigmes environnementales complexes pour restaurer la paix dans votre écosystème.', 'gamesoft', 'xboite', 3, 'unity', '2023-07-06', '2023-08-25', '2024-09-08', '10000.00', 'en développement', 'aventure, plateforme', 1, 'développeur3'),
(3, 'Elaria : Gardienne de la Forêt Enchantée', 'Plongez dans l\'univers magique de \"Elaria : Gardienne de la Forêt Enchantée\" et incarnez Elaria, une puissante elfe dédiée à la préservation de la nature. Vous vous trouvez au cœur d\'une forêt ancestrale où la biodiversité est menacée par des forces sombres et destructrices. En tant que gardienne de cette forêt, votre mission est de la protéger et de restaurer son équilibre naturel. Au fil de votre aventure, vous devrez affronter des ennemis maléfiques qui cherchent à exploiter la magie de la forêt pour leurs propres gains. Utilisez des sorts élémentaires, maîtrisez l\'art de la métamorphose en créatures de la forêt, et formez des alliances avec d\'autres gardiens de la nature pour défendre votre territoire.  Chaque décision que vous prendrez dans le jeu aura un impact sur l\'écosystème de la forêt. Serez-vous capable de protéger la Forêt Enchantée et de ramener l\'harmonie dans ce monde magique ', 'gamesoft', 'xboite', 4, 'unity', '2023-03-09', '2023-07-28', '2024-02-18', '70000.00', 'en développement', 'action, aventure', 4, 'développeur 1, développeur 3'),
(4, '7 DAYS TO LIVES', 'Dans \"7 DAYS TO LIVES \", vous vous lancez dans une aventure poignante et intense où chaque seconde compte. Vous incarnez Alex, un écologiste intrépide diagnostiqué avec une maladie rare, ne lui laissant que 7 jours à vivre. Son ultime quête : sauver l\'environnement avant que son temps ne s\'épuise.Vous commencez votre périple dans une métropole sur le point de succomber aux ravages de la pollution et de la surconsommation. Votre mission est de sensibiliser la population, de mettre en œuvre des changements et de restaurer l\'équilibre écologique dans un temps limité.Pendant ces 7 jours, votre santé s\'affaiblira progressivement, reflétant la réalité du délai imparti. Vous devrez gérer votre énergie et votre temps judicieusement pour maximiser votre impact. Chaque action compte, mais chaque repos aussi. Le jeu souligne l\'importance de l\'efficacité et de la persévérance dans la lutte pour la préservation de la Terre.', 'gamesoft', 'ordinateur', 2, 'unity', '2021-06-09', '2023-02-16', '2023-01-12', '40000.00', 'en développement', 'jeu de tir', 1, 'développeur 2, développeur 3'),
(5, 'Fatal Fantasy', 'Dans \"L\'Écoguerrier : Héros de la Nature\", plongez dans un monde fantastique où la défense de la nature est le cœur de votre quête. Incarnez Eryndor, un puissant guerrier rejeté par son clan belliqueux car il refuse de participer à la destruction de l\'écosystème au nom de l\'avarice. Rejeté et isolé, Eryndor se lance dans une mission solitaire pour protéger la nature des ravages de l\'homme.  L\'histoire démarre dans une vaste contrée menacée par la cupidité et la pollution. Vous devrez affronter des ennemis corrompus qui exploitent les richesses de la terre pour leur profit personnel. Utilisez vos compétences de combat et votre connaissance de la nature pour inverser la tendance et défendre la faune et la flore de votre monde.  Voyagez à travers des paysages variés, des forêts luxuriantes aux déserts arides, en passant par des montagnes enneigées. Recrutez des alliés parmi les défenseurs de l\'environnement, des créatures magiques et des esprits de la nature, tous unis dans le but de restaurer l\'harmonie entre l\'humanité et la Terre.', 'gamesoft', 'ordinateur, xboite', 5, 'UNREAL', '2023-08-31', '2023-12-22', '2026-03-05', '80000.00', 'en développement', 'action, aventure, rpg', 1, 'développeur3, développeur4, développeur5'),
(6, 'Neige Éternelle : Renaissance du Village Gelé', 'Dans \"Neige Éternelle : Renaissance du Village Gelé\", vivez une aventure épique et émouvante au cœur d\'un village enneigé menacé par la folie d\'un tyran assoiffé de pouvoir. Incarnez deux jeunes paysannes courageuses, Aria et Hong JING, qui refusent de se soumettre et décident de lutter pour la survie de leur communauté et la préservation de leur environnement givré.L\'histoire commence dans un paisible village de montagne, où la vie prospère grâce à la symbiose harmonieuse avec la nature enneigée. Cependant, un tyran tyrannique, le Seigneur Arcturus, envahi la région, déterminé à détruire le village pour affirmer sa supériorité.Explorez des paysages enneigés à couper le souffle, engagez-vous dans des combats stratégiques et découvrez des secrets cachés pour recueillir des ressources et soutenir la reconstruction de votre village détruit.Dans le jeu, vous aurez la possibilité de gérer et reconstruire votre village, en plantant des plantes résistantes au froid, en élevant du bétail, en secourant les villageois en détresse et en rétablissant l\'ordre et la sécurité. Faites preuve de créativité pour développer des stratégies de restauration uniques et revaloriser l\'environnement endommagé.', 'gamesoft', 'ordinateur', 6, 'CryEngine', '2021-02-04', '2023-03-31', '2023-08-11', '46000.00', 'en développement', 'Gestion, Simulation de vie, RPG ', 2, 'développeur 1, développeur 2, développeur 7'),
(7, 'Écoaetherium : Renaissance de Sylvanterra', 'Dans ', 'gamesoft', 'ordinateur, xboite', 10, 'CryEngine', '2023-09-01', '2023-09-15', '2025-05-07', '75000.00', 'en développement', 'MMORPG, Simulation de vie ', 64, 'développeur3, développeur4, développeur5, développeur 6'),
(8, 'The story of Lien', 'Dans \"The Story of Lien : vous incarnez Lien, un jeune elfe courageux dont le village a été ravagé par les hommes avides de richesses et de pouvoir. Votre quête commence alors que vous partez en voyage pour sauver la princesse Mathilda, gardienne de la forêt et dernier espoir pour contrecarrer les sinistres plans d\'un seigneur immonde.  L\'histoire démarre dans une vallée enchantée, où la nature et la magie coexistent en parfaite harmonie. Cependant, une armée menée par le seigneur avide a envahi la vallée, dévastant tout sur son passage. Vous devez rallier les créatures magiques et les alliés du monde enchanté pour restaurer la paix et sauver Mathilda, la princesse dotée de pouvoirs mystiques. La vraie richesse dans ce jeu réside dans la préservation de la nature et la défense de ceux qui ne peuvent se défendre. Votre mission est d\'unir les peuples de la vallée, de restaurer l\'équilibre et de protéger la magie de la forêt contre l\'avidité des hommes.', 'gamesoft', 'xboite', 7, 'UNREAL', '2022-11-03', '2023-09-15', '2024-11-23', '37000.00', 'en développement', 'action, aventure', 1, 'développeur 7, développeur 3'),
(9, 'Rivière des Âmes : Renaissance Aquatique', 'Dans \"Rivière des Âmes : Renaissance Aquatique\", plongez dans un vaste MMORPG où les joueurs doivent s\'unir pour sauver une rivière contaminée par les rejets toxiques d\'une usine défaillante. Votre quête commence dans un monde où la rivière était autrefois une source de vie, mais elle est désormais une menace pour l\'écosystème et les habitants locaux.Incarnant des Gardiens de l\'Aqua, vous devrez collaborer avec d\'autres joueurs pour purifier la rivière et restaurer l\'équilibre de l\'environnement.Chaquueur peut choisir un rôle spécialisé, que ce soit un nettoyeur d\'eau, un biologiste aquatique, un ingénieur environnemental ou un guerrier de la nature. Chaque rôle a des compétences et des capacités uniques essentielles pour résoudre les problèmes environnementaux et combattre les ennemis qui polluent la rivière.', 'gamesoft', 'ordinateur', 8, 'UNITY', '2022-09-02', '2023-12-14', '2023-12-21', '63500.00', 'en développement', 'MMORPG, simulation, aventure', 32, 'développeur3, développeur 6'),
(10, 'L\'Errance des Glaces : Sauvetage du Village Perdu', 'Dans ', 'gamesoft', 'ordinateur, xboite', 9, 'CryEngine', '2022-09-09', '2024-01-11', '2024-01-16', '53700.00', 'en développement', 'MMORPG', 32, 'développeur 1, développeur 2'),
(11, 'The shadow of the forest', 'Dans  \"The shadow of the forest\", plongez dans un monde de magie et d\'intrigue où une ninja, envoyée par l\'esprit de la forêt, se bat contre un seigneur tyrannique déterminé à détruire la faune et la flore pour bâtir une ville moderne. Vous incarnez Ame, la Lame de la Nature, et votre mission est de défendre la nature contre les forces de la destruction. Rencontrez des alliés inattendus, dont des animaux magiques et des esprits de la forêt, qui vous aideront à affronter les sbires du seigneur et à dévoiler la vérité sur son plan destructeur.Votre combat ne se limite pas aux affrontements physiques. Vous devrez sensibiliser la population et rallier des soutiens pour votre cause. Créez des alliances avec d\'autres factions désireuses de préserver la nature, et faites entendre votre voix pour inspirer le changement et protéger l\'environnement.', 'gamesoft', 'ordinateur, xboite', 11, 'CryEngine', '2023-06-01', '2024-04-14', '2024-06-20', '47500.00', 'en développement', 'action, aventure, rpg', 1, 'développeur 6, développeur 7');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `id_jeu`, `id_membre`) VALUES
(4, 1, 47),
(36, 1, 19),
(44, 1, 40),
(49, 2, 41),
(51, 8, 19),
(52, 8, 41),
(53, 7, 43);

-- --------------------------------------------------------

--
-- Table structure for table `producteurs`
--

CREATE TABLE `producteurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producteurs`
--

INSERT INTO `producteurs` (`id`, `pseudo`, `mdp`) VALUES
(1, 'developer1', '$2y$10$3aLJIji8wBkocfuKU8BP2OmZ2/ntNJIv9VXnGKjziV6ZgQmtpWOpy'),
(2, 'developer2', '$2y$10$jVCUSkzBl478rzeIvYNnQeBbvk6Aah4wTv3iq7ylpe5tu1oVSwaN.'),
(3, 'developer3', '$2y$10$JMHfGzXn137lqlpcgugA9OqFbLIdo6YhHFd94UdmcYTc5/QtrRY4K'),
(6, 'developer4', '$2y$10$hQSpJTmaxMgl.r0cwqgzdeoCCKPkXzsgaKvH86/uz3.cw5SGpfzDe'),
(7, 'developer5', '$2y$10$MgV0tBKfE0Zcidsts1ld5OVbtkVmZSJ..hSObOcZ1C.djNvuStKM6'),
(8, 'developer6', '$2y$10$FUNULWa7uq.5LPs4BKR2mOiZLDXb0q23r3LepfAs6gJ46uEn.96tq'),
(9, 'developer7', '$2y$10$yhYSIRWzb3xGQJ5bo7HFdud2svdW4s09vyDLYoxdFtwodiVaCW1lO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `email`) VALUES
(3, 'MariaBOE', '$2y$10$uvDtgXWXOuyZpFiYQU0BnezqHyyrNydaEoCKlX9JCW9.TYBcOqtAO', ''),
(19, 'cra', '$2y$10$ZeYg9y0YLPVcAJcgHuY69eiDAaEPpXb2DFmpkRG3Er5OME3U1nCS2', 'testalex.studi@gmail.com'),
(40, 'poi', '$2y$10$YLXDr/hHhW7yozu2.jlMaOxt8BEr9uxzHpc38nTAareAyoOb/pJP6', 'jepifo7260@picvw.com'),
(41, 'feca', '$2y$10$D39c8WVFmStZz22zsD21Lu8.Hm6INPAPklTo3ZzF8o6mHMebf5SOu', 'alex.wolff97437@gmail.com'),
(42, 'zaze', '$2y$10$OKXRahQ4SJgZIHesvkOyBuxTOVQu1OOoki.4SZfVe2TJQk5kHVQaq', 'sokoji5294@utwoko.com'),
(43, 'yukioh', '$2y$10$K82EGjCIUNGy7zptIyqfoueYlBsD1oKzzvyQn.wD0XtjfvRNwYQe6', 'tapimop419@utwoko.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producteurs`
--
ALTER TABLE `producteurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `producteurs`
--
ALTER TABLE `producteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
