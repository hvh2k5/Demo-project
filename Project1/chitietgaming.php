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
    // Nếu không có id sản phẩm được cung cấp, chuyển hướng người dùng về trang chính
    header("Location: trangsanpham.php");
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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="product-container">
            <h1><?php echo $product_name; ?></h1>
            <img class="product-image" src="<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>">
            <h2>Giá: <?php echo $product_price; ?> VNĐ</h2>
        </div>
    </div>
</body>

</html>
