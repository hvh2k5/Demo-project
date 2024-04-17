<?php
$servername = "localhost";
$username = "root";
$password = ""; // xampp: password rong
$database = "maytinh";
hhhhhh
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Kết nối thất bại");

}
$sql = "SELECT * FROM laptopgaming";
// Thuc thi cau lenh
$laptopgaming = mysqli_query($conn, $sql);

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopGaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" >Trang bán LAPTOPGAMING</h1>
        <div class="row row-cols-3">

            <?php
        while ($row = mysqli_fetch_array($laptopgaming)){
            echo"<div class='col'>";

            echo"<p>".$row['name']."</p>";
            echo"<img class='img-fluid' src='".$row['image']."'/>";
            echo"<p>".$row['price']."</p>";
            echo"</div>";
        }
            ?>
        </div>



    </div>
</body>

</html>
