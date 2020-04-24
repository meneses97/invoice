/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : invoice

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 24/04/2020 20:10:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_added` datetime(0) NOT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (10, 'ServiÃ§os', 'ServiÃ§os Prestados Ã  Empresa', '2020-02-11 14:25:57');
INSERT INTO `categorias` VALUES (11, 'FormaÃ§Ã£o', 'Cursos e CapacitaÃ§Ã£o', '2020-02-11 18:04:56');
INSERT INTO `categorias` VALUES (12, 'Copias', 'Scan, Impressao e Diversos', '2020-02-22 11:01:07');
INSERT INTO `categorias` VALUES (13, 'Produto', 'Produtos para venda', '2020-04-03 10:38:42');

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES (1, 'US Dollar', '$', '2', ',', '.', 'USD');
INSERT INTO `currencies` VALUES (2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP');
INSERT INTO `currencies` VALUES (3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR');
INSERT INTO `currencies` VALUES (4, 'South African Rand', 'R', '2', '.', ',', 'ZAR');
INSERT INTO `currencies` VALUES (5, 'Danish Krone', 'kr ', '2', '.', ',', 'DKK');
INSERT INTO `currencies` VALUES (6, 'Israeli Shekel', 'NIS ', '2', ',', '.', 'ILS');
INSERT INTO `currencies` VALUES (7, 'Swedish Krona', 'kr ', '2', '.', ',', 'SEK');
INSERT INTO `currencies` VALUES (8, 'Kenyan Shilling', 'KSh ', '2', ',', '.', 'KES');
INSERT INTO `currencies` VALUES (9, 'Canadian Dollar', 'C$', '2', ',', '.', 'CAD');
INSERT INTO `currencies` VALUES (10, 'Philippine Peso', 'P ', '2', ',', '.', 'PHP');
INSERT INTO `currencies` VALUES (11, 'Indian Rupee', 'Rs. ', '2', ',', '.', 'INR');
INSERT INTO `currencies` VALUES (12, 'Australian Dollar', '$', '2', ',', '.', 'AUD');
INSERT INTO `currencies` VALUES (13, 'Singapore Dollar', 'SGD ', '2', ',', '.', 'SGD');
INSERT INTO `currencies` VALUES (14, 'Norske Kroner', 'kr ', '2', '.', ',', 'NOK');
INSERT INTO `currencies` VALUES (15, 'New Zealand Dollar', '$', '2', ',', '.', 'NZD');
INSERT INTO `currencies` VALUES (16, 'Vietnamese Dong', 'VND ', '0', '.', ',', 'VND');
INSERT INTO `currencies` VALUES (17, 'Swiss Franc', 'CHF ', '2', '\'', '.', 'CHF');
INSERT INTO `currencies` VALUES (18, 'Quetzal Guatemalteco', 'Q', '2', ',', '.', 'GTQ');
INSERT INTO `currencies` VALUES (19, 'Malaysian Ringgit', 'RM', '2', ',', '.', 'MYR');
INSERT INTO `currencies` VALUES (20, 'Real Brasile&ntilde;o', 'R$', '2', '.', ',', 'BRL');
INSERT INTO `currencies` VALUES (21, 'Thai Baht', 'THB ', '2', ',', '.', 'THB');
INSERT INTO `currencies` VALUES (22, 'Nigerian Naira', 'NGN ', '2', ',', '.', 'NGN');
INSERT INTO `currencies` VALUES (23, 'Peso Argentino', '$', '2', '.', ',', 'ARS');
INSERT INTO `currencies` VALUES (24, 'Bangladeshi Taka', 'Tk', '2', ',', '.', 'BDT');
INSERT INTO `currencies` VALUES (25, 'United Arab Emirates Dirham', 'DH ', '2', ',', '.', 'AED');
INSERT INTO `currencies` VALUES (26, 'Hong Kong Dollar', '$', '2', ',', '.', 'HKD');
INSERT INTO `currencies` VALUES (27, 'Indonesian Rupiah', 'Rp', '2', ',', '.', 'IDR');
INSERT INTO `currencies` VALUES (28, 'Peso Mexicano', '$', '2', ',', '.', 'MXN');
INSERT INTO `currencies` VALUES (29, 'Egyptian Pound', '&pound;', '2', ',', '.', 'EGP');
INSERT INTO `currencies` VALUES (30, 'Peso Colombiano', '$', '2', '.', ',', 'COP');
INSERT INTO `currencies` VALUES (31, 'West African Franc', 'CFA ', '2', ',', '.', 'XOF');
INSERT INTO `currencies` VALUES (32, 'Chinese Renminbi', 'RMB ', '2', ',', '.', 'CNY');
INSERT INTO `currencies` VALUES (33, 'Mozambique', 'MT', '2', ',', '.', 'METICAL');

-- ----------------------------
-- Table structure for gabinete
-- ----------------------------
DROP TABLE IF EXISTS `gabinete`;
CREATE TABLE `gabinete`  (
  `idgabinete` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dataadded` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`idgabinete`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of gabinete
