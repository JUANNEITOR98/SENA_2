<?php 
if ($authenticatedUser) {
    // Consulta la base de datos para obtener el User_id del usuario
    $userQuery = "SELECT User_id, role_id FROM user WHERE User_user = ?";
    $userStmt = $connect->prepare($userQuery);
    $userStmt->bind_param("s", $userEmail);
    $userStmt->execute();
    $userStmt->bind_result($userId, $roleId);
    $userStmt->fetch();

    $userStmt->free_result(); // Liberar los resultados de la consulta

    if ($userId) {
        // Establece las variables de sesión
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_email'] = $userEmail;
        $_SESSION['user_role'] = $roleId;

        // Redirige al usuario según su rol
        if ($roleId == 1) {
            header("Location: ../../view/administrador/dashboard.php");
        } elseif ($roleId == 2) {
            header("Location: ../../view/cliente/dashboard.php");
        } else {
            // En caso de un rol desconocido
            echo "Rol desconocido. Por favor, contacta al administrador.";
        }
    } else {
        echo "Error al obtener el ID de usuario.";
    }

    $userStmt->close(); // Cierra la consulta
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
<<<<<<< Updated upstream
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

=======
  <?php
if ($role == 'administrador') {
    // Encabezado para administradores
    include('../assets/header/administrador_header.php');
} elseif ($role == 'cliente') {
    // Encabezado para clientes
    include('../assets/header/cliente_header.php');
} else {
    // Encabezado para usuarios no logueados
    include('../assets/header/no_logueado.php');
}
?>
>>>>>>> Stashed changes
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
  <?php
  include('../assets/js/js.php');
  ?>
</body>

</html>