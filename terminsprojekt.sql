-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 18. 01 2015 kl. 12:02:13
-- Serverversion: 5.6.16
-- PHP-version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `terminsprojekt`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `brugere`
--

CREATE TABLE IF NOT EXISTS `brugere` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(55) NOT NULL,
  `Fornavn` varchar(55) NOT NULL,
  `Efternavn` varchar(55) NOT NULL,
  `Email` varchar(90) NOT NULL,
  `SidsteBesog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Adgangskode` varchar(90) DEFAULT NULL,
  `Billedeurl` varchar(55) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `brugere`
--

INSERT INTO `brugere` (`Id`, `Titel`, `Fornavn`, `Efternavn`, `Email`, `SidsteBesog`, `Adgangskode`, `Billedeurl`) VALUES
(1, 'Direktør', 'Anders', 'Hansen', 'info@slipseknuden.dk', '2015-01-16 08:23:59', '$2y$10$F1uHF2/CsCqlW1gLV2gxNe3OfQ2pi7XYwYCwPY2XTevQ7ei1VAuyG', 'anders.jpg'),
(2, 'Sælger', 'Jan', 'Fransen', 'info@slipseknuden.dk', '2015-01-15 10:00:16', '$2y$10$utwKHBi1COwQDS8JFmrDn.HAuXpoheOs.lc8PsiQRJwLwnFUZnqbm', 'jan.jpg'),
(3, 'Sekretær', 'Annelise', 'Johnson', 'annelise@slipseknuden.dk', '2015-01-15 09:59:09', '', 'annelise.jpg'),
(4, 'Administrator', 'Jesper', 'Jørgensen', 'jesper@codex-design.com', '2015-01-15 09:37:29', '$2y$10$VSwSmmhHd/j5yAJU0QbFpOqWpEYnq.C2f5.uqY1jbbp1Lg0Q2mDmW', 'none.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Bruger` varchar(55) NOT NULL,
  `Dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Beskrivelse` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Data dump for tabellen `log`
--

INSERT INTO `log` (`Id`, `Bruger`, `Dato`, `Beskrivelse`) VALUES
(1, '4', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(2, '4', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(3, '4', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(4, '4', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(5, '4', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(6, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(7, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(8, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(9, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(10, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(11, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(12, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(13, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(14, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(15, '3', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(16, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(17, '2', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(18, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(19, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(20, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(21, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(22, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(23, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(24, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(25, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.'),
(26, '1', '0000-00-00 00:00:00', 'Har skiftet sin titel.');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `maarke`
--

CREATE TABLE IF NOT EXISTS `maarke` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Navn` varchar(55) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `maarke`
--

INSERT INTO `maarke` (`Id`, `Navn`) VALUES
(1, 'Mærke 1'),
(2, 'Mærke 2'),
(3, 'Mærke 3');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `nyheder`
--

CREATE TABLE IF NOT EXISTS `nyheder` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(55) NOT NULL,
  `Indhold` text NOT NULL,
  `Dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `nyheder`
--

INSERT INTO `nyheder` (`Id`, `Titel`, `Indhold`, `Dato`) VALUES
(1, 'Nyhed 1', 'Dette er test indhold af nyheden, som kan være meget lang og meget godt, men det jo det gode ved Substr.', '2015-01-14 10:52:40'),
(2, 'Nyhed 2', 'Dette er test indhold af nyheden. Dette er dog ikke en meget lang nyhed.', '2015-01-14 10:52:49'),
(3, 'Nyhed 3', 'Dette er test indhold af nyheden. Det her "kan" måske godt være en meget land nyhed, måske. Det vides ikke :)', '2015-01-14 10:53:10');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `produkter`
--

CREATE TABLE IF NOT EXISTS `produkter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Navn` varchar(55) NOT NULL,
  `FK_Maarke` int(11) DEFAULT NULL,
  `Pris` int(11) NOT NULL,
  `Billedeurl` varchar(55) NOT NULL,
  `Beskrivelse` text NOT NULL,
  `Farve` varchar(55) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Data dump for tabellen `produkter`
--

INSERT INTO `produkter` (`Id`, `Navn`, `FK_Maarke`, `Pris`, `Billedeurl`, `Beskrivelse`, `Farve`) VALUES
(11, 'dqwdqwd', 1, 123, '1421402556_10_tern.jpg', '<p>qwdqwdqw</p>\r\n', 'wqdqwd'),
(12, 'dqwdqwd', 1, 123, '1421402556_10_tern.jpg', '<p>qwdqwdqw</p>\r\n', 'wqdqwd'),
(13, 'dqwdqwd', 1, 123, '1421402556_10_tern.jpg', '<p>qwdqwdqw</p>\r\n', 'wqdqwd'),
(14, 'dqwdqwd', 1, 123, '1421402556_10_tern.jpg', '<p>qwdqwdqw</p>\r\n', 'wqdqwd');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `sider`
--

CREATE TABLE IF NOT EXISTS `sider` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(55) NOT NULL,
  `Indhold` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `sider`
--

INSERT INTO `sider` (`Id`, `Titel`, `Indhold`) VALUES
(1, 'Forside', '<h2>Hvor startede det hele henne - hvem var de første der bar slips?</h2><br /><p>Man skal helt tilbage til omkring år 1660, hvor kong Ludvig den 14. regerede Frankrig, for at finde starten på det hele. Kongen gik utrolig meget op i mode og beklædning. Efter at kroatiske soldater havde besejret Det Osmanniske Rige, deltog kongen i et optog hvor alle soldaterne\n                                skulle gå forbi. Her bemærkede han at alle soldaterne bar et stykke rødt stof om halsen.\n                                Kongen\n                                var så begejstret for det lille stykke klæde, at han valgte at hans kongelige regiment\n                                skulle\n                                bære halsklude i farven rød.\n                                </p>\n                            <p>Halskluden blev hurtig populær i resten af Europa, og var\n                                man\n                                en\n                                herre med stil, skulle man bære det. Efterhånden som tiden gik og moden skiftede, blev\n                                kluden\n                                mere kraftig. Da man når til 1800 tallet, var der en modeskaber fra England, som af\n                                pratiske\n                                årsager valgte at gøre kluden mindre, så den ikke var så fremtrædende - det har udviklet\n                                sig\n                                til\n                                det vi i dag kalder slips. I dag er det ikke længere noget der kun bæres af en bestemt\n                                gruppe\n                                mennesker eller til jakkesæt. I dag bæres det af mange forskellige typer mennesker og\n                                slips\n                                findes i næsten lige så mange udgaver.</p>'),
(2, 'Om Slipseknuden', '<h2>Slipseknuden</h2><br /><p>Slipseknuden blev etableret i 1984 da og blev straks kendt som en butik med slips i de aller fineste kvalietsslips. Tilbage i 80''erne var der 5 ansatte og siden er det gået enormt stærkt, i dag er slipseknuden en verdensomspændende æde af slipsebutkker fordelt i hele europa med tusindvis af ansatte. Slipseknuden har kun det ypperste indenfor slips. Hos os finder du kvalitetsvarer der er usammenlignelige med andre slips. Et slips fra os vil bliver bemærket overalt du måtte færdes. Vores slips signalere kvaltet og god smag!</p>'),
(3, 'Garanti', '<h2>Reklamation</h2><br /><p>slipseknuden.eu kontrollerer alle varer inden afsendelse. Skulle der alligevel være fejl ved en ekspedition henvises til den returseddel, der følger med din ordre. Denne returseddel udfyldes og returneres sammen med varerne. Varer der returneres med reklamation, bliver repareret eller erstattet af en ny leverance indenfor 7 dage fra modtagelsen. Haves erstatningsvare ikke, vil det betalte beløb blive krediteret indenfor 7 dage. Derudover gælder naturligvis den 2-årige reklamationsfrist i henhold til købeloven.</p><p>Du er også velkommen til at kontakte vores kundeservice på salg@slipseknuden.eu eller tlf. (+45) 5944-1234. Vi beder dig have dit ordrenummer ved hånden.</p><br /><br /><p>Returadressen er:\nSlipseknuden<br>\nSlipsevej 79<br>\n4000 Holbæk<br>\nTelefon: 5944-1234<br>\nslips@slipseknuden.dk</p>'),
(4, 'Kontakt', '<p><b>Slipseknuden<br>\nSlipsevej 79<br>\n4300 Holbæk<br>\nTelefon: 5944-1234<br>\nslips@slipseknuden.dk</b></p>'),
(5, 'Nyheder', '<p>Indhold til nyhedssiden kan skrives her</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
