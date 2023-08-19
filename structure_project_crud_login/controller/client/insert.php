<?php
include("../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $clientName = $_REQUEST['Client_name'];
  $clientIdentification = $_REQUEST['Client_identification'];
  $clientEmail = $_REQUEST['Client_email'];
  $clientPhone = $_REQUEST['Client_phone'];
  $clientAddress = $_REQUEST['Client_address'];



  $statusId = $_REQUEST['Status_id'];
  $documentTypeId = $_REQUEST['DocumentType_id'];
  $compId = $_REQUEST['Comp_id'];
  $countryId  = $_REQUEST['Country_id'];

  $stmt = $connect->prepare("INSERT INTO client 
  (Client_name, 
  Client_identification, 
  Client_email,
  Client_phone,
  Client_address,
  Status_id,
  DocumentType_id,
  Comp_id,
  Country_id) VALUES 
  (?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssiiii",$clientName,$clientIdentification,$clientEmail,$clientPhone,$clientAddress,  $statusId,$documentTypeId,$compId,$countryId);

  $stmt->execute();
  echo "New records created successfully";
  $stmt->close();
  $connect->close();
  header('Location: ../../view/client/view.php');
  exit;
}
