<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // xampp: password rỗng
$database = "maytinh";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra xem có tham số id trong URL không
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin sản phẩm từ CSDL
    $sql = "SELECT * FROM laptopgaming WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['name'];
        $product_image = $row['image'];
        $product_price = $row['price'];
    } else {
        echo "Không tìm thấy sản phẩm!";
    }
} else {
   
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            background-color: #999999;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-container">
                    <h1><?php echo $product_name; ?></h1>
                    <img class="product-image" src="<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>">
                    <h2>Giá: <?php echo $product_price; ?> VNĐ</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div style="height: 70%;" class="product-info">
                    <h1 style="text-align: center;">Thông tin sản phẩm</h1>
                    <p>Mô tả sản phẩm:</p>
                    <p>Thông số kỹ thuật:</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
