-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2014 at 04:55 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `totemlive`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_category`
--

CREATE TABLE IF NOT EXISTS `activity_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `obstacles` text,
  `solutions` text,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=235 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `sequence`, `answer`, `description`, `start_date`, `end_date`) VALUES
(1, 2, 1, 'Alm. job fuldtids', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(2, 2, 2, 'Alm. job deltids', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(3, 2, 3, 'Flexjob', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(4, 2, 4, 'I aktivering eller lign. - Beskriv', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(5, 2, 5, 'Andet', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(6, 4, 1, 'Ungdomsuddannelse', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(7, 4, 2, 'Håndværksmæssig uddannelse', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(8, 4, 3, 'Kort videregående uddannelse (1-2 år)', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(9, 4, 4, 'Mellemlang videregående uddannelse (3-4 år)', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(10, 4, 5, 'Lang videregående uddannelse (5-6 år)', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(11, 4, 6, 'Anden uddannelse', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(12, 6, 1, 'Sygemeldt', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(13, 6, 2, 'Kontanthjælp/bistandshjælp', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(14, 6, 3, 'Førtidspensionist', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(15, 6, 4, 'Pensionist pga. alder', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(16, 6, 5, 'Arbejdsløs, men søger/kan arbejde', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(17, 6, 6, 'Anden grund - Hvilken', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(18, 8, 1, 'Løn', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(19, 8, 2, 'SU', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(20, 8, 3, 'Dagpenge', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(21, 8, 5, 'Kontant/bistandshjælp', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(22, 8, 6, 'Revalidering', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(23, 8, 7, 'Revalidering', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(24, 8, 8, 'Førtidspension', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(25, 8, 9, 'Pension', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(26, 8, 10, 'Andet', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(28, 10, 1, '0 genstande (jeg drikker aldrig)', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(29, 10, 2, '0-5 genstande', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(30, 10, 3, '5-10 genstande', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(31, 10, 4, '10-20 genstande', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(32, 10, 5, '20-30 genstande', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(33, 10, 6, 'Over 30 genstande', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(34, 11, 1, 'Hvis ja, beskriv', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(35, 13, 1, 'Præparat', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(36, 13, 2, 'Præparat', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(37, 13, 3, 'Præparat', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(38, 13, 4, 'Præparat', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(39, 13, 5, 'Præparat', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(40, 14, 1, 'Jeg har ingen problemer med at gå omkring', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(41, 14, 2, 'Jeg har nogle problemer med at gå omkring', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(42, 14, 3, 'Jeg er bundet til sengen', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(43, 15, 1, 'Jeg har ingen problemer med min personlige pleje', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(44, 15, 2, 'Jeg har nogle problemer med at vaske mig eller klæde mig på', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(45, 15, 3, 'Jeg kan ikke vaske mig eller klæde mig på', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(49, 16, 1, 'Jeg har ingen problemer med at udføre mine sædvanlige aktiviteter', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(50, 16, 2, 'Jeg har nogle problemer med at udføre mine sædvanlige aktiviteter', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(51, 16, 3, 'Jeg kan ikke udføre mine sædvanlige aktiviteter', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(52, 17, 1, 'Jeg har ingen smerter eller ubehag', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(53, 17, 2, 'Jeg har moderate smerter eller ubehag', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(54, 17, 3, 'Jeg har ekstreme smerter eller ubehag', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(55, 18, 1, 'Jeg er ikke ængstelig eller deprimeret', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(56, 18, 2, 'Jeg er moderat ængstelig eller deprimeret', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(57, 18, 3, 'Jeg er ekstremt ængstelig eller deprimeret', '', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(58, 20, 1, '', 'Vi beder dig angive på denne skala, hvor godt eller dårligt du mener dit eget helbred er i dag. Angiv\r\ndette ved at tegne en streg fra kassen nedenfor til et hvilket som helst punkt på skalaen, der viser,\r\nhvor god eller dårlig din helbredstilstand er i dag.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(59, 21, 1, 'Det bekymrer mig ikke, hvis jeg ikke har tid til at ordne alting. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(60, 21, 2, 'Mine bekymringer generer mig virkelig. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(61, 21, 3, 'Jeg bekymrer mig egentligt ikke om ting. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(62, 21, 4, 'Mange ting gør mig bekymret. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(63, 21, 5, 'Jeg ved, at jeg ikke burde bekymre mig, men jeg kan ikke lade være. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(64, 21, 6, 'Når jeg er under pres, bekymrer jeg mig meget. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(65, 22, 1, 'Jeg er altid bekymret om et eller andet. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(66, 22, 2, 'Jeg synes det er let at holde op med at bekymre mig, når jeg vil. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(67, 22, 3, 'Når jeg er færdig med en ting, begynder jeg at bekymre mig om alt muligt andet. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(68, 22, 4, 'Jeg bekymrer mig aldrig om noget som helst. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(69, 22, 5, 'Når der ikke er mere jeg kan gøre ved et givet problem, stopper jeg \r\n  med at bekymre mig om det. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(70, 23, 1, 'Jeg har været “en der bekymrer sig” hele mit liv. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(71, 23, 2, 'Jeg har lagt mærke til, at jeg har bekymret mig om ting. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(72, 23, 3, 'Når først jeg begynder at bekymre mig, kan jeg ikke holde op. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(73, 23, 4, 'Jeg bekymrer mig hele tiden. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(74, 23, 5, 'Jeg bekymrer mig om ting, indtil de er gjort. \r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(75, 24, 1, 'Det tager mig aldrig længere end 30 minutter at falde i søvn.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(76, 24, 2, 'Op til 3 aftner om ugen tager det mig mere end 30 minutter at falde i søvn.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(77, 24, 3, 'De fleste aftner tager det mig mere end 30 minutter at falde i søvn.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(78, 24, 4, 'De fleste aftner tager det mig mere end 60 minutter at falde i søvn.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(79, 25, 1, 'Jeg vågner ikke i løbet af natten.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(80, 25, 2, 'Jeg har en urolig, let søvn med kortvarig opvågnen nogle få gange hver nat.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(81, 25, 3, 'Jeg vågner mindst én gang hver nat, men falder let i søvn igen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(82, 25, 4, 'De fleste nætter vågner jeg mere end én gang om natten og ligger vågen i 20 minutter eller længere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(83, 26, 1, 'For det meste vågner jeg højst 30 minutter før jeg skal op.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(84, 26, 2, 'Mere end halvdelen af nætterne vågner jeg mere end 30 minutter før jeg skal op.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(85, 26, 3, 'Jeg vågner næsten altid mere end en times tid før jeg skal op, men jeg falder til sidst i søvn igen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(86, 26, 4, 'Jeg vågner mindst én time før jeg skal op og kan ikke falde i søvn igen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(87, 27, 1, 'Jeg sover højst 7-8 timer om natten og slet ikke i løbet af dagen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(88, 27, 2, 'Jeg sover op til 10 timer i løbet af et døgn, iberegnet en lur engang imellem.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(89, 27, 3, 'Jeg sover op til 12 timer i løbet af et døgn, iberegnet en lur engang imellem.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(90, 27, 4, 'Jeg sover mere end 12 timer i løbet af et døgn, iberegnet en lur engang imellem.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(91, 28, 1, 'Jeg føler mig ikke nedtrykt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(92, 28, 2, 'Jeg føler mig nedtrykt mindre end halvdelen af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(93, 28, 3, 'Jeg føler mig nedtrykt det meste af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(94, 28, 4, 'Jeg føler mig næsten hele tiden nedtrykt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(95, 29, 1, 'Jeg føler mig ikke irritabel.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(96, 29, 2, 'Jeg føler mig irritabel mindre end halvdelen af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(97, 29, 3, 'Jeg føler mig irritabel det meste af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(98, 29, 4, 'Jeg føler mig særdeles irritabel næsten hele tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(99, 30, 1, 'Jeg føler mig ikke angst eller anspændt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(100, 30, 2, 'Jeg føler mig angst eller anspændt mindre end halvdelen af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(101, 30, 3, 'Jeg føler mig angst eller anspændt det meste af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(102, 30, 4, 'Jeg er næsten hele tiden ekstremt angst eller anspændt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(103, 31, 1, 'Når der hænder noget godt, stiger mit humør til normalt niveau - som så holder i flere timer.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(104, 31, 2, 'Mit humør bliver bedre, når der sker noget godt, men jeg bliver ikke som normalt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(105, 31, 3, 'Mit humør bliver kun lidt bedre ved nogle få særlige begivenheder.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(106, 31, 4, 'Mit humør bliver slet ikke bedre, selv når der hænder noget virkelig godt eller ønsket i mit liv.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(107, 32, 1, 'Der er ingen regelmæssig sammenhæng mellem mit humør og tidspunktet på dagen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(108, 32, 2, 'Mit humør hænger ofte sammen med tidspunktet på dagen på grund af ydre omstændigheder\r\n(f.eks. om jeg er alene eller arbejder).\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(109, 32, 3, 'Mit humør hænger generelt mere sammen med selve tidspunktet på dagen end med ydre om-\r\nstændigheder.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(110, 32, 4, 'Mit humør er klart og forudsigeligt bedre eller værre på et bestemt tidspunkt på dagen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(111, 33, 1, 'Jeg oplever min sindsstemning (indre følelser),som normal.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(112, 33, 2, 'Humøret er nedtrykt, men på en måde der svarer nogenlunde til det triste humør, jeg ville\r\nvære i, hvis en af mine nærmeste døde eller forlod mig.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(113, 33, 3, 'Humøret er nedtrykt, men nedtryktheden adskiller sig en del fra det triste humør, jeg ville\r\nvære i, hvis en af mine nærmeste døde eller forlod mig.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(114, 33, 4, 'Humøret er nedtrykt, men denne følelse er helt anderledes end den, der er forbundet med\r\nsorg eller tab.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(115, 34, 1, 'Der er ingen ændring i forhold til min sædvanlige appetit.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(116, 34, 2, 'Jeg spiser noget sjældnere eller mindre mængder mad end sædvanligt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(117, 34, 3, 'Jeg spiser meget mindre end sædvanligt og kun med en personlig overvindelse.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(118, 34, 4, 'Jeg spiser sjældent indenfor et døgn, og kun med en enorm personlig overvindelse eller når\r\nandre overtaler mig til det.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(119, 35, 1, 'Der er ingen ændring i forhold til min sædvanlige appetit.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(120, 35, 2, 'Jeg føler trang til at spise oftere end sædvanligt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(121, 35, 3, 'Jeg spiser gennemgående oftere og/eller større mængder mad end sædvanligt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(122, 35, 4, 'Jeg føler mig drevet til at spise for meget både ved måltiderne og mellem måltiderne.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(123, 36, 1, 'Min vægt har ikke ændret sig.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(124, 36, 2, 'Det føles som om jeg har tabt mig en smule.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(125, 36, 3, 'Jeg har tabt mig 1 kg eller mere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(126, 36, 4, 'Jeg har tabt mig 2 1⁄2 kg eller mere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(127, 37, 1, 'Min vægt har ikke ændret sig.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(128, 37, 2, 'Det føles som om jeg har taget en smule på.', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(129, 37, 3, 'Jeg har taget 1 kg eller mere på.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(130, 37, 4, 'Jeg har taget 2 1⁄2 kg eller mere på.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(131, 38, 1, 'Der er ingen ændring i min sædvanlige evne til at koncentrere mig eller tage beslutninger.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(132, 38, 2, 'Jeg føler mig af og til ubeslutsom eller føler, at jeg ikke kan fastholde opmærksomheden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(133, 38, 3, 'Det meste af tiden må jeg virkelig anstrenge mig for at koncentrere mig eller tage beslutninger.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(134, 38, 4, 'Jeg kan ikke koncentrere mig nok til at læse eller jeg er ikke i stand til tage selv mindre\r\nbeslutninger.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(135, 39, 1, 'I mine øjne er jeg lige så meget værd og fortjener at have det ligeså godt som alle andre.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(136, 39, 2, 'Jeg er mere selvbebrejdende end jeg plejer at være.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(137, 39, 3, 'Jeg tror for det meste at jeg giver andre mennesker problemer.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(138, 39, 4, 'Jeg tænker næsten hele tiden på større og mindre fejl ved mig selv.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(139, 40, 1, 'Jeg ser optimistisk på min fremtid.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(140, 40, 2, 'Jeg er af og til pessimistisk med hensyn til min fremtid, men for det meste tror jeg på, at det\r\nvil gå bedre.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(141, 40, 3, 'Jeg er ret sikker på, at min nærmeste fremtid (1-2 måneder) ikke er særligt lovende.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(142, 40, 4, 'Jeg tror ikke der er noget håb om at det vil gå godt for mig på noget som helst tidspunkt i\r\nfremtiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(143, 43, 1, 'Jeg tænker ikke på selvmord eller død.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(144, 43, 2, 'Jeg føler, at tilværelsen er tom, eller spekulerer på om livet er værd at leve.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(145, 43, 3, 'Jeg tænker på selvmord eller død flere gange om ugen, i flere minutter ad gangen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(146, 43, 4, 'Jeg tænker indgående på selvmord eller død flere gange om dagen, eller jeg har lagt\r\nkonkrete selvmordsplaner, eller jeg har faktisk forsøgt at tage mit liv.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(147, 44, 1, 'Min interesse for andre mennesker og aktiviteter er uændret.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(148, 44, 2, 'Jeg har lagt mærke til, at min interesse for andre mennesker eller aktiviteter er blevet mindre.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(149, 44, 3, 'Jeg har lagt mærke til, at det er kun en eller to af mine tidligere aktiviteter jeg stadigvæk er\r\ninteresseret i.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(150, 44, 4, 'Jeg har praktisk taget ingen interesse længere for mine tidligere aktiviteter.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(151, 45, 1, 'Der er ingen ændring i forhold til mit sædvanlige energiniveau.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(152, 45, 2, 'Jeg bliver hurtigere træt end normalt.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(153, 45, 3, 'Jeg skal gøre mig store anstrengelser for at komme i gang med eller blive færdig med mine\r\nsædvanlige daglige aktiviteter (f.eks. købe ind, gøre husarbejde, lave mad eller gå på arbejde).\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(154, 45, 4, 'Jeg er faktisk ikke i stand til at udføre de fleste af mine sædvanlige daglige aktiviteter, fordi jeg\r\nsimpelthen ikke har energi til det.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(155, 46, 1, 'Jeg nyder fornøjelige aktiviteter lige så meget som jeg plejer.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(156, 46, 2, 'Jeg oplever ikke den samme glæde som sædvanlig ved fornøjelige aktiviteter.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(157, 46, 3, 'Det er sjældent at jeg føler glæde ved nogen som helst aktivitet.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(158, 46, 4, 'Det er mig ikke muligt at føle glæde eller nydelse ved noget som helst.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(159, 47, 1, 'Min interesse for sex er helt uændret.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(160, 47, 2, 'Min interesse for sex er noget mindre end sædvanlig, eller jeg har ikke samme glæde ved sex\r\nsom jeg plejer.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(161, 47, 3, 'Jeg har kun lidt lyst til eller sjældent glæde ved sex.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(162, 47, 4, 'Jeg har absolut ingen interesse for eller glæde ved sex.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(163, 48, 1, 'Jeg tænker, taler og bevæger mig i mit sædvanlige tempo.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(164, 48, 2, 'Jeg synes, at jeg tænker langsommere eller at min stemme lyder kedelig og flad.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(165, 48, 3, 'Det tager mig flere sekunder at svare på de fleste spørgsmål, og jeg er sikker på at jeg tænker\r\nlangsommere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(166, 48, 4, 'Jeg er ofte ikke i stand til at svare på spørgsmål uden at gøre mig store anstrengelser.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(167, 49, 1, 'Jeg føler mig ikke rastløs.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(168, 49, 2, 'Jeg er ofte urolig, vrider mine hænder eller er nødt til at skifte stilling når jeg sidder ned.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(169, 49, 3, 'Jeg føler trang til bevæge mig omkring hele tiden og er temmelig rastløs.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(170, 49, 4, 'Til tider er jeg overhovedet ikke i stand til at blive siddende, men er nødt til at trave frem og\r\ntilbage.', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(171, 50, 1, 'Jeg føler mig ikke tung i mine arme eller ben og har ingen smerter.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(172, 50, 2, 'Det sker at jeg får hovedpine eller mave -, ryg- eller ledsmerter, men det er smerter der kun\r\nforekommer engang imellem, og de forhindrer mig ikke i at passe mine gøremål.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(173, 50, 3, 'Den slags smerter har jeg det meste af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(174, 50, 4, 'Disse smerter er så stærke at de tvinger mig til at afbryde hvad jeg er i gang med.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(175, 51, 1, 'Jeg har ingen af følgende symptomer: hurtig hjertebanken, sløret syn, svedeture, hede- og\r\nkuldeture, smerter i brystet, kolbøtteagtige, hjerteslag, ringen for ørene eller rysten.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(176, 51, 2, 'Jeg har nogle af disse symptomer, men de er lette og forekommer kun engang imellem.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(177, 51, 2, 'Jeg har flere af disse symptomer, og de generer mig temmelig meget.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(178, 51, 4, 'Jeg har flere af disse symptomer, og når de forekommer, er jeg nødt til afbryde hvad jeg er i\r\ngang med.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(179, 52, 1, 'Jeg får ikke panikanfald eller har situationsbestemte angstfornemmelser (fobier) (som f.eks.\r\nover for højder eller visse dyr).\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(180, 52, 2, 'Jeg får lette panikanfald eller angstfornemmelser som normalt ikke påvirker min adfærd eller\r\nhindrer mig i at fungere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(181, 52, 3, 'Jeg får stærke panikanfald eller angstfornemmelser som tvinger mig til at ændre min adfærd,\r\nmen som ikke hindrer mig i at fungere.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(182, 52, 4, 'Jeg oplever mindst én gang om ugen et panikanfald eller angst der er så stærk, at det hindrer\r\nmig i at udføre mine daglige aktiviteter.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(183, 53, 1, 'Der er ingen ændring i mine sædvanlige afføringsvaner.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(184, 53, 2, 'Jeg har ind imellem forstoppelse eller diarré, men kun i let grad.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(185, 53, 3, 'Jeg har diarré eller forstoppelse det meste af tiden, men det har ingen indvirkning på min\r\nfunktionsevne i det daglige.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(186, 53, 4, 'Jeg har forstoppelse eller diarré, som jeg tager medicin for eller som går ud over mine daglige\r\naktiviteter.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(187, 54, 1, 'Jeg har slet ikke været tilbøjelig til at føle mig afvist, forbigået, kritiseret eller såret af andre.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(188, 54, 2, 'Jeg har af og til følt mig afvist, forbigået, kritiseret eller såret af andre.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(189, 54, 3, 'Jeg har ofte følt mig afvist, forbigået, kritiseret eller såret af andre, men sådanne følelser har\r\nhaft meget lidt indflydelse på mit forhold til andre mennesker eller på mit arbejde.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(190, 54, 4, 'Jeg har ofte følt mig afvist, forbigået, kritiseret eller såret af andre, og disse følelser har\r\nforstyrret mit forhold til andre mennesker og til mit arbejde.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(191, 55, 1, 'Jeg har ikke oplevet en fysisk fornemmelse af at være tynget ned og uden fysisk energi.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(192, 55, 2, 'Jeg har en gang imellem haft perioder hvor jeg følte mig fysisk tynget ned og uden fysisk energi,\r\nmen uden at dette havde en negativ indvirkning på arbejde, skolegang eller aktivitetsniveau.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(193, 55, 3, 'Jeg føler mig fysisk tynget ned (uden fysisk energi) mere end halvdelen af tiden.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(194, 55, 4, 'Jeg føler mig fysisk tynget ned (uden fysisk energi) det meste af tiden, adskillige timer dagligt,\r\nflere dage om ugen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(195, 56, 1, 'Fremragende', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(196, 56, 2, 'God', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(197, 56, 3, 'Nogenlunde', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(198, 56, 4, 'Ringe', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(199, 58, 1, 'Slet ikke', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(200, 58, 2, 'Egentlig ikke', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(201, 58, 3, 'Ja, stort set\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(202, 58, 4, 'Helt sikkert\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(203, 59, 1, 'Alle behov opfyldt', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(204, 59, 2, 'De fleste behov opfyldt\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(205, 59, 3, 'Kun få behov opfyldt\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(206, 59, 4, 'Ingen behov opfyldt\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(207, 60, 1, 'Helt sikkert ikke\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(208, 60, 2, 'Det tror jeg ikke', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(209, 60, 3, 'Ja, det tror jeg', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(210, 60, 4, 'Helt sikkert', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(211, 62, 1, 'Ret utilfreds\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(212, 62, 2, 'Ligeglad/lidt utilfreds', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(213, 62, 3, 'Nogenlunde tilfreds', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(214, 62, 4, 'Meget tilfreds', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(215, 65, 1, 'Ja, meget\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(216, 65, 2, 'Ja, lidt\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(217, 65, 3, 'Nej, den hjalp faktisk ikke\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(218, 65, 4, 'Den gjorde tingene værre\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(219, 66, 1, 'Meget tilfreds\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(220, 66, 2, 'Stort set tilfreds\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(221, 66, 3, 'Ligeglad/ ikke helt tilfreds\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(222, 66, 4, 'Ret utilfreds\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(223, 67, 1, 'Helt sikkert ikke\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(224, 67, 2, 'Det tror jeg ikke\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(225, 67, 3, 'Ja, det tror jeg\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(226, 67, 4, 'Helt sikkert\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(227, 82, 1, 'Jeg tænker ikke på selvmord eller død.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(228, 82, 2, 'Jeg føler, at tilværelsen er tom, eller spekulerer på om livet er værd at leve.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(229, 82, 3, 'Jeg tænker på selvmord eller død flere gange om ugen, i flere minutter ad gangen.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(230, 82, 4, 'Jeg tænker indgående på selvmord eller død flere gange om dagen, eller jeg har lagt\r\nkonkrete selvmordsplaner, eller jeg har faktisk forsøgt at tage mit liv.\r\n', '', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(231, 8, 4, 'Sygedagpenge\r\n', '', '2013-12-03 00:00:00', '2013-12-03 00:00:00'),
(234, 6, 0, 'Ikke relevant', '', '2014-01-12 00:00:00', '2014-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `answer_type`
--

CREATE TABLE IF NOT EXISTS `answer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `answer_type`
--

INSERT INTO `answer_type` (`id`, `type`) VALUES
(1, 'yes/no'),
(2, 'multiple choices'),
(3, 'numeric value'),
(4, 'text value');

-- --------------------------------------------------------

--
-- Table structure for table `depressive_tasks`
--

CREATE TABLE IF NOT EXISTS `depressive_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `m1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m2l` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m2r` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m5l` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m5r` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m7` int(5) DEFAULT NULL,
  `m8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m9_event` int(11) DEFAULT NULL,
  `m9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m9_status` tinyint(3) DEFAULT '0',
  `m10_event` int(11) DEFAULT NULL,
  `m10` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m10_status` tinyint(3) DEFAULT '0',
  `m11_event` int(9) DEFAULT NULL,
  `m11` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m11_status` tinyint(3) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'Control'),
(2, 'Experimental'),
(3, 'Clinician'),
(4, 'Provider Administrator'),
(5, 'Master Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `leveregler`
--

CREATE TABLE IF NOT EXISTS `leveregler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `leveregler`
--

INSERT INTO `leveregler` (`id`, `title`, `user_id`, `status`) VALUES
(1, 'Jeg skal være afholdt af alle, ellers er jeg ikke noget værd.', 0, 1),
(2, 'Jeg skal være anerkendt af andre for at være noget værd.', 0, 1),
(3, 'Jeg må føje andre og tilpasse mig for at blive acceptereret.', 0, 1),
(4, 'Hvis andre kritiserer mig, er jeg ikke noget værd.', 0, 1),
(8, 'Jeg skal klare alting selv, ellers er jeg svag.', 0, 1),
(9, 'Jeg skal altid gøre mit allerbedste i enhver situation, ellers er jeg et dårligt menneske.', 0, 1),
(10, 'Jeg skal altid gøre noget ekstra for at være god nok.', 0, 1),
(11, 'Jeg skal altid gøre mit allerbedste i enhver situation, ellers er jeg et dårligt menneske.', 0, 1),
(12, 'Hvis jeg ikke udretter noget, er jeg uden værdi.', 0, 1),
(13, 'Hvis jeg ikke kan gøre tingene 120 % kan jeg lige så godt lade være.', 0, 1),
(14, 'Hvis jeg begår en fejl, vil andre tage afstand fra mig.', 0, 1),
(15, 'Jeg skal helst gøre alting 120% perfekt, ellers er jeg ikke ok.', 0, 1),
(16, 'Hvis andre er uenig med mig, er jeg ikke ok.', 0, 1),
(17, 'Hvis jeg viser mine egne behov bliver jeg afvist.', 0, 1),
(18, 'Hvis andre kritiserer mig, er jeg ikke noget værd.', 0, 1),
(19, 'At være afhængig af andre er et tegn på svaghed.', 0, 1),
(20, 'Alle skal synes, at jeg er klog, ellers er det pinligt', 117, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leveregler_tasks`
--

CREATE TABLE IF NOT EXISTS `leveregler_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `l1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `r1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `r2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `m3` text COLLATE utf8_unicode_ci,
  `m8` int(11) DEFAULT NULL,
  `m9` int(11) DEFAULT NULL,
  `m10` int(11) DEFAULT NULL,
  `m11` text COLLATE utf8_unicode_ci,
  `m4` int(5) DEFAULT '0',
  `m5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_threads`
--

CREATE TABLE IF NOT EXISTS `message_threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime NOT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

--
-- Table structure for table `nat_challenges`
--

CREATE TABLE IF NOT EXISTS `nat_challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `l1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `r1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `r2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `m4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_id` (`questionnaire_id`),
  KEY `answer_type` (`answer_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=83 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `questionnaire_id`, `sequence`, `question`, `answer_type`, `description`, `start_date`, `end_date`) VALUES
(1, 1, 1, 'Hvis ja, noter venligst hvilken type på listen herunder:', 1, '1. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(2, 1, 2, 'Hvis ja, noter venligst hvilken type på listen herunder', 2, '1. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(3, 1, 3, 'Er du på nuværende tidspunkt igang med en uddannelse?', 1, '2. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(4, 1, 4, 'Hvis ja, noter venligst hvilken type på listen herunder', 2, '2. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(6, 1, 5, 'Hvis du på nuværende tidspunkt hverken er i arbejde eller i gang med en uddannelse (altså svaret nej til både spørgsmål 1 og 2), noter venligst status herunder', 2, '3. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(7, 1, 6, 'Forhindrer din psykiske lidelse dig på nuværende tidspunkt i at passe et arbjede?', 1, '4. Nuværende job/igangværende uddannelse', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(8, 1, 7, 'Hvad er din indtægtskilde?', 2, '5. Indtægtskilde', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(9, 1, 8, 'Modtager du aktuelt, andetsteds end her, anden form for behandling af psykisk lidelse (udover medicin og samtaler ved egen læge)?', 1, '6. Anden behandling aktuelt', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(10, 1, 9, 'Hvor mange genstande drikker du i gennemsnit pr. uge (ca. antal bedes angives)', 2, '7. Misbrug', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(11, 1, 10, 'Har du på nuværende tidspunkt et misbrug af euforiserende stoffer, piller el. andet?', 1, '8. Misbrug', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(12, 1, 11, 'Er du på nuværende tidspunkt i medicinsk behandling for psykisk lelse?', 1, '9. Medicinsk behandling', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(13, 1, 12, 'Er du på nuværende tidspunkt i medicinsk behandling for psykisk lelse?', 2, 'Hvis ja, noter venligst grundigt hvilke(t) præparat(er) og dosis herunder', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(14, 1, 13, 'Bevægelighed', 2, '10. Bevægelighed', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(15, 1, 14, 'Personlig pleje', 2, '11. Personlig pleje', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(16, 1, 15, 'Sædvanlige aktiviteter', 2, '12. Sædvanlige aktiviteter', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(17, 1, 16, 'Smerter/ubehag', 2, '13. Smerter/ubehag', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(18, 1, 17, 'Angst/depression', 2, '14. Angst/depression', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(20, 1, 18, 'Helbredstilstand', 3, '15. Helbredstilstand\r\nFor at hjælpe folk med at sige, hvor god eller dårlig en helbredstilstand er, har vi tegnet en skala, hvor\r\nden bedste helbredstilstand du kan forestille dig er markeret med 100, og den værste\r\nhelbredstilstand du kan forestille dig er markeret med 0.\r\nVi beder dig angive på denne skala, hvor godt eller dårligt du mener dit eget helbred er i dag. Angiv\r\ndette ved at tegne en streg fra kassen nedenfor til et hvilket som helst punkt på skalaen, der viser,\r\nhvor god eller dårlig din helbredstilstand er i dag.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(21, 1, 19, '1 = “ligner mig slet ikke”, 5 = “”ligner mig meget”\r\n', 3, '16. Bekymringer\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(22, 1, 20, '1 = “ligner mig slet ikke”, 5 = “”ligner mig meget”\r\n', 3, '17. Bekymringer\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(23, 1, 21, '1 = “ligner mig slet ikke”, 5 = “”ligner mig meget”\r\n', 3, '18. Bekymringer\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(24, 1, 22, 'Besvær med at falde i søvn\r\n', 2, '19. Besvær med at falde i søvn\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(25, 1, 23, 'Besvær med at sove om natten\r\n', 2, '20. Besvær med at sove om natten\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(26, 1, 24, 'Tendens til at vågne for tidligt\r\n', 2, '21. Tendens til at vågne for tidligt\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(27, 1, 25, 'Tendens til at sove for meget\r\n', 2, '22. Tendens til at sove for meget\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(28, 1, 26, 'Tendens til nedtrykthed\r\n', 2, '23. Tendens til nedtrykthed\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(29, 1, 27, 'Tendens til irritabilitet\r\n', 2, '24. Tendens til irritabilitet\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(30, 1, 28, 'Tendens til at være angst eller anspændt\r\n', 2, '25. Tendens til at være angst eller anspændt\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(31, 1, 29, 'Humørmæssig reaktion på gode eller ønskede begivenheder\r\n', 2, '26. Humørmæssig reaktion på gode eller ønskede begivenheder\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(32, 1, 30, 'Humør i forhold til tidspunktet på dagen\r\n', 2, '27. Humør i forhold til tidspunktet på dagen\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(33, 1, 31, 'Sindsstemningens karakter\r\n', 2, '28. Sindsstemningens karakter\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(34, 1, 32, 'Nedsat appetit\r\n', 2, '29. Nedsat appetit', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(35, 1, 33, 'Øget appetit\r\n', 2, '30. Øget appetit\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(36, 1, 34, 'Vægttab i løbet af de sidste to uger\r\n', 2, '31. Vægttab i løbet af de sidste to uger\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(37, 1, 35, 'Vægtøgning løbet af de sidste to uger\r\n', 2, '32. Vægtøgning løbet af de sidste to uger\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(38, 1, 36, 'Koncentration / beslutningstagning\r\n', 2, '33. Koncentration / beslutningstagning\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(39, 1, 37, 'Syn på mig selv\r\n', 2, '34. Syn på mig selv\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(40, 1, 38, 'Syn på min fremtid\r\n', 2, '35. Syn på min fremtid\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(43, 1, 39, 'Tanker om død eller selvmord', 2, '36. Tanker om død eller selvmord', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(44, 1, 40, 'Generel interesse\r\n', 2, '37. Generel interesse\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(45, 1, 41, 'Energiniveau\r\n', 2, '38. Energiniveau\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(46, 1, 42, 'Evnen til at glæde sig over eller nyde noget (bortset fra sex)\r\n', 2, '39. Evnen til at glæde sig over eller nyde noget (bortset fra sex)\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(47, 1, 43, 'Interesse for sex (angiv venligst interesse, ikke aktivitet)\r\n', 2, '40. Interesse for sex (angiv venligst interesse, ikke aktivitet)\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(48, 1, 44, 'Følelse af langsomhed\r\n', 2, '41. Følelse af langsomhed\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(49, 1, 45, 'Følelse af rastløshed\r\n', 2, '42 . Følelse af rastløshed\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(50, 1, 46, 'Smerter\r\n', 2, '43. Smerter\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(51, 1, 47, 'Andre fysiske symptomer\r\n', 2, '44. Andre fysiske symptomer\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(52, 1, 48, 'Symptomer forbundet med panik / fobier\r\n', 2, '45. Symptomer forbundet med panik / fobier\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(53, 1, 49, 'Forstoppelse / diarré\r\n', 2, '46. Forstoppelse / diarré\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(54, 1, 50, 'Overfølsomhed i omgang med andre mennesker\r\n', 2, '47. Overfølsomhed i omgang med andre mennesker\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(55, 1, 51, 'Kraftesløshed/ blytunghed / fysisk energi\r\n', 2, '48. Kraftesløshed/ blytunghed / fysisk energi\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(56, 1, 52, 'Hvad synes du om kvaliteten af den behandling, du har modtaget?\r\n', 2, '49. Hvad synes du om kvaliteten af den behandling, du har modtaget?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(58, 1, 53, 'Fik du den behandling du ønskede?\n', 2, '50. Fik du den behandling du ønskede?\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(59, 1, 54, 'I hvor høj grad har behandlingen opfyldt dine behov?\r\n', 2, '51. I hvor høj grad har behandlingen opfyldt dine behov?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(60, 1, 55, 'Ville du anbefale behandlingen til en ven med samme problemer?\r\n', 2, '52. Ville du anbefale behandlingen til en ven med samme problemer?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(62, 1, 56, 'Hvor tilfreds er du med mængden af hjælp, du har modtaget?\r\n', 2, '53. Hvor tilfreds er du med mængden af hjælp, du har modtaget?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(65, 1, 57, 'Har behandlingen hjulpet dig til mere effektivt at kunne løse dine problemer?\r\n', 2, '54. Har behandlingen hjulpet dig til mere effektivt at kunne løse dine problemer?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(66, 1, 58, 'Alt i alt, hvor tilfreds er du med den hjælp, du har modtaget?\r\n', 2, '55. Alt i alt, hvor tilfreds er du med den hjælp, du har modtaget?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(67, 1, 59, 'Hvis du skulle søge hjælp en anden gang, ville du så søge samme behandling?\r\n', 2, '56. Hvis du skulle søge hjælp en anden gang, ville du så søge samme behandling?\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(70, 2, 1, 'Har du følt dig trist til mode, ked af det? ', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(71, 2, 2, 'Har du manglet interesse for dine daglige gøremål? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(72, 2, 3, 'Har du følt at du manglede energi og kræfter? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(73, 2, 4, 'Har du haft mindre selvtillid? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(74, 2, 5, 'Har du haft dårlig samvittighed eller skyldfølelse? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(75, 2, 6, 'Har du følt, at livet ikke var værd at leve? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(76, 2, 7, 'Har du haft besvær med at koncentrere dig, f.eks. \r\n læse avis eller følge med i fjernsyn? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(77, 2, 8, 'Har du følt dig rastløs? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(78, 2, 9, 'Har du følt dig mere stille? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(79, 2, 10, 'Har du haft besvær med at sove om natten? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(80, 2, 11, 'Har du haft nedsat appetit? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(81, 2, 12, 'Har du haft øget appetit? \r\n', 3, '1. Humør/tilstand\r\n\r\nNedennævnte spørgsmål handler om hvordan du har haft det gennem de sidste to uger.\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(82, 2, 13, 'Tanker om død eller selvmord\r\n', 2, '3. Tanker om død eller selvmord\r\n', '2013-11-28 00:00:00', '2013-11-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `title`, `category`, `description`, `start_date`, `end_date`) VALUES
(1, 'Big Questionnaire', 1, 'The big questionnaire', '2013-11-27 00:00:00', '2013-11-27 00:00:00'),
(2, 'Lite Questionnaire', 1, 'The lite questionnaire', '2013-11-28 00:00:00', '2013-11-28 00:00:00'),
(3, 'X questionnaire', 1, 'The X questionnaire', '2014-03-13 00:00:00', '2014-03-13 00:00:00'),
(4, 'Fourth questionaire', 1, 'Fourth questionaire', '2014-03-27 15:43:28', '2014-03-27 15:43:31'),
(5, 'Fifth questionaire', 1, 'Fifth questionaire', '2014-03-28 12:59:17', '2014-03-28 12:59:20'),
(6, 'Sixth questionaire', 1, 'Sixth questionaire', '2014-03-28 12:59:39', '2014-03-28 12:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'doctor who created this quiz',
  `taken_by` int(11) NOT NULL COMMENT 'patient who took the quiz',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `current_step` int(11) NOT NULL DEFAULT '0' COMMENT 'Front end usage field, needed to be able to resume quiz where user left it',
  `create_date` datetime NOT NULL,
  `completed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `taken_by` (`taken_by`),
  KEY `questionnaire_id` (`questionnaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `questionnaire_id`, `created_by`, `taken_by`, `description`, `current_step`, `create_date`, `completed_date`) VALUES
(1, 1, 1, 3, '', 64, '2013-12-20 00:00:00', '2014-04-10 18:16:20'),
(26, 6, 1, 3, 'Sixth questionaire', 4, '2014-05-12 16:24:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_rules`
--

CREATE TABLE IF NOT EXISTS `quiz_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `step_parent` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=267 ;

--
-- Dumping data for table `quiz_rules`
--

INSERT INTO `quiz_rules` (`id`, `step`, `step_parent`, `template_name`) VALUES
(1, '1.0', '1', 'quiz_0.html'),
(2, '1.1', '1', 'quiz_1.html'),
(3, '1.2', '1', 'quiz_2.html'),
(4, '1.3', '1', 'quiz_3.html'),
(5, '1.4', '1', 'quiz_4.html'),
(6, '1.5', '1', 'quiz_5.html'),
(7, '1.6', '1', 'quiz_6.html'),
(8, '1.7', '1', 'quiz_7.html'),
(9, '1.8', '1', 'quiz_8.html'),
(10, '1.9', '1', 'quiz_9.html'),
(11, '1.10', '1', 'quiz_10.html'),
(12, '1.11', '1', 'quiz_11.html'),
(13, '1.12', '1', 'quiz_12.html'),
(14, '1.13', '1', 'quiz_13.html'),
(15, '1.14', '1', 'quiz_14.html'),
(16, '1.15', '1', 'quiz_15.html'),
(17, '1.16', '1', 'quiz_16.html'),
(18, '1.17', '1', 'quiz_17.html'),
(19, '1.18', '1', 'quiz_18.html'),
(20, '1.19', '1', 'quiz_19.html'),
(21, '1.20', '1', 'quiz_20.html'),
(22, '1.21', '1', 'quiz_21.html'),
(23, '1.22', '1', 'quiz_22.html'),
(24, '1.23', '1', 'quiz_23.html'),
(25, '1.24', '1', 'quiz_24.html'),
(26, '1.25', '1', 'quiz_25.html'),
(27, '1.26', '1', 'quiz_26.html'),
(28, '1.27', '1', 'quiz_27.html'),
(29, '1.28', '1', 'quiz_28.html'),
(30, '1.29', '1', 'quiz_29.html'),
(31, '1.30', '1', 'quiz_30.html'),
(32, '1.31', '1', 'quiz_31.html'),
(33, '1.32', '1', 'quiz_32.html'),
(34, '1.33', '1', 'quiz_33.html'),
(35, '1.34', '1', 'quiz_34.html'),
(36, '1.35', '1', 'quiz_35.html'),
(37, '1.36', '1', 'quiz_36.html'),
(38, '1.37', '1', 'quiz_37.html'),
(39, '1.38', '1', 'quiz_38.html'),
(40, '1.39', '1', 'quiz_39.html'),
(41, '1.40', '1', 'quiz_40.html'),
(42, '1.41', '1', 'quiz_41.html'),
(43, '1.42', '1', 'quiz_42.html'),
(44, '1.43', '1', 'quiz_43.html'),
(45, '1.44', '1', 'quiz_44.html'),
(46, '1.45', '1', 'quiz_45.html'),
(47, '1.46', '1', 'quiz_46.html'),
(48, '1.47', '1', 'quiz_47.html'),
(49, '1.48', '1', 'quiz_48.html'),
(50, '1.49', '1', 'quiz_49.html'),
(51, '1.50', '1', 'quiz_50.html'),
(52, '1.51', '1', 'quiz_51.html'),
(53, '1.52', '1', 'quiz_52.html'),
(54, '1.53', '1', 'quiz_53.html'),
(55, '1.54', '1', 'quiz_54.html'),
(56, '1.55', '1', 'quiz_55.html'),
(57, '1.56', '1', 'quiz_56.html'),
(58, '1.57', '1', 'quiz_57.html'),
(59, '1.58', '1', 'quiz_58.html'),
(60, '1.59', '1', 'quiz_59.html'),
(61, '1.60', '1', 'quiz_60.html'),
(62, '1.61', '1', 'quiz_61.html'),
(63, '1.62', '1', 'quiz_62.html'),
(64, '1.63', '1', 'quiz_63.html'),
(65, '1.64', '1', 'quiz_64.html'),
(66, '2.0', '2', 'quiz_0.html'),
(67, '2.1', '2', 'quiz_1.html'),
(68, '2.2', '2', 'quiz_2.html'),
(69, '2.3', '2', 'quiz_3.html'),
(70, '2.4', '2', 'quiz_4.html'),
(71, '2.5', '2', 'quiz_5.html'),
(72, '2.6', '2', 'quiz_6.html'),
(73, '2.7', '2', 'quiz_7.html'),
(74, '2.8', '2', 'quiz_8.html'),
(75, '2.9', '2', 'quiz_9.html'),
(76, '2.10', '2', 'quiz_10.html'),
(77, '2.11', '2', 'quiz_11.html'),
(78, '2.12', '2', 'quiz_12.html'),
(79, '2.13', '2', 'quiz_13.html'),
(80, '2.14', '2', 'quiz_14.html'),
(81, '2.15', '2', 'quiz_15.html'),
(82, '2.16', '2', 'quiz_16.html'),
(83, '2.17', '2', 'quiz_17.html'),
(84, '2.18', '2', 'quiz_18.html'),
(85, '2.19', '2', 'quiz_19.html'),
(86, '2.20', '2', 'quiz_20.html'),
(87, '2.21', '2', 'quiz_21.html'),
(88, '2.22', '2', 'quiz_22.html'),
(89, '2.23', '2', 'quiz_23.html'),
(90, '2.24', '2', 'quiz_24.html'),
(91, '3.0', '3', 'quiz_0.html'),
(92, '3.1', '3', 'quiz_1.html'),
(93, '3.2', '3', 'quiz_2.html'),
(94, '3.3', '3', 'quiz_3.html'),
(95, '3.4', '3', 'quiz_4.html'),
(96, '3.5', '3', 'quiz_5.html'),
(97, '3.6', '3', 'quiz_6.html'),
(98, '3.7', '3', 'quiz_7.html'),
(99, '3.8', '3', 'quiz_8.html'),
(100, '3.9', '3', 'quiz_9.html'),
(101, '3.10', '3', 'quiz_10.html'),
(102, '3.11', '3', 'quiz_11.html'),
(103, '3.12', '3', 'quiz_12.html'),
(104, '3.13', '3', 'quiz_13.html'),
(105, '3.14', '3', 'quiz_14.html'),
(106, '3.15', '3', 'quiz_15.html'),
(107, '3.16', '3', 'quiz_16.html'),
(108, '3.17', '3', 'quiz_17.html'),
(109, '3.18', '3', 'quiz_18.html'),
(110, '3.19', '3', 'quiz_19.html'),
(111, '3.20', '3', 'quiz_20.html'),
(112, '3.21', '3', 'quiz_21.html'),
(113, '3.22', '3', 'quiz_22.html'),
(114, '3.23', '3', 'quiz_23.html'),
(115, '4.0', '4', 'quiz_0.html'),
(116, '4.1', '4', 'quiz_1.html'),
(117, '4.2', '4', 'quiz_2.html'),
(118, '4.3', '4', 'quiz_3.html'),
(119, '4.4', '4', 'quiz_4.html'),
(120, '4.5', '4', 'quiz_5.html'),
(121, '4.6', '4', 'quiz_6.html'),
(122, '4.7', '4', 'quiz_7.html'),
(123, '4.8', '4', 'quiz_8.html'),
(124, '4.9', '4', 'quiz_9.html'),
(125, '4.10', '4', 'quiz_10.html'),
(126, '4.11', '4', 'quiz_11.html'),
(127, '4.12', '4', 'quiz_12.html'),
(128, '4.13', '4', 'quiz_13.html'),
(129, '4.14', '4', 'quiz_14.html'),
(130, '4.15', '4', 'quiz_15.html'),
(131, '5.0', '5', 'quiz_0.html'),
(132, '5.1', '5', 'quiz_1.html'),
(133, '5.2', '5', 'quiz_2.html'),
(134, '5.3', '5', 'quiz_3.html'),
(135, '5.4', '5', 'quiz_4.html'),
(136, '5.5', '5', 'quiz_5.html'),
(137, '5.6', '5', 'quiz_6.html'),
(138, '5.7', '5', 'quiz_7.html'),
(139, '5.8', '5', 'quiz_8.html'),
(140, '5.9', '5', 'quiz_9.html'),
(141, '5.10', '5', 'quiz_10.html'),
(142, '5.11', '5', 'quiz_11.html'),
(143, '5.12', '5', 'quiz_12.html'),
(144, '5.13', '5', 'quiz_13.html'),
(145, '5.14', '5', 'quiz_14.html'),
(146, '5.15', '5', 'quiz_15.html'),
(147, '5.2', '5', 'quiz_16.html'),
(148, '5.3', '5', 'quiz_17.html'),
(149, '5.4', '5', 'quiz_18.html'),
(150, '5.5', '5', 'quiz_19.html'),
(151, '5.6', '5', 'quiz_20.html'),
(152, '5.7', '5', 'quiz_21.html'),
(153, '5.8', '5', 'quiz_22.html'),
(154, '5.9', '5', 'quiz_23.html'),
(155, 'A.0', 'A', 'quiz_0.html'),
(156, 'A.1', 'A', 'quiz_1.html'),
(157, 'A.2', 'A', 'quiz_2.html'),
(158, 'A.3', 'A', 'quiz_3.html'),
(159, 'A.4', 'A', 'quiz_4.html'),
(160, 'A.5', 'A', 'quiz_5.html'),
(161, 'A.6', 'A', 'quiz_6.html'),
(162, 'A.7', 'A', 'quiz_7.html'),
(163, 'A.8', 'A', 'quiz_8.html'),
(164, 'A.9', 'A', 'quiz_9.html'),
(165, 'A.10', 'A', 'quiz_10.html'),
(166, 'A.11', 'A', 'quiz_11.html'),
(167, 'A.12', 'A', 'quiz_12.html'),
(168, 'A.13', 'A', 'quiz_13.html'),
(169, 'A.14', 'A', 'quiz_14.html'),
(170, 'A.15', 'A', 'quiz_15.html'),
(171, 'A.16', 'A', 'quiz_16.html'),
(172, 'A.17', 'A', 'quiz_17.html'),
(173, 'A.18', 'A', 'quiz_18.html'),
(174, 'A.19', 'A', 'quiz_19.html'),
(175, 'A.20', 'A', 'quiz_20.html'),
(176, 'A.21', 'A', 'quiz_21.html'),
(177, 'A.22', 'A', 'quiz_22.html'),
(178, 'A.23', 'A', 'quiz_23.html'),
(179, 'A.24', 'A', 'quiz_24.html'),
(180, 'A.25', 'A', 'quiz_25.html'),
(181, 'A.26', 'A', 'quiz_26.html'),
(182, 'A.27', 'A', 'quiz_27.html'),
(183, 'A.28', 'A', 'quiz_28.html'),
(184, 'A.29', 'A', 'quiz_29.html'),
(185, 'A.30', 'A', 'quiz_30.html'),
(186, 'A.31', 'A', 'quiz_31.html'),
(187, 'A.32', 'A', 'quiz_32.html'),
(188, 'A.33', 'A', 'quiz_33.html'),
(189, 'A.34', 'A', 'quiz_34.html'),
(190, 'A.35', 'A', 'quiz_35.html'),
(191, 'A.36', 'A', 'quiz_36.html'),
(192, 'A.37', 'A', 'quiz_37.html'),
(193, 'A.38', 'A', 'quiz_38.html'),
(194, 'B.0', 'B', 'quiz_0.html'),
(195, 'B.1', 'B', 'quiz_1.html'),
(196, 'B.2', 'B', 'quiz_2.html'),
(197, 'B.3', 'B', 'quiz_3.html'),
(198, 'B.4', 'B', 'quiz_4.html'),
(199, 'B.5', 'B', 'quiz_5.html'),
(200, 'B.6', 'B', 'quiz_6.html'),
(201, 'B.7', 'B', 'quiz_7.html'),
(202, 'B.8', 'B', 'quiz_8.html'),
(203, 'B.9', 'B', 'quiz_9.html'),
(204, 'B.10', 'B', 'quiz_10.html'),
(205, 'B.11', 'B', 'quiz_11.html'),
(206, 'B.12', 'B', 'quiz_12.html'),
(207, 'B.13', 'B', 'quiz_13.html'),
(208, 'B.14', 'B', 'quiz_14.html'),
(209, 'B.15', 'B', 'quiz_15.html'),
(210, 'B.16', 'B', 'quiz_16.html'),
(211, 'B.17', 'B', 'quiz_17.html'),
(212, 'B.18', 'B', 'quiz_18.html'),
(213, 'B.19', 'B', 'quiz_19.html'),
(214, 'B.20', 'B', 'quiz_20.html'),
(215, 'B.21', 'B', 'quiz_21.html'),
(216, 'B.22', 'B', 'quiz_22.html'),
(217, 'B.23', 'B', 'quiz_23.html'),
(218, 'B.24', 'B', 'quiz_24.html'),
(219, 'B.25', 'B', 'quiz_25.html'),
(220, 'B.26', 'B', 'quiz_26.html'),
(221, 'B.27', 'B', 'quiz_27.html'),
(222, 'B.28', 'B', 'quiz_28.html'),
(223, 'B.29', 'B', 'quiz_29.html'),
(224, 'B.30', 'B', 'quiz_30.html'),
(225, 'B.31', 'B', 'quiz_31.html'),
(226, 'B.32', 'B', 'quiz_32.html'),
(227, 'B.33', 'B', 'quiz_33.html'),
(228, 'B.34', 'B', 'quiz_34.html'),
(229, 'B.35', 'B', 'quiz_35.html'),
(230, 'B.36', 'B', 'quiz_36.html'),
(231, 'B.37', 'B', 'quiz_37.html'),
(232, 'B.38', 'B', 'quiz_38.html'),
(233, 'B.39', 'B', 'quiz_39.html'),
(234, 'B.40', 'B', 'quiz_40.html'),
(235, 'B.41', 'B', 'quiz_41.html'),
(236, 'B.42', 'B', 'quiz_42.html'),
(237, 'B.43', 'B', 'quiz_43.html'),
(239, 'B.44', 'B', 'quiz_44.html'),
(240, '6.0', '6', 'quiz_0.html'),
(241, '6.1', '6', 'quiz_1.html'),
(242, '6.2', '6', 'quiz_2.html'),
(243, '6.3', '6', 'quiz_3.html'),
(244, '6.4', '6', 'quiz_4.html'),
(245, '6.5', '6', 'quiz_5.html'),
(246, '6.6', '6', 'quiz_6.html'),
(247, '6.7', '6', 'quiz_7.html'),
(248, '6.8', '6', 'quiz_8.html'),
(249, '6.9', '6', 'quiz_9.html'),
(250, '6.10', '6', 'quiz_10.html'),
(251, '6.11', '6', 'quiz_11.html'),
(252, '6.12', '6', 'quiz_12.html'),
(253, '6.13', '6', 'quiz_13.html'),
(254, '6.14', '6', 'quiz_14.html'),
(255, '6.15', '6', 'quiz_15.html'),
(256, '6.16', '6', 'quiz_16.html'),
(257, '6.17', '6', 'quiz_17.html'),
(258, '6.18', '6', 'quiz_18.html'),
(259, '6.19', '6', 'quiz_19.html'),
(260, 'X.0', 'X', 'quiz_0.html'),
(261, 'X.1', 'X', 'quiz_1.html'),
(262, 'X.2', 'X', 'quiz_2.html'),
(263, 'X.3', 'X', 'quiz_3.html'),
(264, 'X.4', 'X', 'quiz_4.html'),
(265, 'X.5', 'X', 'quiz_5.html'),
(266, 'X.6', 'X', 'quiz_6.html');

-- --------------------------------------------------------

--
-- Table structure for table `registration_token`
--

CREATE TABLE IF NOT EXISTS `registration_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `response` text COLLATE utf8_unicode_ci NOT NULL,
  `response_value` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_id` (`answer_id`),
  KEY `question_id` (`question_id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=166 ;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `answer_id`, `question_id`, `quiz_id`, `response`, `response_value`, `create_date`) VALUES
(165, NULL, 1, 26, 'yes', '', '2014-05-12 16:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL COMMENT 'If this user is a patient, this will be his doctor.',
  `group_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` int(11) NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_notification` tinyint(1) NOT NULL DEFAULT '1',
  `sms_notification` tinyint(1) NOT NULL DEFAULT '1',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `first_login` tinyint(1) NOT NULL DEFAULT '1',
  `stepA` tinyint(3) DEFAULT NULL,
  `stepB` tinyint(3) DEFAULT NULL,
  `step6` tinyint(3) DEFAULT NULL,
  `stepa_status` tinyint(3) DEFAULT '0',
  `stepb_status` tinyint(3) DEFAULT '0',
  `step6_status` tinyint(3) DEFAULT '0',
  `treatment_step` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Step enumerated like book chapters 0.1, 1.1, 1.2, etc..',
  `completed_step` varchar(10) NOT NULL COMMENT 'State last step completed by patient',
  `completed_step_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `access_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `owner_id`, `group_id`, `name`, `last_name`, `sex`, `email`, `password`, `salt`, `mobile`, `phone`, `address`, `mail_notification`, `sms_notification`, `confirmed`, `first_login`, `stepA`, `stepB`, `step6`, `stepa_status`, `stepb_status`, `step6_status`, `treatment_step`, `completed_step`, `completed_step_date`, `create_date`, `access_date`) VALUES
(1, NULL, 3, 'doctor', 'who', 'Male', 'who@totem.com', '6dcbe19099e9e5f113404b7d1e1044015386d13fc2495f052c076ea518359b4e737ef7e16ebec7a4afac4132affe36929d6bd3f8a9f0d0259d017f2313e2e5cb', 1385946827, '', '1234567890', 'Some address in the near future....', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '0', '', '0000-00-00 00:00:00', '2013-12-01 00:00:00', '2014-06-02 13:07:48'),
(3, 1, 1, 'control.patient', 'user', 'Female', 'control@totem.com', '4c971b6e384125ed634ac9a93728cda5e017207fe67294ec03ac3946c263139e25d2bd11c836287838496967cc1f26886cf6286addcbe3d711965d7bed2438ea', 1385959808, '', '1234567890', 'Addrs', 0, 0, 1, 0, 1, 2, 3, 1, 1, 0, '7.7', '7', '2014-06-04 15:40:51', '2013-12-01 00:00:00', '2014-06-09 11:26:59'),
(4, 1, 2, 'patient.experimental', 'user', 'Male', 'experimental@totem.com', '4cac3262fec02b6c393a4c6ea1abb32a890eb8ea630d2926a2fcd043acd37b13b7cadcbf6876e9b52f583dcc51ab266851fc875334ad356b565f663da466a351', 1385959808, '', '1234567890', 'Addrs', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2', '1', '2014-04-04 17:12:47', '2013-12-01 00:00:00', '2014-05-30 10:46:59'),
(5, NULL, 4, 'admin.provider', 'user', 'Female', 'admin@totem.com', '149993fde5b47e31df49299ca3c7e99f3c7ea79aa22dbd4408d92ea8ca7c54cbb4267aa95a6cec78cbd57060df2dc1eca7d711ce306562735ba3dc295b689526', 1386707492, '', '1234567890', 'Some addr', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '0', '', '0000-00-00 00:00:00', '2013-12-10 15:31:32', '2014-04-02 18:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_action_comment`
--

CREATE TABLE IF NOT EXISTS `user_action_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warning_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_cat`
--

CREATE TABLE IF NOT EXISTS `user_activity_cat` (
  `cat_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `status` tinyint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_diversionary_activity`
--

CREATE TABLE IF NOT EXISTS `user_diversionary_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `div_activity` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `wgtact_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_first_step`
--

CREATE TABLE IF NOT EXISTS `user_first_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `completed_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_map_tools`
--

CREATE TABLE IF NOT EXISTS `user_map_tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tool` varchar(250) NOT NULL,
  `tool_id` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_step`
--

CREATE TABLE IF NOT EXISTS `user_quiz_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_risks`
--

CREATE TABLE IF NOT EXISTS `user_risks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_warnings`
--

CREATE TABLE IF NOT EXISTS `user_warnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warning` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_activity_list`
--

CREATE TABLE IF NOT EXISTS `widget_activity_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `ubication` varchar(50) DEFAULT NULL COMMENT 'Refers to pleasurable or demanding activities. LEFT means Pleasurable and RIGHT means demanding',
  `sort_order` int(11) NOT NULL,
  `satisfying` int(2) DEFAULT NULL COMMENT 'Calendar activities can have an scaled value for determine how satisfying the activity was',
  `challenging` int(2) DEFAULT NULL COMMENT 'Calendar activities can have an scaled value for determine how demanding the activity was',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `user_plract` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=230 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_nat_negcircle`
--

CREATE TABLE IF NOT EXISTS `widget_nat_negcircle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `negtht_id` int(11) DEFAULT '0',
  `step` int(11) NOT NULL,
  `text` text NOT NULL,
  `slider_val` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_nat_registration`
--

CREATE TABLE IF NOT EXISTS `widget_nat_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `negative_thoughts` text NOT NULL,
  `possible_response` text,
  `status` tinyint(3) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_negativecircle`
--

CREATE TABLE IF NOT EXISTS `widget_negativecircle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `step` int(11) DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_positive_experience`
--

CREATE TABLE IF NOT EXISTS `widget_positive_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_problem_goal`
--

CREATE TABLE IF NOT EXISTS `widget_problem_goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `problem` varchar(250) NOT NULL,
  `situation` varchar(250) NOT NULL,
  `goal` varchar(250) NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`answer_type`) REFERENCES `answer_type` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `quiz_ibfk_3` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`),
  ADD CONSTRAINT `quiz_ibfk_4` FOREIGN KEY (`taken_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration_token`
--
ALTER TABLE `registration_token`
  ADD CONSTRAINT `registration_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `response_ibfk_3` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `widget_activity_list`
--
ALTER TABLE `widget_activity_list`
  ADD CONSTRAINT `widget_activity_list_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widget_negativecircle`
--
ALTER TABLE `widget_negativecircle`
  ADD CONSTRAINT `widget_negativecircle_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widget_positive_experience`
--
ALTER TABLE `widget_positive_experience`
  ADD CONSTRAINT `widget_positive_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widget_problem_goal`
--
ALTER TABLE `widget_problem_goal`
  ADD CONSTRAINT `widget_problem_goal_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
