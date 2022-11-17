<?php
require_once("./conn.php");

$customername = $_POST["customername"];
$totalsales = $_POST["totalsales"];
$country = $_POST["country"];
$state = $_POST["state"];
$city = $_POST["city"];

$target_dir = "uploads/";
$customerpic = $targer_dir . basename( $_FILES['customerpic']['name']) ;
$file_type=$_Fcustomerpic['customerpic']['type'];

if ($file_type=="image/gif" || $file_type=="image/jpeg"|| $file_type=="image/jpg" || $file_type=="image/png" ) {
    if(move_uploaded_file($_Fcustomerpic['customerpic']['tmp_name'], $customerpic)){
        echo "The file ". basename( $_Fcustomerpic['customerpic']['name']). " is uploaded";
    }else {
        echo "Problem uploading file";
    }
}else {
    echo "You may only upload PNGS ,JPEGs or GIF files.<br>";
}


$invoice = $target_dir . basename( $_FILES['invoice']['name']) ;
$file_type=$_FILES['invoice']['type'];
if ($file_type=="application/pdf") {
    if(move_uploaded_file($_FILES['invoice']['tmp_name'], $invoice)){
        echo "The file ". basename( $_FILES['invoice']['name']). " is uploaded";
    }else {
        echo "Problem uploading file";
    }
}else {
    echo "You may only upload PDFs.<br>";
}

$invoicedate = $_POST['invoicedate'];


$sql = "INSERT INTO MyGuests VALUES (".$customername.",".$totalsales.",".$country.",".$state.",".$city.",".$invoice.",".$customerpic.",".$invoicedate.")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>