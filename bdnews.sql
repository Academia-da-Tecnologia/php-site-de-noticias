-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2013 at 01:43 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrador`
--

CREATE TABLE `tb_administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_administrador_nome` varchar(60) DEFAULT NULL,
  `tb_administrador_login` varchar(50) DEFAULT NULL,
  `tb_administrador_senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_administrador`
--

INSERT INTO `tb_administrador` (`id`, `tb_administrador_nome`, `tb_administrador_login`, `tb_administrador_senha`) VALUES
(1, 'Alexandre Cardoso', 'alex', 'seVCQaZQhv22c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_categoria_nome` varchar(45) DEFAULT NULL,
  `tb_categoria_slug` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `tb_categoria_nome`, `tb_categoria_slug`) VALUES
(1, 'Esportes', 'esportes'),
(2, 'Tecnologia', 'tecnologia'),
(4, 'Games', 'games'),
(5, 'Cotidiano', 'cotidiano');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emails`
--

CREATE TABLE `tb_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_emails_nome` varchar(45) DEFAULT NULL,
  `tb_emails_email` varchar(45) DEFAULT NULL,
  `tb_emails_assunto` varchar(45) DEFAULT NULL,
  `tb_emails_mensagem` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_newsletter`
--

CREATE TABLE `tb_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_newsletter_nome` varchar(45) DEFAULT NULL,
  `tb_newsletter_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_newsletter`
--

