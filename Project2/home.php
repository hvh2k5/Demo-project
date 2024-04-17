<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maytinh";

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
   
  if (isset($_GET['search'])){
      $search=$_GET['search'];
      $sql ="SELECT * FROM laptopgaming WHERE name LIKE'%".$search."%' OR price LIKE '%".$search."%' ";
  }
  else {
      $sql = "SELECT * FROM laptopgaming";
  }
  # Thực thi lệnh
  $laptopgaming = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaptopGaming</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .container {
    max-width: 1200px; 
     
}

        .product-card {
            background-color: #999999;
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
            <input class="form-control" name="search" placeholder="Từ khoá...."/>
            <button class="btn btn-success">Tìm </button>
        </form>
    </div>

    <div class="container mt-4">
        
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($laptopgaming)): ?>
                <div class="col-md-3">
                    <div class="card product-card">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['name']; ?>
                            </h5>
                            <p class="card-text" style="color: red;">Giá niêm yết:
                                <?php echo $row['price']; ?>
                            </p>
                            
                            
                           
                            <a href="chitietgaming.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
    </div>



</body>

</html>
