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

<div class="top-bar container d-flex justify-content-between align-items-center">
  <div>
<a href="index.php" class="logo">
      <img src="../../assets\img\icons\logo_oficial.png" alt="Bootstrap" width="90" height="72">
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
    </div>

</section>

</head>

  <div class="container">
    <div id="sectionOne" class="sectionOne" name="sectionOne">
      <h2>REGISTRARSE</h2>

      <form name="formClient" method="GET" action="../../controller/user/insert.php" id="formUser" class="row">
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


<script>
var cont = 0;
var newArraProdcutSelect = [];

function addProduct(id) {
    cont = cont + 1;
    document.getElementById('numProduct').innerHTML = cont;
    alert("Producto Id: " + id + " Cantidad de Productos: " + cont);
    newArraProdcutSelect[cont] = id;
}
function sendDataToAnotherPage() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "pagina_destino.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("data=" + JSON.stringify(newArraProdcutSelect));
}

  </script>
  
<?php
$connect->close();
?>