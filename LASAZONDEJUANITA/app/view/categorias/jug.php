

<!DOCTYPE html>
<html>
<head>
  <title>Producto</title>
  <link rel="stylesheet" href="styles.css">
  <?php include('../assets/css/css.php'); ?>
</head>
<body>
  <?php include('../assets/view/header.php'); ?>

  <div class="container mt-5">
    <h2 class="text-center" style="font-size:50px; color:red;">Productos Destacados</h2>
        <!-- Carrusel (Carousel) -->
        <body>
  <div class="container">
    <div class="container text-center">
      <div class="row m-5">

        
          
        <!-- Products -->
        <section class="products">
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
    
            <div class="row">
             
        <?php include('../../controller/home.php'); ?>
    

       
       
      </div>
    </div>
  </div>
  <?php include('../assets/view/link.php'); ?>
  <script src="../assets/js/script.js" type="javascript"></script>
  <?php include('../assets/js/js.php') ?>
</body>
</html>
