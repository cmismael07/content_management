-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2024 a las 00:52:01
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
-- Base de datos: `content_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `name`, `folder_id`, `path`, `last_modified`, `modified_by`) VALUES
(1, 'Captura de pantalla (1).png', 2, 'uploads/Captura de pantalla (1).png', '2024-07-12 19:45:22', 4),
(2, 'Captura de pantalla (2).png', 4, 'uploads/Captura de pantalla (2).png', '2024-07-12 19:50:47', 6),
(3, '20230912_145757.jpg', 2, 'uploads/20230912_145757.jpg', '2024-07-12 21:08:34', 4),
(4, '20230912_150441.jpg', 2, 'uploads/20230912_150441.jpg', '2024-07-12 21:08:41', 4),
(5, 'DSC_0013.JPG', 2, 'uploads/DSC_0013.JPG', '2024-07-12 21:08:45', 4),
(6, 'DSC_0014.JPG', 2, 'uploads/DSC_0014.JPG', '2024-07-12 21:08:49', 4),
(7, 'DSC_0017.JPG', 2, 'uploads/DSC_0017.JPG', '2024-07-12 21:08:53', 4),
(8, 'DSC_0019.JPG', 2, 'uploads/DSC_0019.JPG', '2024-07-12 21:08:56', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `last_modified`, `modified_by`) VALUES
(2, 'hola', 4, '2024-07-12 19:44:48', 4),
(3, 'lanueva', 5, '2024-07-12 19:47:31', 5),
(4, 'nue', 6, '2024-07-12 19:50:37', 6),
(5, 'carpeta1', 4, '2024-07-12 21:03:09', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','admin_cliente','usuario','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', '$2y$10$fVOQRPc1yJIMuw5DvCVLQe1Rl1b8CpnkrUfqpCWNNINxhkuYtkdm.', 'admin'),
(5, 'testuser', '$2y$10$kbCzbaa0PjUZqo1bloeGpeHHKRHGFSh2QTmwo.V6Fwt3Mt6iXALHy', 'cliente'),
(6, 'coca', '$2y$10$fo2PEyE9w7xJt2wn872TA.k1UQQEx8YcudHqMAJDFWUYHIn6Tjtsm', 'admin_cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indices de la tabla `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `folders_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
