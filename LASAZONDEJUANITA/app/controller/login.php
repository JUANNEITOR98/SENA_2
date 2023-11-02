<?php
include('../config/config.php');

$objConn = new Connection();
$conn = $objConn->getConnection();

// Obtener los datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['p_username'];
    $password = $_POST['p_pass'];
}

// Verificar que los campos no estén vacíos
if (empty($username) || empty($password)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Realizar la consulta a la base de datos para obtener el hash de la contraseña almacenada
$query = "SELECT p_Id, p_pass, rol FROM usuarios WHERE p_username = '$username'";
$resultado = mysqli_query($conn, $query);

if (mysqli_num_rows($resultado) > 0) {
    $userData = $resultado->fetch_assoc();
    $hashedPassword = $userData['p_pass'];

    if (password_verify($password, $hashedPassword)) {
        // Login exitoso, obtener datos del usuario
        $userRole = $userData['rol'];
        
        session_start();
        $_SESSION["newsession"] = $userData['p_Id'];
        
        if ($userRole == 2) {
            // Usuario con rol 2 (admin), redireccionar a otra página de admin
            header('Location: ../view/admin/LoginAdmin.php');
        } else {
            // Usuario con otro rol, redireccionar a la página de inicio
            header('Location: ../view/home/home.php');
        }
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
