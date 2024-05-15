<?php
if (isset($_POST['submit'])) {
   
    $email=$_POST['email'];
    $password=$_POST['password'];
   
//Kết nối đến CSDL
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "project2";

$conn = new mysqli($severname, $username, $password, $dbname);
//Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại:" . $conn->connect_error);
                       }
$sql="INSERT INTO customers VALUES (NULL,$email,$password)";

$rs=mysqli_query($conn,$sql);

if ($rs) {
    header("Location:/project1/customer/home_logout.php");
}
else {
    die("Đăng ký thất bại");
}
}

