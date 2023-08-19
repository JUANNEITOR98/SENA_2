<?php
include("../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['Client_name'];
    $clientIdentification = $_POST['Client_identification'];
    $clientEmail = $_POST['Client_email'];
    $clientPhone = $_POST['Client_phone'];
    $clientAddress = $_POST['Client_address'];

    $stmt = $connect->prepare("CALL InsertClientWithDefaults(?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss",
        $clientName,
        $clientIdentification,
        $clientEmail,
        $clientPhone,
        $clientAddress
    );

    try {
        $stmt->execute();
        echo "";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $connect->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rectángulo Central</title>
<style>
  body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }

  .rectangle {
    width: 300px;
    height: 200px;
    background-color: #3498db;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
  }

  h1 {
    color: white;
    margin-bottom: 10px;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #e74c3c;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
</head>
<body>
<div class="rectangle">
  <h1>GRACIAS</h1>
  <p>MUCHAS GRACIAS POR TU COMPRA.</p>
  <button class="btn" onclick="window.location.href='index.php'">Volver al inicio</button>
</div>
<div class="bottom-0 end-0 w-100" style="background: #e2e6e9; text-align: center;">
            <a href="index.php">www.lasazondejuanita.com</a>
    </div>

</body>
</html>