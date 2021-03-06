-- phpMyAdmin SQL Dump
-- version 3.3.7deb8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 27. Februar 2015 um 12:59
-- Server Version: 5.1.73
-- PHP-Version: 5.3.3-7+squeeze25

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ewebuki_mdebase`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_content`
--

CREATE TABLE IF NOT EXISTS `auth_content` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `neg` enum('-1','') DEFAULT '',
  `db` varchar(20) NOT NULL DEFAULT '',
  `tname` varchar(50) NOT NULL DEFAULT '',
  `ebene` text NOT NULL,
  `kategorie` text NOT NULL,
  PRIMARY KEY (`uid`,`gid`,`pid`,`db`,`tname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auth_content`
--

INSERT INTO `auth_content` (`uid`, `gid`, `pid`, `neg`, `db`, `tname`, `ebene`, `kategorie`) VALUES
(0, 1, 1, '', '', '/', '', ''),
(0, 1, 2, '', '', '/', '', ''),
(0, 1, 3, '', '', '/', '', ''),
(0, 1, 4, '', '', '/', '', ''),
(0, 1, 5, '', '', '/', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_group`
--

CREATE TABLE IF NOT EXISTS `auth_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `ggroup` varchar(30) NOT NULL DEFAULT '',
  `beschreibung` text NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `auth_group`
--

INSERT INTO `auth_group` (`gid`, `ggroup`, `beschreibung`) VALUES
(1, 'manager', 'manager');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_level`
--

CREATE TABLE IF NOT EXISTS `auth_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) NOT NULL DEFAULT '',
  `beschreibung` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `auth_level`
--

INSERT INTO `auth_level` (`lid`, `level`, `beschreibung`) VALUES
(1, 'cms_edit', 'berechtigt zum bearbeiten der templates'),
(2, 'cms_admin', 'berechtigt zur administration');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_member`
--

CREATE TABLE IF NOT EXISTS `auth_member` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auth_member`
--

INSERT INTO `auth_member` (`uid`, `gid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_priv`
--

CREATE TABLE IF NOT EXISTS `auth_priv` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `priv` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auth_priv`
--

INSERT INTO `auth_priv` (`pid`, `priv`) VALUES
(1, 'view'),
(2, 'edit'),
(3, 'publish'),
(4, 'admin'),
(5, 'add');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_right`
--

CREATE TABLE IF NOT EXISTS `auth_right` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `lid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auth_right`
--

INSERT INTO `auth_right` (`uid`, `lid`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_special`
--

CREATE TABLE IF NOT EXISTS `auth_special` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `suid` int(11) NOT NULL DEFAULT '0',
  `content` int(11) DEFAULT '0',
  `sdb` varchar(20) NOT NULL DEFAULT '',
  `stname` varchar(50) NOT NULL DEFAULT '',
  `sebene` text,
  `skategorie` text,
  `sbeschreibung` text,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `auth_special`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_user`
--

CREATE TABLE IF NOT EXISTS `auth_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nachname` varchar(40) NOT NULL DEFAULT '',
  `vorname` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `auth_user`
--

INSERT INTO `auth_user` (`uid`, `nachname`, `vorname`, `email`, `username`, `pass`) VALUES
(1, 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 'WFffxluy26Lew');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `db_leer`
--

CREATE TABLE IF NOT EXISTS `db_leer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field1` varchar(255) NOT NULL DEFAULT '',
  `field2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `db_leer`
--

INSERT INTO `db_leer` (`id`, `field1`, `field2`) VALUES
(1, 'Erster Eintrag', 'Zweite Spalte'),
(2, 'Zweiter Eintrag', 'Zweite Spalte');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_file`
--

CREATE TABLE IF NOT EXISTS `site_file` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `frefid` int(11) NOT NULL DEFAULT '0',
  `fuid` int(11) NOT NULL DEFAULT '0',
  `fdid` int(11) NOT NULL DEFAULT '0',
  `ftname` varchar(255) NOT NULL DEFAULT '',
  `ffname` varchar(255) NOT NULL DEFAULT '',
  `ffart` enum('gif','jpg','png','pdf','zip','odt','ods','odp','gz','bz2','csv') NOT NULL DEFAULT 'jpg',
  `fdesc` text NOT NULL,
  `funder` varchar(255) DEFAULT NULL,
  `fhit` varchar(255) DEFAULT NULL,
  `fdel` text,
  `fgroups` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Daten für Tabelle `site_file`
--

INSERT INTO `site_file` (`fid`, `frefid`, `fuid`, `fdid`, `ftname`, `ffname`, `ffart`, `fdesc`, `funder`, `fhit`, `fdel`, `fgroups`) VALUES
(1, 0, 1, 0, '', 'ewebuki_160x67.png', 'png', 'eWeBuKi Logo Beschreibung', 'eWeBuKi Logo Unterschift', '', NULL, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_form`
--

CREATE TABLE IF NOT EXISTS `site_form` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `flabel` varchar(20) NOT NULL DEFAULT '',
  `ftname` varchar(40) NOT NULL DEFAULT '',
  `fsize` varchar(7) NOT NULL DEFAULT '0',
  `fclass` varchar(30) NOT NULL DEFAULT '',
  `fstyle` varchar(60) NOT NULL DEFAULT '',
  `foption` enum('file','hidden','password','pgenum','readonly') DEFAULT NULL,
  `frequired` enum('0','-1') NOT NULL DEFAULT '0',
  `fcheck` text NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `site_form`
--

INSERT INTO `site_form` (`fid`, `flabel`, `ftname`, `fsize`, `fclass`, `fstyle`, `foption`, `frequired`, `fcheck`) VALUES
(1, 'username', '210295197.modify', '0', '', '', NULL, '-1', ''),
(2, 'pass', '210295197.modify', '0', '', '', 'password', '-1', ''),
(3, 'pass', '852881080.modify', '0', '', '', 'password', '-1', ''),
(4, 'fid', '-939795212.modify', '0', 'hidden', '', 'hidden', '-1', ''),
(6, 'fdesc', '-939795212.modify', '25', '', '', NULL, '0', ''),
(7, 'funder', '-939795212.modify', '30', '', '', NULL, '0', ''),
(8, 'fhit', '-939795212.modify', '30', '', '', NULL, '0', ''),
(9, 'entry', '-555504947.add', '0', '', '', NULL, '-1', 'PREG:^[a-z_\\-\\.0-9]+$'),
(10, 'entry', '-555504947.edit', '0', '', '', NULL, '-1', 'PREG:^[a-z_\\-\\.0-9]+$'),
(11, 'new_keyword', '1950102507.rename_tag', '0', '', '', NULL, '-1', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_form_lang`
--

CREATE TABLE IF NOT EXISTS `site_form_lang` (
  `flid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL DEFAULT '0',
  `flang` varchar(5) NOT NULL DEFAULT 'de',
  `fpgenum` text,
  `fwerte` varchar(255) NOT NULL DEFAULT '',
  `ferror` varchar(255) NOT NULL DEFAULT '',
  `fdberror` varchar(255) NOT NULL DEFAULT '',
  `fchkerror` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`flid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `site_form_lang`
--

INSERT INTO `site_form_lang` (`flid`, `fid`, `flang`, `fpgenum`, `fwerte`, `ferror`, `fdberror`, `fchkerror`) VALUES
(1, 1, 'de', NULL, '', 'Username darf nicht leer sein.', 'Username bereits vorhanden.', ''),
(2, 2, 'de', NULL, '', 'Passworte nicht identisch oder leer.', '', ''),
(3, 3, 'de', NULL, '', 'Passworte nicht identisch oder leer.', '', ''),
(9, 9, 'de', NULL, '', '', '', 'Ungültige Zeichen im Feld Eintrag.'),
(10, 10, 'de', NULL, '', '', '', 'Ungültige Zeichen im Feld Eintrag.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_keyword`
--

CREATE TABLE IF NOT EXISTS `site_keyword` (
  `kid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(40) NOT NULL DEFAULT '',
  `ebene` text NOT NULL,
  `kategorie` text NOT NULL,
  `lang` varchar(5) NOT NULL DEFAULT '',
  `word` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`kid`),
  UNIQUE KEY `kid` (`kid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `site_keyword`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_lock`
--

CREATE TABLE IF NOT EXISTS `site_lock` (
  `lang` varchar(5) NOT NULL DEFAULT '',
  `label` varchar(20) NOT NULL DEFAULT '',
  `tname` varchar(40) NOT NULL DEFAULT '',
  `byalias` varchar(20) NOT NULL DEFAULT '',
  `lockat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`lang`,`label`,`tname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `site_lock`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_menu`
--

CREATE TABLE IF NOT EXISTS `site_menu` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `refid` int(10) DEFAULT '0',
  `entry` varchar(30) NOT NULL DEFAULT '',
  `picture` varchar(128) DEFAULT NULL,
  `sort` int(8) NOT NULL DEFAULT '1000',
  `hide` enum('-1') DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `mandatory` enum('-1') DEFAULT NULL,
  `defaulttemplate` enum('default1','default2','default3','default4') NOT NULL DEFAULT 'default1',
  PRIMARY KEY (`mid`),
  UNIQUE KEY `DUPE` (`refid`,`entry`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `site_menu`
--

INSERT INTO `site_menu` (`mid`, `refid`, `entry`, `picture`, `sort`, `hide`, `level`, `mandatory`, `defaulttemplate`) VALUES
(1, 0, 'demo', NULL, 10, NULL, NULL, NULL, 'default1'),
(2, 0, 'show', NULL, 20, NULL, NULL, NULL, 'default1'),
(3, 0, 'bilderstrecke', NULL, 30, NULL, NULL, NULL, 'default1'),
(4, 0, 'slimbox2', '', 40, NULL, NULL, NULL, 'default1'),
(5, 0, 'doku', '', 50, NULL, NULL, NULL, 'default1'),
(6, 5, 'kapitel1', '', 10, NULL, NULL, NULL, 'default1'),
(7, 6, 'punkt_1', '', 10, NULL, NULL, NULL, 'default1'),
(8, 6, 'punkt_2', '', 20, NULL, NULL, NULL, 'default1'),
(9, 5, 'kapitel_2', '', 20, NULL, NULL, NULL, 'default1'),
(10, 0, 'fehler', NULL, 60, NULL, NULL, NULL, 'default1'),
(11, 0, 'impressum', NULL, 70, NULL, NULL, NULL, 'default1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_menu_lang`
--

CREATE TABLE IF NOT EXISTS `site_menu_lang` (
  `mlid` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(10) NOT NULL DEFAULT '0',
  `lang` varchar(5) NOT NULL DEFAULT 'de',
  `label` varchar(30) NOT NULL DEFAULT '',
  `exturl` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`mlid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `site_menu_lang`
--

INSERT INTO `site_menu_lang` (`mlid`, `mid`, `lang`, `label`, `exturl`) VALUES
(1, 1, 'de', 'Demo', NULL),
(2, 2, 'de', 'eWeBuKi Show', NULL),
(3, 3, 'de', 'Bilderstrecke', NULL),
(4, 4, 'de', 'Slimbox 2', NULL),
(5, 5, 'de', 'Doku', NULL),
(6, 6, 'de', 'Kapitel 1', NULL),
(7, 7, 'de', 'Punkt 1', NULL),
(8, 8, 'de', 'Punkt 2', NULL),
(9, 9, 'de', 'Kapitel 2', NULL),
(10, 10, 'de', '404', NULL),
(11, 11, 'de', 'Impressum', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `site_text`
--

CREATE TABLE IF NOT EXISTS `site_text` (
  `lang` varchar(5) NOT NULL DEFAULT 'de',
  `label` varchar(20) NOT NULL DEFAULT '',
  `tname` varchar(40) NOT NULL DEFAULT '',
  `version` int(11) NOT NULL DEFAULT '0',
  `ebene` text NOT NULL,
  `kategorie` text NOT NULL,
  `crc32` enum('-1','0') NOT NULL DEFAULT '-1',
  `html` enum('-1','0') NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `changed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bysurname` varchar(40) NOT NULL DEFAULT '',
  `byforename` varchar(40) NOT NULL DEFAULT '',
  `byemail` varchar(60) NOT NULL DEFAULT '',
  `byalias` varchar(20) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lang`,`label`,`tname`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=1;

--
-- Daten für Tabelle `site_text`
--

INSERT INTO `site_text` (`lang`, `label`, `tname`, `version`, `ebene`, `kategorie`, `crc32`, `html`, `content`, `changed`, `bysurname`, `byforename`, `byemail`, `byalias`, `status`) VALUES
('de', 'abort', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'content', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Inhalt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'entry', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Eintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_menu', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Fehler beim löschen des Menüeintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_menu_lang', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Fehler beim löschen der Sprache(n)', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_text', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Fehler beim löschen des/r Text/e', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Den Menüpunkt "!#ausgaben_entry" wirklich löschen?', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'languages', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Sprachen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'no_content', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Kein Inhalt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-555504947.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Menü-Editor - Menüpunkt löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Neue Sprache hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'basic', '-555504947.edit-multi', 0, '/admin/menued', 'add', '-1', '0', 'Allgemein', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'delete', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Diese Sprache löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'entry', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Eintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_lang_add', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Diese Sprache ist bereits vorhanden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_lang_delete', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Die Entwickler Sprache kann nicht gelöscht werden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_result', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'DB Fehler: ', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'extended', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Speziell', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'exturl', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'externe Url', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hide', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Deaktiviert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'label', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Bezeichnung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'lang', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'language', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Sprachen Verwaltung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'benötigter Level', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'madatory', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Erzwungen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'new_lang', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Neue Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'refid', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Ref. ID', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sort', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Sortierung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'template', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Template', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Menü-Editor - Menüpunkt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Neue Sprache hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'basic', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Allgemein', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'entry', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Eintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_lang_add', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Diese Sprache ist bereits vorhanden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_lang_delete', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Die Entwickler Sprache kann nicht gelöscht werden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_result', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'DB Fehler: ', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'extended', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Speziell', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'exturl', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'ext. Url', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hide', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Versteckt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'label', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Bezeichnung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'lang', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'benötigter Level', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'madatory', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Erzwungen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'new_lang', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Neue Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'refid', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Ref ID.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sort', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Sortierung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'template', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Template', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'Menü-Editor - Menüpunkt bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_add', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Unterpunkt hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_delete', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_down', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Sortierung - Nach unten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_edit', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_move', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Im Menü Baum verschieben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_up', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Sortierung - Nach oben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'disabled', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Abgeschaltet', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'enabled', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Eingeschaltet', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error1', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Menüpunkte mit Unterpunkten lassen sich nicht löschen.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'extern', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', '(extern)', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'renumber', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Neu durchnummerieren', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Menu-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'entry', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Eintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'extern', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', '(extern)', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'root', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Ins Hauptmenü', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'Menü-Editor - Menüpunkt verschieben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'chkpass', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Wiederholung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Passwort ändern', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'newpass', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Neues', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'oldpass', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Altes', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Passwort Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'auth', 0, '', 'index', '-1', '0', 'Intern', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'desc', 'auth', 0, '', 'index', '-1', '0', 'Werkzeuge', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fileed', 'auth', 0, '', 'index', '-1', '0', 'Datei-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'leveled', 'auth', 0, '', 'index', '-1', '0', 'Level-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'menued', 'auth', 0, '', 'index', '-1', '0', 'Menü-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'nachher', 'auth', 0, '', 'index', '-1', '0', 'ist angemeldet.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'passed', 'auth', 0, '', 'index', '-1', '0', 'Passwort-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'usered', 'auth', 0, '', 'index', '-1', '0', 'User-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'vorher', 'auth', 0, '', 'index', '-1', '0', 'Benutzer', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Datei einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'b', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Fett', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'big', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Grösser als der Rest', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'br', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Erzwungener Umbruch', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'cent', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Zentriert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'center', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Zentriert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'cite', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Logisch: cite', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'col', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Tabellenspalte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'db', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'DB', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'div', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Bereich', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'e', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Mail', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'em', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Logisch: emphatisch', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'email', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'eMail Link', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Datei', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'files', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Dateien', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h1', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Überschrift Klasse 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h2', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Überschrift Klasse 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hl', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Spezielle Trennlinie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hr', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Trennlinie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'i', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Kursiv', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'img', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Bild', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'imgb', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Bild mit Rahmen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'in', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Initial', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'label', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Marke', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'language', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'link', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Link', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'list', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Liste', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'm1', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Menü dieser Ebene', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'm2', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Menü der Unterebene', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'pre', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Vorformatiert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'quote', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'In Anführungszeichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'row', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Tabellenzeile', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 's', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Durchgestrichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'save', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Speichern', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'small', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Kleiner als der Rest', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sp', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Geschütztes Leerzeichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'strong', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Logisch: strong', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sub', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Tiefgestellt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sup', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Hochgestellt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'tab', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Tabelle', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'tagselect', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Tag auswählen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'template', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Template', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'tt', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Dickengleich', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'u', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Unterstrichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'up', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Zurück-Link', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'upload', 'cms.edit.cmstag', 0, '', 'index', '-1', '0', 'Hinaufladen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '404', 0, '', 'seitenfehler', '-1', '0', '[H1]Fehler 404 - Nicht gefunden.[/H1]\r\n\r\n[P]Die Uri !#ausgaben_404seite wurde nicht gefunden.\r\n\r\nLeider konnte das System nicht feststellen woher sie gekommen sind.[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'modcol', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Funktionen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_dupe', '-555504947.edit-single', 0, '/admin/menued', 'add', '-1', '0', 'Der Eintrag ist bereits vorhanden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '404referer', 0, '', 'seitenfehler', '-1', '0', '[H1]Fehler 404 - Nicht gefunden.[/H1]\r\n\r\n[P]Die Uri: !#ausgaben_404seite wurde nicht gefunden.\r\n\r\nDie [LINK=!#ausgaben_404referer]Seite[/LINK] enthält einen falschen/alten Link.[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_dupe', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'Der Eintrag ist bereits vorhanden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_dupe', '-555504947.move', 0, '/admin/menued', 'move', '-1', '0', 'In dieser Ebene existiert bereits ein Eintrag mit gleichem Namen.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'logout', 'auth', 0, '', 'auth.login', '-1', '0', 'Abgemeldet', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'denied', 'auth', 0, '', 'auth.login', '-1', '0', 'Zugriff verweigert!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'picture', '-555504947.edit-multi', 0, '/admin/menued', 'edit', '-1', '0', 'evt. Bild', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'picture', '-555504947.edit-single', 0, '/admin/menued', 'edit', '-1', '0', 'evt. Bild', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-840786483.list', 0, '/admin/menued', 'list', '-1', '0', 'Level-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-840786483.modify', 0, '/admin/menued', 'edit', '-1', '0', 'Level-Editor - Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '-840786483.modify', 0, '/admin/leveled', 'modify', '-1', '0', 'Bezeichnung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'description', '-840786483.modify', 0, '/admin/leveled', 'modify', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'del', '-840786483.modify', 0, '/admin/leveled', 'edit', '-1', '0', 'Entfernen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '-840786483.modify', 0, '/admin/leveled', 'edit', '-1', '0', 'Hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'login', '210295197.list', 0, '/admin/usered', 'list', '-1', '0', 'Login', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-840786483.delete', 0, '/admin/leveled', 'modify', '-1', '0', 'Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-840786483.delete', 0, '/admin/leveled', 'modify', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'frage', '-840786483.delete', 0, '/admin/leveled', 'modify', '-1', '0', 'Wollen Sie den Level "!#ausgaben_level" wirklich löschen?', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Bezeichnung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'user', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'beschreibung', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'edit', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'list', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-840786483.details', 0, '/admin/leveled', 'details', '-1', '0', 'Level Editor - Eigenschaften', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-840786483.delete', 0, '/admin/leveled', 'modify', '-1', '0', 'Level-Editor - Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '210295197.list', 0, '/admin/usered', 'list', '-1', '0', 'User-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Datei-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'search', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Suche', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'gesamt', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Gesamt:', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fileedit', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'filedelete', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ffname', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Dateiname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fdesc', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Bildbeschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'funder', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Bildunterschrift', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fhit', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Schlagworte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'upa', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Die aktuelle Datei durch', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'upb', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'ersetzen.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-939795212.modify', 0, '/admin', 'usered', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'cmslink', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'zum Content Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '-840786483.list', 0, '/admin/leveled', 'list', '-1', '0', 'Bezeichnung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'beschreibung', '-840786483.list', 0, '/admin/leveled', 'list', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'delete', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'edit', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'back', 'global', 0, '/admin/leveled', 'details', '-1', '0', 'Zurück', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'members', '-840786483.delete', 0, '/admin/leveled', 'delete', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'User-Editor - Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_oldpass', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Das alte Passwort stimmt nicht!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_chkpass', '852881080.modify', 0, '/admin/passed', 'modify', '-1', '0', 'Das Neue Passwort und die Wiederholung stimmen nicht überein!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'nachname', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'Nachname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'vorname', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'Vorname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'email', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'eMail', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', 'global', 0, '/admin/usered', 'edit', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'frage', '210295197.delete', 0, '/admin/usered', 'modify', '-1', '0', 'Wollen Sie den User "!#ausgaben_username" wirklich löschen?', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'login', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'Login', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '210295197.delete', 0, '/admin/usered', 'modify', '-1', '0', 'User-Editor - Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'User-Editor - Eigenschaften', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'username', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'Login', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'newpass', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'Passwort', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'chkpass', '210295197.modify', 0, '/admin/usered', 'modify', '-1', '0', 'Wiederholung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'base', 0, '', 'impressum', '-1', '0', 'Menu', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'copyright', 'base', 0, '', 'index', '-1', '0', 'eWeBuKi - Copyright 2003-2015', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'kekse', 'base', 0, '', 'impressum', '-1', '0', 'Kekse', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'bloged', 'auth', 0, '/admin/passed', 'modify', '-1', '0', 'Blog-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-939795212.delete', 0, '/admin/menued', 'list', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-939795212.delete', 0, '/admin/menued', 'list', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-939795212.delete', 0, '/admin/menued', 'delete', '-1', '0', 'Datei Editor - Datei löschen!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'code', '-141347382.modify', 0, '', 'bilderstrecke', '-1', '0', 'Quelltext', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-939795212.upload', 0, '/admin/menued', 'list', '-1', '0', 'Datei-Editor Upload', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file', '-939795212.upload', 0, '/admin/menued', 'list', '-1', '0', 'Dateiauswahl', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'send', '-939795212.upload', 0, '/admin/menued', 'list', '-1', '0', 'Abschicken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', '-939795212.upload', 0, '/admin/menued', 'edit', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', '-939795212.upload', 0, '/admin/menued', 'edit', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-939795212.modify', 0, '/admin/menued', 'add', '-1', '0', 'Datei-Editor - Datei Eigenschaften bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'answera', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Ihre Schnellsuche nach', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'answerb', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'hat', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'answerc_no', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'keine Einträge gefunden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'answerc_yes', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'folgende Einträge gefunden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'next', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Vorherige Seite', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'prev', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Nexte Seite', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'filecollect', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Gruppieren', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Gruppierung - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_edit', '-939795212.modify', 0, '/admin/fileed', 'edit', '-1', '0', 'Bild kann nur vom Eigentümer bearbeitet werden.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'references', '-939795212.modify', 0, '/admin/fileed', 'edit', '-1', '0', 'Ist enthalten in:', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'details', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Details', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'new', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Neuer Eintrag', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'special', '210295197.delete', 0, '/admin/usered', 'delete', '-1', '0', 'Spezial Rechte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'reset', 'global', 0, '/admin/usered', 'edit', '-1', '0', 'Zurücksetzen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'abort', 'global', 0, '/admin/usered', 'edit', '-1', '0', 'Abbrechen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'del', '210295197.modify', 0, '/admin/usered', 'edit', '-1', '0', 'Nehmen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'actual', '210295197.modify', 0, '/admin/usered', 'edit', '-1', '0', 'Besitzt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'avail', '210295197.modify', 0, '/admin/usered', 'edit', '-1', '0', 'Verfügbar', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '210295197.modify', 0, '/admin/usered', 'edit', '-1', '0', 'Geben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'actual', '-840786483.modify', 0, '/admin/leveled', 'edit', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'avail', '-840786483.modify', 0, '/admin/leveled', 'edit', '-1', '0', 'Verfügbar', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'surname', '210295197.list', 0, '/admin/usered', 'list', '-1', '0', 'Nachname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'forename', '210295197.list', 0, '/admin/usered', 'list', '-1', '0', 'Vorname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'right', '210295197.delete', 0, '/admin/usered', 'delete', '-1', '0', 'Rechte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-2051315182.list', 0, '/admin/bloged', 'list', '-1', '0', 'Blog-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'anzahl', 'global', 0, '/admin/leveled', 'list', '-1', '0', 'Einträge: ', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'surname', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'Nachname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'forename', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'Vorname', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'email', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'E-Mail', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'level', '210295197.details', 0, '/admin/usered', 'details', '-1', '0', 'Rechte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'acr', '-141347382.modify', 0, '', 'bilderstrecke', '-1', '0', 'Akronym', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-102562964.list', 0, '/admin/grouped', 'list', '-1', '0', 'Gruppen-Editor - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'filelist', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'Datei-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'filecompilation', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'Gruppierung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fileupload', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'Upload', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'group', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Gruppe', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'search', '-939795212.compilation', 0, '/admin/fileed', 'list', '-1', '0', 'Suche', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'compilation_search', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Galerien', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'compilation', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Galerie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'of', '-939795212.compilation', 0, '/admin/fileed', 'list', '-1', '0', 'von', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'group', '-102562964.list', 0, '/admin/grouped', 'list', '-1', '0', 'Gruppe', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error0', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Kein Fehler, Datei entspricht den Vorgaben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'beschreibung', '-102562964.list', 0, '/admin/grouped', 'list', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error1', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Die hochgeladene Datei überschreitet die Größenbeschränkung "upload_max_filesize" der php.ini!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error2', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Die hochgeladene Datei überschreitet die im Formular festgelegte "MAX_FILE_SIZE"-Anweisung!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'group', '-102562964.modify', 0, '/admin/grouped', 'add', '-1', '0', 'Gruppe', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error3', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Die Datei wurde nur teilweise hochgeladen!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error4', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Es wurde keine Datei hochgeladen!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error6', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Es ist kein temporäres Upload-Verzeichnis verfügbar!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error7', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Es kann nicht auf die Platte geschrieben werden!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error8', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Der Upload wurde von einer Erweiterung verhindert!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error10', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Die Datei ist zu groß!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error11', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Ungültiges Dateiformat!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error12', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Die Datei ist schon vorhanden!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error13', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Unbekannter Fehler. Eventuell ist die "post_max_size" der php.ini die Ursache. Bitte nicht weiter probieren!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'file_error14', 'global', 0, '/admin/fileed', 'upload', '-1', '0', 'Es wird mindestens die PHP-Version 4.x.x benötigt!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'avail', '-102562964.modify', 0, '/admin/grouped', 'add', '-1', '0', 'Verfügbar', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'actual', '-102562964.modify', 0, '/admin/grouped', 'edit', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'del', '-102562964.modify', 0, '/admin/grouped', 'edit', '-1', '0', 'Entfernen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '-102562964.modify', 0, '/admin/grouped', 'edit', '-1', '0', 'Hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'description', '-102562964.modify', 0, '/admin/grouped', 'edit', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'frage', '-102562964.delete', 0, '/admin/grouped', 'delete', '-1', '0', 'Wollen Sie die Gruppe "!#ausgaben_ggroup" wirklich löschen ?', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'members', '-102562964.delete', 0, '/admin/grouped', 'delete', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'user', '-102562964.details', 0, '/admin/grouped', 'details', '-1', '0', 'Mitglieder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'group', '-102562964.details', 0, '/admin/grouped', 'details', '-1', '0', 'Gruppe', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'beschreibung', '-102562964.details', 0, '/admin/grouped', 'details', '-1', '0', 'Beschreibung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-102562964.details', 0, '/admin/grouped', 'details', '-1', '0', 'Gruppen-Editor - Eigenschaften', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-102562964.delete', 0, '/admin/grouped', 'delete', '-1', '0', 'Gruppen-Editor - Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-102562964.modify', 0, '/admin/grouped', 'edit', '-1', '0', 'Gruppen-Editor - Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_dupe', '-102562964.modify', 0, '/admin/grouped', 'add', '-1', '0', 'Fehler: Es gibt bereits eine Gruppe mit diesem Namen !', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'secret', 'auth', 0, '', 'auth', '-1', '0', 'Hintereingang', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'all_files', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'Dateien', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sel_files', 'global', 0, '/admin/fileed', 'list', '-1', '0', 'Markierte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'images', '-939795212.list', 0, '/admin/fileed', 'list', '-1', '0', 'Bilder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_jump', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'zur Content-Seite', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'grouped', 'auth', 0, '', 'auth', '-1', '0', 'Gruppen-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'url', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Pfad: ', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'actual', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Vorhanden Rechte für diese Url', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1);
INSERT INTO `site_text` (`lang`, `label`, `tname`, `version`, `ebene`, `kategorie`, `crc32`, `html`, `content`, `changed`, `bysurname`, `byforename`, `byemail`, `byalias`, `status`) VALUES
('de', 'group', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Gruppen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'priv', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Rechte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Rechte-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'delete_ok', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'wird gelöscht!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'Folgende Dateien wurden zum löschen ausgewählt:', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'user_error', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'Sie sind nicht Eigentümer dieser Datei!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'content_error', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'ist enthalten auf', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'group_error', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'ist enthalten in folgender Gruppe:', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'delete_error', '-939795212.delete', 0, '/admin/fileed', 'delete', '-1', '0', 'Datei konnte nicht gelöscht werden!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'root', '-555504947.list', 0, '/admin/menued', 'move', '-1', '0', 'Als Hauptpunkt anlegen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'compilation_info', 'global', 0, '/impressum', 'test', '-1', '0', 'Fotostrecke starten: Klicken Sie auf ein Bild', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add', '807284226.modify', 0, '/admin/righted', 'edit', '-1', '0', 'Hinzufügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'compilation_pics', 'global', 0, '/impressum', 'test', '-1', '0', 'Bilder', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'of', 'global', 0, '/impressum/test', 'view', '-1', '0', 'von', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'selected', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'ausgewählte Selektion(en):', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sel_show', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Nur diese anzeigen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'num_pics', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Bilder insgesamt: ', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'all_names', '-939795212.compilation', 0, '/admin/fileed', 'compilation', '-1', '0', 'Alle verwendeten Titel', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'continue', '-939795212.modify', 0, '/admin/fileed', 'add', '-1', '0', 'Überspringen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'bundle_zip', '-939795212.modify', 0, '/admin/fileed', 'add', '-1', '0', 'Dateien zu einer Gruppe zusammenfassen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_sort', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Sortierung', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'button_desc_right', '-555504947.list', 0, '/admin/menued', 'list', '-1', '0', 'Rechte vergeben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h1', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'box', '-141347382.modify', 0, '', 'index', '-1', '0', 'Kasten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'p', '-141347382.modify', 0, '', 'index', '-1', '0', 'Absatz', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h2', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h3', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 3', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-141347382.modify', 0, '', 'index', '-1', '0', 'Content-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'template', '-141347382.modify', 0, '', 'index', '-1', '0', 'Template', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'label', '-141347382.modify', 0, '', 'index', '-1', '0', 'Marke', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'language', '-141347382.modify', 0, '', 'index', '-1', '0', 'Sprache', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h4', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 4', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'version', '-141347382.modify', 0, '', 'index', '-1', '0', 'Version', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'db', '-141347382.modify', 0, '', 'index', '-1', '0', 'Datenbank', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h5', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 5', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'h6', '-141347382.modify', 0, '', 'index', '-1', '0', 'Überschrift Gr. 6', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'pre', '-141347382.modify', 0, '', 'index', '-1', '0', 'Vorformatiert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'div', '-141347382.modify', 0, '', 'index', '-1', '0', 'Style Element', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'list', '-141347382.modify', 0, '', 'index', '-1', '0', 'Liste', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hr', '-141347382.modify', 0, '', 'index', '-1', '0', 'Trennlinie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'table', '-141347382.modify', 0, '', 'index', '-1', '0', 'Tabelle komplett', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'tab', '-141347382.modify', 0, '', 'index', '-1', '0', 'Tabelle', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'row', '-141347382.modify', 0, '', 'index', '-1', '0', 'Zeile', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'col', '-141347382.modify', 0, '', 'index', '-1', '0', 'Spalte', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'br', '-141347382.modify', 0, '', 'index', '-1', '0', 'Umbruch erzwingen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'b', '-141347382.modify', 0, '', 'index', '-1', '0', 'Fett', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'img', '-141347382.modify', 0, '', 'index', '-1', '0', 'Bild einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'link', '-141347382.modify', 0, '', 'index', '-1', '0', 'Link einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'em', '-141347382.modify', 0, '', 'index', '-1', '0', 'Emphatisch', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'strong', '-141347382.modify', 0, '', 'index', '-1', '0', 'Stark betont', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'cite', '-141347382.modify', 0, '', 'index', '-1', '0', 'Zitat', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'i', '-141347382.modify', 0, '', 'index', '-1', '0', 'Kursiv', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'tt', '-141347382.modify', 0, '', 'index', '-1', '0', 'Dicktengleich', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'u', '-141347382.modify', 0, '', 'index', '-1', '0', 'Unterstrichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 's', '-141347382.modify', 0, '', 'index', '-1', '0', 'Durchgestrichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'st', '-141347382.modify', 0, '', 'index', '-1', '0', 'Durchgestrichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'big', '-141347382.modify', 0, '', 'index', '-1', '0', 'Größer', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'small', '-141347382.modify', 0, '', 'index', '-1', '0', 'Kleiner', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sub', '-141347382.modify', 0, '', 'index', '-1', '0', 'Tiefgestellt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sup', '-141347382.modify', 0, '', 'index', '-1', '0', 'Hochgestellt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ank', '-141347382.modify', 0, '', 'index', '-1', '0', 'Sprung Marke', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'email', '-141347382.modify', 0, '', 'index', '-1', '0', 'E-Mail Adresse einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hs', '-141347382.modify', 0, '', 'index', '-1', '0', 'Bearbeiten Marke', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'hl', '-141347382.modify', 0, '', 'index', '-1', '0', 'Eigene horizontale Trennlinie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'imgb', '-141347382.modify', 0, '', 'index', '-1', '0', 'Bild erweitert einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'in', '-141347382.modify', 0, '', 'index', '-1', '0', 'Initial', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'quote', '-141347382.modify', 0, '', 'index', '-1', '0', 'Anführungszeichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sel', '-141347382.modify', 0, '', 'index', '-1', '0', 'Gruppierung einfügen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'sp', '-141347382.modify', 0, '', 'index', '-1', '0', 'Geschütztes Leerzeichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'charakters', '-141347382.modify', 0, '', 'index', '-1', '0', 'Übrige Zeichen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'e', '-141347382.modify', 0, '', 'index', '-1', '0', 'eWeBuKi Tag darstellen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', '!', '-141347382.modify', 0, '', 'index', '-1', '0', 'Unsichtbarer Kommentar', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'm0', '-141347382.modify', 0, '', 'index', '-1', '0', 'Menü oberhalb', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'm1', '-141347382.modify', 0, '', 'index', '-1', '0', 'Menü gleiche Ebene', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'm2', '-141347382.modify', 0, '', 'index', '-1', '0', 'Menü unterhalb', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'up', '-141347382.modify', 0, '', 'index', '-1', '0', 'Im Menü nach oben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'prev', '-141347382.modify', 0, '', 'index', '-1', '0', 'Vorheriger Menüpunkt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'next', '-141347382.modify', 0, '', 'index', '-1', '0', 'Nächster Menüpunkt', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'int', '-141347382.modify', 0, '', 'index', '-1', '0', 'Intelligenter Link (deprecated)', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'zip_stdval', '-939795212.modify', 0, '/admin/fileed', 'add', '-1', '0', '[H2]Standardwerte für die entpackten Dateien[/H2]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'history', 'global', 0, '', 'auth', '-1', '0', 'Historie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'center', '-141347382.modify', 0, '', 'index', '-1', '0', 'Zentriert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'picture', 'global', 0, '/bilderstrecke', 'view', '-1', '0', 'Bild', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'next', 'global', 0, '/bilderstrecke', 'view', '-1', '0', 'Nächstes', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'overwrite', 'global', 0, '', '', '-1', '0', 'Überschreiben', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'prev', 'global', 0, '/bilderstrecke', 'view', '-1', '0', 'Vorheriges', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'zip', '-939795212.modify', 0, '/admin/fileed', 'add', '-1', '0', '[H1]Archiv-Inhalt[/H1]\r\n[P]Das Archiv enthält folgende Dateien:[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'extract', 'global', 0, '', '', '-1', '0', 'Entpacken', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'keywords', 'base', 0, '', '', '-1', '0', 'Schlagwörter', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'rel_pages', 'base', 0, '', '', '-1', '0', 'Ähnliche Seiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'add_keywords', 'global', 0, '', '', '-1', '0', 'Verschlagworten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'all_keywords', 'keyworded.list', 0, '/keywords', 'list', '-1', '0', 'alle Schlagwörter', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'keyworded.list', 0, '/keywords', 'list', '-1', '0', 'Schlagwörter', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'pages', 'keyworded.list', 0, '/keywords', 'list', '-1', '0', 'gefundende Seiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'edit_page', 'keyworded.list', 0, '/keywords', 'list', '-1', '0', 'Schlagwörter der Seite bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'edit_keyword', 'keyworded.list', 0, '/keywords', 'list', '-1', '0', 'Schlagwort umbenennen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'keyworded.edit_page', 0, '/keywords', 'edit_page', '-1', '0', 'Seite verschlagworten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'url', 'keyworded.edit_page', 0, '/keywords', 'edit_page', '-1', '0', 'Pfad', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'keyword', 'keyworded.edit_page', 0, '/keywords', 'edit_page', '-1', '0', 'Schlagwörter', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'error_right', 'keyworded.edit_page', 0, '/keywords', 'edit_page', '-1', '0', 'Sie sind nicht berechtigt, diese Seite zu verschlagworten!', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'keyworded.rename_tag', 0, '/keywords', 'rename_tag', '-1', '0', 'Schlagwort umbenennen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'old_keyword', 'keyworded.rename_tag', 0, '/keywords', 'rename_tag', '-1', '0', 'Altes Schlagwort', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'new_keyword', 'keyworded.rename_tag', 0, '/keywords', 'rename_tag', '-1', '0', 'Neues Schlagwort', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'toggle_zip', '-939795212.modify', 0, '', '', '-1', '0', 'zip-Datei bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'version', 'global', 0, '', 'demo', '-1', '0', 'Neue Version', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'esearch', '-939795212.list', 0, '', '', '-1', '0', 'erweiterte Suche', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'fowner', '-939795212.modify', 0, '', '', '-1', '0', 'Eigentümer', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'allowed_groups', '-939795212.modify', 0, '', '', '-1', '0', 'Mitglieder folgender Gruppen dürfen die Datei bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'all_groups_allowed', '-939795212.modify', 0, '', '', '-1', '0', 'Datei darf von allen bearbeitet werden', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ref_comp', '-939795212.modify', 0, '', '', '-1', '0', 'Ist enthalten in folgenden Gruppierungen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift_edit', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Gruppierung bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Zum Anordnen ziehen Sie die Bilder aus der "Ablage" in den Bereich "Gruppiert"', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'chosen', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Gruppiert', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'dashboard', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Ablage', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'get_pics', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Bilder holen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift_add', '-939795212.collect', 0, '/admin/fileed', 'collect', '-1', '0', 'Neue Bildergalerie', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'save', 'global', 0, '/admin/fileed', 'collect', '-1', '0', 'Speichern', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'prived', 'auth', 0, '/admin/prived', 'auth', '-1', '0', 'Rechte-Editor', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'bilderstrecke', 0, '', 'bilderstrecke', '-1', '0', '[H1]Überschrift[/H1]\r\n\r\n[P]Demo des "Selection Tag".[/P]\r\n\r\n[DIV=box][LINK=http://ewebuki.de/auth/dokumentation/tags/spezial.html#SEL]Beschreibung des "Tag"[/LINK][/DIV]\r\n\r\n[HS][/HS]\r\n\r\n[P]Das ist ein [SEL=1;b;;]Textlink[/SEL] zu der Bilderstrecke.\r\n[E][SEL=1;b;;]Textlink[/SEL][/E][/P]\r\n\r\n[HS][/HS]\r\n\r\n[P]Bitte nur ein Bild.\r\n[E][SEL=1;b;True;8]Gruppierung, ein Bild[/SEL][/E][/P]\r\n\r\n[SEL=1;b;True;8]Gruppierung, ein Bild[/SEL][HS][/HS]\r\n\r\n[P]Oder doch ein paar "Teaser Thumbs"?\r\n[E][SEL=1;b;;3:7:10]Gruppierung, viele Bilder[/SEL][/E][/P]\r\n\r\n[SEL=1;b;;3:7:10]Gruppierung, viele Bilder[/SEL]\r\n\r\n\r\n[HS][/HS]\r\n\r\n[P]Und jetzt die "Thumbs" aller Bilder?\r\n[E][SEL=1;b;;a]Gruppierung, alle Bilder[/SEL][/E][/P]\r\n\r\n[SEL=1;b;;a]Gruppierung, alle Bilder[/SEL]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'demo', 0, '', 'demo', '-1', '0', '[H1]Erstes Kapitel[/H1]\r\n\r\n[H2]Erster Absatz[/H2]\r\n\r\n[P]Weit hinten, hinter den Wortbergen, fern der Länder Vokalien und Konsonantien leben die Blindtexte. Abgeschieden wohnen Sie in Buchstabhausen an der Küste des Semantik, eines großen Sprachozeans. Ein kleines Bächlein namens Duden fließt durch ihren Ort und versorgt sie mit den nötigen Regelialien. Es ist ein paradiesmatisches Land, in dem einem gebratene Satzteile in den Mund fliegen. Nicht einmal von der allmächtigen Interpunktion werden die Blindtexte beherrscht - ein geradezu unorthographisches Leben.[/P]\r\n\r\n\r\n[H2]Zweiter Absatz[/H2]\r\n\r\n\r\n[P]Eines Tages aber beschloß eine kleine Zeile Blindtext, ihr Name war Lorem Ipsum, hinaus zu gehen in die weite Grammatik. Der große Oxmox riet ihr davon ab, da es dort wimmele von bösen Kommata, wilden Fragezeichen und hinterhältigen Semikoli, doch das Blindtextchen ließ sich nicht beirren. Es packte seine sieben Versalien, schob sich sein Initial in den Gürtel und machte sich auf den Weg.[/P]\r\n\r\n\r\n[H1]Zweites Kapitel[/H1]\r\n\r\n[H2]Erster Absatz[/H2]\r\n\r\n[P]Als es die ersten Hügel des Kursivgebirges erklommen hatte, warf es einen letzten Blick zurück auf die Skyline seiner Heimatstadt Buchstabhausen, die Headline von Alphabetdorf und die Subline seiner eigenen Straße, der Zeilengasse. Wehmütig lief ihm eine rethorische Frage über die Wange, dann setzte es seinen Weg fort.[/P]\r\n\r\n[P=box]Unterwegs traf es eine Copy. Die Copy warnte das Blindtextchen, da, wo sie herkäme wäre sie zigmal umgeschrieben worden und alles, was von ihrem Ursprung noch übrig wäre, sei das Wort "und" und das Blindtextchen solle umkehren und wieder in sein eigenes, sicheres Land zurückkehren.[/P]\r\n\r\n[H2]Dritter Absatz[/H2]\r\n\r\n[P]Doch alles Gutzureden konnte es nicht überzeugen und so dauerte es nicht lange, bis ihm ein paar heimtückische Werbetexter auflauerten, es mit Longe und Parole betrunken machten und es dann in ihre Agentur schleppten, wo sie es für ihre Projekte wieder und wieder mißbrauchten. Und wenn es nicht umgeschrieben wurde, dann benutzen Sie es immernoch.[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'dir', 0, '', 'dir', '-1', '0', '[H1]Modul Beispiel "my" erweitert[/H1]\r\n\r\n[M2=l][/M2]\r\n\r\n[P]Siehe auch rechts.[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'doku', 0, '', 'doku', '-1', '0', '[H1]Dokumentationsmodus[/H1]\r\n\r\n[P]Mit Hilfe folgender Tags kann eWeBuKi komplexe Gliederungen einfach durchlaufen. Sozusagen in der Website blättern wie in einem Buch.[/P]\r\n\r\n[E][M0],[M1],[M2],[UP],[PREV] und [NEXT][/E]\r\n\r\n[M2=l][/M2]\r\n\r\n[PRE]Aufbau:\r\n|-Doku\r\n| |\r\n| |- Kapitel 1\r\n| | |\r\n| | |- Punkt 1 \r\n| | |\r\n| | |- Punkt 2\r\n| |\r\n| |- Kapitel 2\r\n[/PRE]\r\n\r\n', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'fehler', 0, '', 'fehler', '-1', '0', '[H1]404 Test[/H1]\r\n\r\n[P]Durch einen klick auf den folgenden Link wird die 404 Fehlerseite angezeigt.\r\n\r\n[LINK=./seitenfehler.html;;Seitenfehler produzieren]404 Fehler mit Referer[/LINK]\r\n\r\n[I]Tipp:[/I] Um die zweite 404 Fehlermeldung (Referer unbekannt) sichtbar zu machen, einfach in der Eingabezeile für die URL, der Folgeseite des obigen Links, die "Enter" Taste drücken.[/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'impressum', 0, '', 'impressum', '-1', '0', '[H1]Impressum[/H1]\r\n\r\n\r\n[P]eWeBuKi - Copyright 2003-2015\r\nby [EMAIL=w.ammon(at)chaos.de]Werner Ammon[/EMAIL][/P]\r\n\r\n\r\n[H2]Weitere Infoseiten:[/H2]\r\n\r\n\r\n[P][LINK=http://www.ewebuki.de/]www.ewebuki.de[/LINK]\r\n[LINK=http://developer.berlios.de/projects/ewebuki/]developer.berlios.de/projects/ewebuki/[/LINK][/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'index', 0, '', 'index', '-1', '0', '[H1]Glückwunsch Ihr eWeBuKi läuft![/H1]\r\n\r\n[P]Um sich am System anzumelden benutzen Sie bitte folgende Daten:\r\n\r\nuser: ewebuki\r\npass: ewebuki[/P]\r\n\r\n[P=box][B]ACHTUNG:[/B] Passwort ändern nicht vergessen![/P]\r\n\r\n[P]Weitere Infoseiten:\r\n[LINK=http://www.ewebuki.de/]www.ewebuki.de[/LINK]\r\n[LINK=http://developer.berlios.de/projects/ewebuki/]developer.berlios.de/projects/ewebuki/[/LINK][/P]\r\n', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field1', 'my', 0, '', 'my', '-1', '0', 'Feld 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field2', 'my', 0, '', 'my', '-1', '0', 'Feld 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'my', 0, '', 'my', '-1', '0', 'Beispiel für eine einfache Funktion.', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', 'my', 0, '', 'my', '-1', '0', 'Modul Beispiel "my" einfach', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'show', 0, '', 'show', '-1', '0', '[H1]eWeBuKi Show[/H1]\r\n\r\n\r\n[H2]Tabellen Positionen[/H2]\r\n\r\n[TAB=;300;1]\r\n[ROW]\r\n[COL]1,1[/COL]\r\n[COL=;;u]1,2[/COL]\r\n[COL=r]1,3\r\n\r\n\r\n[/COL]\r\n[/ROW][ROW]\r\n[COL=m]2,1[/COL]\r\n[COL=;;g]2,2[/COL]\r\n[COL=r;;m]2,3\r\n\r\n\r\n[/COL]\r\n[/ROW]\r\n[/TAB]\r\n\r\n\r\n[H2]Easy Template Links[/H2]\r\n\r\n[P]!#lnk_1\r\n!#lnk_2\r\n!#lnk_3[/P]\r\n\r\n[H2]Menu oberhalb (M1,mit Bez.)[/H2]\r\n[M1]nach oben[/M1]\r\n\r\n[H2]Menu oberhalb als Liste (M1=l,ohne Bez.)[/H2]\r\n[M1=l][/M1]\r\n\r\n[H2]Menu gleiche Ebene (M2,mit Bez.)[/H2]\r\n[M2]nach oben[/M2]\r\n\r\n[H2]Menu gleiche Ebene als Liste (M2=l,mit Bez.)[/H2]\r\n[M2=l][/M2]\r\n\r\n\r\n\r\n[H2]Tabellen Abstände[/H2]\r\n[P]Tabellen Abstände (abstand text - tabelle 1)[/P]\r\n\r\n\r\n[TAB=;300;1]\r\n[ROW]\r\n\r\n[COL=l;150]links oben\r\n[/COL]\r\n\r\n[COL=l;150]rechts oben\r\n[/COL]\r\n\r\n[/ROW]\r\n[/TAB]\r\n\r\n[TAB=;300;1]\r\n[ROW]\r\n\r\n[COL=l;150]links oben\r\n[/COL]\r\n\r\n[COL=l;150]rechts oben\r\n[/COL]\r\n\r\n[/ROW]\r\n[/TAB]\r\n\r\n\r\n[P]Tabellen Abstände (abstand text - tabelle 2)[/P]\r\n\r\n[IN]I[/IN]nitial fuer Texte\r\n\r\n[H1][B][EM]Bold EM Tag[/EM][/B] im H1 Tag[/H1]\r\n\r\nText zwischen Linien:\r\n[HL][/HL]\r\nHier kommt der Text.\r\n[HL][/HL]\r\n\r\n[H2]Bilder im Text[/H2]\r\n\r\n[P][IMG=/file/picture/small/img_1.png;l;;;20;;20]eWeBuKi Logo[/IMG]Weit hinten, hinter den Wortbergen, fern der Länder Vokalien und Konsonantien leben die Blindtexte. Abgeschieden wohnen Sie in Buchstabhausen an der Küste des Semantik, eines großen Sprachozeans. Ein kleines Bächlein namens Duden fließt durch ihren Ort und versorgt sie mit den nötigen Regelialien. Es ist ein paradiesmatisches Land, in dem einem gebratene Satzteile in den Mund fliegen. Nicht einmal von der allmächtigen Interpunktion werden die Blindtexte beherrscht - ein geradezu unorthographisches Leben.[/P]\r\n\r\n[H2]Mehrere Bilder rechts[/H2]\r\n\r\n[P]Bei mehreren Bildern rechts gibt es Abstand Probleme. Um das zu umgehen muss der Umlauf mit dem Tag BR=a angehalten werden.[/P]\r\n\r\n[IMGB=/file/picture/small/img_1.png;r;0;b]Logo[/IMGB]Text neben Bild 1[BR=a][/BR]\r\n\r\n[IMGB=/file/picture/small/img_1.png;r]Logo[/IMGB]Text neben Bild 2[BR=a][/BR]\r\n\r\n[P]Nicht nur Bilder sondern auch Text kann mit diesem Trick unter das Bild geschoben werden.[/P]\r\n[H1]ueberschrift h1[/H1]\r\n[H2]ueberschrift h2[/H2]\r\n[H3]ueberschrift h3[/H3]\r\n[H4]ueberschrift h4[/H4]\r\n[H5]ueberschrift h5[/H5]\r\n[H6]ueberschrift h6[/H6]\r\n\r\nAbsaetze mit css einstellen:\r\n[P]Im Absatz ist es Schoen[/P]\r\n\r\nDIV=class jeder css im Content:\r\n[DIV=anderst]Dieser Text ist schoener als der Rest[/DIV]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', 'slimbox2', 0, '', 'slimbox2', '-1', '0', '[H1]Slimbox 2 Gallery[/H1]\r\n\r\n[SEL=1;b;;3:6:7:8:10;l]Bilderauswahl[/SEL]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field1', '-1468826685.delete', 0, '/dir/my', 'delete', '-1', '0', 'Feld 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field2', '-1468826685.delete', 0, '/dir/my', 'delete', '-1', '0', 'Feld 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-1468826685.delete', 0, '/dir/my', 'delete', '-1', '0', 'Modul Beispiel "my" erweitert - Löschen', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field1', '-1468826685.details', 0, '/dir/my', 'details', '-1', '0', 'Feld 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field2', '-1468826685.details', 0, '/dir/my', 'details', '-1', '0', 'Feld 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-1468826685.details', 0, '/dir/my', 'details', '-1', '0', 'Modul Beispiel "my" erweitert - Details', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field1', '-1468826685.list', 0, '/dir/my', 'list', '-1', '0', 'Feld 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-1468826685.list', 0, '/dir/my', 'list', '-1', '0', 'Modul Beispiel "my" erweitert - Übersicht', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field1', '-1468826685.modify', 0, '/dir/my', 'list', '-1', '0', 'Feld 1', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'field2', '-1468826685.modify', 0, '/dir/my', 'edit', '-1', '0', 'Feld 2', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'ueberschrift', '-1468826685.modify', 0, '/dir/my', 'edit', '-1', '0', 'Modul Beispiel "my" erweitert - Bearbeiten', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-736455586.kapitel1', 0, '/doku', 'kapitel1', '-1', '0', '[H1]Dokumentationsmodus[/H1]\r\n[P][PREV][/PREV] - [NEXT][/NEXT][/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-736455586.kapitel_2', 0, '/doku', 'kapitel_2', '-1', '0', '[H1]Dokumentationsmodus[/H1]\r\n[P][PREV][/PREV] - [UP]Doku[/UP][/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-309519014.punkt_1', 0, '/doku/kapitel1', 'punkt_1', '-1', '0', '[H1]Dokumentationsmodus[/H1]\r\n[P][PREV][/PREV] - [NEXT][/NEXT][/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1),
('de', 'inhalt', '-309519014.punkt_2', 0, '/doku/kapitel1', 'punkt_2', '-1', '0', '[H1]Dokumentationsmodus[/H1]\r\n[P][PREV][/PREV] - [NEXT][/NEXT][/P]', '1970-01-01 00:00:00', 'Doe', 'John', 'john.doe@ewebuki.de', 'ewebuki', 1);
