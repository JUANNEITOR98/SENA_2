DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarProductos`(IN `busqueda` VARCHAR(255))
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario`(IN `p_nombre` VARCHAR(100), IN `p_username` VARCHAR(100), IN `p_pass` VARCHAR(100), IN `p_email` VARCHAR(100), IN `p_numberofdocument` VARCHAR(20), IN `p_numbercellphone` VARCHAR(20), IN `p_typeofdocument` VARCHAR(10), IN `p_gender` VARCHAR(10))
BEGIN
    INSERT INTO usuarios (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender)
    VALUES (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_client`()
BEGIN
SELECT  Client_id,Client_name,Client_identification,Client_email,Client_phone,Client_address,DT.DocumentType_id,ST.Status_id,ST.Status_name, DT.DocumentType_name FROM client CLI
INNER JOIN status ST ON CLI.Status_id=ST.Status_id
INNER JOIN document_type DT ON CLI.DocumentType_id=DT.DocumentType_id;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products`()
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products_like`(IN `nameProdcut` VARCHAR(40))
BEGIN
SELECT product_id,product_name,product_descriptions,product_code,product_value,product_img,ST.status_name,TPRO.typeProduct_name 
FROM product PRO 
INNER JOIN status ST ON PRO.status_id=ST.status_id
INNER JOIN typeproduct TPRO ON PRO.typeProduct_id=TPRO.typeProduct_id
WHERE product_name LIKE CONCAT('%', nameProdcut , '%') AND ST.status_id=1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_product`(IN `p_product_id` INT, IN `p_name` VARCHAR(100), IN `p_description` TEXT, IN `p_images` VARCHAR(100), IN `p_description_detailed` TEXT, IN `p_category` INT, IN `p_due_date` DATE)
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userModules`(IN `idUser` INT(11))
BEGIN
    SELECT MO.nameModule, MO.route FROM rol_modules RM 
INNER JOIN module MO ON RM.idModule=MO.idModule
WHERE RM.idRol=(SELECT idRol FROM usuarios WHERE p_Id=idUser);
END$$
DELIMITER ;
