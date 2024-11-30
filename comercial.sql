/*
 Navicat Premium Data Transfer

 Source Server         : Servidor
 Source Server Type    : MySQL
 Source Server Version : 100612 (10.6.12-MariaDB-0ubuntu0.22.04.1)
 Source Host           : 74.208.62.188:3306
 Source Schema         : comercial

 Target Server Type    : MySQL
 Target Server Version : 100612 (10.6.12-MariaDB-0ubuntu0.22.04.1)
 File Encoding         : 65001

 Date: 16/01/2024 16:20:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for juguetes
-- ----------------------------
DROP TABLE IF EXISTS `juguetes`;
CREATE TABLE `juguetes`  (
  `id_toy` int NOT NULL AUTO_INCREMENT,
  `name_toy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description_toy` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `model_toy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `line_toy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `bars_toy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `brand_toy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pieces_toy` int NULL DEFAULT NULL,
  `quantity_toy` int NOT NULL,
  `price_toy` double(10, 2) NOT NULL,
  `imgs_toy` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quant_imgs_toy` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_toy`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of juguetes
-- ----------------------------
INSERT INTO `juguetes` VALUES (1, 'Rescate Marítimo, Operación Medio Ambiente con Bote de Buceo', 'Consta de dos figuras PLAYMOBIL, un robot de buceo con brazos de agarre móviles, una escafandra de alta mar, dos toneladas, una pala y muchos otros extras.\r\n\r\nEl robot de buceo puede nadar y bucear.', '70142', 'City Action', '4008789701428', 'Playmobil', 58, 1, 299.00, 'https://http2.mlstatic.com/D_NQ_NP_910605-MLA70633984736_072023-O.webp', 1);
INSERT INTO `juguetes` VALUES (2, 'Policía con perro rastreador y botín oculto', '', '71162', 'Special Plus', '4008789706003', 'Playmobil', 10, 2, 150.00, 'https://media.playmobil.com/i/playmobil/71162_product_box_front/Policía%20con%20Perro?locale=es-MX,es,en,*&$pdp_product_main_xl$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (3, 'Figuras Niño (Serie 20)', '¡12 sobres sorpresa con figuras de PLAYMOBIL! ¡Para montar, coleccionar o combinar cabezas, cuerpos, piernas y muchas otras piezas! Puedes desmontarlo una y otra vez, combínalos de manera diferente. ¡Diversión sin fin todos los días!', '70148', 'FIGURES', '4008789701480', 'Playmobil', 1, 3, 150.00, 'https://media.playmobil.com/i/playmobil/70148_product_box_front/PLAYMOBIL-Figuras%20Ni%C3%B1o%20(Serie%2020)?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true, https://media.playmobil.com/i/playmobil/70148_product_detail/PLAYMOBIL-Figuras%20Ni%C3%B1o%20(Serie%2020)?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 2);
INSERT INTO `juguetes` VALUES (4, 'Isla pirata portátil', '', '70113', 'Pirates', '4008789701138', 'Playmobil', 91, 2, 850.00, 'https://legusplay.com/15911-large_default/playmobil-70113-isla-pirata-portatil.jpg', 1);
INSERT INTO `juguetes` VALUES (5, 'Gran Hospital', 'El quirófano está equipado con un monitor iluminado (necesita 1 pila x AAA), una luz giratoria y muchos otros accesorios. El ascensor te lleva directamente a la habitación de los pacientes y con un baño en la planta superior. Medidas: 70 x 31 x 34 cm (LxPxA).', '70190', 'City Life', '4008789701909', 'Playmobil', 512, 1, 3800.00, 'https://media.playmobil.com/i/playmobil/70190_product_box_front/Gran%20Hospital?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (6, 'Gran Camping', 'con recepción y quiosco. El baño está equipado con ducha que funciona. La tienda tiene espacio para toda la familia. Dimensiones del edificio de recepción: 18 x 17 x 17cm (LxPxA) Dimensiones del cuarto de baño: 28 x 21 x 17cm (LxPxA)', '70087', 'Family Fun', '4008789700872', 'Playmobil', 222, 1, 1799.00, 'https://media.playmobil.com/i/playmobil/70087_product_box_front/Camping?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (7, 'Escuela Portátil', '', '5662', 'City Life', '4008789056627', 'Playmobil', 68, 1, 800.00, 'https://media.playmobil.com/i/playmobil/5662_product_box_front/Take%20Along%20School%20House?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (8, 'Maletín Grande Pícnic Familiar', '', '9103', 'Family Fun', '4008789091031', 'Playmobil', 62, 2, 380.00, 'https://media.playmobil.com/i/playmobil/9103_product_box_front/Malet%C3%ADn%20Grande%20P%C3%ADcnic%20Familiar%20?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (9, 'Casa Muñecas Maletín', 'El set incluye dos figuras PLAYMOBIL y un bebé, un perrito, una casa de muñecas plegable con cuatro habitaciones amuebladas y muchos accesorios. La casa de muñecas es ligera y práctica y se puede llevar a cualquier parte gracias al asa de transporte.', '70985', 'Dollhouse', '4008789709851', 'Playmobil', 64, 2, 900.00, 'https://media.playmobil.com/i/playmobil/70985_product_box_front/Casa%20Mu%C3%B1ecas%20Malet%C3%ADn?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (10, 'Fire Rescue Carry Case', '', '70310', 'City Action', '4008789703101', 'Playmobil', 24, 2, 250.00, 'https://media.playmobil.com/i/playmobil/70310_product_box_front/Fire%20Rescue%20Carry%20Case?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (11, 'Camión de Escuela', '', '5680', 'City Life', '4008789056801', 'Playmobil', 12, 2, 990.00, 'https://playmobileros.com/1389-tm_cart_default/5680-autobus-escolar-esclusivo-eeuu-playmobil.jpg', 1);
INSERT INTO `juguetes` VALUES (12, 'Ambulancia de Rescate', '', '5681', 'City Action', '4008789056818', 'Playmobil', 20, 2, 990.00, 'https://m.media-amazon.com/images/I/91X3o50SEzL._AC_SL1500_.jpg', 1);
INSERT INTO `juguetes` VALUES (13, 'Avión Summer Fun', '', '6081', 'Summer Fun', '4008789060815', 'Playmobil', 42, 77, 950.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_852848-MLM44756089255_012021-F.webp', 1);
INSERT INTO `juguetes` VALUES (14, 'Clase de deportes de agua', '', '70090', 'Family Fun', '4008789700902', 'Playmobil', 73, 1, 720.00, 'https://lacajadelosclicks.com/wp-content/uploads/2020/04/playmobil-70090-clase-deportes-agua.png', 1);
INSERT INTO `juguetes` VALUES (15, 'Volkswagen Beetle', 'Por supuesto, el Beetle PLAYMOBIL tiene todos los rasgos característicos que lo hacen tan único, como los guardabarros curvos, el logo de VW, el parabrisas vertical, la pintura azul y el típico capó trasero con un motor boxer de 4 cilindros.', '70177', 'Volkswagen', '4008789701770', 'Playmobil', 52, 2, 1250.00, 'https://m.media-amazon.com/images/I/71nVwW9rh-L._AC_SL1498_.jpg', 1);
INSERT INTO `juguetes` VALUES (16, 'Niños con ternero', '', '70155', 'Special PLUS', '4008789701558', 'Playmobil', 14, 1, 200.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_923367-MLM44856885967_022021-F.webp', 1);
INSERT INTO `juguetes` VALUES (17, 'Pescador', '', '70063', 'Special PLUS', '4008789700636', 'Playmobil', 17, 1, 200.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_752495-MLM41120566089_032020-F.webp', 1);
INSERT INTO `juguetes` VALUES (18, 'Sirena', '', '9355', 'Special PLUS', '4008789093554', 'Playmobil', 5, 1, 200.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_842213-MLM43183863572_082020-F.webp', 1);
INSERT INTO `juguetes` VALUES (19, 'Hada del Sol Con Unicornio', '', '9438', 'Special PLUS', '4008789094384', 'Playmobil', 5, 1, 200.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_943994-MLM40522557330_012020-F.webp', 1);
INSERT INTO `juguetes` VALUES (20, 'Volkswagen T1 Camping Bus', ' Con un estilo auténtico, el interior de la T1 ofrece una mesa plegable con dos asientos y un lavabo con nevera. Los bancos con el típico diseño de cuadros de los años 60 pueden convertirse en un área de descanso para dos personas. Las puertas laterales también pueden abrirse, una puerta incluye un estante para la comida y la otra un estante con bisagras y un espejo. El Volkswagen T1 Camping Bus: ¡sube, conduce y disfruta de la libertad! ', '70176', 'Volkswagen', '4008789701763', 'Playmobil', 74, 1, 1199.00, 'https://media.playmobil.com/i/playmobil/70176_product_box_front/Volkswagen%20T1%20Camping%20Bus?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (21, 'Coche de Policía con Lancha\r\n', '', '5187', 'City Action', '4008789051875', 'Playmobil', 90, 2, 600.00, 'https://media.playmobil.com/i/playmobil/5187_product_box_front/Coche%20de%20Polic%C3%ADa%20con%20Lancha?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (22, 'Artista Callejero\r\n', '', '70377', 'Special PLUS', '4008789703774', 'Playmobil', 15, 2, 190.00, 'https://media.playmobil.com/i/playmobil/70377_product_detail/Artista%20Callejero?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (23, 'PLAYMOBIL Color: Hot Rod', '', '71376', 'COLOR', '4008789713766', 'Playmobil', 20, 1, 580.00, 'https://media.playmobil.com/i/playmobil/71376_product_detail/PLAYMOBIL%20Color:%20Hot%20Rod?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (24, 'Duo Pack Bomberos', '', '70081', '', '4008789700810', 'Playmobil', 13, 1, 180.00, 'https://media.playmobil.com/i/playmobil/70081_product_detail/Duo%20Pack%20Bomberos?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (25, 'Tigre Joven', '', '71067', 'WILTOPIA', '4008789710673', 'Playmobil', 6, 1, 150.00, 'https://media.playmobil.com/i/playmobil/71067_product_box_front/Wiltopia%20-%20Tigre%20Joven?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (26, 'Vikinga', '', '70854', 'PLAYMO-FRIENDS', '4008789708540', 'Playmobil', 5, 2, 200.00, 'https://media.playmobil.com/i/playmobil/70854_product_detail/Vikinga?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (27, 'Jinete del Oeste', '', '70602', 'Special PLUS', '4008789706027', 'Playmobil', 10, 2, 160.00, 'https://media.playmobil.com/i/playmobil/70602_product_box_front/Jinete%20del%20Oeste?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (28, 'Back to the Future Marty McFly y Dr. Emmet Brown', ' ', '70459', 'BACK TO THE FUTURE', '4008789704597', 'Playmobil', 6, 1, 400.00, 'https://media.playmobil.com/i/playmobil/70459_product_box_front/Back%20to%20the%20Future%20Marty%20McFly%20y%20Dr.%20Emmet%20Brown?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (29, 'César y Cleopatra', '', '71270', 'Asterix', '4008789712707', 'Playmobil', 28, 1, 500.00, 'https://media.playmobil.com/i/playmobil/71270_product_box_front/Ast%C3%A9rix:%20C%C3%A9sar%20y%20Cleopatra?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (30, 'Set de Figuras Ghostbusters', '', '70175', 'GHOSTBUSTERS', '4008789701756', 'Playmobil', 30, 1, 400.00, 'https://media.playmobil.com/i/playmobil/70175_product_box_front/GhostbustersTM%20Set%20de%20Figuras%20GhostbustersTM?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (31, 'Técnica', '', '71196', 'PLAYMO-FRIENDS', '4008789711960', 'Playmobil', 9, 1, 180.00, 'https://media.playmobil.com/i/playmobil/71196_product_box_front/T%C3%A9cnica?locale=es-MX,es,en,*&$pdp_product_main_s$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (32, 'Ladrillos e ideas', '', '11001', 'CLASSIC', '673419302029', 'LEGO', 123, 2, 250.00, 'https://www.lego.com/cdn/cs/set/assets/blt822d7081cac3bd64/11001_alt1.jpg?format=webply&fit=bounds&quality=75&width=640&height=640&dpr=1', 1);
INSERT INTO `juguetes` VALUES (33, 'TEKNIQUE', '', 'TEKNIQUE', 'EPIC GAMES - FORTNITE', '191726006190', 'Jazwares', 3, 1, 299.00, 'https://hebmx.vtexassets.com/arquivos/ids/664127-1200-1200?v=638218649660970000&width=1200&height=1200&aspect=true', 1);
INSERT INTO `juguetes` VALUES (34, 'Vendedor de Kebab', '', '9088', 'Special PLUS', '4008789090881', 'Playmobil', 17, 2, 200.00, 'https://m.media-amazon.com/images/I/61Ll7NMv-EL._AC_SL1000_.jpg', 1);
INSERT INTO `juguetes` VALUES (35, 'Set construcción Playmobil Starter Adventures of Ayuma', '', '70905', 'ADVENTURES OF AYUMA', '4008789709059', 'Playmobil', 31, 4, 280.00, 'https://ss424.liverpool.com.mx/xl/1121788370.jpg', 1);
INSERT INTO `juguetes` VALUES (36, 'Fauno', '', '70815', 'PLAYMO-FRIENDS', '4008789708151', 'Playmobil', 10, 1, 180.00, 'https://media.playmobil.com/i/playmobil/70815_product_box_front/Fauno?locale=es-MX,es,en,*&$pdp_product_zoom_xl$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (37, 'Domadora de Caballos', '', '70874', 'Special Plus', '4008789708748', 'Playmobil', 13, 2, 180.00, 'https://media.playmobil.com/i/playmobil/70874_product_box_front/Doma%20de%20Caballos?locale=es-MX,es,en,*&$pdp_product_zoom_xl$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (38, 'Pirata con balsas y tiburón martillo', '', '70598', 'Special Plus', '4008789705983', 'playmobil', 6, 3, 180.00, 'https://media.playmobil.com/i/playmobil/70598_product_box_front/Pirata%20con%20balsas%20y%20tibur%C3%B3n%20martillo?locale=es-MX,es,en,*&$pdp_product_main_m$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (39, 'Puppy Playtime Carry Case', '', '70530', 'CITy Life', '4008789705303', 'Playmobil', 17, 1, 270.00, 'https://media.playmobil.com/i/playmobil/70530_product_box_front/Puppy%20Playtime%20Carry%20Case?locale=es-MX,es,en,*&$pdp_product_main_m$&fmt=auto&strip=true&qlt=80&fmt.jpeg.chroma=1,1,1&unsharp=0,1,1,7&fmt.jpeg.interlaced=true', 1);
INSERT INTO `juguetes` VALUES (40, 'Heladería Movil', ' ', '41389', 'Friends', '673419319744', 'LEGO', 97, 1, 0.00, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcRAK2Q6UCNGQBeG0Dcat1CWdUvz3sUF0S-tAke3joLTUerO_fRak0SNTUHU7h2NmJsC4PjQCkPYr7fSVhm1CEC2dv1BzLFH', 1);

-- ----------------------------
-- Table structure for operaciones
-- ----------------------------
DROP TABLE IF EXISTS `operaciones`;
CREATE TABLE `operaciones`  (
  `id_operation` int NOT NULL AUTO_INCREMENT,
  `details_operation` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type_operation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_operation` int NOT NULL,
  `related_article_operation` int NULL DEFAULT NULL,
  `related_article_table_operation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `timestamp_operation` datetime NOT NULL,
  PRIMARY KEY (`id_operation`) USING BTREE,
  INDEX `Usuario`(`user_operation` ASC) USING BTREE,
  INDEX `Productos (ropa)`(`related_article_operation` ASC) USING BTREE,
  CONSTRAINT `Productos (juguetes)` FOREIGN KEY (`related_article_operation`) REFERENCES `juguetes` (`id_toy`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Productos (ropa)` FOREIGN KEY (`related_article_operation`) REFERENCES `variantes_ropa` (`id_variant`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Usuario` FOREIGN KEY (`user_operation`) REFERENCES `usuarios` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of operaciones
-- ----------------------------

-- ----------------------------
-- Table structure for ropa
-- ----------------------------
DROP TABLE IF EXISTS `ropa`;
CREATE TABLE `ropa`  (
  `id_clothes` int NOT NULL AUTO_INCREMENT,
  `name_clothes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description_clothes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `brand_clothes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price_clothes` double(10, 2) NOT NULL,
  `model_clothes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `bars_clothes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `variants` int NOT NULL COMMENT 'DEFAULT 0',
  PRIMARY KEY (`id_clothes`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ropa
-- ----------------------------

-- ----------------------------
-- Table structure for tareas
-- ----------------------------
DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas`  (
  `id_task` int NOT NULL AUTO_INCREMENT,
  `main_task` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sender_task` int NOT NULL,
  `receiver_task` int NOT NULL,
  `description_task` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  PRIMARY KEY (`id_task`) USING BTREE,
  INDEX `sender`(`sender_task` ASC) USING BTREE,
  INDEX `receiver`(`receiver_task` ASC) USING BTREE,
  CONSTRAINT `receiver` FOREIGN KEY (`receiver_task`) REFERENCES `usuarios` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `sender` FOREIGN KEY (`sender_task`) REFERENCES `usuarios` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tareas
-- ----------------------------

-- ----------------------------
-- Table structure for transacciones
-- ----------------------------
DROP TABLE IF EXISTS `transacciones`;
CREATE TABLE `transacciones`  (
  `id_transaction` int NOT NULL AUTO_INCREMENT,
  `sale_channel_transaction` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sold_articles_transaction` int NOT NULL,
  `products_category_transaction` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `amount_transaction` double(10, 2) NOT NULL,
  `type_transaction` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_transaction` int NOT NULL,
  `timestamp_transaction` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`) USING BTREE,
  INDEX `User`(`user_transaction` ASC) USING BTREE,
  INDEX `Artículos (ropa)`(`sold_articles_transaction` ASC) USING BTREE,
  CONSTRAINT `User` FOREIGN KEY (`user_transaction`) REFERENCES `usuarios` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transacciones
-- ----------------------------
INSERT INTO `transacciones` VALUES (1, 'Physical', 3, 'juguetes', 2930.00, 'sale', 1, '2023-12-26 19:47:39');
INSERT INTO `transacciones` VALUES (2, 'Physical', 3, 'juguetes', 900.00, 'sale', 1, '2023-12-27 00:33:01');
INSERT INTO `transacciones` VALUES (3, 'Physical', 1, 'juguetes', 950.00, 'sale', 1, '2023-12-27 00:34:54');
INSERT INTO `transacciones` VALUES (4, 'Physical', 1, 'juguetes', 950.00, 'sale', 1, '2023-12-31 12:23:13');
INSERT INTO `transacciones` VALUES (5, 'Physical', 2, 'juguetes', 1940.00, 'sale', 1, '2024-01-01 21:21:19');
INSERT INTO `transacciones` VALUES (6, 'Physical', 2, 'juguetes', 1940.00, 'sale', 1, '2024-01-02 01:20:33');
INSERT INTO `transacciones` VALUES (7, 'Physical', 2, 'juguetes', 1940.00, 'sale', 1, '2024-01-02 01:31:57');
INSERT INTO `transacciones` VALUES (8, 'Physical', 2, 'juguetes', 1900.00, 'sale', 1, '2024-01-02 21:01:19');
INSERT INTO `transacciones` VALUES (9, 'Physical', 1, 'juguetes', 950.00, 'sale', 1, '2024-01-02 23:42:24');
INSERT INTO `transacciones` VALUES (10, 'Physical', 3, 'juguetes', 2850.00, 'sale', 1, '2024-01-03 02:34:54');
INSERT INTO `transacciones` VALUES (11, 'Physical', 3, 'juguetes', 2850.00, 'sale', 1, '2024-01-03 13:39:42');
INSERT INTO `transacciones` VALUES (12, 'Physical', 5, 'juguetes', 3880.00, 'sale', 1, '2024-01-03 13:55:35');
INSERT INTO `transacciones` VALUES (13, 'Physical', 0, 'juguetes', 0.00, 'sale', 1, '2024-01-03 16:23:57');
INSERT INTO `transacciones` VALUES (14, 'Physical', 0, 'juguetes', 0.00, 'sale', 1, '2024-01-03 16:24:20');
INSERT INTO `transacciones` VALUES (15, 'Physical', 4, 'juguetes', 3800.00, 'sale', 1, '2024-01-08 22:47:30');
INSERT INTO `transacciones` VALUES (16, 'Physical', 4, 'juguetes', 3800.00, 'sale', 1, '2024-01-08 22:51:21');
INSERT INTO `transacciones` VALUES (17, 'Physical', 1, 'juguetes', 950.00, 'sale', 1, '2024-01-08 23:29:43');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `last_names_user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `username_user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `gender_user` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `img_user` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `email_user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `password_user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status_user` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'Dante', 'Castelán Carpinteyro', 'dantecc10', 'H', 'assets/img/users/1.jpg', 'dante@castelancarpinteyro.com', 'DarkseidPower23!!', 1);
INSERT INTO `usuarios` VALUES (2, 'Edith', 'Carpinteyro López', 'edithcl', 'M', 'assets/img/users/2.png', 'edithcarpinteyro@yahoo.com.mx', 'A1b1c1d1.', 1);
INSERT INTO `usuarios` VALUES (3, 'Valentín', 'Castelán Carmona', 'valecc666', 'H', 'assets/img/users/3.png', 'valecc666@gmail.com', 'ValeCC66623!!', 1);
INSERT INTO `usuarios` VALUES (4, 'Andrea', 'Castelán Carpinteyro', 'andreacc', 'M', 'assets/img/users/4.png', 'castelancarpinteyroandrea@gmail.com', 'Maximus23!!', 1);
INSERT INTO `usuarios` VALUES (5, 'Emiliano', 'Castelán Carpinteyro', 'emicc1000', 'H', 'assets/img/users/5.png', 'emicc1000@gmail.com', 'Apusquisqui', 1);
INSERT INTO `usuarios` VALUES (6, 'Demo User', 'Web', 'demo_user', 'H', 'assets/img/avatars/avatar5.jpeg', 'demo_user@system.com', 'demouser', 1);

-- ----------------------------
-- Table structure for variantes_ropa
-- ----------------------------
DROP TABLE IF EXISTS `variantes_ropa`;
CREATE TABLE `variantes_ropa`  (
  `id_variant` int NOT NULL,
  `reference_variant` int NOT NULL,
  `color_variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `size_variant` double NOT NULL,
  `units_variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `model_variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `description_variant` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `bars__variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `imgs_variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `quant_imgs_variant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_variant`) USING BTREE,
  INDEX `Artículo`(`reference_variant` ASC) USING BTREE,
  CONSTRAINT `Artículo` FOREIGN KEY (`reference_variant`) REFERENCES `ropa` (`id_clothes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of variantes_ropa
-- ----------------------------

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `id_sale` int NOT NULL AUTO_INCREMENT,
  `related_transaction_id` int NOT NULL,
  `article_id_sale` int NOT NULL,
  `article_category_sale` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `article_price_sale` double(10, 2) NOT NULL,
  `article_quantity_sale` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `subtotal_sale` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES (49, 62, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (50, 62, 12, 'juguetes', 990.00, '2', '1980');
INSERT INTO `ventas` VALUES (51, 63, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (52, 63, 12, 'juguetes', 990.00, '2', '1980');
INSERT INTO `ventas` VALUES (53, 64, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (54, 64, 12, 'juguetes', 990.00, '2', '1980');
INSERT INTO `ventas` VALUES (55, 65, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (56, 65, 12, 'juguetes', 990.00, '2', '1980');
INSERT INTO `ventas` VALUES (57, 2, 5, 'juguetes', 300.00, '3', '900');
INSERT INTO `ventas` VALUES (58, 3, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (59, 4, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (60, 5, 11, 'juguetes', 990.00, '1', '990');
INSERT INTO `ventas` VALUES (61, 5, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (62, 6, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (63, 6, 11, 'juguetes', 990.00, '1', '990');
INSERT INTO `ventas` VALUES (64, 7, 11, 'juguetes', 990.00, '1', '990');
INSERT INTO `ventas` VALUES (65, 7, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (66, 8, 13, 'juguetes', 950.00, '2', '1900');
INSERT INTO `ventas` VALUES (67, 9, 13, 'juguetes', 950.00, '1', '950');
INSERT INTO `ventas` VALUES (68, 10, 13, 'juguetes', 950.00, '3', '2850');
INSERT INTO `ventas` VALUES (69, 11, 13, 'juguetes', 950.00, '3', '2850');
INSERT INTO `ventas` VALUES (70, 12, 4, 'juguetes', 850.00, '2', '1700');
INSERT INTO `ventas` VALUES (71, 12, 12, 'juguetes', 990.00, '2', '1980');
INSERT INTO `ventas` VALUES (72, 12, 17, 'juguetes', 200.00, '1', '200');
INSERT INTO `ventas` VALUES (73, 15, 13, 'juguetes', 950.00, '4', '3800');
INSERT INTO `ventas` VALUES (74, 16, 13, 'juguetes', 950.00, '4', '3800');
INSERT INTO `ventas` VALUES (75, 17, 13, 'juguetes', 950.00, '1', '950');

SET FOREIGN_KEY_CHECKS = 1;
