<?php
include("../../config/config.php");

$sql = "SELECT * FROM `document_type` WHERE 1;";
$sql .= "SELECT * FROM `gendertype` WHERE 1;";
$sql .= "SELECT * FROM `status` WHERE 1;";
$resultArray = array();
if (!$connect->multi_query($sql)) {
  echo "Falló la multiconsulta: (" . $connect->errno . ") " . $connect->error;
}

do {
  if ($result = $connect->store_result()) {


    $resultQuery = $result->fetch_all(MYSQLI_NUM);
    array_push($resultArray, $resultQuery);

    $result->free();
  }
} while ($connect->more_results() && $connect->next_result());
$resultDocumentType = $resultArray[0];
$resultGenderType = $resultArray[1];
$resultStatus = $resultArray[2];

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

<body><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<<<<<<< Updated upstream
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
    <img src="../../assets/img/images/car.svg" alt="car" id="img-carrito">
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

</section>

</head>

  <div class="container">
        <div id="sectionOne" class="sectionOne" name="sectionOne">
      <h2>REGISTRAR USUARIO</h2>

      <form name="formclient" method="GET" action="../../controller/client/insert.php" id="formclient" class="row">
        <input type="hidden" value="" id="client_id" name="client_id" />

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="text" class="form-control form-control-sm" id="client_name" name="client_name"
              placeholder="Digitar Nombre" required>
            <label for="client_name">Digitar Nombre</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="text" class="form-control form-control-sm" id="client_lastName" name="client_lastName"
              placeholder="Digitar Apellido" required>
            <label for="client_lastName">Digitar Apellido</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="number" class="form-control form-control-sm" id="client_document" name="client_document"
              placeholder="Digitar Documento" required>
            <label for="client_document">Digitar Documento</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="email" class="form-control form-control-sm" id="client_email" name="client_email"
              placeholder="Digitar Correo Electrónico" required>
            <label for="client_email">Digitar Correo Electrónico</label>
          </div>
        </div>


        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="number" class="form-control form-control-sm" id="client_cellphone" name="client_cellphone"
              placeholder="Digitar Número de Celular" required>
            <label for="client_cellphone">Digitar Número de Celular</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="date" class="form-control form-control-sm" id="client_birthdate" name="client_birthdate"
              placeholder="Fecha de Nacimiento" required>
            <label for="client_birthdate">Fecha de Nacimiento</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating">
            <select class="form-select" id="DocumentType_id" name="DocumentType_id" aria-label="Floating label select example">
              <option selected>Open this select menu</option>

              <?php
                for ($i = 0; $i < count($resultDocumentType); $i++) {
                  echo '<option value="' . $resultDocumentType[$i][0] . '">' . $resultDocumentType[$i][1] . '</option>';
                }
                ;
                ?>
            </select>
            <label for="DocumentType_id">Tipo de Documento</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating">
            <select class="form-select" id="GenderType_id" name="GenderType_id" aria-label="Floating label select example">
              <option selected>Open this select menu</option>

              <?php
                 
                 for ($i = 0; $i < count($resultGenderType); $i++) {
                   echo '<option value="' . $resultGenderType[$i][0] . '">' . $resultGenderType[$i][1] . '</option>';
                 };
                ?>
            </select>
            <label for="GenderType_id">Genero</label>
          </div>
        </div>

        <div class="col-4">
          <div class="form-floating">
            <select class="form-select" id="Status_id" name="Status_id" aria-label="Floating label select example">
              <option selected>Open this select menu</option>
              <?php
                for ($i = 0; $i < count($resultStatus); $i++) {
                  echo '<option value="' . $resultStatus[$i][0] . '">' . $resultStatus[$i][1] . '</option>';
                }
                ;
                ?>
            </select>
            <label for="Status_id">Estado</label>
          </div>
        </div>


        <h3>SEGURIDAD</h3>

        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="email" class="form-control form-control-sm" id="client_client" name="client_client"
              placeholder="Digitar Usuario - Electrónico" required>
            <label for="client_client">Digitar Usuario - Correo Electrónico</label>
          </div>
        </div>


        <div class="col-4">
          <div class="form-floating mb-1">
            <input type="password" class="form-control form-control-sm" id="client_password" name="client_password"
              placeholder="Digitar Contraseña" required>
            <label for="client_password">Digitar Contraseña</label>
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
    <a href="#">www.gamestrip.com</a>
  </div>
  <?php
  include('../assets/js/js.php');
  ?>
</body>

</html>
<?php
$connect->close();
?>