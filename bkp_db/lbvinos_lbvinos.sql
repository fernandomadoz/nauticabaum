-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-07-2020 a las 17:28:56
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lbvinos_lbvinos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_de_producto`
--

CREATE TABLE `imagenes_de_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `file_imagen` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '0000_00_00_000000_mautic_api_consumer_key', 1);

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
  `urlencode_html_para_embeber` text
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

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fernandomadoz@hotmail.com', '$2y$10$yeDX91rfzu9DxfLSEoIXCOhXmcbaonxQ/W41e0qJOrulh51Egd8am', '2019-01-29 21:22:21'),
('gnosis.araruama@gmail.com', '$2y$10$BaShLwBsEaP0Bb734rSK9uZHJvdAEpz10Q/HcNziAYlgr/JfWFyiS', '2019-04-22 23:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `varietal_id` int(10) UNSIGNED NOT NULL,
  `titulo_del_producto` varchar(60) NOT NULL,
  `cantidad_de_estrellas` int(10) UNSIGNED DEFAULT NULL,
  `moneda_importe` decimal(10,2) NOT NULL,
  `descripcion_producto` text,
  `porcentaje_de_descuento` int(10) UNSIGNED DEFAULT NULL,
  `descripcion_descuento` varchar(45) NOT NULL,
  `moneda_importe_antes` decimal(10,2) NOT NULL,
  `file_imagen_principal` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sino_es_nuevo` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `varietal_id`, `titulo_del_producto`, `cantidad_de_estrellas`, `moneda_importe`, `descripcion_producto`, `porcentaje_de_descuento`, `descripcion_descuento`, `moneda_importe_antes`, `file_imagen_principal`, `created_at`, `updated_at`, `sino_es_nuevo`) VALUES
(1, 1, 'Pixels Ancellotta', 5, 300.00, 'Bodega: CORBEAU WINES\r\nComposición: 100% Ancellotta\r\nAñada: 2018\r\nViñedos: Maipú y Santa Rosa, Mendoza.\r\nElaboración: Termomaceración y prensado de orujos.\r\nFermentación con levaduras seleccionadas a 22-24 °C. Centrifugado y fermentación malo-láctica terminada.\r\nConservación en vasijas de concreto.\r\nNotas de Cata: A la vista presenta un color rojo violáceo profundo. Aromas a violetas, frutos rojos y negros maduros con toques de pimienta negra y especias en nariz. El sabor es muy frutado y especiado con taninos suaves, dulces y redondos.\r\nFinal persistente y agradable.', 0, '0', 300.00, 'Producto/h7ZT88GelrzuxxA2zBxVEbrHKODSZ1YuC5bdutP7.jpeg', '2020-07-08 17:21:11', '2020-07-08 20:21:11', 'SI'),
(2, 1, 'UNKU Malbec Reserva', 4, 0.00, '100% Malbec.\r\nAñada: 2017\r\nEste vino se presenta con un estilo propio, expresando un carácter único en su forma para brindarle al consumidor un producto acorde a los paladares mas exigentes.\r\n\r\nDe color rojo profundo con destellos violetas y azules.\r\n\r\nEn olfato presenta notas maduras de arándanos, cereza y ciruelas.\r\n\r\nEn boca se presenta con taninos suaves y maduros, de mucha persistencia y concentración dulce por la maduración de alcohol y los taninos. \r\nEl roble nuevo le aporta aromas a vain', 0, '0%', 0.00, NULL, '2020-07-08 17:21:45', '2020-07-08 20:21:45', 'SI'),
(3, 1, 'Desquiciado Cabernet Franc', 5, 545.00, 'Bodega: Desquiciado Wines\r\nComposicion: 90% de Cabernet Franc, 5% de Merlot y 5% de Petit Verdot.\r\nAñada: 2019\r\nViñedos: proviene de Gualtallary – Tupungato, en el corazón del Valle de Uco, de parrales jóvenes. Los suelos son arenosos con presencia de limo y piedras a medio metro del suelo.\r\n\r\nElaboración: La elaboración la hacemos a través de una cofermentación de todos los varietales mencionados anteriormente, por método tradicional. Una vez finalizado el proceso fermentativo el vino es enviado a barricas de 3er y 4to uso, donde reposará durante 9 meses. El 100% del líquido pasa por madera, ya que con este vino buscamos exponer la potencia del varietal de la zona donde proviene.\r\n\r\nAlcohol: 13,7% pH/acidez: : 3,60 / 5,8', 0, '0', 0.00, 'Producto/jlUZNBIMnudbPfrj71J7d2ZuVtDiEAaNMA9tYTSA.jpeg', '2020-07-08 17:22:15', '2020-07-08 20:22:15', 'SI'),
(4, 2, 'Atrevido blend de tintas', 5, 660.00, 'Bodega: Terracota Winelands\r\nComposicion: Cabernet Sauvignon | Malbec | Petit Verdot\r\n\r\nAñada: 2015\r\nViñedos: Las fincas de Terracota Wineland se encuentran ubicadas en Agua Amarga (Tunuyán) y Altamira (La Consulta) en el Valle de Uco.\r\nBlend fino, redondo, sobrio, sorprendente. Con una particular participación de uvas tintas cuidadosamente seleccionadas de añosos viñedos de la familia en Valle de Uco.\r\nDe atractivo color rojo guinda oscuro con tonos azules profundos en su seno, voluminosos aromas frutales, frescos de berrys, cassis, ciruela, moras y sutiles notas de vainilla. Con el tiempo, jugando en la copa, desarrolla todo su potencial y no deja de sorprendernos. En boca se presenta muy amable al ingreso e inmediatamente llena el paladar con una estructura importante y a la vez noble, que perdura en el tiempo para terminar sedoso aunque robusto.\r\nSin contacto con roble, se lo embotelló joven para que guarde el ímpetu y la fuerza de la pureza varietal.', 0, '0', 660.00, 'Producto/FzBEBIe0Ub8wrj1CaDtVKq3AhWvQ4gpvWFFZ0IEo.jpeg', '2020-07-08 17:22:49', '2020-07-08 20:22:49', 'SI'),
(5, 4, 'Atrevido Sauvignon Blanc', 5, 590.00, 'Bodega: Descendiente Wine\r\nComposicion: Sauvignon Blanc\r\n\r\nAñada: 2017\r\nViñedos: Las fincas de Terracota Wineland se encuentran ubicadas en Agua Amarga (Tunuyán) y Altamira (La Consulta) en el Valle de Uco, a 1.088 metros sobre el nivel del mar. Sus suelos son de tipo franco arenoso a arenoso, con piedras.\r\n\r\nNotas de cata: de color amarillo pálido cuasi blanco y reflejos verdosos, genera aromas típicos e inconfundibles de la variedad.\r\nSobre una base cítrica de lima y limones dulces, libera un aroma combinado de ruda, maracuyá y espárragos que inundan nuestra nariz.\r\nEn boca es fresco y joven, vivaz, atrevido y equilibrado. Muestra esa personalidad única que lo destaca.', 0, '0', 590.00, 'Producto/yvfJLy6Lm1X950EX5hJ7lqpcluC5esfe2JDlCw3K.jpeg', '2020-07-08 17:23:17', '2020-07-08 20:23:17', 'SI'),
(6, 5, 'Desquiciado Blend de Blancas', 5, 485.00, 'Bodega: Desquiciado Wines\r\nComposición: 50% Sauvignon Blanc, 35% Pinot Gris y 15% de Chardonnay.\r\nAñada: 2018\r\nViñedos: Todas sus uvas provienen de Gualtallary – Tupungato, en el corazón del Valle de Uco. Todos los blancos que lo componen provienen de parrales sobre suelos arenosos, con mucha irrigación durante el día.\r\nElaboración: Esta mixtura de varietales surge de la idea de hacer un Sauvignon Blanc, cuya cosecha se pasó del tiempo estipulado y encontramos al final de su fermentación notas más florales que las propias de la cepa, que suelen ser siempre más herbáceas. Buscamos compensar la acidez con Pinot Gris y finalmente le dimos más volumen en boca con Chardonnay del año 2017, que tenía un paso por barrica de 2do uso durante 3 meses.\r\n\r\nAlcohol: 14% pH/acidez: : 3,65 / 6,00', 0, '00', 485.00, 'Producto/FLzN9BuKZNzFWdhLaP4KCHi01CNM3OTHIRNHJjsD.jpeg', '2020-07-08 17:23:52', '2020-07-08 20:23:52', 'SI'),
(7, 2, 'Desquiciado El Corte', 5, 775.00, 'Bodega: Desquiciado Wines\r\nComposición: 40% Malbec, 35% Cabernet Franc, 20% Syrah y 5% de Petit Verdot.\r\nAñada: 2018\r\nViñedos: Con uvas de Gualtallary – Tupungato, en el corazón del Valle de Uco. El Malbec se extrajo de espalderos ubicados de las laderas del viñedo, donde se consigue mayor concentración. Los suelos son arcillosos – arenosos poco profundos y con buen drenaje. El Cabernet Franc, el Syrah e inclusive el Petit Verdot provienen de parrales ubicados sobre suelos arenosos.\r\nElaboración: La elaboración de este vino se realizó a través de distintas microvinificaciones en bines de plástico. El Malbec fue cofermentado con el Syrah y el Cabernet Franc cofermentó junto con el Petit Verdot. La maceración duró 20 días, buscando una equilibrar la extracción en taninos y la complejidad con la fruta. Una vez finalizado este proceso se envió todo a barricas francesas de 2do y 3er uso durante 14 meses. En algunas barricas se guardó el corte final y en otras los resultados de las diferentes microvinificaciones. La intención de estos cortes fue buscar resaltar la fruta y la estructura propia de todos los componentes.\r\n\r\nAlcohol: 14% pH/acidez: 3,50 / 5,20', 0, '0', 775.00, 'Producto/0oNJ3ptqTOco03C5NgUqVVQa8iqDorP9OU6N7QcK.jpeg', '2020-07-08 17:24:25', '2020-07-08 20:24:25', 'SI'),
(8, 1, 'Desquiciado Garnacha', 5, 545.00, 'Bodega: Desquiciado Wines\r\nComposicion: 85% Garnacha, 12% de Syrah y 3% de Malbec.\r\nAñada: 2019\r\nViñedos: proviene de Gualtallary – Tupungato, en el corazón del Valle de Uco, de parrales jóvenes. Los suelos son arenosos con presencia de limo y piedras a medio metro del suelo.\r\nElaboración: Se realizaron dos cosechas en diferentes tiempos, la primera se cofermento con Syrah y la segunda se hizo con Malbec, con mas madurez.\r\nAmbas cofermentaciones fueron llevadas en microvinificaciones y finalizados los procesos fermentativos se realizo el corte directamente en la pileta de cemento, donde se dejo durante 8 meses para su posterior fraccionamiento. Este vino no tiene paso por barrica.\r\nAlcohol: 14.8% pH/acidez: : 3,55 / 5.80', 0, '0', 545.00, 'Producto/OFidKzWKV1FLadvMdgV3YwyBtmUH2BEXoScYYVVl.jpeg', '2020-07-08 17:25:00', '2020-07-08 20:25:00', 'SI'),
(9, 1, 'Desquiciado Pinot Gris', 5, 485.00, 'Bodega: Desquiciado Wines\r\nComposicion: 90% de Pinot Gris, 7% de Chardonnay y 3% de Sauvignon Blanc.\r\nAñada: 2019\r\nViñedos: Pinot Gris proviene de Gualtallary – Tupungato, en el corazón del Valle de Uco, de parrales jóvenes. Los suelos son arenosos con presencia de limo y piedras a medio metro del suelo.\r\n\r\nElaboración: Para elaborar este vino se prensaron todas las uvas juntas y se dejaron durante 3 horas macerando, para poder extraer los taninos más livianos, que le otorgan un final más largo. Luego se realizó un desborre sucio y se dejó fermentar en un tanque de 10hl durante 20 días a temperaturas entre 12 y 15 grados. Nuestro Pinot Gris no llegó a hacer la fermentación maloláctica con la idea de conservar la acidez característica del varietal.\r\nNotas de Cata: \r\nSe realizaron dos cosechas en diferentes tiempos, con el objetivo de que el vino tuviera notas frutales y herbáceas a la vez.\r\nAlcohol: 14% pH/acidez: : 3,65 / 6,00', 0, '0', 485.00, 'Producto/T9BsgJf8U6PXKJl6b6em45RSVAwwi89wz3pnBz8g.jpeg', '2020-07-08 17:25:33', '2020-07-08 20:25:33', 'SI'),
(10, 2, 'Paradigma', 5, 750.00, 'Bodega: Domaine St. Diego\r\nComposición: 60% Malbec – 20% Cab. Franc - 20% Cab. Sauvignon.\r\nAñada: 2018\r\nViñedos: Lunlunta – Maipú – Mendoza.\r\n\r\nPARADIGMA , es un vino que no necesita del roble, para elevar su status.\r\nEs otra opción para disfrutar. Alumno privilegiado de la “Escuela de la Fruta y el terruño”\r\nEs un auténtico vino mendocino\r\nVISTA: Aspecto límpido .Color rojo intenso con matices violáceos.\r\n\r\nNariz: Vinoso con marcados recuerdos a confitura de bayas negras. Con el tiempo de botella toma un delicado bouquet de regaliz, nueces y avellanas.\r\n\r\nEn boca: Entrada amable con acidez equilibrada.\r\nBuen paso de boca, jugoso redondo, con final largo recordando algun licor de guindas negras.\r\nVino franco, sincero, sin complicaciones, definiendo claramente las condiciones del terruño. Original por la ausencia de maderas en su crianza.\r\n\r\nAlcohol : 14% Acidez Total : 5.25 gr/lts', 0, '0', 750.00, 'Producto/R9x00cntgRDMNlGvBfeZu4WqmKFYtvjc6OxBc4zC.jpeg', '2020-07-08 17:26:10', '2020-07-08 20:26:10', 'SI'),
(11, 2, 'Pura Sangre', 5, 850.00, 'Bodega: Domaine St. Diego\r\nComposición: Malbec 80%, Cabernet Sauvignon 20%.\r\nAñada: 2018\r\nViñedos: Lunlunta – Maipú – Mendoza.\r\nModerada y razonada crianza en barricas de roble francés y americano. El toque de Cabernet, le otorga mayor potencial de guarda. Vino para coleccionar y disfrutar momentos inolvidables de la vida.\r\nVISTA: Aspecto brillante, color rojo oscuro con matices rubíes de su añada, su crianza en roble y botella.\r\nNariz: Marcado bouquet de frutas maduras y especies: canela, nuez moscada, café de su razonable crianza en barrica.\r\nEn boca: De entrada calida, balance, untuosidad, cuerpo esbelto.\r\nPaso de boca equilibrado expresando los volátiles de la madera y sus taninos finos.\r\nLargo final expresando la sensación de un bombón de fruta especiado con pimienta negra y clavo de olor. Vino aristocrático y noble donde la madera es un condimento y no un ingrediente.\r\nAlcohól : 14% Acidez Total : 5.25 gr/lts', 0, '0', 850.00, 'Producto/knnzLuZGHbt3zMP86pwXs3GX6UywvIU8hTZayQGW.jpeg', '2020-07-08 17:33:58', '2020-07-08 20:33:58', 'SI'),
(12, 1, 'Salvaje Malbec', 5, 990.00, 'Bodega: Desquiciado Wines\r\nComposición: 90% de Malbec y 10% de Syrah.\r\nAñada: 2017\r\nViñedos: Este es un vino hecho con uvas de Gualtallary – Tupungato, en el corazón del Valle de Uco. Las uvas se extrajeron de espalderos que están ubicados en las laderas del viñedo. Los suelos son arcillosos – arenosos poco profundos y con buen drenaje.\r\n\r\nElaboración: La elección de los bines con los que se hizo este vino se basó en el potencial con el cuál habían evolucionado en el proceso fermentativo. El Malbec y el Syrah fueron cofermentados juntos en porcentajes similares al corte final. La maceración duró 30 días con la finalidad de potenciar la concentración del vino, consecuencia de su ubicación en el viñedo. Una vez finalizado este proceso se envió todo a barricas francesas de 2do uso durante 20 meses.\r\n\r\nAlcohol: 14% pH/acidez: 3,65 / 6,00', NULL, '0', 990.00, 'Producto/OCgRdkGZdncRkPJYQihvAS0n3HX1AkCEYaE1Z4nt.jpeg', '2020-07-08 17:33:20', '2020-07-08 20:33:20', 'SI'),
(13, 4, 'Vástago de Gea', 5, 365.00, 'Bodega: Staphyle\r\nComposicion: Sauvignon Blanc\r\nAñada: 2017\r\n\r\nViñedos: Se ubican en la zona de Ugarteche y Agrelo, Luján de Cuyo, conocida como la primer zona vitivinícola de Argentina,\r\n\r\nElaboración: En nuestra bodega tiene inicio desde el viñedo, que es controlado desde la poda y continúa con cada momento vegetativo de la planta, cuando la madurez fisiológica es óptima se inicia la recolección, utilizando tijeras para tal fin.\r\nEl transporte se realiza en bandejas de 18 kilos de capacidad.\r\nAl llegar a bodega se practica una minuciosa selección de los racimos, antes de la molienda.\r\nLa fermentación se produce en vasijas de pequeña capacidad que simplifica y favorece el control de temperatura (no supera los 26 °C). \r\nNuestro laboratorio está equipado para hacer las determinaciones que exigen el proceso de elaboración, estabilización y conservación de nuestros productos. Finalmente son estacionados en madera de roble francés y americano.\r\nNotas de Cata: Vino de color amarillo con reflejos verde-limón. Fino y delicado en nariz, con aromas a azahares y notas de ananá, sutilmente herbáceo.', 0, '0', 365.00, 'Producto/NBmaiVyVESbP5o8YYuW4yHU5VPlS2ES0SwnX7B7U.jpeg', '2020-07-08 17:32:44', '2020-07-08 20:32:44', 'SI'),
(14, 1, 'Zorzal Terroir Unico', 5, 675.00, 'Bodega: Zorzal Wines\r\nComposición: 100% Pinot Noir\r\nAñada: 2017\r\nViñedos: El viñedo de este ejemplar se encuentra a 1.300 msnm, es un viñedo joven plantado en suelos calcáreos.  Las uvas son cosechadas a mano en distintas zonas de Gualtallary (alto, centro y bajo). Los viñedos están ubicados entre los 1.200 y 1.600 msnm.\r\n\r\nElaboración: Se encuba en piletas de cemento, un 80% de la uva molida y el otro 20% con racimo entero. La vasija se llena por gravedad, es decir, en ningún momento se bombea, logrando que la uva llegue a su lugar de fermentación prácticamente intacta. Se hace una maceración en frío de aproximadamente 4 días y luego comienza la fermentación alcohólica con levaduras indígenas o autóctonas. Durante esta fermentación las pieles son pisoneadas (pillage) 3 veces por día. Luego se realiza la fermentación maloláctica. Sulfitado a 30 ppm. Filtrado por placas\r\n\r\nNotas de Cata: \r\nColor: delicado color rojo violáceo. Aroma: en esta cosecha prevalecen los frutos rojos combinados con minerales, hiervas, pólvora y grafito. Sabor: en boca es muy suave y fresco gracias a su acidez, fluido y muy sedoso de largo final.', 0, '0', 675.00, 'Producto/dJAbJJo10WbZgfLCtis4E9QhqRT9n36QYU2My3iR.jpeg', '2020-07-08 17:32:05', '2020-07-08 20:32:05', 'SI'),
(15, 1, '1716 Cedula Real', 5, 590.00, 'Bodega: Bodega Los Zazos\r\nComposicion: 100% malbec\r\nAñada: 2018\r\nViñedos: Amaicha del Valle, Valle Calchaquí, Tucumán. Viñedos a 2100 msns. \r\nEl Cédula Real 1716, cosecha 2018, es un malbec de color rojo rubí claro, de intensidad alta.\r\nEn nariz presenta aromas de violetas, lavanda, enebro, pimienta blanca, y frutos negros.\r\nTambién encontramos aromas terrosos, pasa de uva, hoja de tomate, sílex y leves toques a menta.\r\nEn boca es un vino joven, seco, de acidez media y taninos pronunciados. Se perciben los mismos aromas que en nariz.\r\nIndiscutiblemente Valle Calchaquí', 0, '0', 590.00, 'Producto/a4xI0dfly3crKjm5mdiD6prXP3R4xFEn0xGrlhO7.jpeg', '2020-07-08 17:31:13', '2020-07-08 20:31:13', 'SI'),
(16, 5, 'Puro Rosé', 5, 495.00, 'Bodega: OJO DE AGUA\r\nComposición: 40% Syrah, 30% Merlot, 20% Cabernet Franc, 10%Malbec\r\nAñada: 2018\r\nViñedos: Agrelo, Lujan de Cuyo Mendoza (89%) y Valle de Famatina, La Rioja (11%)\r\nElaboración: Uvas orgánicas de Syrah, Merlot, Cabernet Franc y Malbec cuidadosamente elegidas en la zona de Agrelo, Luján de Cuyo, área conocida como la Meca de la producción de uvas en Argentina.\r\nSeleccionamos las uvas de alta calidad y las cosechamos al momento justo de madurez para lograr frescura y acidez. La fermentación se realiza en tanques de acero inoxidable, a temperaturas entre 16° y 18°C. de esta manera logramos, una lenta suave y controlada fermentación, con tiempo para desarrollar todo su potencial aromático.\r\nNotas de Cata: Tinte rojo leve con tonos rosas. Elegante, aroma a frutillas y cerezas frescas. Sabor a frutos rojos, con buena acidez. Es un vino fresco y fácil de tomar.', 0, '0', 495.00, 'Producto/ofSmRD4GXMQxHuvVWE0Jx4jWKhK0bJFt4Da5pEYh.jpeg', '2020-07-08 17:30:04', '2020-07-08 20:30:04', 'SI'),
(17, 2, 'Puro Malbec-Cabernet', 5, 820.00, 'Bodega: OJO DE AGUA\r\nComposición: 50% Malbec, 50% Cabernet Sauvignon\r\nAñada: 2018\r\nViñedos: Agrelo, Lujan de Cuyo Mendoza.\r\nElaboración: Uvas orgánicas de Malbec y Cabernet Sauvignon cuidadosamente elegidas en la zona de Agrelo, Luján de Cuyo, área conocida como la Meca de la producción de uvas en Argentina.\r\nElaborado desde un blend entre PURO MALBEC y PURO CABERNET SAUVIGNON. Este blend resalta las mejores características de cada vino.\r\nNotas de Cata: Rojo rubí, con destellos brillantes de violeta. Se perciben aromas frutados como blueberries, y seguido rápidamente, de grosellas negras. Característico del Cabernet.', 0, '0', 820.00, 'Producto/YEFdWigdwN287PyIPPIcpuB0suLNvxqp0WyfYCkh.jpeg', '2020-07-08 17:29:19', '2020-07-08 20:29:19', 'SI'),
(18, 1, 'Pixels - Malbec', 5, 300.00, 'Bodega: CORBEAU WINES\r\nComposición: 100% Malbec\r\nAñada: 2018\r\nViñedos: Maipú y Santa Rosa, Mendoza.\r\nElaboración: Termo maceración y prensado de orujos.\r\nFermentación con levaduras seleccionadas a 22-24 °C. Centrifugado y fermentación malo-láctica terminada.\r\nConservación en vasijas de concreto.\r\nNotas de Cata: Color rojo rubí con tonos violáceo de alta intensidad. En nariz se expresa muy frutado y fresco, con notas de frutos rojos y negros, también aparecen notas de especias y pimienta. En boca la entrada es dulce, con taninos suaves y sedosos. La fruta vuelve a aparecer con mucha intensidad y delicadeza. Excelente estructura y cuerpo.\r\nEl final de boca es prolongado y persistente.', 0, '0', 300.00, 'Producto/EVPNgIllwY81BbYVOFrg8IS7uRnC3prZpVnHw5Q7.jpeg', '2020-07-08 17:28:30', '2020-07-08 20:28:30', 'SI'),
(19, 2, 'Pixels – Malbec, Syrah &amp; Ancellota', 5, 300.00, 'Bodega: CORBEAU WINES\r\nComposición: 50% Malbec, 30% Syrah y 20% Ancellota\r\nAñada: 2018\r\nViñedos: Maipú y Santa Rosa, Mendoza.\r\nElaboración: Termo maceración y prensado de orujos.\r\nFermentación con levaduras seleccionadas a 23-25 °C. Centrifugado y fermentación malo-láctica terminada.\r\nConservación en vasijas de concreto.\r\nNotas de Cata: Malbec, Syrah y Ancellotta componen este complejo y equilibrado vino. A la vista tiene un color rojo rubí con tonos violeta. En nariz posee aromas florales, como violeta y frutos rojos, que provienen del Malbec. El Syrah aporta notas especiadas. En boca es un vino dc un buen volumen, y taninos sedosos, mientras que la Ancellotta complementa el blend con una gran estructura y largo final de boca.', 0, '0', 300.00, 'Producto/kMPAjeTUoEocRP3iUaiMx9oPMcoi74sIb6CNvciv.jpeg', '2020-07-08 17:27:54', '2020-07-08 20:27:54', 'SI'),
(20, 1, 'Ojo Negro Malbec', 5, 860.00, 'Bodega: OJO DE AGUA\r\nComposición: 100%Malbec\r\nAñada: 2017\r\nViñedos: Choele Choel, Río Negro, Patagonia\r\nElaboración: Las uvas son cosechadas a mano y guardadas en cajones de 18 kg. Las uvas predominan de viñedos jóvenes, con gran potencial y futuro brillante.\r\nLuego de la selección manual de las uvas, el Malbec es macerado a temperaturas bajo los 8°C por 5-7 días. Esto resalta el color y el aroma. Llevamos a cabo la fermentación en piletas de concreto y tanques de acero inoxidable, con levaduras indígenas locales de la zona del viñedo. Luego, se traspasa el vino a barricas de Roble Frances, para llevar a cabo la fermentación malo-láctica y añejamiento.\r\nNotas de Cata: Rojo Rubí con tonalidades violetas. Aroma frutado, especialmente a ciruelas tan característico del Malbec. Fresco y de gran madurez al mismo tiempo. Luego de airearlo en la copa, aparecen aromas al caramelo y dulce de leche.\r\nDe gran cuerpo. Llena la boca por completo de frescura y fluidez. Pura fruta!', NULL, '0', 860.00, 'Producto/Hzs7b18JXLZiqzcCMzKfkMw62OxD9SslrEfBsCa1.jpeg', '2020-07-08 17:27:02', '2020-07-08 20:27:02', 'SI'),
(21, 2, 'Mad Bird – Malbec - Ancellota', 5, 440.00, 'Bodega: CORBEAU WINES\r\nComposición: 50% Malbec, 50% Ancellotta\r\nAñada: 2017\r\nViñedos: Maipú, Mendoza\r\nElaboración: Maceración.&#39; Termo maceración a 65-67 °C. Fermentación:\r\nA 25/26 °C, con levaduras seleccionadas en tanques de concreto. Fermentación malo-láctica 100%\r\nCrianza: 3 meses en tanque de concreto, 3 meses en barricas de roble americano y 5 meses en botella.\r\nNotas de Cata: Presenta un color rojo violáceo muy intenso y muy atractivo, denso.\r\nEn nariz es un vino muy frutado, con aromas a frutos rojos, frambuesas y especias. En el fondo se\r\nmanifiestan delicados toques de vainilla aportados por el paso en madera de roble americano.\r\nElegante en boca, agradable y amable. Taninos suaves y aterciopelados, bien equilibrado. Final de boca agradable y muy extenso.', NULL, '0', 440.00, 'Producto/f2CGtlHo2lkWgoUfPDZ6sGJ8oLEqpRB60lSt56fq.jpeg', '2020-07-08 01:28:24', '2020-07-08 04:28:24', 'NO'),
(22, 1, 'Mad Bird – Dark Malbec', 5, 440.00, 'Bodega: CORBEAU WINES\r\nComposición: 100% Malbec\r\nAñada:\r\nViñedos: Las Bayas\r\nElaboración: Maceración: Termo maceración a 65°. Fermentación.&#39; A 24/27°C con levaduras seleccionadas en tanques de concreto, Fermentación malo-láctica natural 1O0 %. Crianza: 3 meses en tanque de concreto, 3 meses en barricas de roble americano y 6 meses en botella.\r\nNotas de Cata: De color rojo profundo con tonos purpura.\r\nEn la nariz se presenta expresivo, con notas de frutos negros maduros, violetas, y una sutil, aunque envolvente vainilla. En la boca posee un ingreso dulce y tentador, para luego abrirse en sabores complejos, con taninos redondeados característicos del aporte del terroir. Su final es largo, jugoso y persistente.', 0, '0', 440.00, 'Producto/ZKLdjayfJ4yEwXRoHkVDhduOZzU0IhP41lPYAYxT.jpeg', '2020-07-08 04:31:54', '2020-07-08 04:31:54', 'NO'),
(23, 2, 'Mad Bird – Dark Blend', 5, 440.00, 'Bodega: CORBEAU WINES\r\nComposición: 40% Malbec, 35% Bonarda, 25% Ancellotta\r\nAñada: 2017\r\nViñedos: Las Bayas\r\nElaboración: Maceración.&#39; Termo maceración a 60-65 °C. Fermentación:\r\nA 25/27 °C, con levaduras seleccionadas en tanques de concreto. Fermentación malo-láctica completa con levaduras indígenas. Crianza: 2 meses en tanque de concreto, 3 meses en barricas de roble americano y 6 meses en botella.\r\nNotas de Cata: De color púrpura definido y lágrimas pronunciadas en copa.\r\nEn la nariz presenta notas de ciruelas, especias y bayas con sutiles toques de vainilla. En la boca es denso, untuoso, estructurado, con reminiscencias de bayas rojas, cerezas y ciruelas, y una madera muy integrada.', NULL, '0', 440.00, 'Producto/3Ph91TwAHquCusUWXo0J2nHRKKIMpvfr8UVowggw.jpeg', '2020-07-08 17:39:29', '2020-07-08 20:39:29', 'SI'),
(24, 1, 'Sylvestra Pinot Noir Rose', 5, 575.00, 'Bodega: Bressia\r\nComposición: 100% Pinot Noir\r\nAñada: 2019\r\nViñedos: Agrelo, Luján de Cuyo, Provincia de Mendoza, Argentina.\r\nElaboración: Cosechado de forma manual en cajas de 12-14 kgs. Elaboración tradicional. sin paso en madera.\r\nNotas de Cata: A la vista se ve un color rosa de delicada intensidad, y atractivos reflejos salmón. En nariz, es muy frutado, con aromas a cereza y frambuesa. Notas cítricas a pomelo, lima, quinotos y muy floral del tipo rosas rojas. En boca, es muy fresco, frutal y cuerpo equilibrado. De buena estructura.', NULL, '0', 575.00, 'Producto/fzFm2kXCGiiOGCrWSWeNucXlVbEwK38ZFx3ibeNa.jpeg', '2020-07-08 17:38:53', '2020-07-08 20:38:53', 'SI'),
(25, 1, 'Sylvestra Malbec', 5, 575.00, 'Bodega: Bressia\r\nComposición: 100% Malbec\r\nAñada: 2018\r\nViñedos: Agrelo, Luján de Cuyo. Provincia de Mendoza, Argentina.\r\nElaboración: Vinificado en tanques de Acero Inoxidable y conservado en los mismos hasta el momento de fraccionamiento. No ha sido fermentado ni criado en en presencia de madera.\r\nNotas de Cata: Color rubí de buena intensidad con reflejos negros y violáceos. Muy atractivo. Muy frutado, con aromas a frambuesa y cereza, frutos rojos y negros. Notas especiadas de pimiento rojo. Muy fresco, frutal y cuerpo equilibrado. Taninos maduros y dulces. Persistente y largo en boca.', 0, '0', 575.00, 'Producto/LkBvvdHKLRL8rUWpFrP7EBGu4qDz8LJ0lBsBEYHN.jpeg', '2020-07-08 17:38:19', '2020-07-08 20:38:19', 'SI'),
(26, 4, 'Ojo de Agua Torrontés', 5, 450.00, 'Bodega: Ojo de Agua\r\nComposición: 100% Torrontés\r\nAñada: 2019\r\nViñedos: Valle de Famatina. Provincia de La Rioja, Argentina.\r\nElaboración: uvas cuidadosamente seleccionadas en La Rioja, lugar de nacimiento del Torrontés.\r\nCada uva está tratada con delicados cuidados. Fermentadas a bajas temperaturas bajo un nivel de oxígeno controlado.\r\nNotas de Cata: amarillo con tonalidades verdes. De expresiones aromaticamente intensas y placenteras. Un tipo de varietal fuerte con remarcadas notas de damasco, jarabe dulce de ananá y limón. Sabores a ensalada de frutas, quinotos y notas de flores de lavanda. Una gran entrada con buena estructura llenando el paladar de frescura y sabores exuberantes.', 0, '0', 450.00, 'Producto/SSyfOVLV1mMX26itZhz2rHW1bncrs5GNuWLzZkZa.jpeg', '2020-07-08 17:37:35', '2020-07-08 20:37:35', 'SI'),
(27, 1, 'Ojo de Agua Malbec', 5, 650.00, 'Bodega: Ojo de Agua\r\nComposición: 100% Malbec\r\nAñada: 2018\r\nViñedos: Agrelo, Luján de Cuyo. Provincia de Mendoza, Argentina.\r\nElaboración: Una selección de uvas jóvenes y frescas, el sabor del terroir de Mendoza. El vino es macerado antes de la fermentación, 48 hs en frío, para lograr mejorar el brillo de los colores violetas. Está elaborado exclusivamente en tanques de acero inoxidable, a temperaturas que no excedan los 25ºC.\r\nNotas de Cata: Rojo Rubí con brillos violetas. Un vino elegante en nariz, que comienza a entregar aromas luego de unos minutos en la copa gran combinación entre ciruela fresca con toques de frutos rojos maduros como la jalea de frutillas. Hay también algunos toques de especias y tabaco, pero siempre por detrás de la fruta, que se muestra como protagonista.\r\nVino seco, de cuerpo equilibrado en boca. Despliega sabores a fruta y frutos negros e higos con notas florales de violetas que se atiene al terroir del Valle de Uco.', 0, '0', 650.00, 'Producto/SztQyc8pmgBAFPJWC8Lt18qy3cP9hAyr26ge1v0u.jpeg', '2020-07-08 17:36:56', '2020-07-08 20:36:56', 'SI'),
(28, 1, 'Ojo de Agua Cabernet Sauvignon', 5, 820.00, 'Bodega: OJO DE AGUA\r\nComposición: 100% Cabernet Sauvignon\r\nAñada: 2018\r\nViñedos: Agrelo, Luján de Cuyo Mendoza.\r\nElaboración: el cabernet mas fresco de Agreglo, balanceado y en su perfecta concentración. El vino es macerado antes de la fermentación, 48 hs en frio, para lograr mejorar el brillo de los colores rojos. Está elaborado exclusivamente en tanques de acero inoxidable, a temperaturas que no superan los 25ºC.\r\nNotas de Cata: Rojo intenso con tonos púrpuras. El perfecto ejemplo de un perfecto Cabernet Sauvignon joven: frutos negros, notas de especias como dientes de ajo y regaliz.\r\nSeco en su inicio, con volumen equilibrado en paladar. Sabores a frutos negros e higos, con notas florales a violetas que muestran el terroir del Valle de Uco.', 0, '0', 820.00, 'Producto/KcrYDuvcSbxgtGLSJS8RPDXugTlxygB6xIjyqIUl.jpeg', '2020-07-08 17:36:12', '2020-07-08 20:36:12', 'SI'),
(29, 1, 'Monteagrelo Cabernet Sauvignon', 5, 810.00, 'Bodega: Bressia\r\nComposición: 100% Cabernet Sauvignon\r\nAñada: 2016\r\nViñedos: Luján de Cuyo, Valle de Uco. Provincia de Mendoza, Argentina.\r\nElaboración: 12 meses en barricas de roble Francés y Americano.\r\nNotas de Cata: Color rojo intenso con tonalidades púrpuras propias del varietal. Perfecto equilibrio entre fruta y madera, muy pimentoso y especiado. Muy buen cuerpo, carnoso, con final de boca balanceado. Sin aristas, maduro y armónico.', 0, '0', 810.00, 'Producto/WCdqisHR0JnvnZowbHYhI3LD94778KkCeIeR9Z8Y.jpeg', '2020-07-08 17:35:14', '2020-07-08 20:35:14', 'SI'),
(30, 1, 'Monteagrelo Cabernet Franc', 5, 895.00, 'Bodega: Bressia\r\nComposición: 100% Cabernet Franc\r\nAñada: 2017\r\nViñedos: Valle de Uco. Provincia de Mendoza, Argentina.\r\nElaboración: 12 meses en barricas de roble Francés.\r\nNotas de Cata: Color rojo intenso con tonalidades púrpuras y entorno negro.En nariz frutos rojos y negros, pimientos rojo con impecable presencia de vainilla, chocolate y café originados en el roble durante su crianza. En boca entrada dulce, armónico cuerpo, volumen y carnoso. Vino muy elegante que expresa con mucha firmeza y tipicidad el varietal Cabernet Franc.', 0, '0', 895.00, 'Producto/U5bO1YOC992BBJHDQZ0MMhwL4JM4ryD0EkyFm3kv.jpeg', '2020-07-08 17:34:33', '2020-07-08 20:34:33', 'SI'),
(31, 2, 'Ojo de Agua Cuvèe Speciale', 5, 1050.00, 'Bodega: Ojo de Agua\r\nComposición: 69% Malbec, 17 % Cabernet Franc, 7% Cabernet Sauvignon, 7% Syrah.\r\nAñada: 2018\r\nViñedos: Agrelo, Luján de Cuyo. Provincia de Mendoza, Argentina.\r\nElaboración: Hecho con uvas concentradas, elegidas por su frescura, frutadas y con una textura suave. Fermentación en cubas de cemento por varietal y cofermentadas . El 100% de este blend se guarda durante 12 meses en barricas de Roble Francés.\r\nNotas de Cata: Rojo intenso con violeta. Un vino con personalidad. Gran intensidad con aromas del roble como la vainilla, el cacao y el Coco. Sabores intensos que muestran frutos negros en boca con un toque ahumado de la madera. Ideal para tomar con carnes rojas y disfrutar sus sabores.', 0, '0', 1050.00, 'Producto/nTwXAJMoonKXeXFVnXatGFdAWljSFQ6vsxo8RW0S.jpeg', '2020-07-08 17:41:37', '2020-07-08 20:41:37', 'SI'),
(32, 1, 'Ojo Negro Pinot Noir', 5, 860.00, 'Bodega: OJO DE AGUA\r\nComposición: 100% Pinot Noir\r\nAñada: 2017\r\nViñedos: La Barda, Río Negro, Patagonia\r\nElaboración: Las uvas son cosechadas a mano y guardadas en cajones de 18 kg. Las uvas predominan de viñedos jóvenes, con gran potencial y futuro brillante.\r\nUn vino delicado que es manejado con mucho cuidado. La fermentación toma lugar en dos etapas.\r\nPrimero es prensado prematuramente, similar al proceso de un vino blanco, sin los sedimentos.\r\nLuego se colocan en huevas de cemento, a bajas temperaturas de fermentación, donde se persigue lograr la mayor intensidad aromática posible.\r\nNotas de Cata: Color rojo rubí intenso. Fresco, elegante y expresivo. Aromas a frutos salvajes, suelo húmedo y hongos. Un vino jugoso con taninos elegantes y un perfil mineral. Sabores de una suave jalea de frutillas.', NULL, '0', 860.00, 'Producto/FBKnEnzOVCmL1sAcGxJ3B22LmT2lk0mhS3aSoI7V.jpeg', '2020-07-08 17:40:59', '2020-07-08 20:40:59', 'SI'),
(33, 7, 'Vástago de Gea Espumante Extra Brut', 5, 420.00, 'Bodega: Staphyle\r\nComposición: Extrabut\r\nAñada: 2019\r\n\r\nViñedos: Se ubican en la zona de Ugarteche y Agrelo, Luján de Cuyo, conocida como la primer zona vitivinícola de Argentina,\r\n\r\nElaboración: En nuestra bodega tiene inicio desde el viñedo, que es controlado desde la poda y continúa con cada momento vegetativo de la planta, cuando la madurez fisiológica es óptima se inicia la recolección, utilizando tijeras para tal fin.\r\nEl transporte se realiza en bandejas de 18 kilos de capacidad.\r\nAl llegar a bodega se practica una minuciosa selección de los racimos, antes de la molienda.\r\nLa fermentación se produce en vasijas de pequeña capacidad que simplifica y favorece el control de temperatura (no supera los 26 °C). \r\nNuestro laboratorio está equipado para hacer las determinaciones que exigen el proceso de elaboración, estabilización y conservación de nuestros productos. Finalmente son estacionados en madera de roble francés y americano.\r\n\r\nNotas de Cata: Espumante de color amarillo – verdoso, con perlé persistente. En su aroma se resaltan las características cítricas, florales y tropicales. Envolvente y seductor al paladar.', 0, '0', 420.00, 'Producto/TlaEZPeyi3FV0GOGacTwug4ws6ZA4jMtgP4XOSmW.jpeg', '2020-07-08 17:40:26', '2020-07-08 20:40:26', 'SI');

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
  `seccion` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `created_at`, `updated_at`) VALUES
(1, 'Tintos', '2020-07-01 21:14:28', '2020-07-01 21:14:28'),
(2, 'Blancos', '2020-07-01 21:14:36', '2020-07-01 21:14:36'),
(3, 'Espumantes', '2020-07-01 21:14:44', '2020-07-01 21:14:44'),
(4, 'Oliva', '2020-07-01 21:14:52', '2020-07-01 21:15:02');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `varietales`
--

INSERT INTO `varietales` (`id`, `seccion_id`, `varietal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Varietales', '2020-07-02 04:09:16', '2020-07-02 04:09:16'),
(2, 1, 'Blends', '2020-07-02 04:09:36', '2020-07-02 04:09:36'),
(3, 1, 'Naturales', '2020-07-02 04:09:55', '2020-07-02 04:09:55'),
(4, 2, 'Varietales', '2020-07-02 04:10:37', '2020-07-02 04:10:37'),
(5, 2, 'Blends', '2020-07-02 04:10:50', '2020-07-02 04:10:50'),
(6, 2, 'Naturales', '2020-07-02 04:11:00', '2020-07-02 04:11:00'),
(7, 3, 'Espumantes', '2020-07-07 01:30:49', '2020-07-07 01:30:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_imagenes_de_producto_1` (`producto_id`);

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productos_1` (`varietal_id`);

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
-- AUTO_INCREMENT de la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `varietales`
--
ALTER TABLE `varietales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_de_producto`
--
ALTER TABLE `imagenes_de_producto`
  ADD CONSTRAINT `FK_imagenes_de_producto_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_productos_1` FOREIGN KEY (`varietal_id`) REFERENCES `varietales` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
