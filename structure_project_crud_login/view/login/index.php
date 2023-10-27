<?php
session_start();
include('../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['User_user'];
    $userDocument = $_POST['User_document'];

    $stmt = $connect->prepare("CALL LoginUser(?, ?)");
    $stmt->bind_param("ss", $userEmail, $userDocument);

    if ($stmt->execute()) {
        $stmt->bind_result($authenticatedUser);
        $stmt->fetch();

        if ($authenticatedUser) {
            $_SESSION['user_email'] = $authenticatedUser;
            header("Location:  ../../assets/header/no_logueado");
        } else {
            echo "Credenciales inválidas. Por favor, intenta de nuevo.";
        }
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
}



function checkUserRole() {
    if (isset($_SESSION['user_id'])) {
        global $db;
        $user_id = $_SESSION['user_id'];
        $query = "SELECT role_id FROM user WHERE User_id = $user_id";
        $result = $db->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $role_id = $row['role_id'];

            if ($role_id == 1) {
                return 'administrador';
            } elseif ($role_id == 2) {
                return 'cliente';
            }
        }
    }
    return 'no_logueado';
}

$role = checkUserRole();

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
<div class="top-bar container d-flex justify-content-between align-items-center">
  <div>
<a href="index.php" class="logo">
      <img src="../../assets\img\icons\logo_oficial.png" alt="Bootstrap" width="90" height="72">
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
  <div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
    <a href="#">www.miempresa.com</a>
  </div>
  
  <?php if (!empty($loginMessage)) : ?>
        <div class="alert alert-success mt-3">
            <?php echo $loginMessage; ?>
        </div>
    <?php endif; ?>

  <?php include('../assets/js/js.php'); ?>
</body>

</html>