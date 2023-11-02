<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD View</title>
    <?php include('../assets/view/header.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<?php 
include('../assets/css/css.php'); 
include('../assets/js/js.php');?>
<style>
    body {
    display: flex;
    justify-content: center; /* Centra horizontalmente en la pantalla */
    margin: 0;
}

.center-table {
    border: 2px solid #ccc; /* Opcional: estilo del contenedor */
    padding: 20px;         /* Opcional: espaciado interno del contenedor */
}

table {
    width: 75%;
    border-collapse: collapse;
    margin-top: 0px;
    background-color: white;
    }

th,
td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    
}

th {
    background-color: #f2f2f2;
}
</style>
<body>
<?php include('../../controller/crud.php'); ?>

<br><br><br><br>
<table border="1" class="">
    <tr> 
        <th>Id</th>
        <th>Nombre</th> 
        <th>Acciones</th> 
       
       
    </tr>
    <?php


    $crud = new Crud($conn);
    $products = $crud->readProducts();

    foreach ($products as $product) {
        echo "<tr> 
        <td>{$product['Id']}</td>
            <td>{$product['Name']}</td>
            <td>
                <a href='../crud/edit/edit.product.php?action=edit&id={$product['Id']}'>
                    <button type='button' class='btn btn-outline-warning' >Editar</button>
                </a>
                
                
                <a href='../crud/delete/delete_product.php?action=delete&id={$product['Id']}'>
                    <button type='button' class='btn btn-outline-danger'>Eliminar</button>
                </a>

                <a href='../crud/read/read_product.php?action=view&id={$product['Id']}'>
                    <button type='button' class='btn btn-outline-info'>Ver</button>
                </a>

                <a href='../crud/add/add_product.php?action=view&id={$product['Id']}'>
                    <button type='button' class='btn btn-outline-success'>Agregar</button>
                </a>
            </td>
           
          </tr>";
    }
    ?>
</table>
</ul>
<!-- Formulario para actualizar un producto -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $productId = $_GET['id'];
    $productData = $crud->getProductById($productId);

    if ($productData) {
?>
        <h2>Editar Producto</h2>
        <form action="../../controller/crud.php" method="post">
            <input type="hidden" name="id" value="<?php echo $productId; ?>">
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?php echo $productData['Name']; ?>" required>
            <!-- Agrega más campos según tu tabla de productos -->

            <button type="submit">Actualizar Producto</button>
        </form>
<?php
    }
}
?>

<!-- Formulario para eliminar un producto -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $productId = $_GET['id'];
    $productData = $crud->getProductById($productId);

    if ($productData) {
?>
        <h2>Eliminar Producto</h2>
        <form action="../../controller/crud.php" method="post">
            <input type="hidden" name="id_delete" value="<?php echo $productId; ?>">

            <p>¿Estás seguro de que deseas eliminar el producto "<?php echo $productData['Name']; ?>"?</p>

            <button type="submit"><a href="../crud/read/read_products.php">Eliminar Producto</a></button>
        </form>
<?php
    }
}
?>

<!-- Mostrar detalles de un producto -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $productId = $_GET['id'];
    $productData = $crud->getProductById($productId);

    if ($productData) {
?>
        <h2>Detalles del Producto</h2>
        <p>Nombre: <?php echo $productData['Name']; ?></p>
        <p>Descripción: <?php echo $productData['Description']; ?></p>
        <!-- Agrega más detalles según tu tabla de productos -->
<?php
    }
}
?>

<!-- Revisar un producto -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'review') {
    $productId = $_GET['id'];
    $productData = $crud->getProductById($productId);

    if ($productData) {
?>
        <h2>Revisar Producto</h2>
        <p>Nombre: <?php echo $productData['Name']; ?></p>
        <p>Descripción: <?php echo $productData['Description']; ?></p>
        <!-- Agrega más detalles según tu tabla de productos -->
<?php
    }
}
?>
</body>
</html>
