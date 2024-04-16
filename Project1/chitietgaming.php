<?php
// Lấy thông tin sản phẩm từ database hoặc từ các tham số truyền vào URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin sản phẩm từ CSDL
    // Ví dụ:
    // $sql = "SELECT * FROM laptopgaming WHERE id = $product_id";
    // Sau đó thực hiện truy vấn và lấy dữ liệu từ CSDL

    // Tạm thời sử dụng dữ liệu giả định
    $product_name = "Tên sản phẩm";
    $product_image = "https://example.com/product_image.jpg";
    $product_price = "10000000"; // Đơn giá sản phẩm

    // Các dữ liệu khác có thể lấy từ CSDL tương tự như trên
} else {
    // Nếu không có id sản phẩm được cung cấp, chuyển hướng người dùng về trang chính
    header("Location: trangsanpham.php");
    exit(); // Dừng kịch bản PHP tại đây
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
