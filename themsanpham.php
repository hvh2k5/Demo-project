<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
        }
        .form-control {
            border-radius: 0;
        }
        .btn {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Thêm sản phẩm</h1>
        <form action="dulieu.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="productName" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <input type="number" min="0" class="form-control" name="productPrice" placeholder="Giá sản phẩm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="productImage" placeholder="Link ảnh">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="productSell" placeholder="Nhập giảm giá (nếu có)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="productVip" placeholder="Nhập giá vip (nếu có)">
            </div>
            <h1 class="text-center mb-4">Thông số sản phẩm</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="cpu" placeholder="cpu...">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="oCung" placeholder="Nhập ổ cứng">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="ram" placeholder="Nhập ram">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="card" placeholder="Nhập thông số">
            </div>
            
            <button class="btn btn-danger btn-block" type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>
</html>