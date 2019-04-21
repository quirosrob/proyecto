

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=520 DEFAULT CHARSET=utf8



insert into configuration 
(`id`,`key`,`value`) 
values 
('31','history_image_group_id','2'),
('38','contact_us_email','asdsadsa'),
('39','contact_us_phone','asdsad'),
('445','site_logo_image_id','45'),
('498','site_logo2_image_id','71'),
('501','site_color_header_1',''),
('502','site_color_header_div',''),
('503','site_color_header_2',''),
('504','site_color_header_border',''),
('505','site_color_text',''),
('506','site_color_body_background',''),
('507','site_color_body_border',''),
('508','site_color_footer_background',''),
('509','site_color_footer_border',''),
('510','site_color_bottom_background',''),
('511','site_color_bottom_border',''),
('512','site_color_bottom_text',''),
('513','site_color_bottom_background_active',''),
('514','site_color_bottom_border_active',''),
('515','site_color_bottom_text_active',''),
('518','site_title','Salón de la Fama del Deporte Costarricense'),
('519','site_title_short','Salfadeco') 



CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8



insert into image 
(`id`,`filename`,`description`) 
values 
('4','1552778069.1803.jpeg',''),
('12','1552789427.4338.png',''),
('13','1553066587.2501.png',''),
('14','1553066596.8911.png',''),
('16','1553067007.525.jpg',''),
('21','1553067812.119.jpg',''),
('25','1553068294.0669.jpg',''),
('26','1553068378.3268.jpg',''),
('31','1553370380.0016.jpg',''),
('32','1553370387.6702.jpg',''),
('33','1553463071.0494.jpg',''),
('34','1553463121.9021.jpg',''),
('35','1553463131.5781.jpg',''),
('36','1553463885.0288.png',''),
('37','1553463894.78.jpg',''),
('38','1553463986.5259.jpg',''),
('39','1553463990.2162.png',''),
('40','1553463993.9434.png',''),
('44','1553485287.8172.jpg',''),
('45','1553572610.0833.png',''),
('50','1554830001.5561.jpg',''),
('51','1554830009.3926.png',''),
('52','1554830015.0834.jpg',''),
('53','1554830018.7515.png',''),
('55','1555048722.0197.jpg',''),
('57','1555049161.9805.jpg',''),
('59','1555049827.8564.png',''),
('61','1555050267.6219.jpg',''),
('62','1555050393.788.png',''),
('63','1555182372.7664.png',''),
('64','1555183696.1899.png',''),
('65','1555183709.556.png',''),
('66','1555185757.6814.jpg',''),
('67','1555185852.7488.jpg',''),
('68','1555189166.4572.png',''),
('69','1555274069.5245.png',''),
('70','1555276712.3365.png',''),
('71','1555276948.7959.png',''),
('72','1555277365.9724.jpg','') 



CREATE TABLE `image_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8



insert into image_group 
(`id`) 
values 
('1'),
('2'),
('3'),
('4'),
('5'),
('6'),
('7'),
('8'),
('9') 



CREATE TABLE `directors_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`),
  CONSTRAINT `directors_team_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `directors_team_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8



insert into directors_team 
(`id`,`name`,`description`,`image_id`,`image_group_id`) 
values 
('6','asdsadsa','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','66','') 



CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `event_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8



insert into event 
(`id`,`name`,`date`,`description`,`image_id`,`image_group_id`) 
values 
('10','asdasdds a','2019-01-01','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','67','') 



CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`),
  CONSTRAINT `gallery_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  CONSTRAINT `gallery_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8



insert into gallery 
(`id`,`name`,`description`,`image_id`,`image_group_id`) 
values 
('1','Trofeos','<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>','25','6'),
('2','Donaciones','<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>','26','5') 



CREATE TABLE `image_group_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_group_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_group` (`image_group_id`),
  KEY `image` (`image_id`),
  CONSTRAINT `image_group_item_ibfk_1` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  CONSTRAINT `image_group_item_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8



insert into image_group_item 
(`id`,`image_group_id`,`image_id`) 
values 
('15','6','31'),
('16','6','32'),
('17','7','38'),
('18','7','39'),
('19','7','40'),
('23','5','44'),
('28','2','50'),
('29','2','51'),
('30','2','52'),
('31','2','53') 



CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_date` datetime DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `date_entry` date DEFAULT NULL,
  `biography` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  `qr` varchar(45) DEFAULT NULL,
  `year_birth` varchar(8) DEFAULT NULL,
  `year_death` varchar(8) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`),
  CONSTRAINT `member_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `member_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8



insert into member 
(`id`,`creation_date`,`name`,`date_entry`,`biography`,`image_id`,`image_group_id`,`qr`,`year_birth`,`year_death`,`number`) 
values 
('18','','Avis Mclean Gavis','2019-04-13','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','72','','','1900','1980','88'),
('19','','sasasasa','2019-04-13','<p>aaaaaaaaaaaaaaaaaaaaaa</p>','68','','','1600','1760','99') 



