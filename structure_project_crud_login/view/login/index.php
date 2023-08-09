<?php
include('../../config/config.php');

$sql = "CALL sp_select_all_products()";

if (!$result = $connect->query($sql)) {
  echo "Falló la multiconsulta: (" . $connect->errno . ") " . $connect->error;
} else {
  $resultQuery = $result->fetch_all(MYSQLI_NUM);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../assets/img/icons/logo.png">
  <link href="../../assets/css/style.css" rel="stylesheet" />

  <title>SISTEMA DE VENTAS EN LÍNEA </title>
  <!--Include css php-->
  <?php
  include('../assets/css/css.php');
  ?>
</head>

<body>
<div class="top-bar container d-flex justify-content-between align-items-center">
  <div>
<a href="index.php" class="logo">
      <img src="../../assets\img\icons\logo_temporal.png" alt="Bootstrap" width="90" height="72">
    </a>
</div>  
      <nav class="navbar">
        <ul>
          <li><a href="../client/index.php">Inicio</a></li>
          <li><a href="../client/create.php">Registrarse</a></li>
          <li><a href="../login/index.php">Login</a></li>
          <li><a href="../client/products.php">todos los productos</a></li>
        </ul>
      </nav>
      <div id="carrito">
    <img src="/structure_project_crud_login/assets/img/images/car.svg" alt="car" id="img-carrito">
    <div id="lista-carrito">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <a href="#" id="vaciar-carrito" class="btn-3">Vaciar Carrito</a>
    </div>

  </form>
</div>
</div>
    </div>

    <div class="header-content container">

    </div>
  </header>

  <div class="container">
    <form action="../../controller/login/login.php" method="POST" >
      <div class="form-group">
        <label for="User_user">Email Users</label>
        <input type="email" class="form-control" id="User_user" name="User_user" aria-describedby="emailHelp"
          placeholder="Enter user" required>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
      </div>
      <div class="form-group">
        <label for="User_password">Password</label>
        <input type="password" class="form-control" id="User_password" name="User_password" placeholder="Password" required >
      </div>
      <div class="form-group m-2">
        
      <button type="submit" class="btn btn-primary w-100">INICIAR SESIÓN</button>
      </div>
 
    </form>
  </div>
  <!--End Container-->
  <!--Container footer-->
  <div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
    <a href="#">www.miempresa.com</a>
  </div>
  <!--End Container footer-->
  <!--Include js php-->
  <?php
  include('../assets/js/js.php');
  ?>
</body>

</html>