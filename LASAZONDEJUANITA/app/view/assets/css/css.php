<link rel="icon" type="image/png" href="../../assets/icons/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
}

body {
    font-family: 'Poppins', sans-serif;
    background-image: url(https://marketplace.canva.com/EAFKWjY7ba8/1/0/800w/canva-pink-abstract-watercolor-zoom-virtual-background-WLDltxop-po.jpg);
    background-repeat: no-repeat;
    background-size: cover;

}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Header */
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    padding: 30px 0;
}

.menu {
    display: flex;
    align-items: center;
}

.logo {
    font-size: 25px;
    color: #9BCE21;
    text-transform: uppercase;
    font-weight: 800;
    margin-right: 40px;
}

.menu ul {
    display: flex;
}

.menu ul li {
    margin-right: 30px;
}

.menu ul li a {
    font-size: 18px;
    color: #111419;
}

.menu ul li a:hover {
    color: #63D112;
}

#carrito {
    position: relative;
}

#carrito img {
    width: 25px;
    cursor: pointer;
}

#carrito:hover #lista-carrito {
    display: block;
}

#lista-carrito {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1;
    background-color: #4E4B5076;
    padding: 20px;
    min-width: 400px;
    backdrop-filter: blur(10px);
}

#lista-carrito th,
#lista-carrito td {
    color: white;
}

.borrar {
    background-color: #9BCE21;
    border-radius: 50%;
    padding: 5px 10px;
    color: white;
    font-weight: 800;
    cursor: pointer;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-txt {
    flex-basis: 50%;
}

.header-txt span {
    color: #9BCE21;
    font-size: 17px;
    font-weight: 600;
    display: block;
    margin-bottom: 25px;
}

.header-txt h1 {
    font-size: 70px;
    text-transform: capitalize;
    line-height: 1;
    color: #111419;
    margin-bottom: 35px;
}

.header-txt p {
    font-size: 17px;
    color: #515557;
    margin-bottom: 35px;
}

.butons {
    display: flex;
}

.btn-1 {
    display: inline-block;
    padding: 13px 25px;
    background-color: #9BCE21;
    margin-right: 20px;
    color: white;
    text-transform: capitalize;
    margin-bottom: 100px;
}

.header-img {
    flex-basis: 50%;
    text-align: center;
}

.header-img img {
    height: 50%;
}

/* Ofertas */
.oferts {
    padding: 100px 0;
    display: flex;
    justify-content: space-between;
}

.ofert-1 {
    flex-basis: calc(33.3% - 20px);
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #91DDD8;
}

.ofert-2 {
    flex-basis: calc(33.3% - 20px);
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #FA9824;
}

.ofert-3 {
    flex-basis: calc(33.3% - 20px);
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #9BCE21;
}

.ofert-txt {
    flex-basis: 50%;
}

.ofert-txt a {
    color: white;
}

.ofert-img {
    flex-basis: 50%;
}

/* Productos */
.Products {
    padding: 0 0 50px 0;
    text-align: center;
}

.Products h2 {
    font-size: 40px;
    color: #111419;
}

.box-container {
    margin-top: 55px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.box {
    border-top: 2px solid #63D112;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    background-color: #63D112;
}

.box img {
    height: 200px;
}

.product-txt h3 {
    font-size: 20px;
    color: #111419;
    margin-bottom: 10px;
}

.product-txt p {
    margin-bottom: 25px;
    color: #515557;
}

.Precio {
    font-size: 17px;
    font-weight: 700;
    color: #FF9100 !important;
}

.btn-2,
.btn-3 {
    background-color: #9BCE21;
    margin-top: 50px;
    display: inline-block;
    padding: 11px 35px;
    border-radius: 25px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 5px 10px rgb(0, 0, 0.2);
}

.btn-2:hover,
.btn-3:hover {
    background-color: #13462E;
}

.btn-3 {
    margin: 0;
    padding: 8px 25px;
    border-radius: 5px;
}

/* Testimonios */
.testimonial {
    margin-top: 50px;
    text-align: center;
}

.testimonial span {
    color: #9BCE21;
    font-size: 17px;
    font-weight: 600;
    display: block;
    margin-bottom: 25px;
}

.testimonial h2 {
    font-size: 40px;
    color: #111419;
}

.testimonial-content {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
}

.testimonial-1 {
    flex-basis: calc(50% - 20px);
    padding: 50px;
    text-align: left;
    background-color: #F6FAFB;
    border-top: 5px solid #9BCE21;
}

.testimonial-1 img {
    width: 100px;
}

.testimonial-1 h4 {
    font-size: 17px;
    color: #111419;
}

.testimonial-1 p {
    color: #9BCE21;
}

.top-bar {
    background-color: #fff;
    padding: 15px 0;
  }
  
  .top-bar .logo {
    font-size: 25px;
    color: #9BCE21;
    text-transform: uppercase;
    font-weight: 800;
    margin-right: 40px;
  }
  
  .top-bar .navbar ul {
    display: flex;
  }
  
  .top-bar .navbar ul li {
    margin-right: 30px;
  }
  
  .top-bar .navbar ul li a {
    font-size: 18px;
    color: #111419;
  }
  
  .top-bar .navbar ul li a:hover {
    color: #9BCE21;
  }
  
  .carrito {
    position: relative;
  }
  
  .carrito img {
    width: 25px;
    cursor: pointer;
  }
  
  .carrito:hover #lista-carrito {
    display: block;
  }
  
  #lista-carrito {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1;
    background-color: #4E4B5076;
    padding: 20px;
    min-width: 400px;
    backdrop-filter: blur(10px);
  }
  
  #lista-carrito th,
  #lista-carrito td {
    color: white;
  }
  
  .borrar {
    background-color: #9BCE21;
    border-radius: 50%;
    padding: 5px 10px;
    color: white;
    font-weight: 800;
    cursor: pointer;
  }

  .carrito {
    position: relative;
  }
  
  .carrito img {
    width: 25px;
    cursor: pointer;
  }
  
  .carrito:hover #lista-carrito {
    display: block;
  }
  
  #lista-carrito {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1;
    background-color: #4E4B5076;
    padding: 20px;
    min-width: 400px;
    backdrop-filter: blur(10px);
  }
  
  #lista-carrito th,
  #lista-carrito td {
    color: white;
  }
  
  #lista-carrito tfoot {
    text-align: right;
  }
  
  #lista-carrito tfoot td {
    padding-top: 10px;
  }
  
  .borrar {
    background-color: #9BCE21;
    border-radius: 50%;
    padding: 5px 10px;
    color: white;
    font-weight: 800;
    cursor: pointer;
  }
  
  .btn-3 {
    background-color: #9BCE21;
    display: inline-block;
    padding: 8px 25px;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
  }
  
  .btn-3:hover {
    background-color: #13462E;
  }

  .anuncio {
    text-decoration:none;
  }

  .col-md-8 {
    margin-bottom: 50px !important;
}

/* Estilo para la imagen */
.img-fluid {
    max-width: 100%;
    height: auto;
}


</style> 