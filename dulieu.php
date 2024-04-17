<?php 

$name = $_POST['productName'];
$price = $_POST['productPrice'];
$image = $_POST['productImage'];
$sell = $_POST['productSell'];
$vip = $_POST['productVip'];
$cpu= $_POST['cpu'];
$ssd= $_POST['oCung'];
$ram= $_POST['ram'];
$card = $_POST['card'];



$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql = sprintf("INSERT INTO mayTinh VALUES (NULL, '%s', '%s', '%d','%d','%f', '%s' ,'%s' ,'%s', '%s')", $name,$image,$price, $sell, $vip, $cpu, $ssd, $ram, $card);

echo $sql;

if(mysqli_query($conn, $sql)){
    echo "them thanh cong";    
    header("Location:home.php");
}

?>