-- ----------------------------
INSERT INTO `gabinete` VALUES (1, '0001G1', 'Gabinete Director', '2020-04-22 15:17:02');
INSERT INTO `gabinete` VALUES (2, '00002', 'Something', '2020-04-22 15:28:34');
INSERT INTO `gabinete` VALUES (3, '00003', 'Novo Gabiente', '2020-04-22 15:29:32');
INSERT INTO `gabinete` VALUES (4, '00004', 'Outro', '2020-04-22 15:49:05');

-- ----------------------------
-- Table structure for historial
-- ----------------------------
DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial`  (
  `id_hitorial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  `nota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_hitorial`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of historial
-- ----------------------------
INSERT INTO `historial` VALUES (1, 20, 1, '2020-02-22 12:28:28', 'Raimundo adicionou 10 producto(s) no inventario', 'dsadsa', 10);
INSERT INTO `historial` VALUES (2, 22, 1, '2020-02-22 12:54:48', 'Raimundo adicionou 20 producto(s) no inventario', '002', 20);
INSERT INTO `historial` VALUES (3, 21, 1, '2020-02-22 12:55:42', 'Raimundo adicionou 31 producto(s) no inventario', 'Stock vindo de Portugal', 31);
INSERT INTO `historial` VALUES (4, 21, 4, '2020-02-22 13:20:27', 'Raimundo eliminou 10 producto(s) do inventario', 'Mao Registo', 10);
INSERT INTO `historial` VALUES (5, 23, 4, '2020-02-22 16:04:01', 'Raimundo adicionou 50 producto(s) no inventario', '003', 50);
INSERT INTO `historial` VALUES (6, 24, 4, '2020-02-22 16:04:23', 'Raimundo adicionou 50 producto(s) no inventario', '004', 50);
INSERT INTO `historial` VALUES (7, 25, 4, '2020-02-22 16:04:57', 'Raimundo adicionou 50 producto(s) no inventario', '05', 50);
INSERT INTO `historial` VALUES (8, 26, 4, '2020-02-22 16:05:28', 'Raimundo adicionou 50 producto(s) no inventario', '006', 50);
INSERT INTO `historial` VALUES (9, 27, 4, '2020-02-24 07:57:16', 'Raimundo adicionou 10 producto(s) no inventario', '0061', 10);
INSERT INTO `historial` VALUES (10, 28, 4, '2020-02-24 08:26:57', 'Raimundo adicionou 100 producto(s) no inventario', '005', 100);
INSERT INTO `historial` VALUES (11, 29, 4, '2020-02-28 10:46:22', 'Raimundo adicionou 1000 producto(s) no inventario', '022', 1000);
INSERT INTO `historial` VALUES (12, 30, 4, '2020-02-28 10:49:06', 'Raimundo adicionou 1000 producto(s) no inventario', '0011', 1000);
INSERT INTO `historial` VALUES (13, 31, 4, '2020-03-02 14:31:27', 'Raimundo adicionou 100 producto(s) no inventario', '03', 100);
INSERT INTO `historial` VALUES (14, 32, 4, '2020-03-02 14:33:11', 'Raimundo adicionou 100 producto(s) no inventario', '04', 100);
INSERT INTO `historial` VALUES (15, 33, 4, '2020-03-02 14:42:52', 'Raimundo adicionou 100 producto(s) no inventario', '0031', 100);
INSERT INTO `historial` VALUES (16, 32, 4, '2020-03-12 13:12:46', 'Raimundo adicionou 4 producto(s) no inventario', 'cx', 4);
INSERT INTO `historial` VALUES (17, 32, 4, '2020-03-13 06:36:29', 'Raimundo adicionou 4 producto(s) no inventario', 'xxxxx', 4);
INSERT INTO `historial` VALUES (18, 33, 4, '2020-03-14 05:05:51', 'Raimundo eliminou 95 producto(s) do inventario', 'expeirados', 95);
INSERT INTO `historial` VALUES (19, 34, 4, '2020-03-27 06:08:42', 'Raimundo adicionou 10 producto(s) no inventario', '0022', 10);
INSERT INTO `historial` VALUES (20, 35, 4, '2020-03-27 07:36:29', 'Raimundo adicionou 10 producto(s) no inventario', '0021', 10);
INSERT INTO `historial` VALUES (21, 36, 4, '2020-03-27 08:22:50', 'Raimundo adicionou 10 producto(s) no inventario', '0223', 10);
INSERT INTO `historial` VALUES (22, 37, 4, '2020-04-01 09:13:24', 'Raimundo adicionou 10 producto(s) no inventario', '0025', 10);
INSERT INTO `historial` VALUES (23, 38, 4, '2020-04-01 11:35:24', 'Raimundo adicionou 100 producto(s) no inventario', '0026', 100);
INSERT INTO `historial` VALUES (24, 39, 4, '2020-04-01 11:36:36', 'Raimundo adicionou 10 producto(s) no inventario', '0027', 10);
INSERT INTO `historial` VALUES (25, 40, 4, '2020-04-03 10:40:18', 'Raimundo adicionou 10 producto(s) no inventario', '0227', 10);
INSERT INTO `historial` VALUES (26, 41, 4, '2020-04-03 10:49:32', 'Raimundo adicionou 10 producto(s) no inventario', '0228', 10);
INSERT INTO `historial` VALUES (27, 42, 4, '2020-04-03 10:58:06', 'Raimundo adicionou 10 producto(s) no inventario', '0229', 10);
INSERT INTO `historial` VALUES (28, 43, 4, '2020-04-03 20:10:23', 'Raimundo adicionou 10 producto(s) no inventario', '030', 10);
INSERT INTO `historial` VALUES (29, 44, 4, '2020-04-06 22:01:38', 'Raimundo adicionou 10 producto(s) no inventario', '0232', 10);
INSERT INTO `historial` VALUES (30, 45, 4, '2020-04-06 22:01:58', 'Raimundo adicionou 10 producto(s) no inventario', '0233', 10);
INSERT INTO `historial` VALUES (31, 46, 4, '2020-04-06 22:02:58', 'Raimundo adicionou 10 producto(s) no inventario', '0234', 10);
INSERT INTO `historial` VALUES (32, 47, 4, '2020-04-06 22:03:36', 'Raimundo adicionou 10 producto(s) no inventario', '0235', 10);
INSERT INTO `historial` VALUES (33, 48, 4, '2020-04-06 22:03:53', 'Raimundo adicionou 10 producto(s) no inventario', '0236', 10);
INSERT INTO `historial` VALUES (34, 49, 4, '2020-04-20 07:38:15', 'Raimundo adicionou 10 producto(s) no inventario', '0078', 10);
INSERT INTO `historial` VALUES (35, 50, 6, '2020-04-22 21:38:21', 'Adelito adicionou 11 producto(s) no inventario', '00002', 11);
INSERT INTO `historial` VALUES (36, 51, 6, '2020-04-22 21:44:34', 'Adelito adicionou 10 producto(s) no inventario', '00003', 10);
INSERT INTO `historial` VALUES (37, 52, 6, '2020-04-22 21:52:19', 'Adelito adicionou 5 producto(s) no inventario', '00004', 5);

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil`  (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ciudad` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_postal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `conta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nib` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `banco` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES (1, 'NEUTRO, LDA', 'ExpansÃ£o', 'Pemba', '116441731', 'Cabo Delgado', '+(258) 849018210 ', 'neutroelectricidadepba@gmail.com', 17, 'MT', 'img/1579609583_slider_top.png', '354882649', '0001 000000 354882649 57', 'Millenium Bim');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_producto` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_producto` tinyint(4) NOT NULL,
  `date_added` datetime(0) NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NULL DEFAULT NULL,
  `id_categoria` int(11) NULL DEFAULT NULL,
  `preco_compra` double NULL DEFAULT NULL,
  `data_fabrico` datetime(0) NULL DEFAULT NULL,
  `data_expiracao` datetime(0) NULL DEFAULT NULL,
  `iva` double NULL DEFAULT NULL,
  `mgl` double NULL DEFAULT NULL COMMENT 'Margem de Lucro',
  `idgabinete` int(11) NULL DEFAULT NULL,
  `fabricante` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numero_serie` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vida_util` int(11) NULL DEFAULT NULL,
  `garantia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observacao` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_compra` datetime(0) NULL DEFAULT NULL,
  `ano_fabrico` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE,
  UNIQUE INDEX `codigo_producto`(`codigo_producto`) USING BTREE,
  INDEX `idgabinete`(`idgabinete`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (21, '001', 'Primavera ERP V9.15, MÃ³dulo de Contabilidade e GestÃ£o', 1, '2020-02-22 12:53:57', 75000, 38, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (22, '002', 'Recursos Humanos - Primavera ERP', 1, '2020-02-22 12:54:48', 500, 17, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (23, '003', 'Copias', 1, '2020-02-22 16:04:01', 2.5, 47, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (24, '004', 'Encadernacao', 1, '2020-02-22 16:04:23', 30, 48, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (25, '05', 'Software de FacturaÃ§Ã£o e Stock', 1, '2020-02-22 16:04:57', 2900, 50, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (26, '006', 'Curso de Contabilidade e Gestao Com Primavera ERP v9.0', 1, '2020-02-22 16:05:28', 610, 50, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (27, '0061', 'Certificado de ParticipaÃ§Ã£o', 1, '2020-02-24 07:57:16', 300, 9, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (28, '005', 'Servidor\r\nRAM: 16GB, CPU: 6 Cores, Storage: 320 GB\r\nTaxa de Transferencia: 8 TB\r\nTrafego de Dados na Rede: Input: 40Gbps, Output: 6000Mgbs', 1, '2020-02-24 08:26:57', 5128.205, 98, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (29, '022', 'Primavera ERP V9.15, Contrato de Continuidade (Anual) - Inclui InstalaÃ§Ã£o e actualizaÃ§Ã£o de VersÃµes de software e ManutenÃ§Ã£o.', 1, '2020-02-28 10:46:22', 70000, 987, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (30, '0011', 'Primavera ERP V9.15, MÃ³dulo de GestÃ£o de Projectos e ServiÃ§os', 1, '2020-02-28 10:49:06', 35000, 1000, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (31, '03', 'Software de FacturaÃ§Ã£o e Controlo de Stock, (GestÃ£o de InventÃ¡rio, Clientes, Utilizadores, Facturas e ConfiguraÃ§Ãµes)', 1, '2020-03-02 14:31:27', 75000, 100, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (32, '04', 'InstalaÃ§Ã£o do Software de FacturaÃ§Ã£o e Controlo de Stock em Rede.', 1, '2020-03-02 14:33:11', 3000, 107, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (33, '0031', 'InstalaÃ§Ã£o do Software Primavera ERP- Modulos Contabilidade, Logistica e Tesouraria, Recursos Humanos, GestÃ£o de Projectos, POS, Venda', 1, '2020-03-02 14:42:52', 7500, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (34, '0022', 'Easus - Data Recovery , for Window/Mac', 1, '2020-03-27 06:08:42', 4800, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (35, '0021', 'Lenovo C40-30 all-in-one LCD screen 21.5 polegadas', 1, '2020-03-27 07:36:29', 17500, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (36, '0223', 'Lenovo IdeaCentre C40-30 All-in-One\r\nRAM - 8 GB , DDR3 HD: 1 TB\r\nMonitor: 21.50 Polegadas\r\n', 1, '2020-03-27 08:22:50', 1325000, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (37, '0025', 'Desenvolvimento de Paginas Webs, e Hospedagem\r\n', 1, '2020-04-01 09:13:24', 22000, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (38, '0026', 'Hospedagem de website, plataforma Linux', 1, '2020-04-01 11:35:24', 1100, 99, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (39, '0027', 'Registo de Dominio', 1, '2020-04-01 11:36:36', 3000, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (40, '0227', 'Access Point (AP)', 1, '2020-04-03 10:40:18', 9000, -4, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (41, '0228', 'APC UPS Cor Preta, 650VA 230V', 1, '2020-04-03 10:49:32', 10500, 10, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (42, '0229', 'APC SMART-UPS C 1000VA LCD 230V (SMC1000I)', 1, '2020-04-03 10:58:06', 35500, 0, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (43, '0230', 'Protector de Corrente Electrica', 1, '2020-04-03 20:10:23', 1250, 10, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (44, '0232', 'LicenÃ§as de Google ClassRoom', 1, '2020-04-06 22:01:38', 22050, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (45, '0233', 'Registo DomÃ­nio de Email subdomÃ­nio @its.ac.mz', 1, '2020-04-06 22:01:58', 4000, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (46, '0234', 'LicenÃ§a de Email Profissionais para mais 100 utilizadores', 1, '2020-04-06 22:02:58', 9250, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (47, '0235', 'LicenÃ§a de Zoom Meeting\r\n', 1, '2020-04-06 22:03:36', 1325, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (48, '0236', '\r\nPrestaÃ§Ã£o de ServiÃ§os\r\n', 1, '2020-04-06 22:03:53', 25000, 10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (49, '0078', 'Carros From', 1, '2020-04-20 07:38:15', 15000, 10, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (50, '00002', 'Axus', 1, '2020-04-22 21:38:21', 10, 11, 13, NULL, NULL, NULL, NULL, NULL, 0, 'Meneses', 'MO1', 'N/A', 3, '1', 'nada consta', '2020-04-21 00:00:00', 2004);
INSERT INTO `products` VALUES (51, '00003', 'HP-ProBook', 1, '2020-04-22 21:44:34', 21, 10, 13, NULL, NULL, NULL, NULL, NULL, 1, 'Meneses', 'Modelo 2', 'MY304', 3, 'Sim', 'nada consta', '2020-04-21 00:00:00', 2010);
INSERT INTO `products` VALUES (52, '00004', 'Aiwa-TV', 1, '2020-04-22 21:52:19', 112, 5, 13, NULL, NULL, NULL, NULL, NULL, 2, 'Meneses Corporation', 'MO3251YWW', '002EYS', 3, 'Sim', '', '2020-04-28 00:00:00', 2020);

-- ----------------------------
-- Table structure for tmp
-- ----------------------------
DROP TABLE IF EXISTS `tmp`;
CREATE TABLE `tmp`  (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8, 2) NULL DEFAULT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 236 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmp
-- ----------------------------
INSERT INTO `tmp` VALUES (235, 21, 1, 75000.00, '6jhi5romsoo5hpg2irrrdfrftv');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s email, unique',
  `date_added` datetime(0) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  UNIQUE INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'user data' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'Raimundo', 'Jose', 'rjose', '$2y$10$rRjlXD36wBCkuYGG6BchZeIVnF0dcNKhpenKzPO796gQSnbyVlC5q', 'jhraimundo3@gmail.com', '2020-02-22 12:52:02', 'admin');
INSERT INTO `users` VALUES (5, 'Telcio Raimundo', 'Jose', 'tjose', '$2y$10$/vczU7kJTH5WoWm4N06FLOX3L0DrEr7eJ0DSKjhnjR0TJd3pZSHd2', 'telcio@gmail.com', '2020-02-22 12:53:02', 'user');
INSERT INTO `users` VALUES (6, 'Adelito', 'Ramos Meneses', 'ameneses', '$2y$10$KFUQlIRxVXmod7sQ9husQuqFYjQ.tjpUjYiT.SaMUBifPrZTHnqC.', 'amenese@gmail.com', '2020-04-22 13:32:51', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
