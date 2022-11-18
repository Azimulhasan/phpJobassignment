<?php
require_once("./conn.php");

$customername = $_REQUEST["customername"];
$totalsales = $_REQUEST["totalsales"];
$country = $_REQUEST["country"];
$state = $_REQUEST["state"];
$city = $_REQUEST["city"];

$target_dir = "/uploads/";
$customerpic = $target_dir . basename( $_FILES['customerpic']['name']) ;
$file_type=$_FILES['customerpic']['type'];
$customerpic_w = "";
if ($file_type=="image/gif" || $file_type=="image/jpeg"|| $file_type=="image/jpg" || $file_type=="image/png" ) {
    if(move_uploaded_file($_FILES['customerpic']['tmp_name'], $customerpic)){
        echo "The file ". basename( $_FILES['customerpic']['name']). " is uploaded";
    }else {
        echo "Problem uploading file";
    }
}else {
    echo "You may only upload PNGS ,JPEGs or GIF files.<br>";
}


$invoice = $target_dir . basename( $_FILES['invoice']['name']) ;
$file_type=$_FILES['invoice']['type'];
$invoice_w = "";
if ($file_type=="application/pdf") {
    if(move_uploaded_file($_FILES['invoice']['tmp_name'], $invoice)){
        echo "The file ". basename( $_FILES['invoice']['name']). " is uploaded";
    }else {
        echo "Problem uploading file";
    }
}else {
    echo "You may only upload PDFs.<br>";
}

$invoicedate = $_REQUEST['invoicedate'];


$sql = "INSERT INTO MyGuests VALUES (".$customername.",".$totalsales.",".$country.",".$state.",".$city.",".$invoice_w.",".$customerpic_w.",".$invoicedate.")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>