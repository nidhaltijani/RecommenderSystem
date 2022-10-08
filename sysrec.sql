-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 23:17
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sysrec`
--

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idUser` int(11) NOT NULL,
  `pdt1` int(11) NOT NULL,
  `pdt2` int(11) NOT NULL,
  `pdt3` int(11) NOT NULL,
  `pdt4` int(11) NOT NULL,
  `pdt5` int(11) NOT NULL,
  `pdt6` int(11) NOT NULL,
  `pdt7` int(11) NOT NULL,
  `pdt8` int(11) NOT NULL,
  `pdt9` int(11) NOT NULL,
  `pdt10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idUser`, `pdt1`, `pdt2`, `pdt3`, `pdt4`, `pdt5`, `pdt6`, `pdt7`, `pdt8`, `pdt9`, `pdt10`) VALUES
(1, 0, 1, 5, 3, 4, 2, 0, 4, 1, 0),
(2, 0, 1, 1, 1, 5, 4, 3, 0, 4, 2),
(3, 5, 5, 3, 0, 1, 1, 1, 2, 0, 0),
(4, 0, 2, 3, 0, 0, 2, 5, 5, 5, 0),
(5, 1, 1, 1, 1, 5, 5, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `noteprediction`
--

CREATE TABLE `noteprediction` (
  `idUser` int(11) NOT NULL,
  `pdt1` float NOT NULL,
  `pdt2` float NOT NULL,
  `pdt3` float NOT NULL,
  `pdt4` float NOT NULL,
  `pdt5` float NOT NULL,
  `pdt6` float NOT NULL,
  `pdt7` float NOT NULL,
  `pdt8` float NOT NULL,
  `pdt9` float NOT NULL,
  `pdt10` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `noteprediction`
--

INSERT INTO `noteprediction` (`idUser`, `pdt1`, `pdt2`, `pdt3`, `pdt4`, `pdt5`, `pdt6`, `pdt7`, `pdt8`, `pdt9`, `pdt10`) VALUES
(1, 0.289608, 0, 0, 1.69773, 4.65114, 0, 0, 0, 0, 0.723058),
(2, 0.289608, 0, 0, 1.69773, 4.65114, 0, 0, 0, 0, 0.723058),
(3, 0.289608, 0, 0, 1.69773, 4.65114, 0, 0, 0, 0, 0.723058),
(4, 0.289608, 0, 0, 1.69773, 4.65114, 0, 0, 0, 0, 0.723058),
(5, 0.289608, 0, 0, 1.69773, 4.65114, 0, 0, 0, 0, 0.723058);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idPdt` int(11) NOT NULL,
  `nomPdt` varchar(100) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `top1` int(11) NOT NULL,
  `top2` int(11) NOT NULL,
  `top3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idPdt`, `nomPdt`, `Description`, `genre`, `auteur`, `top1`, `top2`, `top3`) VALUES
(1, 'La Petite Maison dans la prairie, tome 2 : Au bord du ruisseau', 'La série La petite maison dans la prairie constitue les souvenirs authentiques de Laura, tels qu\'elle les a racontés bien des années plus tard. Ces souvenirs décrivent la vie de pionnier de la famille Ingalls dans la Jeune Amérique de la période 1870-1890.\nLa famille Ingalls quitte le Wisconsin en vue de s\'installer dans l\'Ouest américain, là où les colons sont peu nombreux et le gibier foisonnant.\nLe père, Charles, emmène avec lui sa femme Caroline et ses trois filles, Marie, Laura et Carrie, en chariot bâché. Après avoir traversé une rivière en crue, la famille s\'installe sur une vaste plaine du Kansas, en plein milieu d\'un territoire indien.\nCharles bâtit une maison en bois, seul puis à l\'aide de différents colons venus s\'installer à proximité : M. Edwards et M. et Mme Scott.', '', 'Laura Ingalls Wilder', 10, 4, 5),
(2, 'La saga d\'Anne, tome 1 : La Maison aux pignons verts', 'Sur le quai de la gare, Matthew Cuthbert attend l’orphelin qui doit les aider, sa sœur Marilla et lui, aux travaux de la ferme. Mais c’est une petite rouquine aux yeux pétillants qui se présente... N’ayant pas le cœur de la renvoyer sur-le-champ, Matthew l’emmène dans leur maison aux pignons verts.\r\nVive et pleine d’esprit, Anne parvient bien vite à conquérir Marilla et Matthew grâce à son imagination débordante, sa détermination et sa débrouillardise.\r\nMais il ne faut pas longtemps avant que la fillette se retrouve dans de beaux draps. Par chance, il est devenu impossible pour les Cuthbert et les habitants d’Avonlea d’imaginer une existence sans elle. L’arrivée d’Anne a changé leur vie...', '', 'Lucy Maud Montgomery', 6, 3, 1),
(3, 'La Maison aux esprits', 'Une grande saga familiale dans une contrée qui ressemble à s\'y méprendre au Chili. Entre les différentes générations, entre la branche des maîtres et celle des bâtards, entre le patriarche, les femmes de la maison, les domestiques, les paysans du domaine, se nouent et se dénouent des relations marquées par l\'absolu de l\'amour, la familiarité de la mort, la folie douce ou bestiale des uns et des autres, qui reflètent et résument les vicissitudes d\'un pays passé en quelques décennies des rythmes ruraux et des traditions paysannes aux affrontements fratricides et à la férocité des tyrannies modernes.\nIsabel Allende a quitté le Chili après le coup d’État militaire. \'La Maison aux esprits\', son premier roman, tantôt enchanteur, tantôt mordant, est à inscrire parmi les révélations de la littérature latino-américaine d\'aujourd\'hui. Il est traduit dans une dizaine de pays et a obtenu le prix du Grand Roman d\'évasion 1984.', '', 'Isabel Allende', 5, 10, 2),
(4, 'Les Cèdres de Beau-jardin', 'Miriam Raphael, l\'héroine de cette grande saga romanesque, est sans doute la plus belle création de Belva Plain.\nNée au début du siècle dernier dans un petit village de Franconie, Miriam a 8 ans lorsqu\'elle arrive à la Nouvelle Orléans en compagnie de son père Ferdinand et de son frère David. Là, l\'attend une extraordinaire destinée : élevée parmi les fastes élégants de la meilleure société créole, elle connaîtra, devenue femme, les affres de la guerre civile et les déchirements de la passion.\nLa vie de Miriam, c\'est aussi l\'histoire de tout un siècle plantée dans un décor fabuleux : La Louisiane. A Beau-Jardin, la magnifique propriété de son mari Eugène Mendès, Miriam savoure les dernièrs instants d\'un bonheur fragile. Car, derrrière les feuillages épais de ce jardin d\'Eden, derrière les apparences d\'un mariage de convenance, se dissimule le terrible secret d\'un amour inavouable. Et lorsqu\'éclate la guerre de Sécession, le drame des champs de bataille se porte jusqu\'au coeur de Beau-Jardin. A jamais, le rêve de Miriam semble compromis : son frère a rejoint le camp nordiste, tandis que l\'homme qu\'elle croit aimer se bat pour le Sud...\nAu terme d\'une intrigue aux multiples rebondissements, après de nombreuses épreuves surmontées avec un infatigable courage et une invincible détermination, Miriam trouvera l\'apaisement dans un dénouement qu\'elle n\'osait même plus espérer.\nMieux que jamais, Belva Plain orchestre ici les thèmes flamboyants d\'une vaste fresque épique. A n\'en pas douter, ce roman a sa place aux côtés d\'Autant en emporte le vent et de Louisiane.', '', 'Belva Plain', 5, 8, 1),
(5, 'Howards End', 'Observateur subtil de la société britannique, E. M. Forster n\'a peut-être jamais mieux décrit les antagonismes et les entrelacs d\'intérêts entre aristocratie et bourgeoisie que dans Howards End. Dans cette histoire d\'héritage et de remariage s\'affrontent deux familles, les Schlegel et les Wilcox, et à travers eux deux visions du monde. A la veille de la Première Guerre mondiale, la société victorienne se fissure et les idées féministes et progressistes gagnent du terrain, malgré la résistance aveugle et hautaine des tenants de la tradition. Comme le montre habilement et cruellement ce roman indémodable, cette opposition brutale destinée à façonner la société du XXe siècle ne se déroulera pas sans faire de victimes.', '', 'E. M. Forster', 10, 3, 4),
(6, 'Le livre de San Michele', '« Si le livre de San Michele s’est trouvé devenir une autobiographie, dit Axel Munthe, c\'est que la manière la plus simple d\'écrire sur soi-même consiste à s’efforcer de penser à d\'autres. » Les autres, ce sont les belles malades imaginaires de l\'avenue de Villiers ou de la Piazza di Spagna, le triste petit John, la redoutable Mamsell Agata, le vicomte Maurice ou M.Alphonse ? les malheureux et les humbles soignés par le médecin suédois à Paris, Naples ou Messine, qui apparaissent tour à tour au fil de ces pages vibrantes de tendresse et de pitié pour les bêtes et les hommes. Vivre à Capri, c\'était le rêve - finalement réalisé - d’Axel Munthe. Son récit écrit à San Michele, paradis des chiens et des oiseaux, a connu aussitôt dans le monde entier une faveur qui ne s\'est jamais démentie.\r\nSource : Le Livre de Poche, LGF', '', 'Axel Martin Fredrik Munthe', 2, 9, 7),
(7, 'Villa Amalia', '« Loin devant les villas sur la digue, elle se tenait accroupie, les genoux au menton, en plein vent, sur le sable humide de la marée.Elle pouvait passer des heures devant les vagues, dans le vacarme, engloutie dans leur rythme comme dans l\'étendue grise, de plus en plus bruyante et immense, de la mer. »', '', 'Pascal Quignard', 8, 9, 6),
(8, 'La ville d\'hiver', 'Consciente d\'être parvenue à un tournant de sa vie, Sarah a trouvé refuge dans une villa de la Belle Époque, sur les hauteurs d\'Arcachon. La maison, à la chaleur de serre, la fascine. Entourée d\'un paysage délavé de gris, Sarah se prend à rêver des passions et des fièvres dont la Ville a été jadis le théâtre. Quel mystère hante la villa Teresa ? Un poète italien du siècle dernier, une Russe à la beauté inquiétante, un bibliophile expert en curiosa érotiques, une adolescente anorexique vont danser autour d\'elle une ronde perverse. Du présent où l\'attend un dernier amour ou du passé si puissant, lequel va triompher ?', '', 'Dominique Bona', 10, 4, 7),
(9, 'Souvenirs d\'enfance, tome 2 : Le château de ma mère', 'Le plus beau livre sur l\'amitié enfantine : un matin de chasse dans les collines, Marcel rencontre le petit paysan., Lili des Bellons. Ses vacances et sa vie entière en seront illuminées.\r\nUn an après La Gloire de mon père, Marcel Pagnol pensait conclure ses Souvenirs d\'enfance avec ce Château de ma mère (1958), deuxième volet de ce qu il considérait comme un diptyque, s\'achevant sur la scène célèbre du féroce gardien effrayant la timide Augustine. Le petit Marcel., après la tendresse familiale, a découvert l\'amitié avec le merveilleux Lili., sans doute le plus attachant de ses personnages. Le livre se clôt sur un épilogue mélancolique., poignante élégie au temps qui a passé. Pagnol y fait vibrer les cordes d\'une gravité à laquelle il a rarement habitué ses lecteurs.', '', 'Marcel Pagnol', 6, 4, 7),
(10, 'Les prétendants', 'Laure et Marie veulent a tout prix empêcher leur père de vendre l\'Agapanthe, leur maison d\'enfance, une villa de rêve située au Cap d\'Antibes. Elles vont donc organiser un casting de \' prétendants \' destinés à épouser l\'une ou l\'autre, afin de sauver cette demeure. Tel est le point de départ de cette comédie où les deux soeurs se laissent prendre au jeu de l\'amour et du hasard. Deux mondes s\'affrontent : la haute société et les nouveaux riches; on y croise des starlettes, des banquiers aux dents longues et des milliardaires américains aux manies bizarres. Toute une galerie de personnages sympathiques ou comiques, souvent dévorés par la prétention. L\'Agapanthe restera-t-elle dans la famille ? Quel \'prétendant\' l\'emportera?', '', 'Cécile David-Weill', 5, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(150) NOT NULL,
  `top1` int(11) NOT NULL,
  `top2` int(11) NOT NULL,
  `top3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nomUser`, `top1`, `top2`, `top3`) VALUES
(1, 'nidhal', 5, 2, 4),
(2, 'boshra', 5, 4, 1),
(3, 'emna', 1, 4, 5),
(4, 'iheb', 2, 1, 5),
(5, 'ahmed', 2, 1, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idPdt`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idPdt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