CREATE TABLE `permition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8



insert into permition 
(`id`,`key`,`name`,`descripcion`) 
values 
('1','events','Eventos','Eventos'),
('2','members','Miembros','Miembros'),
('3','sports','Deportes','Deportes'),
('4','directors','Juntas Directivas','Juntas Directivas'),
('5','contacUs','Contactenos','Contactenos'),
('6','galeries','Galerias','Galerias'),
('7','history','Historia','Historia'),
('8','configuration','Configuracion','Configuracion'),
('9','access','Accesos','Accesos') 



CREATE TABLE `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  `color` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`),
  CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  CONSTRAINT `sport_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8



insert into sport 
(`id`,`name`,`description`,`image_id`,`image_group_id`,`color`) 
values 
('5','baloncento','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','64','','#f8cf7e'),
('6','beisbol','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','65','','#cffec8'),
('7','futbol','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','69','','#96f18e') 



CREATE TABLE `member_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member` (`member_id`),
  KEY `sport` (`sport_id`),
  CONSTRAINT `member_sport_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  CONSTRAINT `member_sport_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8



insert into member_sport 
(`id`,`member_id`,`sport_id`) 
values 
('10','19','5'),
('11','18','7'),
('14','18','5'),
('15','18','6') 



CREATE TABLE `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(45) DEFAULT NULL,
  `text` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8



insert into text 
(`id`,`key`,`text`) 
values 
('4','site_history','<p><span style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\">En el a&ntilde;o 1969, se crea la Galer&iacute;a del Deporte de Costa Rica, como una forma de perpetuar en la memoria colectiva nacional, el recuerdo vivo de aquellos deportistas consagrados de todos los tiempos, m&aacute;ximos exponentes de la mayor&iacute;a de disciplinas deportivas que se practican en el pa&iacute;s.&nbsp;</span><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><span style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\">En el a&ntilde;o de su apertura, ingresaron los primeros doce miembros de la Galer&iacute;a, entre los a&ntilde;os 1970 a 1976, ingresaron tres miembros anualmente, en 1977 el ingreso fue de cuatro, entre 1978 y 1980 de uno, en 1981 fue de tres, en 1982 de diez, 1983 de cuatro, 1984 de tres, entre 1985 y 1988, ingresaron cuatro por a&ntilde;o, entre 1989 y 1991, lo hicieron tres por a&ntilde;o, en 1992 se incorporaron cuatro, en 1993 lo hicieron dos, y en 1994 tres. En aquella primera selecci&oacute;n, la misma estuvo bajo la responsabilidad del Consejo Nacional de Educaci&oacute;n F&iacute;sica y Deportes, continuando as&iacute; la inclusi&oacute;n de nuevos miembros hasta el a&ntilde;o 1985, cuando es publicado en el diario oficial La Gaceta, con fecha 17 de julio, el Reglamento para la Galer&iacute;a del Deporte de Costa Rica.</span><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><span style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\">El nuevo Reglamento, vigente hasta el presente, observa las calidades que deben poseer quienes aspiren a ser miembros de la Galer&iacute;a, como tambi&eacute;n las de los proponentes de candidaturas, as&iacute; como las condiciones de presentaci&oacute;n de tales candidaturas, forma de selecci&oacute;n, est&iacute;mulos y reconocimientos para los escogidos.&nbsp;</span><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><span style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\">En el a&ntilde;o 1994 y por iniciativa de algunos destacados miembros se funda la Asociaci&oacute;n Deportiva Galer&iacute;a Costarricense del Deporte (GALCODE); la cual constituye, a trav&eacute;s de su Junta Directiva, el soporte administrativo y organizativo sobre el que se apoya la Galer&iacute;a.</span><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><br style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\" /><span style=\"font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; font-size: small;\">Este anexo tiene por objetivo &uacute;nico y complementario, el de ofrecer una perspectiva biogr&aacute;fica individual de cada uno de los integrantes de la Galer&iacute;a.</span></p>'),
('8','contact_us_address','asdasdas dsadsads
ad
sad
sad'),
('40','site_footer','En el año 1969 se crea la Galería del Deporte Costarricense, como una forma de perpetuar en la memoria colectiva nacional el vivo recuerdo de aquellos deportistas consagrados de todos los tiempos, maximos exponentes de la mayoria de disciplinas deportivas que se practican en el país') 



CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `job` varchar(128) DEFAULT NULL,
  `role` enum('ADMIN','EMPLOYEE') DEFAULT 'EMPLOYEE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8



insert into user 
(`id`,`name`,`username`,`password`,`job`,`role`) 
values 
('1','Avis Mclean Gavis test','aaaaa','9fc58423aa0341dd75c031e1b2fabe0a','asasas','EMPLOYEE') 



CREATE TABLE `user_permition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `permition` (`permition_id`),
  CONSTRAINT `user_permition_ibfk_1` FOREIGN KEY (`permition_id`) REFERENCES `permition` (`id`),
  CONSTRAINT `user_permition_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8



insert into user_permition 
(`id`,`user_id`,`permition_id`) 
values 
('1','1','1'),
('2','1','2'),
('3','1','1'),
('4','1','2'),
('5','1','9') 

