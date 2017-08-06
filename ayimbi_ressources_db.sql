-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 29 Juin 2017 à 15:57
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ayimbi_ressources_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `posts_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `creation` varchar(20) NOT NULL,
  `text` longtext NOT NULL,
  `user_id` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `active` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `creation`, `text`, `user_id`, `created_at`, `updated_at`, `active`) VALUES
(1, 'SlimBlog', '1384796352', 'SlimBlog\r\n=====\r\n\r\nRequire\r\n---\r\n* [Slim Framework](http://slimframework.com)\r\n* [Eloquent](http://laravel.com/docs/eloquent)\r\n* [Twig](http://twig.sensiolabs.org)\r\n* [Bootstrap](http://getbootstrap.com)\r\n\r\nInstall\r\n---\r\n* Edit slimblog.sql file, in settings table change base_url from http://localhost/slimblog/public/ to your url installation path\r\n* Edit index.php file under public folder at 31 line with your database login data\r\n* Login with username:password\r\n* Enjoy\r\n\r\nFeatures\r\n---\r\n* Create new post with live markdown editor\r\n* Edit/Delete posts/users\r\n* Manage settings\r\n\r\nToDo List\r\n---\r\n* Error manager\r\n* Validate inputs\r\n* Comments system\r\n* Template system\r\n* I18n support', '1', '0000-00-00 00:00:00', '2013-11-18 18:40:40', 'true'),
(2, 'Just a test', '1384796654', 'An h1 header\r\n============\r\n\r\nParagraphs are separated by a blank line.\r\n\r\n2nd paragraph. *Italic*, **bold**, `monospace`. Itemized lists\r\nlook like:\r\n\r\n  * this one\r\n  * that one\r\n  * the other one\r\n\r\nNote that --- not considering the asterisk --- the actual text\r\ncontent starts at 4-columns in.\r\n\r\n> Block quotes are\r\n> written like so.\r\n>\r\n> They can span multiple paragraphs,\r\n> if you like.\r\n\r\nUse 3 dashes for an em-dash. Use 2 dashes for ranges (ex. \"it\'s all in\r\nchapters 12--14\"). Three dots ... will be converted to an ellipsis.\r\n\r\n\r\n\r\nAn h2 header\r\n------------\r\n\r\nHere\'s a numbered list:\r\n\r\n 1. first item\r\n 2. second item\r\n 3. third item\r\n\r\nNote again how the actual text starts at 4 columns in (4 characters\r\nfrom the left side). Here\'s a code sample:\r\n\r\n    # Let me re-iterate ...\r\n    for i in 1 .. 10 { do-something(i) }\r\n\r\nAs you probably guessed, indented 4 spaces. By the way, instead of\r\nindenting the block, you can use delimited blocks, if you like:\r\n\r\n~~~\r\ndefine foobar() {\r\n    print \"Welcome to flavor country!\";\r\n}\r\n~~~\r\n\r\n(which makes copying & pasting easier). You can optionally mark the\r\ndelimited block for Pandoc to syntax highlight it:\r\n\r\n~~~python\r\nimport time\r\n# Quick, count to ten!\r\nfor i in range(10):\r\n    # (but not *too* quick)\r\n    time.sleep(0.5)\r\n    print i\r\n~~~\r\n\r\n\r\n\r\n### An h3 header ###\r\n\r\nNow a nested list:\r\n\r\n 1. First, get these ingredients:\r\n\r\n      * carrots\r\n      * celery\r\n      * lentils\r\n\r\n 2. Boil some water.\r\n\r\n 3. Dump everything in the pot and follow\r\n    this algorithm:\r\n\r\n        find wooden spoon\r\n        uncover pot\r\n        stir\r\n        cover pot\r\n        balance wooden spoon precariously on pot handle\r\n        wait 10 minutes\r\n        goto first step (or shut off burner when done)\r\n\r\n    Do not bump wooden spoon or it will fall.\r\n\r\nNotice again how text always lines up on 4-space indents (including\r\nthat last line which continues item 3 above). Here\'s a link to [a\r\nwebsite](http://foo.bar). Here\'s a link to a [local\r\ndoc](local-doc.html). Here\'s a footnote [^1].\r\n\r\n[^1]: Footnote text goes here.\r\n\r\nTables can look like this:\r\n\r\nsize  material      color\r\n----  ------------  ------------\r\n9     leather       brown\r\n10    hemp canvas   natural\r\n11    glass         transparent\r\n\r\nTable: Shoes, their sizes, and what they\'re made of\r\n\r\n(The above is the caption for the table.) Here\'s a definition list:\r\n\r\napples\r\n  : Good for making applesauce.\r\noranges\r\n  : Citrus!\r\ntomatoes\r\n  : There\'s no \"e\" in tomatoe.\r\n\r\nAgain, text is indented 4 spaces. (Alternately, put blank lines in\r\nbetween each of the above definition list lines to spread things\r\nout more.)\r\n\r\nInline math equations go in like so: $\\omega = d\\phi / dt$. Display\r\nmath should get its own line and be put in in double-dollarsigns:\r\n\r\n$$I = \\int \\rho R^{2} dV$$\r\n\r\nDone.', '1', '0000-00-00 00:00:00', '2013-11-22 20:49:29', 'true'),
(3, 'QUALIFIED EXPERTS', '1498672767', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `base_url` varchar(50) NOT NULL,
  `template` varchar(100) NOT NULL,
  `post_per_page` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `truncate` enum('true','false') NOT NULL,
  `language` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `settings`
--

INSERT INTO `settings` (`id`, `title`, `base_url`, `template`, `post_per_page`, `updated_at`, `truncate`, `language`) VALUES
(1, 'AYIMBI-RESOURCES', 'http://localhost/ayimbi_1.0/public', 'default', 10, '2013-11-18 18:02:48', 'true', 'en-US');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'username', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'user@domain.com', '2013-11-18 18:21:03', '0000-00-00 00:00:00'),
(3, 'audrynhio', '73f6764f9ba9fec9603694a3b13e1ec6c1479a9a2afc4cff5378f6422fe63f66cfec3246f66e8841877ae733b3308d17d87edcd396c1b86a8f87177276e6d898', 'joseph@gmail.com', '2017-06-28 19:58:26', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__posts` (`posts_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK__posts` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
