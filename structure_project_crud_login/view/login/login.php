<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Name of My Form Login</title>

  <?php
    include('../assets/css.php');
  ?>
</head>

<body>

  <div id="sectionOne" class="sectionOne" name="sectionOne">
    <h1>FORMULARIO DE INGRESO</h1>

    <form name="formLogin"  method="POST" id="formLogin" class="formLogin" onsubmit="validateForm(this.id,event)">
      <table name="tableLogin" id="tableLogin" class="tableLogin">
        <tr>
          <td style="text-align: center;">
            <img class="img-logo" src="../../assets/img/icons/logo.png">
          </td>
        </tr>
        <tr>
          <td>
            <label>DIGITAR USUARIO</label>
            <input type="email" value="" placeholder="Digitar Usuario" id="user" name="user" required />
          </td>
        </tr>
        <tr>
          <td>
            <label>DIGITAR CONTRASEÑA</label>
            <input type="password" value="" placeholder="Digitar Contraseña" id="password" name="password"  />
          </td>
        </tr>
        <tr>
          <td>
            <a href="#">CAMBIAR CONTRASEÑA</a>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="INGRESAR" id="btnGetInto" name="btnGetInto" class="btnGetInto"  />

          </td>
        </tr>
      </table>
    </form>
  </div>
  <script src="../../assets/js/form.js" ></script>


</body>

</html>