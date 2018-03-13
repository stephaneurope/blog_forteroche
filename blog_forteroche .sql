-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 mars 2018 à 06:30
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `creationDate` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `moderate` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `creationDate`, `post_id`, `moderate`) VALUES
(2, 'Bianca', 'J\'ai vraiment pris plaisir a lire ce Chapitre', '2018-01-02 10:00:00', 2, 0),
(3, 'Tom', '<p>Vraiment un chapitre int&eacute;ressant!!supersuper super</p>', '2018-02-01 05:35:00', 4, 0),
(7, 'stephan', '<p>Vraiment un super chapitre</p>', '2018-02-18 13:36:59', 7, 0),
(9, 'ffffffff', 'gggggggggggg', '2018-03-05 09:41:01', 5, 0),
(11, 'robert', 'vraiment , je me suis régalé!!', '2018-03-06 10:10:31', 7, NULL),
(14, 'stephan', 'Vraiment un super blog!!!', '2018-03-06 10:31:43', 6, 0),
(15, 'virginie', 'Chapitre palpitant!', '2018-03-06 10:32:39', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '1',
  `chapter` varchar(355) NOT NULL,
  `title` varchar(355) NOT NULL,
  `content` text NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `chapter`, `title`, `content`, `creationDate`) VALUES
(1, 1, 'Chapitre 1', 'LA LOI PRIMITIVE', 'L’antique instinct nomade surgit,\r\nSe ruant contre la chaîne de l’habitude ;\r\n\r\nEt de son brumeux sommeil séculaire\r\nS’élève le cri de la race.\r\n \r\nBuck ne lisait pas les journaux et était loin de savoir ce qui se tramait vers la fin de 1897, non seulement contre lui, mais contre tous ses congénères. En effet, dans toute la région qui s’étend du détroit de Puget à la baie de San Diégo on traquait les grands chiens à longs poils, aussi habiles à se tirer d’affaire dans l’eau que sur la terre ferme…\r\n\r\nLes hommes, en creusant la terre obscure, y avaient trouvé un métal jaune, enfoncé dans le sol glacé des régions arctiques, et les compagnies de transport ayant répandu la nouvelle à grand renfort de réclame, les gens se ruaient en foule vers le nord. Et il leur fallait des chiens, de ces grands chiens robustes aux muscles forts pour travailler, et à l’épaisse fourrure pour se protéger contre le froid.\r\nBuck habitait cette belle demeure, située dans la vallée ensoleillée de Santa-Clara, qu’on appelle « le Domaine du juge Miller ».\r\n\r\nDe la route, on distingue à peine l’habitation à demi cachée par les grands arbres, qui laissent entrevoir la large et fraîche véranda, régnant sur les quatre faces de la maison. Des allées soigneusement sablées mènent au perron, sous l’ombre tremblante des hauts peupliers, parmi les vertes pelouses. Un jardin immense et fleuri entoure la villa, puis ce sont les communs imposants, écuries spacieuses, où s’agitent une douzaine de grooms et de valets bavards, cottages couverts de plantes grimpantes, pour les jardiniers et leurs aides ; enfin l’interminable rangée des serres, treilles et espaliers, suivis de vergers plantureux, de gras pâturages, de champs fertiles et de ruisseaux jaseurs.', '2017-11-01 04:11:03'),
(2, 1, 'Chapitre 2', 'LA LOI DU BÂTON ET DE LA DENT', 'de Buck sur la grève de Dyea fut un véritable cauchemar. Toutes les heures lui apportaient une émotion ou une surprise. Brutalement arraché à sa vie paresseuse et ensoleillée, il se voyait sans transition rejeté du cœur de la civilisation au centre même de la barbarie. \r\n\r\n Ici, ni paix, ni repos, ni sécurité ; tout était confusion, choc et péril, de là, nécessité absolue d’être toujours en éveil, car les bêtes et les hommes ne reconnaissaient que la loi du bâton et de la dent. Des chiens innombrables couvraient cette terre nouvelle, et Buck n’avait jamais rien vu de semblable aux batailles que se livraient ces animaux, pareils à des loups ; son premier contact avec eux lui resta à jamais dans la mémoire. L’expérience ne lui fut pas personnelle, car elle n’aurait pu lui profiter ; la victime fut Curly. \r\n\r\n Celle-ci, fidèle à son caractère sociable, était allée faire des avances à un chien sauvage de la taille d’un grand loup, mais moitié moins gros qu’elle. La réponse ne se fit malheureusement pas attendre : un bond rapide comme l’éclair, un claquement métallique des dents, un autre bond de côté non moins agile et la face de Curly était ouverte de l’œil à la mâchoire.\r\n\r\n Le loup combat ainsi : il frappe et fuit ; mais l’affaire n’en resta pas là. Trente ou quarante vagabonds accoururent et formèrent autour des combattants un cercle attentif et muet. Buck ne comprenait pas cette intensité de silence et leur façon de se lécher les babines. Curly se relève, se précipite sur son adversaire qui de nouveau la mord et bondit plus loin. À la troisième reprise, l’animal arrêta l’élan de la chienne avec sa poitrine, de telle façon qu’elle perdit pied et ne put se relever. C’était ce qu’attendait l’ennemi. Aussitôt, la meute bondit sur la pauvre bête, et elle fut ensevelie avec des cris de détresse sous cette masse hurlante et sauvage. Ce fut si soudain et si inattendu que Buck en resta tout interdit.\r\n\r\n Il vit Spitz sortir sa langue rouge – c’était sa façon de rire – et François balançant une hache, sauter au milieu des chiens. Trois hommes armés de bâtons l’aidèrent à les disperser, ce qui ne fut pas long. Deux minutes après la chute de Curly, le dernier de ses assaillants s’enfuyait honteusement ; mais elle restait sans vie sur la neige piétinée et sanglante, tandis que le métis hurlait de terribles imprécations. Buck conserva longtemps le souvenir de cette terrible scène. ', '2017-12-02 10:05:00'),
(4, 1, 'Chapitre 3', 'BUCK PREND LE COMMANDEMENT', '– Hein ! qu’est-ce que j’avais prévu ? L’avais-je dit que Buck valait deux diables ?\r\nAinsi parlait François, quand le matin suivant, ayant constaté la disparition de Spitz, il attira Buck près du feu, pour compter ses blessures.\r\n– Ce Spitz s’est battu comme un démon, dit Perrault, en examinant les nombreuses déchirures béantes.\r\n– Et ce Buck comme l’enfer tout entier, répondit François. Maintenant nous allons bien marcher… Plus de Spitz, plus d’ennuis !\r\n\r\nTandis que Perrault emballait les effets de campement et chargeait le traîneau, François s’occupait d’atteler les chiens. Buck vint à la place qu’occupait Spitz comme chef de file, mais François, sans faire attention à lui, installa à ce poste tant désiré Sol-leck, qu’il jugeait le plus apte à l’occuper ; Buck furieux sauta sur le Mal-Content, le chassa et se mit à sa place.\r\n\r\n– Hé, hé ! cria François en frappant joyeusement des mains, regardez ce Buck ! Il a tué Spitz, et maintenant il croit faire l’affaire comme chef.\r\n– Va-t’en ! hors de là !… cria-t-il.\r\n\r\nMais Buck refusa de bouger. François prit le chien par la peau du cou malgré ses grognements menaçants, le mit de côté et replaça Sol-leck dans les traits. Cela ne faisait pas du tout l’affaire du vieux chien, terrifié par l’attitude menaçante de Buck. François s’entêta, mais dès qu’il eut le dos tourné, Buck déplaça Sol-leck qui ne fit aucune difficulté de s’en aller. Fureur de François :\r\n\r\n– Attends un peu, je vais t’apprendre !… cria-t-il, revenant armé d’un lourd bâton.\r\nBuck, se rappelant l’homme au maillot rouge, recula lentement, sans essayer de nouvelle charge, lorsque Sol-leck fut pour la troisième fois à la place d’honneur ; mais, grognant de colère, il se mit à tourner autour du traîneau, hors de portée du bâton et prêt à l’éviter si François le lui avait lancé. Une fois Sol-leck attelé, le conducteur appela Buck pour le mettre à sa place ordinaire, devant Dave. Buck recula de deux ou trois pas ; François le suivit, il recula encore. \r\n\r\nAprès quelques minutes de ce manège, François lâcha son bâton, pensant que le chien redoutait les coups. Mais Buck était en pleine révolte. Ce n’était pas seulement qu’il cherchât à éviter une correction, il voulait la direction de l’attelage qu’il estimait avoir gagnée et lui appartenir de droit.', '2017-12-08 15:00:00'),
(5, 1, 'Chapitre 4', 'LES FATIGUES DU HARNAIS ET DE LA ROUTE', 'Trente jours après avoir quitté Dawson, le courrier de Salt-Water entrait à Skagway. Les chiens étaient en piteux état, traînant la patte et à peu près fourbus. Buck avait perdu trente-cinq livres de son poids, et ses compagnons avaient souffert plus encore. Pike le geignard, qui si souvent dans sa vie avait feint d’être blessé à la jambe, l’était pour tout de bon cette fois, Sol-leck boitait, et Dub souffrait d’une omoplate foulée ; ils avaient perdu toute énergie et tout ressort, et leurs pattes dessolées s’enfonçaient lourdement dans la neige. \r\n\r\nCe n’était pas chez eux cette lassitude extrême que produit un effort court et violent, et qui disparaît après quelques heures de repos, mais la dépression complète due à un labeur excessif et trop prolongé.\r\n\r\nEn moins de cinq mois, l’attelage avait fait deux mille cinq cents miles et durant les huit cents derniers n’avait pris que cinq jours de repos. En arrivant à Skagway, les chiens pouvaient à peine tendre les traits du traîneau ou éviter d’être frappés par son avant dans les descentes.\r\n– Hardi ! mes pauvres vieux ! leur disait le conducteur pour les encourager. C’est la fin. On va se reposer pour de bon à présent…\r\n\r\nEt certes les hommes eux-mêmes avaient bien gagné leur repos, car ils ne s’étaient arrêtés que deux jours pendant ce voyage de douze cents miles. Mais l’exode vers le Klondike avait été si considérable que les lettres adressées aux mineurs formaient des montagnes et le gouvernement n’admettait aucun retard : il fallait arriver à temps, quitte à remplacer par des équipes fraîches de chiens de la baie d’Hudson, les attelages éreintés.\r\nTrois jours après leur arrivée à Skagway, Buck et ses compagnons n’étaient pas encore remis de leurs fatigues.\r\n\r\n Le matin du quatrième jour, deux citoyens des États-Unis répondant aux noms de Hal et de Charles vinrent examiner l’attelage et l’achetèrent pour une bagatelle, harnais compris.', '2017-12-20 13:00:00'),
(6, 1, 'Chapitre 5', 'AMITIÉ', '<p>Lors du mois&nbsp; de d&eacute;cembre pr&eacute;c&eacute;dent, John Thornton, ayant eu les pieds gel&eacute;s, s&rsquo;&eacute;tait vu forc&eacute; de demeurer au camp, attendant sa gu&eacute;rison, tandis que ses camarades remontaient le fleuve afin de construire un radeau charg&eacute; de bois &agrave; destination de Dawson. <br /><br />Il boitait encore un peu, mais le temps chaud fit dispara&icirc;tre cette l&eacute;g&egrave;re infirmit&eacute; ; tandis que Buck, mollement &eacute;tendu au soleil, retrouvait par degr&eacute;s sa force perdue en &eacute;coutant l&rsquo;eau couler, les oiseaux jaser et tous les bruits harmonieux du printemps, accompagn&eacute;s du murmure profond de la for&ecirc;t s&eacute;culaire qui bornait l&rsquo;horizon au loin.<br /><br />Un peu de repos est chose l&eacute;gitime apr&egrave;s un voyage de trois mille lieues, et il faut confesser que notre chien s&rsquo;adonna pleinement aux douceurs de la paresse pendant ce temps de convalescence. D&rsquo;ailleurs, autour de lui, chacun en faisait autant. John Thornton fl&acirc;nait, Skeet et Nig fl&acirc;naient &ndash; en attendant que sonn&acirc;t l&rsquo;heure de donner un coup de collier.<br /><br />Skeet &eacute;tait une petite chienne setter irlandaise qui, d&egrave;s le d&eacute;but, avait marqu&eacute; beaucoup d&rsquo;amiti&eacute; &agrave; Buck, trop malade alors pour se formaliser de la familiarit&eacute; de ses avances. Elle avait ce go&ucirc;t de soigner, propre &agrave; certains chiens et tout de suite, comme une m&egrave;re chatte l&egrave;che ses petits, elle se mit &agrave; l&eacute;cher et &agrave; panser assid&ucirc;ment les plaies du pauvre Buck. Tous les matins, aussit&ocirc;t qu&rsquo;il avait d&eacute;jeun&eacute;, elle se mettait &agrave; sa t&acirc;che d&rsquo;infirmi&egrave;re, et tel fut le succ&egrave;s de ses soins, que Buck en vint rapidement &agrave; les priser autant que ceux de Thornton lui-m&ecirc;me.<br /><br />Nig, &eacute;galement amical, quoique plus r&eacute;serv&eacute;, &eacute;tait un grand chien noir, moiti&eacute; limier, moiti&eacute; braque, avec des yeux rieurs et la plus heureuse humeur qui se p&ucirc;t voir.<br /><br />Ces animaux, qui semblaient participer en quelque sorte de la bont&eacute; d&rsquo;&acirc;me de leur ma&icirc;tre, ne montr&egrave;rent aucune jalousie du nouveau venu &ndash; ce qui surprit Buck consid&eacute;rablement.<br /><br />Aussit&ocirc;t qu&rsquo;il fut en &eacute;tat de se mouvoir, ils le caress&egrave;rent, l&rsquo;entra&icirc;n&egrave;rent dans toutes sortes de jeux, lui firent enfin mine si hospitali&egrave;re, qu&rsquo;il e&ucirc;t fallu &ecirc;tre bien ingrat pour ne pas se sentir touch&eacute; d&rsquo;un si g&eacute;n&eacute;reux accueil ; et Buck, qui n&rsquo;&eacute;tait point une nature basse, leur rendit large mesure d&rsquo;amiti&eacute; et de bons proc&eacute;d&eacute;s.</p>', '2018-01-01 16:14:00'),
(7, 1, 'Chapitre 6', 'L’APPEL RÉSONNE', 'John Thornton ayant, grâce à Buck, gagné six cents dollars en cinq minutes, se trouva en mesure de payer certaines dettes gênantes, et de réaliser un projet depuis longtemps caressé avec ses camarades. \r\n\r\nIl s’agissait d’un voyage dans l’Est, à la recherche d’une mine fabuleuse dont le souvenir remontait aux origines mêmes de l’histoire du pays.\r\n\r\nBien des aventuriers étaient partis à sa recherche ; peu étaient revenus ; des milliers avaient disparu sans laisser de trace. L’histoire de cette mine eut été féconde en tragédies mystérieuses. On ignorait le nom du premier qui l’avait découverte. \r\n\r\nRien de précis ne se racontait, à vrai dire ; mais on prétendait que l’emplacement en était marqué par une cabane en ruine.\r\n\r\nCeux qui revenaient épuisés et mourants l’avaient décrite, montrant à l’appui de leurs dires des pépites d’or d’une grosseur surprenante telle que les autres n’en avaient jamais vu.\r\n\r\nPersonne ne s’attribuant la possession de ces trésors, que les morts ne réclameraient plus, John Thornton, Hans et Peter, accompagnés de Buck et d’une demi-douzaine d’autres chiens, se dirigèrent vers l’est, cherchant sur une piste inconnue des richesses peut-être chimériques.\r\n\r\nAyant remonté en traîneau, pendant soixante-dix miles, le Yukon glacé, ils tournèrent dans la rivière Stewart, passèrent le Mayo et le Mac-Question, et continuant leur route jusqu’à la source du Stewart, ils gravirent des pics qui semblaient l’épine dorsale même du continent.\r\n\r\nJohn Thornton, au cours de ses expéditions, comptait peu sur l’homme, mais beaucoup sur la nature, et ne redoutait aucune solitude. Avec une poignée de sel et un rifle, il pouvait s’enfoncer dans les pays les plus sauvages, et se tirer d’affaire aussi facilement qu’il lui plaisait. N’étant jamais pressé par le temps, il chassait sa nourriture, à l’instar des Indiens, tout en marchant ; si le gibier manquait, il poursuivait son chemin sans se troubler, sûr d’en retrouver tôt ou tard.\r\n\r\n L’ordinaire, pendant ces longs voyages, devant être la viande fraîche, les munitions et les outils constituaient la principale charge du traîneau.\r\n\r\nCe fut, pour Buck, un temps de liesse et de joie perpétuelle que cette vie de chasse, de pêche, de vagabondage infini dans des pays inconnus.', '2018-01-18 11:08:00'),
(12, 1, 'Chapitre 7', 'ÉPILOGUE LE CHIEN', '<p>je ne sais pas quoi marqué .oui je e,dfkfkfkfglglglklgkkgkfikzfsssssssssssssssfffffff</p>\r\n<p> </p>\r\n<p> </p>', '2018-03-06 16:50:10'),
(13, 1, 'Chapitre 8', 'Boule et Bill', '<p>jdggdgfkfkfkfkffoofioiggig</p>\r\n<p>fkfkjfjfjffjfjjfjgjgjgjjgjff</p>\r\n<p>mlf;fkfkkfkfkfkfkfkfkfkkkff</p>\r\n<p>mfrlflflfllfllflflllflflfllflf</p>', '2018-03-07 18:33:33'),
(14, 1, 'Chapitre 9', 'hfhdhfhfhfhhf', '<p>rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</p>\r\n<p>fffffffffffffffffffffffffffffffffrrrrr</p>\r\n<p>ttttttttttttttttttttttttttttttttttttt</p>\r\n<p>ttttttttttttttttttttttttt</p>\r\n<p>tttttttttttttttttttttttttttttttttt</p>\r\n<p>hjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</p>\r\n<p>jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</p>', '2018-03-07 18:37:35');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `pass`, `date_inscription`) VALUES
(1, 'JeanForteroche', 'jeanforteroche@gmail.com', '$2y$10$FQVkk6jbnt/i1gW9uALWRO2V6VoLc.ajaCiy45XDAOI2R1pmtB4Vi', '2017-11-01 00:00:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
