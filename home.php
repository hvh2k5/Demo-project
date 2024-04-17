<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
  }
    
  $currentPage = 1;

  if(isset($_GET["page"])){
      $currentPage = $_GET["page"];
  }
  $search = '';
  if(isset($_GET["search"])){
      $search = $_GET["search"];
  }
   
  $limit =  5;
  if(isset($_GET["limit"])){
      $limit = $_GET["limit"];
  }
   
   
  $offset = ($currentPage -1) * $limit;
   
  if($search == '')
  {
      $sql = sprintf("SELECT * FROM mayTinh LIMIT %d OFFSET %d", $limit, $offset);
      
  }
  else{
      $sql = "SELECT * FROM mayTinh WHERE name LIKE '%".$search."%'";
      $sql .= " OR cpu LIKE '%" . $search . "%'";
      $sql .= " OR card LIKE '%" . $search . "%'";
      $sql .= " OR ssd LIKE '%" . $search . "%'";
        $sql .= " OR ram LIKE '%" . $search . "%'";
      $sql = $sql." ".sprintf(" LIMIT %d OFFSET %d", $limit, $offset);
  }
   
  # Thực thi lệnh
  $mayTinh = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .product-card {
            margin-bottom: 30px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
        }

        .product-card .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .product-card .card-text {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
    <form class="my-5 d-flex flex-row">
            <select class="form-select" name="limit">
                <option value="1" <?php if($limit == 1) echo "selected" ?> >1 sản phẩm 1 trang </option>
                <option value="3" <?php if($limit == 5) echo "selected" ?>>3 sản phẩm 1 trang </option>
                <option value="4" <?php if($limit == 10) echo "selected" ?>>4 sản phẩm 1 trang </option>
                <option value="6" <?php if($limit == 20) echo "selected" ?>>6 sản phẩm 1 trang </option>
            </select>
            <input class="form-control" name="search" placeholder="Từ khoá...."/>
            <button class="btn btn-success">Tìm </button>
        </form>
    </div>

    <div class="container mt-4">
        <div class="text-right mb-3">
            <a class="btn btn-primary" href="themsanpham.php">Thêm sản phẩm</a>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($mayTinh)): ?>
                <div class="col-md-3">
                    <div class="card product-card">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['name']; ?>
                            </h5>
                            <p class="card-text">Giá niêm yết:
                                <?php echo $row['price']; ?>
                            </p>
                            <p class="card-text">Giảm giá:
                                <?php echo $row['sell']; ?>
                            </p>
                            <p class="card-text">Giá VIP:
                                <?php
                                if ($row['vip'] != null && $row['vip'] != '') {
                                    echo $row['vip']; // Giá VIP
                                } else {
                                    echo "Chưa có giá VIP"; // Nếu không có giá VIP
                                }
                                ?>
                            </p>
                            <p class="card-text">Thông số:
                            <div class="row-md-3">
                                <div class="card product-card">
                                    <?php echo $row['cpu']; ?>
                                </div>
                                <div class="card product-card">
                                    <?php echo $row['ssd']; ?>
                                </div>
                                <div class="card product-card">
                                    <?php echo $row['ram']; ?>
                                </div>
                                <div class="card product-card">
                                    <?php echo $row['card']; ?>
                                </div>
                            </div>
                            </p>
                            <a href="#" class="btn btn-info">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div ">
            <!-- Phân trang -->
        
            <a href="home.php?page=<?php if($currentPage > 1) {echo $currentPage -1;} else echo '1' ?>&limit=<?php echo $limit ?>&search=<?php echo $search ?> ">Trở về</a>
            <button class="btn btn-primary rounded-circle"><?php echo $currentPage ?></button>
            <a href="home.php?page=<?php echo $currentPage +1 ?>&limit=<?php echo $limit ?>&search=<?php echo $search ?>">Tiếp theo</a>
        </div>       
    </div>



</body>

</html>