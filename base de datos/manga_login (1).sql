-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2026 a las 00:55:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manga_login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_manga`
--

CREATE TABLE `lista_manga` (
  `id` int(11) NOT NULL,
  `name_manga` varchar(100) NOT NULL,
  `estado` enum('pendiente','leyendo','completado') DEFAULT 'pendiente',
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `genero` enum('yaoi + 18','accion','romance','aventura','fantasia','comedia','drama','terror') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_manga`
--

INSERT INTO `lista_manga` (`id`, `name_manga`, `estado`, `descripcion`, `imagen`, `genero`) VALUES
(1, 'Horimiya', 'leyendo', 'Hori parece perfecta en la escuela, pero en casa cuida a su hermano. Miyamura parece raro, pero es amable y tiene un lado oculto. Al conocerse fuera del colegio, se vuelven amigos y comparten sus verdaderas personalidades.', '/Proyecto_Manga/portadas/img.Romance/p_horimiya.jpg', 'romance'),
(6, 'Watashi no Shiawase na Kekkon', 'leyendo', 'Miyo Saimori, hija de un matrimonio sin amor y despreciada por su familia, creía que su futuro sería miserable. Sin embargo, al casarse con Kiyoka Kudou, un capitán militar con fama cruel, descubre que él es bondadoso, y finalmente encuentra un matrimonio lleno de felicidad.', '/Proyecto_Manga/portadas/img.Romance/p_myh.jpg', 'romance'),
(9, 'Cómo proteger al hermano mayor de la heroína', 'pendiente', 'Roxanna reencarna en una novela adulta dentro de la familia Agriche, conocida por su belleza, riqueza y métodos criminales como drogas, veneno y asesinato. Mientras lucha por adaptarse a las expectativas de convertirse en una heredera, intenta conservar su humanidad en medio de un entorno despiadado.', '/Proyecto_Manga/portadas/img.Romance/p_roxana.jpg', 'romance'),
(10, 'Kusuriya no Hitorigoto', 'leyendo', 'Maomao llevaba una vida tranquila ayudando a su padre, un boticario. Todo cambia el día que la venden como sirvienta al palacio del emperador, pero la vida entre nobles y realeza no es para ella. Cuando la familia imperial enferma, ella decide intervenir para encontrar una cura, lo que llama la atención de Jinshi, un guapo oficial de palacio que decide ascenderla como dama de compañía de una de las concubinas del emperador. ¡Su habilidad con la medicina la hará conocida en el palacio por ayudar a resolver muchos misterios!', '/Proyecto_Manga/portadas/img.Romance/p_diaries.jpg', 'romance'),
(20, 'Naruto', 'leyendo', 'Naruto Uzumaki, un joven ninja, busca reconocimiento y sueña con convertirse en Hokage.', '/Proyecto_Manga/portadas/img.Aventura/p_naruto.jpg', 'accion'),
(22, 'Bajo la luz verde', 'leyendo', 'Cuando dos jóvenes se cruzan bajo una misteriosa luz verde, sus mundos cambian para siempre. Entre pasión, secretos y deseo prohibido, descubrirán hasta dónde están dispuestos a llegar por amor.', '/Proyecto_Manga/portadas/img.manga/P_bajoLaLuzVerde.jpg', 'yaoi + 18'),
(26, 'Kaiju No. 8', 'leyendo', 'Kafka y su transformación en kaiju para salvar a la humanidad de monstruos gigantes.', '/Proyecto_Manga/portadas/img.Ciencia%20ficción/p_kaijuNo.8.jpg', 'fantasia'),
(27, 'Smyrna y carpi', 'leyendo', 'Dos corazones rotos buscan consuelo en la ciudad iluminada por la noche. Entre encuentros furtivos y momentos apasionados, aprenderán que a veces, el amor aparece en los lugares más inesperados.', '/Proyecto_Manga/portadas/img.manga/P_smyrnaYCarpi.jpg', 'yaoi + 18'),
(28, 'Marea Baja En Crepusculo', 'leyendo', 'Un encuentro inesperado en la playa al atardecer despierta emociones dormidas. Entre la brisa marina y la luz del crepúsculo, se desarrolla un romance intenso y delicado, lleno de descubrimientos.', '/Proyecto_Manga/portadas/img.manga/P_mareaBajaEnPrescupulo.jpg', 'yaoi + 18'),
(30, 'Rosas y champan', 'leyendo', 'Lujo, romance y secretos se mezclan en un juego de seducción y poder. Dos hombres de mundos diferentes se encuentran, desencadenando una historia de deseo que ninguno podrá olvidar.', '/Proyecto_Manga/portadas/img.manga/P_rosasYChampan.jpg', 'yaoi + 18'),
(31, 'limite', 'leyendo', 'Cuando los sentimientos sobrepasan cualquier límite, dos almas chocan en una historia intensa de pasión y emociones que desafían la razón. Cada encuentro los acerca a un desenlace inesperado.', '/Proyecto_Manga/portadas/img.manga/P_limite.jpg', 'yaoi + 18'),
(32, 'La novia del dragon', 'leyendo', 'Un joven conoce a un misterioso dragón disfrazado de humano. Entre aventuras, magia y sentimientos imposibles, ambos aprenderán que el amor verdadero no conoce fronteras ni reglas.', '/Proyecto_Manga/portadas/img.manga/P_laNoviaDeIgnat.jpg', 'yaoi + 18'),
(33, 'La granja del señorA', 'leyendo', 'En una granja aislada, donde todo parece tranquilo, la pasión y los secretos emergen sin previo aviso. Historias de deseo, tensión y descubrimiento personal se entrelazan en cada rincón.', '/Proyecto_Manga/portadas/img.manga/P_laGranjaDelSeñorA.png', 'yaoi + 18'),
(34, 'Define la relación', 'leyendo', 'Una relación complicada que desafía la confianza y los sentimientos más profundos. Entre encuentros inesperados y emociones intensas, los protagonistas luchan por entender qué significa realmente estar juntos.', '/Proyecto_Manga/portadas/img.manga/P_defineLaRelacón.jpg', 'yaoi + 18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mangas`
--

CREATE TABLE `mangas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `estado_emision` enum('emitiéndose','finalizado') DEFAULT 'emitiéndose',
  `portada` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado_lectura` enum('pendiente','leyendo','completado') DEFAULT 'pendiente',
  `puntuacion` decimal(3,1) DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mangas`
--

INSERT INTO `mangas` (`id`, `nombre`, `genero`, `estado_emision`, `portada`, `descripcion`, `estado_lectura`, `puntuacion`) VALUES
(1, 'Horimiya', 'romance', 'finalizado', '/Proyecto_Manga/portadas/img.Romance/p_horimiya.jpg', 'Historia dulce y divertida sobre la vida diaria y el amor de Miyamura y Hori.', 'leyendo', 8.3),
(3, 'My Happy Marriage', 'romance', 'finalizado', '/Proyecto_Manga/portadas/img.Romance/p_myh.jpg', 'Historia de romance y superación personal en un matrimonio arreglado.', 'pendiente', 8.7),
(4, 'Cómo proteger al hermano mayor de la heroína', 'romance', 'emitiéndose', '/Proyecto_Manga/portadas/img.Romance/p_roxana.jpg', 'Una joven noble enfrenta desafíos y romance en un mundo de intrigas.', 'pendiente', 8.4),
(5, 'The Apothecary Diaries', 'romance', 'finalizado', '/Proyecto_Manga/portadas/img.Romance/p_diaries.jpg', 'La historia de Maomao, una joven farmacéutica, y sus aventuras en la corte imperial.', 'pendiente', 8.9),
(9, 'Dragon Ball', 'fantasia', 'finalizado', '/Proyecto_Manga/portadas/img.Ciencia%20ficción/p_dragonBall.jpg', 'Goku y sus amigos buscan las míticas Dragon Balls mientras enfrentan poderosos enemigos.', 'pendiente', 9.1),
(10, 'Kaiju No. 8', 'fantasia', 'emitiéndose', '/Proyecto_Manga/portadas/img.Ciencia%20ficción/p_kaijuNo.8.jpg', 'Kafka y su transformación en kaiju para salvar a la humanidad de monstruos gigantes.', 'pendiente', 8.8),
(11, 'My Hero Academia', 'accion', 'finalizado', '/Proyecto_Manga/portadas/img.Aventura/p_myHeroAcademia.jpg', 'Izuku Midoriya sueña con convertirse en un héroe en un mundo donde casi todos tienen superpoderes.', 'pendiente', 9.0),
(12, 'Naruto', 'accion', 'emitiéndose', '/Proyecto_Manga/portadas/img.Aventura/p_naruto.jpg', 'Naruto Uzumaki, un joven ninja, busca reconocimiento y sueña con convertirse en Hokage.', 'pendiente', 9.2),
(13, 'Bajo la luz verde', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_bajoLaLuzVerde.jpg', 'Cuando dos jóvenes se cruzan bajo una misteriosa luz verde, sus mundos cambian para siempre. Entre pasión, secretos y deseo prohibido, descubrirán hasta dónde están dispuestos a llegar por amor.', 'pendiente', 9.9),
(14, 'Define la relación', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_defineLaRelacón.jpg', 'Una relación complicada que desafía la confianza y los sentimientos más profundos. Entre encuentros inesperados y emociones intensas, los protagonistas luchan por entender qué significa realmente estar juntos.', 'pendiente', 9.0),
(15, 'La granja del señorA', 'yaoi + 18', 'emitiéndose', '/Proyecto_Manga/portadas/img.manga/P_laGranjaDelSeñorA.png', 'En una granja aislada, donde todo parece tranquilo, la pasión y los secretos emergen sin previo aviso. Historias de deseo, tensión y descubrimiento personal se entrelazan en cada rincón.', 'pendiente', 8.7),
(16, 'La novia del dragon', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_laNoviaDeIgnat.jpg', 'Un joven conoce a un misterioso dragón disfrazado de humano. Entre aventuras, magia y sentimientos imposibles, ambos aprenderán que el amor verdadero no conoce fronteras ni reglas.', 'pendiente', 8.9),
(17, 'limite', 'yaoi + 18', 'emitiéndose', '/Proyecto_Manga/portadas/img.manga/P_limite.jpg', 'Cuando los sentimientos sobrepasan cualquier límite, dos almas chocan en una historia intensa de pasión y emociones que desafían la razón. Cada encuentro los acerca a un desenlace inesperado.', 'pendiente', 8.5),
(18, 'Rosas y champan', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_rosasYChampan.jpg', 'Lujo, romance y secretos se mezclan en un juego de seducción y poder. Dos hombres de mundos diferentes se encuentran, desencadenando una historia de deseo que ninguno podrá olvidar.', 'pendiente', 9.2),
(19, 'Marea Baja En Crepusculo', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_mareaBajaEnPrescupulo.jpg', 'Un encuentro inesperado en la playa al atardecer despierta emociones dormidas. Entre la brisa marina y la luz del crepúsculo, se desarrolla un romance intenso y delicado, lleno de descubrimientos.', 'pendiente', 8.8),
(20, 'Smyrna y carpi', 'yaoi + 18', 'finalizado', '/Proyecto_Manga/portadas/img.manga/P_smyrnaYCarpi.jpg', 'Dos corazones rotos buscan consuelo en la ciudad iluminada por la noche. Entre encuentros furtivos y momentos apasionados, aprenderán que a veces, el amor aparece en los lugares más inesperados.', 'pendiente', 8.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rol` enum('admin','normal') DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `token`, `rol`) VALUES
(3, 'eva', 'evaestudia255@gmail.com', '$2y$10$4YkM0av1x105qiZdm41gXeyu9v7hkG3s4FKHpz98ej2QiwFr55mnu', '6cd15f21eebae42aae95a4f323d0efc2', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_manga`
--
ALTER TABLE `lista_manga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_manga` (`name_manga`);

--
-- Indices de la tabla `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_manga`
--
ALTER TABLE `lista_manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `mangas`
--
ALTER TABLE `mangas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
