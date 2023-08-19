<?php
include("../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['Client_name'];
    $clientIdentification = $_POST['Client_identification'];
    $clientEmail = $_POST['Client_email'];
    $clientPhone = $_POST['Client_phone'];
    $clientAddress = $_POST['Client_address'];

    $stmt = $connect->prepare("CALL InsertOrUpdateClient(?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss",
        $clientName,
        $clientIdentification,
        $clientEmail,
        $clientPhone,
        $clientAddress
    );

    try {
        $stmt->execute();
        echo "New record created successfully";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $connect->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Name of My Form One</title>
  <link href="../../assets/css/formStyle.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="top-bar container d-flex justify-content-between align-items-center">
  <div>
<a href="index.php" class="logo">
      <img src="../../assets\img\icons\logo_temporal.png" alt="Bootstrap" width="90" height="72">
    </a>
</div>  
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="create.php">Registrarse</a></li>
          <li><a href="../login/index.php">Login</a></li>
          <li><a href="products.php">todos los productos</a></li>
        </ul>
      </nav>
      <div id="carrito">
    <img src="/structure_project_crud_login/assets/img/images/car.svg" alt="car" id="img-carrito">
    <h6 id="numProduct" >0</h6>
    <div id="lista-carrito">
        <table>
            <tbody></tbody>
        </table>
        <a href="buy.php" id="Comprar" class="btn-3">Comprar objetos</a>
    </div>

  </form>
</div>
</div>
    <h2>Confirmar tus datos</h2>
    <form action="insert_client_with_defaults.php" method="POST">
        <label for="Client_name">Inserta tu nombre y apellido:</label>
        <input type="text" name="Client_name" required><br>

        <label for="Client_identification">Inserta tu identificacion:</label>
        <input type="text" name="Client_identification" required><br>

        <label for="Client_email">Inserta tu correo electronico:</label>
        <input type="email" name="Client_email" required><br>

        <label for="Client_phone">Inserta tu numero telefonico:</label>
        <input type="text" name="Client_phone" required><br>

        <label for="Client_address">Inserta tu domicilio:</label>
        <input type="text" name="Client_address" required><br>

        <input type="submit" value="Confirmar Compra">
    </form>
    <br>
    <br>

    <div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
    <a href="index.php">www.Lasazondejuanita.com</a>

    
</body>
</html>
