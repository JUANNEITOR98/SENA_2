<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Name of My Form Change Password</title>

  <?php
    include('../assets/css.php');
  ?>
</head>

<body>

  <div id="sectionOne" class="sectionOne" name="sectionOne">
    <h1>FORMULARIO DE CAMBIO DE CONTRASEÑA</h1>

    <form name="formLogin" id="formLogin" class="formLogin">
      <table name="tableLogin" id="tableLogin" class="tableLogin">
        <tr>
          <td style="text-align: center;">
            <img class="img-logo" src="../../assets/img/icons/logo.png">
          </td>
        </tr>
        <tr>
          <td>
            <label>DIGITAR NUEVA CONTRASEÑA</label>
            <input type="password" value="" placeholder="Digitar Nueva Contraseña" id="password" name="password" required />
          </td>
        </tr>
        <tr>
          <td>
            <label>COMPROBAR CONTRASEÑA</label>
            <input type="password" value="" placeholder="Validar Contraseña" id="ValidatePassword" name="ValidatePassword" required />
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="CAMBIAR CONTRASEÑA" id="btnGetInto" name="btnGetInto" class="btnGetInto" required />

          </td>
        </tr>
      </table>
    </form>
  </div>
  <script src="../../assets/js/main.js" type="javascript"></script>

</body>

</html>