INSERT INTO `tb_newsletter` (`id`, `tb_newsletter_nome`, `tb_newsletter_email`) VALUES
(1, 'Joao', 'joao@email.com.br'),
(2, 'marcio', 'marcio@email.com.br');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_post_titulo` varchar(60) DEFAULT NULL,
  `tb_post_data` timestamp NULL DEFAULT NULL,
  `tb_post_texto` text,
  `tb_post_autor` varchar(45) DEFAULT NULL,
  `tb_post_slug` varchar(45) DEFAULT NULL,
  `tb_post_foto` varchar(100) DEFAULT NULL,
  `tb_post_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id`, `tb_post_titulo`, `tb_post_data`, `tb_post_texto`, `tb_post_autor`, `tb_post_slug`, `tb_post_foto`, `tb_post_categoria`) VALUES
(7, 'De volta para o futuro', '2013-08-26 22:26:11', 'Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.', 'Alexandre Cardoso', 'teste', 'fotos/524c999160f96.jpeg', 2),
(8, 'Batman', '2013-08-26 22:28:42', 'Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.', 'Alexandre Cardoso', 'teste2', 'fotos/524c999eca5b5.jpeg', 5),
(9, 'Aliens', '2013-08-27 02:29:02', 'Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.', 'Alexandre Cardoso', 'teste-de-artigo', 'fotos/524c999731f3c.jpeg', 2),
(10, 'Tomb Raider', '2013-10-02 23:50:20', '<p><span style=\\"color: #666666; font-family: Georgia, \\''Times New Roman\\'', Times, serif; font-size: 13px;\\">Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</span></p>', 'Alexandre Cardoso', 'tomb-raider', 'fotos/524cb1d063665.jpeg', 4),
(11, 'Post Cotidiano', '2013-10-02 23:50:54', '<p><span style=\\"color: #666666; font-family: Georgia, \\''Times New Roman\\'', Times, serif; font-size: 13px;\\">Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</span></p>', 'Alexandre Cardoso', 'post-cotidiano', 'fotos/524cb1c809fd6.jpeg', 5),
(12, 'Palmeiras Campeao', '2013-10-02 23:57:21', '<p><span style=\\"color: #666666; font-family: Georgia, \\''Times New Roman\\'', Times, serif; font-size: 13px;\\">Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</span></p>', 'Alexandre Cardoso', 'palmeiras-campeao', 'fotos/524cb2ef9e415.jpeg', 1),
(13, 'Como gravar video aulas', '2013-10-09 22:28:06', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac condimentum ligula, a blandit mauris. Vivamus tincidunt scelerisque velit ut convallis. Integer commodo, diam eu pellentesque laoreet, lectus metus condimentum enim, vitae aliquet tortor lacus ut mauris. Aenean dapibus lacus eu semper porttitor. Mauris quis tellus blandit, hendrerit eros ac, fermentum lectus. Vivamus interdum justo adipiscing aliquam ullamcorper. Fusce consequat ante id ligula rutrum, eleifend pharetra dolor pellentesque. Sed faucibus tellus quis tortor rutrum, eu vestibulum purus euismod. Suspendisse suscipit, est in iaculis tempus, nisi orci pellentesque neque, sed tincidunt elit lectus sed augue. Duis metus quam, consectetur id cursus id, convallis et magna. Integer semper porta dapibus. Praesent volutpat dui ut consectetur pulvinar. Phasellus eu tellus nisi. Morbi convallis, leo at aliquam tincidunt, ante lectus mollis leo, quis ullamcorper nisl ipsum nec erat. Nunc vestibulum hendrerit velit, sed tempus est blandit vitae.</p>\n<p>Sed sodales est neque, vel venenatis ligula mattis interdum. Etiam at lectus augue. Ut porttitor a sem a bibendum. Nullam et tortor et mi euismod cursus. Duis eu interdum massa. Aliquam vitae metus et lectus aliquam sodales. Aenean non magna aliquam, fringilla diam sit amet, gravida erat. Aliquam at massa molestie tellus pretium laoreet a nec nisl. Praesent in tellus eu lorem scelerisque accumsan. Curabitur sagittis ligula in nulla ullamcorper, et sollicitudin eros porttitor. Cras mollis nunc ipsum, ut faucibus tortor imperdiet non. Nam sit amet vulputate nibh. In dictum odio non elit pellentesque laoreet id vitae nisi. Aliquam erat volutpat. Aliquam nec velit quam. Etiam mollis et libero vel placerat.</p>\n<p><iframe style=\\"float: left;\\" src=\\"http://www.youtube.com/embed/LOeBkxlxlsI\\" width=\\"560\\" height=\\"315\\" frameborder=\\"0\\" allowfullscreen=\\"allowfullscreen\\"></iframe>Integer ante massa, tristique ac molestie nec, scelerisque nec velit. Cras a justo mattis, viverra ante quis, aliquet leo. Nam non diam pulvinar, eleifend neque et, eleifend lectus. Fusce vestibulum odio ultrices, egestas leo sed, interdum diam. Nunc porttitor malesuada dignissim. Nullam cursus non augue at varius. Etiam vehicula placerat sem, non vulputate purus aliquam vel. Fusce sed lorem a enim congue fermentum ac non mi. Fusce a blandit dui. Sed a ante neque. Suspendisse sed venenatis metus. Ut aliquet velit vitae diam dapibus interdum. Mauris id blandit felis. Suspendisse potenti.</p>\n<p>Mauris mattis est sed tortor euismod congue. Nulla ultricies justo ante, sit amet vulputate sapien dapibus ut. Vivamus mollis velit in ipsum elementum blandit. Maecenas eu nisl ante. Aenean sem augue, accumsan quis risus non, rhoncus placerat diam. Mauris at metus dictum, consequat eros a, suscipit tortor. Mauris nec est ut turpis sollicitudin molestie in a leo. Nunc eu erat orci. Cras ac lacinia est, vel semper nisi. Maecenas semper massa sit amet ullamcorper pulvinar. Quisque in vestibulum tortor, in tincidunt tortor. Nulla urna velit, aliquam vel ante sit amet, volutpat fermentum sapien. Donec consequat iaculis risus quis cursus. Pellentesque at nunc eu ante tincidunt commodo non eget massa. Donec lobortis odio a ligula luctus aliquam. Suspendisse ultricies sem gravida risus rhoncus, ut malesuada neque posuere.</p>\n<p>Curabitur faucibus sodales iaculis. Etiam tincidunt augue eu laoreet laoreet. Proin vestibulum elit vel justo scelerisque sagittis. Vivamus metus quam, tincidunt in erat a, tincidunt porta ligula. Integer vestibulum congue eros, ut egestas nunc pharetra quis. Integer eu orci in ipsum sodales porttitor. Fusce ullamcorper enim et turpis sodales, eu ornare lacus venenatis. In elementum sit amet quam eu adipiscing. Vestibulum porttitor quam tristique mi bibendum, sed varius erat lacinia. Phasellus ornare lorem purus, vel scelerisque risus placerat quis. Sed tincidunt mollis euismod. Donec mollis libero a nisl vulputate faucibus.</p>\n<p>You t&aacute; the brinqueichon uite me, cara? You ar a v&eacute;ri mutchi caspa man. Do you nou the number one xampu contra caspa in the uordi. Luqui aqui Capitachion. Rimouve uarandredi porcenti ofi the caspa ande idrateiti ior hair.</p>\n<p>You puti the xampu in the midiu, from the fronte, from the berrind ande the caspa donti cai io xolder. Pliss, luqui tu me. Not joelzetes. Finixi the cocereichon in the red. Bati, pera ai, you no precisa, you ar a carecaition, you donti r&eacute;vi caspa</p>\n<p>Tu teami prei veri gudi! From birr&aacute;ind, from de l&eacute;fiti, from de raiti! My equipe pray veri naici. Iraq ande sal de Africa pray semen. But de second taime ai hevi de mete. Control de mete bai equipe praying de left de write in the midiu.</p>\n<p>Have on bext oportuniti four ixcore. Iraq marquee de midiu found berrind. I afte-dem in seconde time ai maique to chanjer. Uon prayer experience sempre maschego. I anoder prayer que hevi eperience. Qui pray very gude Steven pienar. but ai donti \\"bidebu\\"<br /><br /></p>\n<p>You t&aacute; the brinqueichon uite me, cara? You ar a v&eacute;ri mutchi caspa man. Do you nou the number one xampu contra caspa in the uordi. Luqui aqui Capitachion. Rimouve uarandredi porcenti ofi the caspa ande idrateiti ior hair.</p>\n<p>You puti the xampu in the midiu, from the fronte, from the berrind ande the caspa donti cai io xolder. Pliss, luqui tu me. Not joelzetes. Finixi the cocereichon in the red. Bati, pera ai, you no precisa, you ar a carecaition, you donti r&eacute;vi caspa</p>', 'Alexandre Cardoso', 'como-gravar-video-aulas', 'fotos/5255d885454df.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_publicidade`
--

