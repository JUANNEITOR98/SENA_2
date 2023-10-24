<?php
$rol = "guest";

if (isset($_SESSION['usuario'])) {
    $rol = $_SESSION['usuario']['rol'];
}
?>

<div id="header">
    <ul>
        <?php if ($rol == "admin"): ?>
            <li><a href="admin.php">Panel de Administrador</a></li>
        <?php elseif ($rol == "cliente"): ?>
            <li><a href="cliente.php">Panel de Cliente</a></li>
        <?php else: ?>
            <li><a href="index.php">Página de Inicio</a></li>
        <?php endif; ?>
    </ul>
</div>
