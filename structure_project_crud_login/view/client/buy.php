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
    echo("");
  }else{
    
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../assets/css/style.css" rel="stylesheet" />
  <title>Name of My Form One</title>
  <?php
  include('../assets/css/css.php');
  ?>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
  </form>
</div>
</div>
    </div>

</section>

</head>

  <div class="container">
    <div id="sectionOne" class="sectionOne" name="sectionOne">
      <h2>REGISTRARSE</h2>

      <form name="formUser" method="GET" action="../../controller/user/insert.php" id="formUser" class="row">
        <input type="hidden" value="" id="User_id" name="User_id" />

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="text" class="form-control form-control-sm" id="User_name" name="User_name"
              placeholder="Digitar Nombre" required>
            <label for="User_name">Digitar Nombre</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="text" class="form-control form-control-sm" id="User_lastName" name="User_lastName"
              placeholder="Digitar Apellido" required>
            <label for="User_lastName">Digitar Apellido</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="number" class="form-control form-control-sm" id="User_document" name="User_document"
              placeholder="Digitar Documento" required>
            <label for="User_document">Digitar Documento</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="email" class="form-control form-control-sm" id="User_email" name="User_email"
              placeholder="Digitar Correo Electrónico" required>
            <label for="User_email">Digitar Correo Electrónico</label>
          </div>
        </div>


        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="number" class="form-control form-control-sm" id="User_cellphone" name="User_cellphone"
              placeholder="Digitar Número de Celular" required>
            <label for="User_cellphone">Digitar Número de Celular</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="date" class="form-control form-control-sm" id="User_birthdate" name="User_birthdate"
              placeholder="Fecha de Nacimiento" required>
            <label for="User_birthdate">Fecha de Nacimiento</label>
          </div>
        </div>



        <h3>SEGURIDAD</h3>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="email" class="form-control form-control-sm" id="User_user" name="User_user"
              placeholder="Digitar Usuario - Electrónico" required>
            <label for="User_user">Digitar Usuario - Correo Electrónico</label>
          </div>
        </div>


        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="password" class="form-control form-control-sm" id="User_password" name="User_password"
              placeholder="Digitar Contraseña" required>
            <label for="User_password">Digitar Contraseña</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="password" class="form-control form-control-sm" id="passwordRepeat" name="passwordRepeat"
              placeholder="Repetir Contraseña" required>
            <label for="passwordRepeat">Repetir Contraseña</label>
          </div>
        </div>
        <button type="submit" value="" id="btnSubmit" name="btnSubmit" class="btn btn-success">CREAR USUARIO
              </button>
      </form>
    </div>
  </div>
  <div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
    <a href="index.php">www.Lasazondejuanita.com</a>
  </div>
  <?php
  include('../assets/js/js.php');
  ?>
</body>

</html>
<?php
$connect->close();
?>