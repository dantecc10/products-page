/*
MariaDB Backup
Database: castelancarpinteyro
Backup Time: 2023-07-13 13:44:57
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `castelancarpinteyro`.`artículos`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`auth_keys`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`carrusel_principal_ítems`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`ip_testing`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`operaciones`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`personas`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`test_mn`;
DROP TABLE IF EXISTS `castelancarpinteyro`.`usuarios`;
CREATE TABLE `artículos` (
  `id_artículo` int(255) NOT NULL AUTO_INCREMENT,
  `título_artículo` varchar(255) NOT NULL DEFAULT 'Artículo increíble',
  `autor_artículo` varchar(255) NOT NULL DEFAULT 'Castelán Carpinteyro Team',
  `rutaRelativa_artículo` varchar(255) NOT NULL DEFAULT '#',
  `rutaAbsoluta_artículo` text NOT NULL DEFAULT '#',
  `fecha_artículo` timestamp NOT NULL DEFAULT current_timestamp(),
  `título_meta_artículo` varchar(255) NOT NULL DEFAULT 'Title-head',
  `descripción_artículo` text NOT NULL DEFAULT 'Descripción del artículo',
  `bannerAbsoluto_artículo` text DEFAULT '#',
  `categoría_artículo` varchar(255) NOT NULL DEFAULT 'Cursitos',
  `activo_artículo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_artículo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `auth_keys` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `auth_key` bigint(6) NOT NULL,
  `related_email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'DEFAULT ''Válida''',
  `generation_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `carrusel_principal_ítems` (
  `id_ítem` int(255) NOT NULL AUTO_INCREMENT,
  `título_ítem` varchar(255) NOT NULL DEFAULT 'Artículo',
  `descripción_ítem` varchar(255) NOT NULL DEFAULT 'Descripción del artículo',
  `linkV_ítem` varchar(255) NOT NULL DEFAULT '#',
  `imagen_ítem` varchar(255) DEFAULT NULL,
  `activo_ítem` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_ítem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `ip_testing` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `operaciones` (
  `id_operación` int(255) NOT NULL AUTO_INCREMENT,
  `acción_operación` varchar(255) NOT NULL,
  `descripción_operación` varchar(255) DEFAULT NULL,
  `autor_operación` varchar(255) NOT NULL,
  `fecha_operación` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_operación`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `personas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `test_mn` (
  `id_mn` int(255) NOT NULL AUTO_INCREMENT,
  `contenido_mn` text NOT NULL,
  `nombre_destino_mn` varchar(255) NOT NULL,
  `email_destino_mn` varchar(255) NOT NULL,
  `status_mn` varchar(255) NOT NULL,
  `fecha_mn` date NOT NULL,
  PRIMARY KEY (`id_mn`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CREATE TABLE `usuarios` (
  `id_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL,
  `apellidoPaterno_usuario` varchar(255) NOT NULL,
  `apellidoMaterno_usuario` varchar(255) NOT NULL,
  `rol_usuario` int(255) DEFAULT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `email_dominio` varchar(255) NOT NULL DEFAULT '@castelancarpinteyro.com',
  `password_usuario` varchar(255) NOT NULL,
  `activo_usuario` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `email_usuario` (`email_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`artículos` WRITE;
DELETE FROM `castelancarpinteyro`.`artículos`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`auth_keys` WRITE;
DELETE FROM `castelancarpinteyro`.`auth_keys`;
INSERT INTO `castelancarpinteyro`.`auth_keys` (`id`,`auth_key`,`related_email`,`status`,`generation_date`) VALUES (1, 486753, 'dante@castelancarpinteyro.com', 'Disabled', '2023-07-10 21:58:38'),(2, 345345, 'dante@castelancarpinteyro.com', 'Disabled', '2023-07-10 21:58:41'),(3, 797302, 'rent@gmail.com', 'Disabled', '2023-07-10 21:58:44'),(4, 474478, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:58:45'),(5, 892272, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:59:01'),(6, 303094, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:58:46'),(7, 939979, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:58:51'),(8, 739975, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:58:48'),(9, 642192, 'emi@gmail.com', 'Used', '2023-07-10 21:58:56'),(10, 752833, 'dantecc10@gmail.com', 'Used', '2023-07-10 21:58:21'),(11, 317029, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 21:58:07'),(12, 375507, 'dantecc10@gmail.com', 'Disabled', '2023-07-10 22:08:52'),(13, 576455, 'dantecc10@gmail.com', 'Enabled', '2023-07-10 22:08:47')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`carrusel_principal_ítems` WRITE;
DELETE FROM `castelancarpinteyro`.`carrusel_principal_ítems`;
INSERT INTO `castelancarpinteyro`.`carrusel_principal_ítems` (`id_ítem`,`título_ítem`,`descripción_ítem`,`linkV_ítem`,`imagen_ítem`,`activo_ítem`) VALUES (1, 'Maquetado HTML desde 0', 'En este artículo te guiaremos para que crees tu primer maquetado en HTML.', 'aprende/artículos/maquetadoHTML.php', 'assets/img/aprende/artículos/maquetadoHTML-banner.png', 1),(2, 'Curso de JavaScript', 'Dale vida y acción a tu página web con estos artículos que te prepararán para ser un desarrollador de JavaScript.', 'aprende/artículos/JavaScript.php', 'assets/img/aprende/cursos/curso-javascript-banner.jpg', 1)
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`ip_testing` WRITE;
DELETE FROM `castelancarpinteyro`.`ip_testing`;
INSERT INTO `castelancarpinteyro`.`ip_testing` (`id`,`ip`,`country`,`city`,`time`) VALUES (1, '201.114.105.222', 'Mexico', 'Huauchinango', '0000-00-00 00:00:00'),(2, '201.114.105.222', 'Mexico', 'Huauchinango', '0000-00-00 00:00:00'),(3, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:35:10'),(4, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:42:06'),(5, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:43:59'),(6, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:45:10'),(7, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:46:22'),(8, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 19:49:31'),(9, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 19:50:31'),(10, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 19:50:34'),(11, '38.56.249.242', 'United States', 'Manhattan', '2023-06-22 19:51:01'),(12, '201.114.105.222', 'Mexico', 'Huauchinango', '2023-06-22 20:38:32'),(13, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 20:39:01'),(14, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 20:52:20'),(15, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 20:52:24'),(16, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 20:55:28'),(17, '201.138.155.135', 'Mexico', 'Tlaxcala', '2023-06-22 20:55:36'),(18, '201.138.211.12', 'Mexico', 'Tlaxcala', '2023-06-25 19:08:30'),(19, '200.68.170.87', 'Mexico', 'Magdalena Contreras', '2023-06-25 19:08:37'),(20, '200.68.170.87', 'Mexico', 'Magdalena Contreras', '2023-06-25 19:08:46'),(21, '189.167.219.110', 'Mexico', 'Contla', '2023-06-26 09:36:10')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`operaciones` WRITE;
DELETE FROM `castelancarpinteyro`.`operaciones`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`personas` WRITE;
DELETE FROM `castelancarpinteyro`.`personas`;
INSERT INTO `castelancarpinteyro`.`personas` (`id`,`nombre`,`apellido`) VALUES (1, 'camilo', 'Espinosa'),(2, 'deiby', 'graciano'),(3, 'leidy', 'graciano'),(4, 'Ramiro', 'espinosa')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`test_mn` WRITE;
DELETE FROM `castelancarpinteyro`.`test_mn`;
INSERT INTO `castelancarpinteyro`.`test_mn` (`id_mn`,`contenido_mn`,`nombre_destino_mn`,`email_destino_mn`,`status_mn`,`fecha_mn`) VALUES (1, 'Mensaje de prueba de newsletter enviado por PHP', 'Dante Castelán Carpinteyro', 'dante@castelancarpinteyro.com', 'Enviado', '2023-06-19'),(2, '¡Excelente día!', 'Ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-19'),(3, '¡Qué bonita estás!', 'Ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-20'),(4, '¡Hola, amor!', 'Ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-21'),(5, 'Riposa, carisimo Andrea. Sei la mia migliore amigo', 'Ma\'am Galicious', 'agaliciav@cecyte.edu.mx', 'Enviado', '2023-06-20'),(15, 'Pus un hola, que show xd', 'Vanesa (la que escucha los chismes de las hormigas)', 'vhuertahchg@cecyte.edu.mx', 'Enviado', '2023-06-20'),(16, 'Hola, en Morena ya se está decidiendo el precandidato para la Presidencia de la República. De hecho, te puedo decir con toda seguridad que en septiembre, sabremos quién será el siguiente presidente de México. ¿Te has informado al respecto? Te invito a con', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-22'),(17, 'Por favor, estimada Mich, por la Patria, je, je. La encuesta de Morena será a público abierto, no necesitarás estar afiliada y como ciudadana me gustaría que participaras en el proceso. No te pido que respaldes necesariamente a <i>mi gallo<i>, pero creo q', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-22'),(18, 'Ya llevaba unos días sin enviarte newsletter. Hoy toca, Mich, je, je. ¿Qué haces?', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-26'),(19, 'Ya no te preocupes estimada Mich; ese examen es tuyo; también tienes la BUAP. Seguro que al final podrás escoger entre tus dos opciones.', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-27'),(20, 'No llore, ma\'am Mich.', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-06-28'),(21, '¿Qué hay, ma\'am?', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-07-10'),(22, 'Estoy escuchando música en YouTube, y me reecontré con esta canción de Blanco y Negro de Ricardo Arjona que simplemente se me hace bellísima. Yo no pienso en la letra, que es buena, sino en esa armonía y ese ambiente que crean los instrumentos en conjunto junto con la voz de Ricardo.\r\nCreo que es absoluta belleza, y por eso te dejo el link para que la recuerdes:\r\n- <a href=\"https://www.youtube.com/watch?v=U37x6wL1wco\">Canción aquí</a>.\r\n- <a href=\"https://www.youtube.com/watch?v=TMpvep6Kl1s\">Sesión de autor aquí</a>', 'ma\'am Mich', 'micharelyhm@castelancarpinteyro.com', 'Enviado', '2023-07-12'),(23, 'Ping', 'Dante', 'dantecc10@gmail.com', 'Enviado', '2023-07-11'),(24, 'Desde server', 'Dante', 'dantecc10@gmail.com', 'Enviado', '2023-07-11')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `castelancarpinteyro`.`usuarios` WRITE;
DELETE FROM `castelancarpinteyro`.`usuarios`;
INSERT INTO `castelancarpinteyro`.`usuarios` (`id_usuario`,`nombre_usuario`,`apellidoPaterno_usuario`,`apellidoMaterno_usuario`,`rol_usuario`,`email_usuario`,`email_dominio`,`password_usuario`,`activo_usuario`) VALUES (1, 'Dante', 'Castelán', 'Carpinteyro', 0, 'dantecc10@gmail.com', 'dante@castelancarpinteyro.com', 'DantePower22!!', 1),(2, 'Jeremy', 'Hernández', 'Balderas', 1, 'jeremy.hdez9@gmail.com', 'jeremy@castelancarpinteyro.com', '@Jefroks22!!', 1),(3, 'Deiby', 'Graciano', 'Agudelo', 1, 'deibygj@hotmail.com', 'deiby.graciano@castelancarpinteyro.com', 'DeibyGraciano', 1),(4, 'Ping', 'Pingus', 'Pingus', 2, 'ping@castelancarpinteyro.com', '', 'widersehen', 0)
;
UNLOCK TABLES;
COMMIT;
