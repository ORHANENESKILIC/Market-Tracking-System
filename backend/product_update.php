<?php

$db = new PDO("mysql:host=localhost;dbname=market_tracking_system;charset=utf8", "root", "");

$id = $_GET["id"];

$newname = $_POST['newProduct'];

$newprice = $_POST['newPrice'];

$newcategorie = $_POST['newcategorie'];

$newdate = $_POST['newdate'];


if (!$newname 
|| !$newprice 
|| !$newcategorie 
|| !$newdate) {
    die("");
}

$update = $db->prepare("UPDATE products SET Product_Name = ?, product_Price = ?, Product_Categorie = ?, Product_Expiration_Date = ? where id= ?");
$update->execute([$newname, $newprice, $newcategorie, $newdate, $id]);

if ($update) {
    echo '<script>alert("transaction successful")</script>';
    header("refresh:1; url=../index.php");
}else {
    echo "there was a mistake :( ";
}

?>
