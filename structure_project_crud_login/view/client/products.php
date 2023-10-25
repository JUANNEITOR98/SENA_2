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
    echo(" Si funciono XD");
  }else{
    
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
    <title>Lista de Productos</title>
    <link href="../../assets/css/style.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="top-bar container d-flex justify-content-between align-items-center">
  <div>
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

<body>


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
              <a href="show.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
              </svg>comprar ahora</a>
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
          <a href="index.php">www.gamestrip.com</a>
    </div>
  <script src="../assets/js/script.js" type="javascript"></script>
  <script>
   var cont=0;
   var newArraProdcutSelect=new Array();
    function addProduct(id){

      cont=cont+1;
      document.getElementById('numProduct').innerHTML=cont;
      alert("Producto Id: "+id+ " Cantidad de Productos: "+cont);
      newArraProdcutSelect[cont]=id;
    }
    console.log(newArraProdcutSelect);
  </script>
  
</html>