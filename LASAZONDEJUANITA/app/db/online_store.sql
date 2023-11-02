-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 17:01:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `online_store`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarProductos` (IN `busqueda` VARCHAR(255))   BEGIN
    SELECT Id, Name AS titulo, Description AS description, Images AS url, '' AS otra_columna
    FROM products
    WHERE Name LIKE CONCAT('%', busqueda, '%') OR
          category LIKE CONCAT('%', busqueda, '%') OR
          Images LIKE CONCAT('%', busqueda, '%')
    UNION
    SELECT id, titulo, description, url, ''
    FROM img
    WHERE titulo LIKE CONCAT('%', busqueda, '%') OR
          description LIKE CONCAT('%', busqueda, '%') OR
          url LIKE CONCAT('%', busqueda, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_nombre` VARCHAR(100), IN `p_username` VARCHAR(100), IN `p_pass` VARCHAR(100), IN `p_email` VARCHAR(100), IN `p_numberofdocument` VARCHAR(20), IN `p_numbercellphone` VARCHAR(20), IN `p_typeofdocument` VARCHAR(10), IN `p_gender` VARCHAR(10))   BEGIN
    INSERT INTO usuarios (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender)
    VALUES (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_client` ()   BEGIN
SELECT  Client_id,Client_name,Client_identification,Client_email,Client_phone,Client_address,DT.DocumentType_id,ST.Status_id,ST.Status_name, DT.DocumentType_name FROM client CLI
INNER JOIN status ST ON CLI.Status_id=ST.Status_id
INNER JOIN document_type DT ON CLI.DocumentType_id=DT.DocumentType_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products` ()   BEGIN
    SELECT
        P.id AS Product_id,
        P.name AS Product_name,
        P.description AS Product_description,
        P.images AS Product_images,
        P.description_detailed AS Product_description_detailed,
        P.category AS Product_category,
        P.due_date AS Product_due_date
    FROM products P;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products_like` (IN `nameProdcut` VARCHAR(40))   BEGIN
SELECT product_id,product_name,product_descriptions,product_code,product_value,product_img,ST.status_name,TPRO.typeProduct_name 
FROM product PRO 
INNER JOIN status ST ON PRO.status_id=ST.status_id
INNER JOIN typeproduct TPRO ON PRO.typeProduct_id=TPRO.typeProduct_id
WHERE product_name LIKE CONCAT('%', nameProdcut , '%') AND ST.status_id=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_product` (IN `p_product_id` INT, IN `p_name` VARCHAR(100), IN `p_description` TEXT, IN `p_images` VARCHAR(100), IN `p_description_detailed` TEXT, IN `p_category` INT, IN `p_due_date` DATE)   BEGIN
    UPDATE `products`
    SET
        `Name` = p_name,
        `Description` = p_description,
        `Images` = p_images,
        `description_detailed` = p_description_detailed,
        `category` = p_category,
        `due_date` = p_due_date
    WHERE
        `Id` = p_product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userModules` (IN `idUser` INT(11))   BEGIN
    SELECT MO.nameModule, MO.route FROM rol_modules RM 
INNER JOIN module MO ON RM.idModule=MO.idModule
WHERE RM.idRol=(SELECT idRol FROM usuarios WHERE p_Id=idUser);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_type`
--

CREATE TABLE `document_type` (
  `DocumentType_id` int(11) NOT NULL,
  `DocumentType_name` varchar(60) NOT NULL,
  `DocumentType_descriptions` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `document_type`
--

INSERT INTO `document_type` (`DocumentType_id`, `DocumentType_name`, `DocumentType_descriptions`) VALUES
(1, 'CC', 'Cedula'),
(2, 'TI', 'Tarjeta de Identidad '),
(4, 'CE', 'CÉDULA DE EXTRANJERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gendertype`
--

CREATE TABLE `gendertype` (
  `GenderType_id` int(11) NOT NULL,
  `GenderType_name` varchar(60) NOT NULL,
  `GenderType_descriptions` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gendertype`
--

INSERT INTO `gendertype` (`GenderType_id`, `GenderType_name`, `GenderType_descriptions`) VALUES
(1, 'M', 'Masculino'),
(2, 'F', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `id` int(30) NOT NULL,
  `url` varchar(300) NOT NULL,
  `description` text DEFAULT NULL,
  `titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id`, `url`, `description`, `titulo`) VALUES
(1, 'https://i.ytimg.com/vi/iKe3Pv-zcD8/hq720.jpg?sqp=-oaymwEXCK4FEIIDSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLDvuzRLyFeumZSt0jTv4zUdPqlpww', 'Juguete de Disney Junior', 'Herramientas Many a la obra'),
(2, 'https://www.ilapak.co.uk/var/site/storage/images/_aliases/gallery_img/1/8/6/3/3681-1-eng-GB/Ilapak_frozen_pizza.jpg', 'Pizza Familiar', 'Pizza con diversos ingredientes '),
(3, 'https://i.pinimg.com/originals/13/2d/f0/132df05c09ac8b2482487f4782f16b83.jpg', 'Helado de distintos sabores', 'Producto'),
(4, 'https://img.freepik.com/fotos-premium/imagenes-hd-fondo-hamburguesa_773230-288.jpg?w=2000', 'Hamburguesa especial con diversos ingredientes de la casa', 'Comida'),
(5, 'https://img.freepik.com/foto-gratis/vista-superior-sabrosa-ensalada-frutas-diferentes-frutas-sobre-fondo-blanco_140725-142053.jpg', 'Comida', 'Lleva distintas frutas tipicas de cada region de Colombia'),
(6, 'https://images.unsplash.com/photo-1603569283847-aa295f0d016a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJ1aXQlMjBqdWljZXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80', 'Estas bebidas son hechas artesanalmente', 'Comida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `Id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Images` varchar(100) NOT NULL,
  `description_detailed` text NOT NULL,
  `category` int(11) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`Id`, `Name`, `Description`, `Images`, `description_detailed`, `category`, `due_date`) VALUES
(1, 'Hamburguesa', 'Una hamburguesa extra especial mas grande de lo habitual', 'https://www.portafolio.co/files/article_new_multimedia/uploads/2022/04/12/6255e2e41db6c.jpeg', 'Una hamburguesa extra especial mas grande de lo habitual', 1, '2023-11-01'),
(2, 'Salchipapa', 'Un salchipapas clasico para disfrutas', 'https://www.comedera.com/wp-content/uploads/2021/07/salchipapas.jpg', 'Un salchipapas clasico para disfrutas', 1, '0000-00-00'),
(3, 'Pizza', 'Una pizza perfecta para una persona', 'https://2trendies.com/hero/2023/04/pizzapepperoni.jpg?width=1200', 'Una pizza perfecta para una persona', 1, '0000-00-00'),
(4, 'Perro Caliente', 'Un perro caliente rico y listo para comer', 'https://images-gmi-pmc.edge-generalmills.com/f5a517df-12c8-4d55-aa70-c882d99122e0.jpg', 'Un perro caliente rico y listo para comer', 1, '2023-08-31'),
(5, 'Coca-Cola', 'Una Coca-Cola fria lista para un dia de calor', 'https://i0.wp.com/tucochinito.com/wp-content/uploads/2019/07/Coca-de-vidrio.jpg', 'Una Coca-Cola fria lista para un dia de calor', 1, '2023-08-31'),
(6, 'Lasagña', 'la lasagña mas rica de todas', 'https://cdn.colombia.com/gastronomia/2011/08/25/lasagna-3685.jpg', 'la lasagña mas rica de todas', 1, '0000-00-00'),
(7, 'Sandwich', 'Un sandwich riquisimo para cualquier momento', 'https://www.comedera.com/wp-content/uploads/2023/03/sandwich-submarino-shutterstock_2160373737.jpg', 'Un sandwich riquisimo para cualquier momento', 1, '0000-00-00'),
(8, 'Un pollo asado', 'Un pollo asado para toda la familia ', 'https://s3.abcstatics.com/media/gurmesevilla/2010/03/pollo-asado-citricos-1920.jpg', 'Un pollo asado para toda la familia ', 1, '0000-00-00'),
(9, 'Combo Especial', 'Un combo riquisimo para 4-6 personas', 'https://caliescribe.com/sites/default/files/comida-chatarra.jpg', 'Un combo riquisimo para 4-6 ', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(30) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `idUser` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Name`, `Description`, `idUser`) VALUES
(1, 'cliente', 'Es un cliente', 0),
(2, 'admin', 'Es un admin', 0),
(3, 'vendedor', 'Es un vendedor', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(10) NOT NULL,
  `status_descriptions` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_descriptions`) VALUES
(1, 'Active', 'This is Active'),
(2, ' Block', 'This is Block');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeproduct`
--

CREATE TABLE `typeproduct` (
  `typeProduct_id` int(11) NOT NULL,
  `typeProduct_name` varchar(20) NOT NULL,
  `typeProduct_descriptions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `typeproduct`
--

INSERT INTO `typeproduct` (`typeProduct_id`, `typeProduct_name`, `typeProduct_descriptions`) VALUES
(1, 'Electrodomesticos', 'Tecnología '),
(2, 'Mercado', 'Mercado'),
(3, 'Juguetes', 'Juguetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `p_Id` int(50) NOT NULL,
  `p_nombre` varchar(100) NOT NULL,
  `p_username` varchar(100) NOT NULL,
  `p_pass` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_numberofdocument` int(50) NOT NULL,
  `p_numbercellphone` int(20) NOT NULL,
  `p_typeofdocument` int(11) NOT NULL,
  `p_gender` int(11) DEFAULT NULL,
  `rol` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`p_Id`, `p_nombre`, `p_username`, `p_pass`, `p_email`, `p_numberofdocument`, `p_numbercellphone`, `p_typeofdocument`, `p_gender`, `rol`) VALUES
(1, 'admin', 'admin', '$2y$10$Y8hAzAPio03MZVehlyrYH.oKCVDf0WqB4gh0oP8FjZ3Ms6HTcON.G', 'admin@gmail.com', 123456789, 123456789, 1, 1, 2),
(2, 'cliente', 'cliente', '$2y$10$FRd6rYhzc2R5WiqMr5Lx5.IkpNxfLZ3idxvYn5xqglD2rlHEI9HV2', 'cliente@gmail.com', 123456789, 123456789, 1, 1, 1),
(3, 'Juan', 'JUANNEITOR98', '$2y$10$o6.0JYpS9e9KbvcdYTuOpeDNmV4vuT2n7nbu7waTFX6REy4pimLf.', 'garciaacevedojuandavid@gmail.com', 1023372763, 2147483647, 2, 1, 2),
(4, 'Uriel', 'Uriel123', '$2y$10$kacJuagUtdFwsUUS74CaWuZGzf.J7vFO1CQvdcElRxzqP09AF2KTG', 'Uriel@gmail.com', 924613432, 3143454, 1, 1, 1),
(5, 'Rocio0903', 'Rocio0903', '$2y$10$EUloqzv2OVFhwFFaRI5lYetp2se9XBhlwSknk5zeD7m165XRxAP7q', 'Rocio@gmail.com', 9865534, 2147483647, 1, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`DocumentType_id`);

--
-- Indices de la tabla `gendertype`
--
ALTER TABLE `gendertype`
  ADD PRIMARY KEY (`GenderType_id`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sta` (`category`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `document_type`
--
ALTER TABLE `document_type`
  MODIFY `DocumentType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gendertype`
--
ALTER TABLE `gendertype`
  MODIFY `GenderType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