CREATE TABLE `tb_publicidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_publicidade_tamanho` int(11) DEFAULT NULL,
  `tb_publicidade_posicao` int(11) DEFAULT NULL,
  `tb_publicidade_imagem` varchar(85) DEFAULT NULL,
  `tb_publicidade_slug` varchar(45) DEFAULT NULL,
  `tb_publicidade_categoria` int(11) DEFAULT NULL,
  `tb_publicidade_nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_publicidade`
--

INSERT INTO `tb_publicidade` (`id`, `tb_publicidade_tamanho`, `tb_publicidade_posicao`, `tb_publicidade_imagem`, `tb_publicidade_slug`, `tb_publicidade_categoria`, `tb_publicidade_nome`) VALUES
(13, 1, 1, 'publicidade/524c86d4a4ec1.jpeg', 'batman-dark-knight', 2, 'Batman'),
(14, 1, 2, 'publicidade/524c87225b458.jpeg', 'avatar', 5, 'Avatar'),
(15, 1, 2, 'publicidade/524c955d6d34b.jpeg', 'alien', 4, 'Alien'),
(16, 1, 2, 'publicidade/524c95767bde6.jpeg', 'back-to-future', 5, 'Back to future'),
(17, 2, 1, 'publicidade/524c95b202d96.jpeg', 'sonho-de-liberdade', 2, 'Sonho de liberdade'),
(18, 3, 3, 'publicidade/524c95c7dd699.jpeg', 'avengers', 1, 'avengers'),
(19, 2, 3, 'publicidade/524c966d50e7a.jpeg', 'garantia', 1, 'GARANTIA DE MORTE'),
(20, 1, 1, 'publicidade/524c9691c4fb5.jpg', 'hamburguer', 1, 'Hamburguer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_publicidade_posicao`
--

CREATE TABLE `tb_publicidade_posicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_publicidade_posicao_local` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_publicidade_posicao`
--

INSERT INTO `tb_publicidade_posicao` (`id`, `tb_publicidade_posicao_local`) VALUES
(1, 'header'),
(2, 'middle'),
(3, 'footer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_publicidade_tamanho`
--

CREATE TABLE `tb_publicidade_tamanho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_publicidade_tamanho_valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_publicidade_tamanho`
--

INSERT INTO `tb_publicidade_tamanho` (`id`, `tb_publicidade_tamanho_valor`) VALUES
(1, '468x60'),
(2, '300x250'),
(3, '300x80');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_slide_caminho` varchar(100) DEFAULT NULL,
  `tb_slide_slug` varchar(100) DEFAULT NULL,
  `tb_slide_categoria` int(11) DEFAULT NULL,
  `tb_slide_caminho_thumb` varchar(100) DEFAULT NULL,
  `tb_slide_texto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_slide`
--

INSERT INTO `tb_slide` (`id`, `tb_slide_caminho`, `tb_slide_slug`, `tb_slide_categoria`, `tb_slide_caminho_thumb`, `tb_slide_texto`) VALUES
(11, 'public/banners/slide/51e75568289ce.jpeg', 'tecnologia', 2, 'public/banners/thumb/51e75568289ce.jpeg', 'Temperinte interdum sempus odio urna eget curabitur semper convallis nunc laoreet.'),
(12, 'public/banners/slide/51e7556f0af8c.jpeg', 'esportes', 1, 'public/banners/thumb/51e7556f0af8c.jpeg', 'Temperinte interdum sempus odio urna eget curabitur semper convallis nunc laoreet.'),
(13, 'public/banners/slide/5226789cd99c6.jpeg', 'cotidiano', 5, 'public/banners/thumb/5226789cd99c6.jpeg', 'Temperinte interdum sempus odio urna eget curabitur semper convallis nunc laoreet.');
