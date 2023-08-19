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
        echo "New record created successfully";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $connect->close();
}
?>
