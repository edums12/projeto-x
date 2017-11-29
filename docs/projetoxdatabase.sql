-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2017 às 20:31
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projetoxdatabase`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `name_class` varchar(60) NOT NULL,
  `number_class` varchar(20) NOT NULL,
  `teacher_user_id` int(11) DEFAULT NULL,
  `cover_bg` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `class`
--

INSERT INTO `class` (`id_class`, `name_class`, `number_class`, `teacher_user_id`, `cover_bg`) VALUES
(3, 'a', 'a1', 2, ''),
(27, 'Matemática', 'B01112927F', 1, './upload_anexos/1matematica-fundo.jpg'),
(29, 'Português', 'O04112929L', 1, './upload_anexos/1maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(60) NOT NULL,
  `email_user` varchar(45) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  `perfilImage_user` varchar(100) DEFAULT NULL,
  `teacher_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `password_user`, `perfilImage_user`, `teacher_user`) VALUES
(1, 'Eduardo', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 1),
(2, 'Eduardo', 'edu@mail.com', '379ef4bd50c30e261ccfb18dfc626d9f', NULL, 1),
(3, 'Eduardo', 'edums@live.com', '1d0ab23712ff036d10a19213534fe826', NULL, 0),
(4, 'Rodrigo', 'rod@email.com', '52c59993d8e149a1d70b65cb08abf692', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_has_class`
--

CREATE TABLE IF NOT EXISTS `user_has_class` (
  `user_id_user` int(11) NOT NULL,
  `class_id_class` int(11) NOT NULL,
  PRIMARY KEY (`user_id_user`,`class_id_class`),
  KEY `fk_user_has_class_class1_idx` (`class_id_class`),
  KEY `fk_user_has_class_user_idx` (`user_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_has_class`
--

INSERT INTO `user_has_class` (`user_id_user`, `class_id_class`) VALUES
(3, 27),
(3, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id_work` int(11) NOT NULL AUTO_INCREMENT,
  `title_work` varchar(150) NOT NULL,
  `description_work` varchar(1000) NOT NULL,
  `dateCreation_work` varchar(20) NOT NULL,
  `dateSend_work` varchar(20) NOT NULL,
  `class_id_class` int(11) NOT NULL,
  `teacher_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_work`),
  KEY `fk_work_class1_idx` (`class_id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `work`
--

INSERT INTO `work` (`id_work`, `title_work`, `description_work`, `dateCreation_work`, `dateSend_work`, `class_id_class`, `teacher_user_id`) VALUES
(7, 'Apresentações', 'Apresentacao\r<br />2 linha', '29/11/17 16:05', '29, Novembro de 2017', 27, 1),
(8, 'Aula2', 'Palavras iguais', '29/11/17 16:21', '30/11/2017', 29, 1),
(9, '2 aula', 'loca', '29/11/17 16:22', '4/12/2017', 29, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `user_has_class`
--
ALTER TABLE `user_has_class`
  ADD CONSTRAINT `fk_user_has_class_class1` FOREIGN KEY (`class_id_class`) REFERENCES `class` (`id_class`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_class_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `fk_work_class1` FOREIGN KEY (`class_id_class`) REFERENCES `class` (`id_class`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
