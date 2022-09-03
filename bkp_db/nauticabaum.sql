-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2021 a las 00:18:59
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nauticabaum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_de_galeria`
--

CREATE TABLE `imagenes_de_galeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_imagen` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes_de_galeria`
--

INSERT INTO `imagenes_de_galeria` (`id`, `file_imagen`, `created_at`, `updated_at`) VALUES
(1, 'Imagen_de_producto/PVl19kiR6kurKaH5zSzo2CXP2DY7f5aQydv50x54.jpeg', '2021-01-31 01:03:22', '2021-01-31 01:03:22'),
(2, 'Imagen_de_producto/fvNOotNpTGIzbAh9QVsXX2BXQUqqqaN7dPuNEmus.jpeg', '2021-01-31 01:06:52', '2021-01-31 01:09:46'),
(3, 'Imagen_de_galeria/1VaIfYC0EJRGs8tngO9tw3cUOqGHnZYQwuURE9w8.jpeg', '2021-02-01 15:14:43', '2021-02-01 15:14:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_de_producto`
--

CREATE TABLE `imagenes_de_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `file_imagen` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes_de_producto`
--

INSERT INTO `imagenes_de_producto` (`id`, `producto_id`, `file_imagen`, `created_at`, `updated_at`) VALUES
(1, 1, 'Imagen_de_producto/PVl19kiR6kurKaH5zSzo2CXP2DY7f5aQydv50x54.jpeg', '2021-01-31 01:03:22', '2021-01-31 01:03:22'),
(2, 1, 'Imagen_de_producto/fvNOotNpTGIzbAh9QVsXX2BXQUqqqaN7dPuNEmus.jpeg', '2021-01-31 01:06:52', '2021-01-31 01:09:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_de_pedido`
--

CREATE TABLE `lineas_de_pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `moneda_importe` decimal(10,2) NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `moneda_importe_total` decimal(10,2) NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineas_de_pedido`
--

INSERT INTO `lineas_de_pedido` (`id`, `producto_id`, `moneda_importe`, `cantidad`, `moneda_importe_total`, `pedido_id`, `created_at`, `updated_at`) VALUES
(2, 2, '27000.00', 3, '81000.00', 4, '2021-01-31 10:32:17', '2021-01-31 12:04:52'),
(3, 3, '55000.00', 5, '275000.00', 4, '2021-01-31 10:39:25', '2021-01-31 12:04:46'),
(4, 1, '41000.00', 1, '41000.00', 4, '2021-01-31 10:39:44', '2021-01-31 10:39:44'),
(5, 2, '27000.00', 2, '54000.00', 5, '2021-02-01 13:07:53', '2021-02-01 15:10:46'),
(6, 1, '41000.00', 1, '41000.00', 5, '2021-02-01 13:07:57', '2021-02-01 13:07:57'),
(7, 3, '55000.00', 1, '55000.00', 5, '2021-02-01 13:17:45', '2021-02-01 13:17:45'),
(8, 1, '41000.00', 5, '205000.00', 6, '2021-03-24 02:16:49', '2021-03-24 02:17:24'),
(9, 2, '27000.00', 1, '27000.00', 6, '2021-03-24 02:17:03', '2021-03-24 02:17:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `copete` varchar(1000) NOT NULL,
  `videoyt_codigo_v_youtube` varchar(45) DEFAULT NULL,
  `autor` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `rtf_texto` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sino_es_destacada` char(2) NOT NULL,
  `file_imagen` varchar(200) DEFAULT NULL,
  `urlencode_html_para_embeber` text,
  `file_imagen_lateral_1` varchar(200) DEFAULT NULL,
  `rtf_texto_lateral_1` text,
  `file_imagen_lateral_2` varchar(200) DEFAULT NULL,
  `rtf_texto_lateral_2` text,
  `file_imagen_lateral_3` varchar(200) DEFAULT NULL,
  `rtf_texto_lateral_3` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_de_opcion` varchar(55) DEFAULT NULL,
  `no_listar_campos` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acciones_extra` varchar(250) DEFAULT NULL,
  `no_mostrar_campos_abm` varchar(500) DEFAULT NULL,
  `permisos` char(5) DEFAULT NULL,
  `seteo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `nombre_de_opcion`, `no_listar_campos`, `created_at`, `updated_at`, `acciones_extra`, `no_mostrar_campos_abm`, `permisos`, `seteo`) VALUES
(2, 'User', 'password|remember_token|', '2018-10-30 22:35:50', '2018-10-30 22:35:50', NULL, NULL, NULL, NULL),
(6, 'Publicidades', NULL, '2019-07-11 03:42:10', '2020-01-15 22:01:59', NULL, 'ubicacion_de_publicidad_id', 'UR', NULL),
(7, 'mercado', '', '2020-04-19 19:14:49', '2020-04-19 19:14:49', '', '', 'RU', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `sesion_id` int(10) UNSIGNED NOT NULL,
  `sino_solicitado` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mensaje` text,
  `moneda_importe_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `sesion_id`, `sino_solicitado`, `created_at`, `updated_at`, `mensaje`, `moneda_importe_total`) VALUES
(4, 1, '0000-00-00 00:00:00', '2021-01-31 10:32:04', '2021-01-31 11:25:03', NULL, '260000.00'),
(5, 2, NULL, '2021-02-01 13:07:53', '2021-02-01 13:07:53', NULL, NULL),
(6, 3, '0000-00-00 00:00:00', '2021-03-24 02:16:49', '2021-03-24 04:08:35', NULL, '232000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion_id` int(10) UNSIGNED NOT NULL,
  `titulo_del_producto` varchar(60) NOT NULL,
  `cantidad_de_estrellas` int(10) UNSIGNED DEFAULT NULL,
  `moneda_importe` decimal(10,2) NOT NULL,
  `moneda_importe_mercadopago` decimal(10,2) NOT NULL,
  `rtf_descripcion_producto` text,
  `porcentaje_de_descuento` int(10) UNSIGNED DEFAULT NULL,
  `descripcion_descuento` varchar(45) DEFAULT NULL,
  `moneda_importe_antes` decimal(10,2) NOT NULL,
  `file_imagen_principal` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sino_es_nuevo` char(2) DEFAULT NULL,
  `sino_es_destacado` char(2) DEFAULT NULL,
  `sino_es_oferta` char(2) DEFAULT NULL,
  `sino_es_popular_destacado` char(2) DEFAULT NULL,
  `sino_agotado` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `seccion_id`, `titulo_del_producto`, `cantidad_de_estrellas`, `moneda_importe`, `moneda_importe_mercadopago`, `rtf_descripcion_producto`, `porcentaje_de_descuento`, `descripcion_descuento`, `moneda_importe_antes`, `file_imagen_principal`, `created_at`, `updated_at`, `sino_es_nuevo`, `sino_es_destacado`, `sino_es_oferta`, `sino_es_popular_destacado`, `sino_agotado`) VALUES
(1, 1, 'Asian', 5, '41000.00', '0.00', '<figure class=table><table><tbody><tr><td><strong>&nbsp;Prestaciones y Aplicaciones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>El Kayak Single Asian es kayak de travesía elegido por los kayakistas por su excelente estilo y diseño, que lo hace muy ligero, liviano, fuerte y seguro.Su proa y popa elevadas le dan una belleza y estética insuperable.Se destaca por su manga de 0,60 m que le da estabilidad por los cual puede ser utilizado por remeros de baja o alta experiencia. Y su cockpit amplio 0,90m x 0,50 permite que los remeros de talla mayor se sientan muy cómodos y seguros.Los más exigentes y avezados remeros lo eligen para largas travesías por mar y río. Es fácilmente transportable en tu auto.</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Garantía&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>De por vida, siendo remitido por el comprador a la fábrica.</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Características&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Compartimientos estancos en proa y en proa. 2 tambuchos en proa y popa con tapas de goma totalmente herméticas de fácil acceso para la carga. Cabo de vida a lo largo de su cubierta y cabo elástico para carga. 150 kgs de carga. Estancos herméticos</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Dimensiones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Eslora 5,40 mts. Manga 0,60 mts. Cockpit 0,90 m x 0,50 m Puntal 0,30 mts. Peso 22 kgs. Tapa de goma de proa: 25 cm x 19 cm Tapa de goma de popa: 44,5 cm x 28 cm.</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Colores&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><p>&nbsp;</p><p><strong>Blanco, Amarillo, Azul, Celeste, Gris, Rojo, Naranja, Verde,</strong><br><strong>Los detalles y accesorios en negro</strong></p></td></tr></tbody></table></figure>', 10, 'Descripcion descuento', '45100.00', 'Producto/VM5V9DvZdUSeLMxOkVF4ttCKugivNtHBIpgs5uEm.jpeg', '2021-01-30 16:57:09', '2021-01-31 00:57:09', 'SI', 'SI', 'SI', 'SI', 'NO'),
(2, 1, 'Single', 4, '27000.00', '29000.00', '<figure class=table><table><tbody><tr><td><strong>&nbsp;Prestaciones y Aplicaciones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>El Kayak Single Baum travesía está diseñado para ser ligero, liviano, fuerte y seguro. Su estabilidad es notable y mantiene perfectamente el rumbo. Es un kayak excelente barrenador de olas y ha sido elegido para importantes travesías náuticas por mar y por río en diferentes zonas del país. Es un kayak con cockpit alto, permitiendo que se mantenga seco aún en las más exigidas situaciones. El Kayak single es muy requerido por las escuelas de principiantes y canotaje por su seguridad y estabilidad. Es un kayak fácilmente transportable en el portaequipaje de cualquier auto.</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Garantía&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>De por vida, siendo remitido por el comprador a la fábrica.</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Características&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Kayak Rosario. Kayak travesía. Kayak de fibra de vidrio</li><li>Rompeolas.</li><li>kayak single con estancos en proa y en popa. 1 tambucho en popa con tapa de fibra hérmetica. Cabo de vida a lo largo de cubierta. Cabo elástico en cubierta para sujetar carga. 150 kgs de carga. Estancos hérmeticos</li><li>Accesorios para kayak : Incluye remo</li><li>Salvavidas aparte</li><li>Fábrica y venta de kayak single y doble travesía en Rosario</li><li>Indumentaria</li><li>Venta de kayak Rosario, Mendoza, Buenos Aires, Santa Fe, Córdoba, Entre Ríos, Río Negro</li><li>Venta de Kayak a todo el país.</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Dimensiones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Eslora 4,30 mts. Manga 0,60 mts. Tapa de fibra de vidrio 27 cm x 21,5 cm. Puntal 0,40 mts. Peso 18 kgs.</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Colores&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;<strong>Blanco, Amarillo, Azul, Celeste, Gris, Rojo, Naranja, Verde,</strong><br><strong>Los detalles y accesorios en negro</strong></td></tr></tbody></table></figure>', NULL, NULL, '27000.00', 'Producto/17Yi4tiLOJTr1n33scRbDr6QIWTBNIqcVYeeS0mj.jpeg', '2021-01-30 16:52:53', '2021-01-31 00:52:53', 'NO', 'SI', 'SI', 'NO', 'NO'),
(3, 1, 'Doble Cerrado', 3, '55000.00', '57000.00', '<figure class=table><table><tbody><tr><td><strong>&nbsp;Prestaciones y Aplicaciones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>El Kayak Doble Cerrado Baum travesía es un kayak de diseño único en su estilo, muy ligero, fuerte, liviano, seguro y de notable estabilidad. Kayak de fibra de vidrio. Kayak doble cerrado, gracias a su casco tinglado posee un diseño asimétrico que le otorga muy buena navegabilidad en circunstancias exigidas. Su rompeolas en cubierta lo hace un kayak seco en cualquier situación. Ideal para zonas frías por la protección que le brinda al kayakista. Dada sus características es de muy fácil transportar</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Garantía&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>De por vida, siendo remitido por el comprador a la fábrica.</td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Características&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Fabrica de kayak</li><li>Kayak de fibra de vidrio</li><li>Casco tinglado. Rompe olas en cubierta. 6 compartimientos estancos hérmeticos-1 en proa 1 en popa- 1 en cada lateral y 1 debajo de cada butaca 350 kgs de carga.</li><li>Estancos herméticos.</li><li>Kayak Rosario. Kayak Travesía .</li><li>Kayak con 4 tambuchos de carga. 1 en proa, 1 en popa y 2 laterales de acceso directo al remero</li><li>Accesorios para kayak : Incluye remos</li><li>Salvavidas aparte</li><li>Fábrica y venta de kayak single y doble travesía en Rosario</li><li>Indumentaria</li><li>Venta de kayak Rosario, Mendoza, Buenos Aires, Santa Fe, Córdoba, Entre Ríos, Río Negro</li><li>Venta de kayak single y doble a todo el país</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Dimensiones&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td><ul><li>Eslora 5,80 mts. Manga 0,80 mts. Puntal 0,45 mts. Peso 40 kgs Tapas de proa y popa: 35 cm de diámetro. Tapas de acceso directo de los remeros: 25 cm x 19 cm.</li></ul></td></tr><tr><td>&nbsp;</td></tr><tr><td><strong>&nbsp;Colores&nbsp;</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;<strong>Blanco, Amarillo, Azul, Celeste, Gris, Rojo, Naranja, Verde,</strong><br><strong>Los detalles y accesorios en negro</strong></td></tr></tbody></table></figure>', NULL, NULL, '52000.00', 'Producto/rBwPx3fFtosQMyRflSTrFYLEPgMw4zpaGyIVgz1E.jpeg', '2021-01-31 00:56:37', '2021-01-31 00:56:37', 'NO', 'SI', 'NO', 'NO', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_de_usuario`
--

CREATE TABLE `roles_de_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_de_usuario` varchar(45) NOT NULL,
  `nivel_de_acceso` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_de_usuario`
--

INSERT INTO `roles_de_usuario` (`id`, `rol_de_usuario`, `nivel_de_acceso`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, '2018-10-30 22:38:21', '2018-12-12 17:43:14'),
(2, 'Gestor de contenidos', 2, '2018-10-30 22:38:28', '2018-12-12 17:43:24'),
(3, '', 0, '2018-12-12 17:43:29', '2019-03-02 04:37:17'),
(4, '', 0, '2019-03-02 04:37:25', '2019-03-02 04:37:25'),
(5, '', 0, '2019-03-13 15:34:54', '2019-03-13 15:34:54'),
(6, '', 0, '2019-03-16 17:11:01', '2019-03-22 15:32:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `created_at`, `updated_at`, `file_imagen`) VALUES
(1, 'Kayaks', '2021-03-23 23:51:35', '2021-03-24 03:51:35', 'Seccion/wT467h2tW3twFeEyq5aDPGPRoJJdxyBcVCAvJLk1.jpeg'),
(2, 'Remos', '2021-03-23 23:52:50', '2021-03-24 03:52:50', 'Seccion/DAfrIG3KOPBVVvP76y1hAasHnO6rINmryDqnu0D8.jpeg'),
(3, 'Salvavidas', '2021-03-23 23:53:49', '2021-03-24 03:53:49', 'Seccion/WWzEsXnKNeQTPUvevqO1jTCViEYLALC3X1OzKeQA.jpeg'),
(4, 'Accesorios', '2021-03-23 23:55:44', '2021-03-24 03:55:44', 'Seccion/sTCXKsECEzpfPzhbagKCmN7NGRZG40yatTZVei1S.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesions`
--

CREATE TABLE `sesions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_adress` varchar(20) DEFAULT NULL,
  `user_agent` varchar(50) DEFAULT NULL,
  `lenguaje` varchar(12) DEFAULT NULL,
  `tipo_de_dispositivo` varchar(10) DEFAULT NULL,
  `es_un_bot` varchar(2) DEFAULT NULL,
  `sino_cartel_ie_no_recomendado` char(2) DEFAULT NULL,
  `pagina_de_origen` varchar(80) DEFAULT NULL,
  `pagina_de_ingreso` varchar(80) DEFAULT NULL,
  `browser_name` varchar(35) DEFAULT NULL,
  `browser_version` varchar(15) DEFAULT NULL,
  `browser_family` varchar(25) DEFAULT NULL,
  `browser_engine` varchar(10) DEFAULT NULL,
  `platform_name` varchar(25) DEFAULT NULL,
  `platform_family` varchar(15) DEFAULT NULL,
  `platform_version` varchar(10) DEFAULT NULL,
  `device_family` varchar(40) DEFAULT NULL,
  `device_model` varchar(40) DEFAULT NULL,
  `mobile_grade` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesions`
--

INSERT INTO `sesions` (`id`, `user_id`, `ip_adress`, `user_agent`, `lenguaje`, `tipo_de_dispositivo`, `es_un_bot`, `sino_cartel_ie_no_recomendado`, `pagina_de_origen`, `pagina_de_ingreso`, `browser_name`, `browser_version`, `browser_family`, `browser_engine`, `platform_name`, `platform_family`, `platform_version`, `device_family`, `device_model`, `mobile_grade`, `created_at`, `updated_at`) VALUES
(1, NULL, ':1', 'ozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebK', 's-419', 'Desktop', 'NO', NULL, 'ttp://localhost:1010/mgm2/nauticabaum/public/seccion/4', 'ttp://localhost:1010/mgm2/nauticabaum/public', 'hrome 88.0.4324', '8.0.4324', 'hrome', 'link', 'indows 10', 'indows', '0', 'nknown', '0', '0', '2021-01-31 10:31:57', '2021-01-31 10:31:57'),
(2, NULL, ':1', 'ozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebK', 's-419', 'Desktop', 'NO', NULL, 'ttp://localhost:1010/mgm2/nauticabaum/public/', 'ttp://localhost:1010/mgm2/nauticabaum/public/cart-list', 'hrome 88.0.4324', '8.0.4324', 'hrome', 'link', 'indows 10', 'indows', '0', 'nknown', '0', '0', '2021-02-01 13:05:03', '2021-02-01 13:05:03'),
(3, NULL, ':1', 'ozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebK', 's-419', 'Desktop', 'NO', NULL, 'ttp://localhost:1010/mgm2/nauticabaum/public', 'ttp://localhost:1010/mgm2/nauticabaum/public', 'hrome 89.0.4389', '9.0.4389', 'hrome', 'link', 'indows 10', 'indows', '0', 'nknown', '0', '0', '2021-03-24 02:16:37', '2021-03-24 02:16:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orden` int(10) UNSIGNED DEFAULT NULL,
  `file_imagen` varchar(200) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `subtitulo` varchar(300) DEFAULT NULL,
  `sino_es_combo` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_enlace` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `orden`, `file_imagen`, `titulo`, `subtitulo`, `sino_es_combo`, `created_at`, `updated_at`, `url_enlace`) VALUES
(1, 1, 'Slider/gjF63vWwxyOxdjbfpVn8f6VMJ2r9BxZfGYKcv6gE.jpeg', NULL, NULL, 'NO', '2021-01-30 13:22:54', '2021-01-30 13:22:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_de_usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `telegram_chat_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `rol_de_usuario_id`, `telegram_chat_id`, `celular`) VALUES
(1, 'Fernando', 'fernandomadoz@hotmail.com', '$2y$10$ce/BlY9WgswNehJBHZGmWu8agaMCc2ce.YS3z9kWqFaysM9.8wAO6', 'LBA8ldedEtGU9UcTMoFDaZd6Q7lyjdJmuamatfTolFYHABTo3Hltfr3CNFrB', '2018-10-24 03:09:31', '2019-04-04 01:24:07', 1, '632979534', '+5493804201747'),
(2, 'Guille', 'lbvinos@gmail.com', '$2y$10$ROOEOdqb8Llp9nil3GMlVO1PVjhdy9GogvTuYjE7CISIlF/JeYZbO', 'Tvb9VCWCLHtvjY5Izz35QDAQpZhOfHLCAm8lp9y9QI7bjFFAnPdYCI5hwtRc', '2020-01-15 19:29:41', '2020-07-01 21:40:17', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `varietales`
--

CREATE TABLE `varietales` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion_id` int(10) UNSIGNED NOT NULL,
  `varietal` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_de_galeria`
--
ALTER TABLE `imagenes_de_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_imagenes_de_producto_1` (`producto_id`);

--
-- Indices de la tabla `lineas_de_pedido`
--
ALTER TABLE `lineas_de_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_lineas_de_pedidos_1` (`producto_id`),
  ADD KEY `FK_lineas_de_pedidos_2` (`pedido_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pedidos_1` (`sesion_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productos_1` (`seccion_id`);

--
-- Indices de la tabla `roles_de_usuario`
--
ALTER TABLE `roles_de_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesions`
--
ALTER TABLE `sesions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Index_2` (`user_id`),
  ADD KEY `Index_4` (`ip_adress`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_users_2` (`rol_de_usuario_id`) USING BTREE;

--
-- Indices de la tabla `varietales`
--
ALTER TABLE `varietales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_varietales_1` (`seccion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes_de_galeria`
--
ALTER TABLE `imagenes_de_galeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `lineas_de_pedido`
--
ALTER TABLE `lineas_de_pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles_de_usuario`
--
ALTER TABLE `roles_de_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sesions`
--
ALTER TABLE `sesions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `varietales`
--
ALTER TABLE `varietales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  ADD CONSTRAINT `FK_imagenes_de_producto_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `lineas_de_pedido`
--
ALTER TABLE `lineas_de_pedido`
  ADD CONSTRAINT `FK_lineas_de_pedidos_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `FK_lineas_de_pedidos_2` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_pedidos_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesions` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_productos_1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_2` FOREIGN KEY (`rol_de_usuario_id`) REFERENCES `roles_de_usuario` (`id`);

--
-- Filtros para la tabla `varietales`
--
ALTER TABLE `varietales`
  ADD CONSTRAINT `FK_varietales_1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
