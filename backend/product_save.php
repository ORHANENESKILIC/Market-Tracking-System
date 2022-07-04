<?php

$db = new PDO("mysql:host=localhost;dbname=market_tracking_system;charset=utf8", "root", "");


$name = $_POST['Product'];
$price = $_POST['Price'];
$categorie = $_POST['categorie'];
$date = $_POST['date'];



if (!$name 
|| !$price 
|| !$categorie 
|| !$date) {
    die("there are empty fields !.");
}

$save = $db->prepare("INSERT INTO products SET Product_Name = ?, product_Price = ?, Product_Categorie = ?, Product_Expiration_Date = ?");
$save->execute([$name, $price, $categorie, $date]);

if ($save) {
    echo '<script>alert("transaction successful")</script>';
    header("refresh:1; url=../index.php");
}else {
    echo "there was a mistake :( ";
}

?>