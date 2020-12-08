-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2020 a las 19:50:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vsr_parts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_img` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_img`, `id_productos`, `nombre`) VALUES
(1, 3, 'palanca_a'),
(2, 3, 'palanca_b'),
(3, 3, 'palanca_c'),
(4, 3, 'palanca_e'),
(7, 1, 'pomos_a'),
(8, 1, 'pomos_b'),
(9, 1, 'pomos_c'),
(10, 1, 'pomos_d'),
(11, 1, 'pomos_e'),
(13, 5, 'barra_copelas_b'),
(14, 5, 'barra_copelas_a'),
(15, 5, 'barra_copelas_c'),
(16, 5, 'barra_copelas_e'),
(17, 6, 'tapon_purgador_a'),
(18, 6, 'tapon_purgador_b'),
(19, 6, 'tapon_purgador_c'),
(20, 7, 'bmw_pres_gas_a'),
(21, 7, 'bmw_pres_gas_b'),
(22, 7, 'bmw_pres_gas_c'),
(23, 7, 'bmw_pres_gas_d'),
(24, 8, 'puen_e30_reg_a'),
(25, 8, 'puen_e30_reg_b'),
(26, 9, 'ref_copela_a'),
(27, 9, 'ref_copela_b'),
(28, 9, 'ref_copela_c'),
(29, 10, 'cubr_anti_e46_a'),
(30, 10, 'cubr_anti_e46_b'),
(31, 10, 'cubr_anti_e46_c'),
(32, 10, 'cubr_anti_e46_d'),
(34, 10, 'cubr_anti_e46_e'),
(36, 11, 'barra_copelas_b'),
(37, 11, 'barra_copelas_c'),
(39, 11, 'barra_copelas_f'),
(40, 11, 'barra_copelas_g'),
(41, 11, 'barra_copelas_h'),
(42, 12, 'barra_copelas_a'),
(43, 12, 'barra_copelas_b'),
(44, 12, 'barra_copelas_c'),
(45, 12, 'barra_copelas_f'),
(46, 12, 'barra_copelas_y'),
(47, 13, 'tensores_reg_a'),
(48, 13, 'tensores_reg_b'),
(49, 13, 'tensores_reg_c'),
(50, 14, 'reg_gasoli_a'),
(51, 14, 'reg_gasoli_b'),
(52, 14, 'reg_gasoli_c'),
(53, 14, 'reg_gasoli_d'),
(54, 15, 'copela_reg_a'),
(55, 15, 'copela_reg_b'),
(56, 15, 'copela_reg_c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio_producto` int(255) NOT NULL,
  `descripcion_producto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `marca_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `modelo_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `principal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre_producto`, `precio_producto`, `descripcion_producto`, `marca_producto`, `modelo_producto`, `foto_producto`, `principal`) VALUES
(1, 'pomo', 20, 'Pomo de la marca rally art sirve para cualquier tipo de coche, trae 3 adaptadores diferentes para diferentes varillas de cambios de marcha de coche.', 'todos', 'todos', 'pomos_a', NULL),
(3, 'cambio Short Shift', 169, 'Palanca de cambios corta universal para automóviles BMW. Su tarea es reducir significativamente el tiempo para cambiar de marcha y hacerlo más preciso. El efecto de este tratamiento es una sensación de mayor integración con el automóvil y, por lo tanto, control sobre su comportamiento.  Además, su construcción le permite ocultarse debajo del fuelle original. El material es aluminio. Todo el anodizado pintado de negro. Altura desde la base 30 centímetros. Coste del envío 10 euros', 'BMW', 'todos', 'palanca_a', 1),
(5, 'Barras de Torretas', 120, 'El kit incluye barra delantera y trasera. Se ajustan a todas las versiones de motor serie de seis cilindros (excepto 325IX) y después del swap para todos los tipos de motores m50, m52, m54, s50, s54, m60, m62, etc. * También disponemos de barra delantera para 4cyl y 324d/td. El perfil del puntal principal es plano de 40 mm por 20 mm, y el grosor de la pared es de 3 mm * se adapta al e30 con el motor m30b30, m30b35 después de una ligera modificación que cada uno de ustedes puede hacer en su propio garaje.', 'BMW', 'e30 e36 e46', 'barra_copelas_a', 1),
(6, 'Tornillo purgar BMW', 5, 'Tornillo para sustituir el tornillo de serie de plástico que suele romperse y comerse del uso.', 'BMW', 'e36 e46 M50 M52 M54', 'tapon_purgador_a', 0),
(7, 'Regulador presión de gasolina ', 30, 'Color azul. Válido para la mayoría de motores BMW. Regulación de 3 a 5 bar.', 'BMW', 'todos', 'bmw_pres_gas_a', 0),
(8, 'Kit regulación trasera ', 85, 'Kit para bmw e21 e30 e36 compact y z3. Envío gratis.', 'BMW', 'e30', 'puen_e30_reg_a', 1),
(9, 'Refuerzo copelas delanteras', 40, 'Refuerzo para las copelas de BMW E36. Se utilizó acero (S355) de 3 mm de espesor para hacer los refuerzos. En la última etapa, los refuerzos fueron galvanizados, lo que evita que se oxiden. También disponibles más refuerzos de chasis tanto para E36 como para E46.', 'BMW', 'e36', 'ref_copela_a', 0),
(10, 'Tapas de antinieblas', 30, 'Tapas de antinieblas HAMMAN look para defensas M3 pack m y M3 look. Envio desde España.', 'BMW', 'e46', 'cubr_anti_e46_a', 1),
(11, 'Kit Barras de Torretas', 12, 'El kit incluye barra delantera y trasera. Para BMW E46 carrocería sedán, turismo, coupé y compacto (todos los motores excepto m43 y s54). El perfil del puntal principal es plano de 40 mm por 20 mm, y el grosor de la pared es de 3 mm Coste del envío 10 euros.', 'BMW', 'e46', 'barra_copelas_b', 0),
(12, 'BARRA DE TORRETAS DELANTERA', 70, 'Válido para: -BMW E46 carrocería sedán, turismo, coupé y compacto (todos los motores excepto m43 y s54). -BMW E30 todas las versiones de motor serie de seis cilindros (excepto 325IX) y después del swap para todos los tipos de motores m50, m52, m54, s50, s54, m60, m62, etc. Se adapta al e30 con el motor m30b30, m30b35 después de una ligera modificación que cada uno de ustedes puede hacer en su propio garaje. -BMW E36 todas las versiones de motor de seis cilindros, motores M50, M52, S50, S52 en carrocerías sedán, coupé y cabrio. Hecho de acero y de 3mm de grosor. Envío 14 euros a mayores.', 'BMW', 'e30 e36 e46', 'barra_copelas_a', 1),
(13, 'Brazos traseros regulables', 140, 'Brazos de control superiores ajustables traseros para BMW E36 / E46 / Z4. El producto se utiliza principalmente para cambiar la inclinación de la rueda trasera. Gracias a ello podemos ajustar nuestra suspensión a sus necesidades. Es útil tanto en diversas áreas del automovilismo como DRIFT, principalmente para obtener la máxima tracción del vehículo en el eje de conducción del automóvil, así como en proyectos de stance. Fabricado con uniballs de cromomolibdeno Son dos piezas Coste del envío 10 euros.', 'BMW', 'e36 e46', 'tensores_reg_a', 0),
(14, 'Regulador alta presión gasolina', 49, 'Universal. Incluye reloj de presión con un rango de 0 a 160 psi. Color azul. Incluye 3 adaptadores de diferentes medidas.', 'todos', 'todos', 'reg_gasoli_a', 0),
(15, 'Copelas delanteras regulables', 149, 'Diseñado para ajustar el ángulo de las ruedas delanteras. Gracias a ello podemos ajustar nuestra suspensión a sus necesidades. Es útil tanto en diversas áreas de automovilismo como DRIFT, KJS, etc', 'BMW', 'e36', 'copela_reg_a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL,
  `nom_user` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_user` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nick_user` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `passwd` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nom_user`, `apellido_user`, `nick_user`, `passwd`) VALUES
(1, 'jose', 'lopez', 'gunter443', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
