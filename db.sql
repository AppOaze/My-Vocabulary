SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my-vocabulary`
--

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`) VALUES
(1, 'French', 'fr'),
(2, 'Spanish', 'es'),
(3, 'Chinese', 'ch');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'test@test.com', '$2y$10$opl3fL.e3lnSZjCVvhXii.klvBukgwDGthsxMfD41ss1zEW7X.CZC', 'Admin Tester', 0, 1, 1, 0, 1561650789, 1561676271, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(1, 1, 'bouarfamus@gmail.com', 'zEmmw-fYv7L3_WZh', '$2y$10$kyOOJHZmPEBclKbdjCGURenN99XRowymNI7JuqF6XVgfs97TkfVoC', 1561737189);

-- --------------------------------------------------------

--
-- Structure de la table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_remembered`
--

INSERT INTO `users_remembered` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(8, 1, 'jezuDWYmTjPrD3-JOm5uX3xs', '$2y$10$TliviU/lT.aZGlv.ZcQgXOH7.7lhYemPz3XjwfltCR73VJAcNMBwi', 1561676871);

-- --------------------------------------------------------

--
-- Structure de la table `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('1MKK6eBd7HcI2NBJd6m1i6hEaVRGlH5r65lk21FuE54', 73.0069, 1561650814, 1562190814),
('dMekzY9yhHh8NEq2_AejVZJ3CYEgeRYmUNanEJwnw_8', 4, 1561650789, 1562082789),
('t41Rv7EECU6avw1QJswL6Pc3geyJDoCaNXix1QFGLrY', 63.2228, 1561657245, 1562197245),
('MFjJBCIcwZ96_TWXiTocboXHf2K65S42MB-RgmyUuI4', 70.0895, 1561652065, 1562192065),
('WRoW8D0RRdKl7HhcNzyu9Widrtkxx3YSPGDZsrSNeVc', 70.2554, 1561667994, 1562207994),
('o_yd36OsoO1tBvZsEXtuBrTfUVxC2CBFyrpUhpMd-mA', 74, 1561662877, 1562202877),
('6QarahwBT1IEPhXL9gN4vsnj4o5Yo3WcssfOZK5DFfM', 74, 1561664613, 1562204613),
('g7taCiA4xQlS6EejDtYBQPyDXaH8uIIUbcCjspdrZQE', 74, 1561675770, 1562215770),
('lFJSkfKIgEPqFvGD1lmpoxvJEDoMYU-xNlew4Rzpfik', 74, 1561670972, 1562210972),
('Y19bPMt35_HCuxjHecGNdY8naB6hUmisYhFZ39k8fLw', 74, 1561676271, 1562216271);

-- --------------------------------------------------------

--
-- Structure de la table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `words`
--

INSERT INTO `words` (`id`, `user_id`, `name`) VALUES
(5, 1, 'Car'),
(6, 1, 'Hello'),
(7, 1, 'Banana'),
(8, 1, 'Computer'),
(9, 1, 'Pen'),
(10, 1, 'Parfum'),
(12, 1, 'House'),
(13, 1, 'Square'),
(14, 1, 'Bed'),
(16, 1, 'Fan'),
(20, 1, 'Finger');

-- --------------------------------------------------------

--
-- Structure de la table `word_language`
--

CREATE TABLE `word_language` (
  `word_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name_translated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `word_language`
--

INSERT INTO `word_language` (`word_id`, `language_id`, `name_translated`) VALUES
(5, 1, 'Voiture'),
(5, 3, '汽车'),
(6, 1, 'Bonjour'),
(6, 2, 'Buenos dias'),
(7, 1, 'Banane'),
(8, 1, 'Ordinateur'),
(9, 1, 'Stylo'),
(9, 3, '筆'),
(10, 1, 'Perfume'),
(12, 3, '房子'),
(13, 3, '广场'),
(14, 2, 'Cama'),
(16, 2, 'Ventilador'),
(17, 3, '你好'),
(20, 1, 'Doigt');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Index pour la table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- Index pour la table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `word_language`
--
ALTER TABLE `word_language`
  ADD UNIQUE KEY `word_id` (`word_id`,`language_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
