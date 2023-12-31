<?php
  include('../../config/config.php');
  session_start();
  $sql="CALL sp_select_all_products()";

  if (!$result =$connect->query($sql)) {
    echo "Falló la multiconsulta: (" . $connect->errno . ") " . $connect->error;
  }else{
    $resultQuery = $result->fetch_all(MYSQLI_NUM);
  }
  if(!isset($_SESSION["newsession"])){
    echo("Log in to the platform");
  }else{
    
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
  <?php
  include('../assets/css/css.php');
?>
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
          <li><a href="../login/login.php">Login</a></li>
          <li><a href="../client/index.php">Regresar</a></li>
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
  <div class="container">
    <div class="container text-center">
      <div class="row m-5">

      <?php
        for($i=0;$i<count($resultQuery);$i++){
        
          
          $productView='<div class="col">
          <div class="card" style="width: 18rem;">
            <img src="'.$resultQuery[$i][5].'" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$resultQuery[$i][1].'</h5>
              <p class="card-text text-left" style="text-align: left;">'.$resultQuery[$i][2].'</p>
              <p class="card-text text-left" style="text-align: left;">'.$resultQuery[$i][3].'</p>
              <p class="card-text text-left" style="text-align: left;"><strong> $'.$resultQuery[$i][4].'</strong></p>
              <a href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
              </svg></a>
            </div>
          </div>
        </div>';
        echo( $productView);

        }
      ?>
       
       
      </div>
    </div>
  </div>
    <div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
          <a href="#">www.miempresa.com</a>
    </div>
  <?php
    include('../assets/js/js.php');
  ?>
</body>

</html>