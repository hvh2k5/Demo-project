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

    <style>
        .product-card {
            background-color: #999999;
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            /* Sử dụng flexbox */
            flex-direction: column;
            /* Thiết lập hướng của các phần tử con */
            align-items: center;
            /* Căn giữa theo chiều ngang */
        }

        .product-image {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
            /* Khoảng cách giữa ảnh và các phần tử khác */
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 16px;
            color: red;
            font-weight: bold;
            margin-bottom: auto;
            /* Đẩy giá tiền xuống cuối cùng của product-card */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Trang bán LaptopGaming</h1>
        <form>
            <input class="form-control mb-5" name="search" placeholder="Nhập sản phẩm muốn tìm" />
        </form>
        <div class="row row-cols-3">
            <?php
            while ($row = mysqli_fetch_array($laptopgaming)) {
                ?>
                <div class="col">
                    <div class="product-card">
                        <img class="product-image" src="<?php echo $row['image']; ?>" alt="Product Image">
                        <p class="product-name"><?php echo $row['name']; ?></p>
                        <p class="product-price">Giá bán: <?php echo $row['price']; ?></p>
                        <a href="chitietgaming.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
