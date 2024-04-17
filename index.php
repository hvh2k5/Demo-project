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

if (isset($_GET["page"])) {
    $currentPage = $_GET["page"];
}
$search = '';
if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

$limit = 5;
if (isset($_GET["limit"])) {
    $limit = $_GET["limit"];
}


$offset = ($currentPage - 1) * $limit;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM laptopgaming WHERE name LIKE'%" . $search . "%' OR price LIKE '%" . $search . "%' ";
} else {
    $sql = "SELECT * FROM laptopgaming";
}
# Thực thi lệnh
$laptopgaming = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .product-card {
            background-color: whitesmoke;
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

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- search start-->
    <div class="container mt-1">
            <form class="my-1 d-flex flex-row">
                <input class="form-control" name="search" placeholder="Từ khoá...." />
                <button class="btn btn-success">Tìm </button>
            </form>
    </div>
    <!-- search end -->

    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid topbar bg-dark d-none d-lg-block">
            <div class="container px-0">
                <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                    <div class="top-info flex-grow-0">
                        <span class="rounded-circle btn-sm-square bg-primary me-2">
                            <i class="fas fa-bolt text-white"></i>
                        </span>
                        <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                            <p class="mb-0 text-white fs-6 fw-normal">Trending</p>
                        </div>
                        <div class="overflow-hidden" style="width: 735px;">
                            <div id="note" class="ps-2">
                                <img src="img/anh1.jpg"
                                    class="img-fluid rounded-circle border border-3 border-primary me-2"
                                    style="width: 30px; height: 30px;" alt="">
                                <a href="#">
                                    <p class="text-white mb-0 link-hover">Uy tín và chất lượng là thứ mà chúng tôi không
                                        có!</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="top-link flex-lg-wrap">
                        <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"> <span
                                class="text-body">Thứ 4, 16/4/2024</span></i>
                        <div class="d-flex icon">
                            <p class="mb-0 text-white me-2">Follow Us:</p>
                            <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-twitter text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-instagram text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-youtube text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-linkedin-in text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-skype text-body link-hover"></i></a>
                            <a href="" class=""><i class="fab fa-pinterest-p text-body link-hover"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="index.php" class="navbar-brand mt-3">
                        <p class="text-primary display-6 mb-2" style="line-height: 0;">STORE</p>
                        <small class="text-body fw-normal" style="letter-spacing: 12px;">D&H</small>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="detail-page.html" class="nav-item nav-link">Mới nhất</a>
                            <a href="404.html" class="nav-item nav-link">Hot</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thể loại</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="trangsanpham.php" class="dropdown-item">Laptop gaming</a>
                                    <a href="#" class="dropdown-item">Mỏng nhẹ</a>
                                    <a href="#" class="dropdown-item">Học tập</a>
                                    <a href="#" class="dropdown-item">Cao cấp</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                            <div class="d-flex">
                                <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt="">
                                <div class="d-flex align-items-center">
                                    <strong class="fs-4 text-secondary">25°C</strong>
                                    <div class="d-flex flex-column ms-2" style="width: 150px;">
                                        <span class="text-body">Hà Nội,</span>
                                        <small>Thứ 4, 17/4/2024</small>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                    class="fas fa-search text-primary"></i></button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>        
    </div>
    <!-- Navbar End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <from class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" name="search" class="form-control p-3" placeholder="Nhập sản phẩm cần tìm"
                            aria-describedby="search-icon-1">
                            <button class="btn btn-success">Tìm </button>
                        <!-- <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span> -->
                    </div>
                </from>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Features Start -->
    <div class="container-fluid features mb-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="features-item rounded border bg-light d-flex align-items-center">
                        <div class="overflow-hidden mx-3" style="width: 100px; height: 100px;">
                            <img src="img/anh3.png" class="img-zoomin img-fluid w-100 h-100 rounded-circle" alt="">
                        </div>
                        <div class="features-content text-start py-3">
                            <p class="text-uppercase mb-2">laptop</p>
                            <a href="#" class="h6">
                                Ưu đãi cho SV-HS.
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="features-item rounded border bg-light d-flex align-items-center">
                        <div class="overflow-hidden mx-3" style="width: 100px; height: 100px;">
                            <img src="img/anh4.png" class="img-zoomin img-fluid w-100 h-100 rounded-circle" alt="">
                        </div>
                        <div class="features-content text-start py-3">
                            <p class="text-uppercase mb-2">Ưu đãi</p>
                            <a href="#" class="h6">
                                Giảm đến 50%
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="features-item rounded border bg-light d-flex align-items-center">
                        <div class="overflow-hidden mx-3" style="width: 100px; height: 100px;">
                            <img src="img/anh7.png" class="img-zoomin img-fluid w-100 h-100 rounded-circle" alt="">
                        </div>
                        <div class="features-content text-start py-3">
                            <p class="text-uppercase mb-2">Đổi hàng</p>
                            <a href="#" class="h6">
                                Đổi cũ lên đời
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="features-item rounded border bg-light d-flex align-items-center">
                        <div class="overflow-hidden mx-3" style="width: 100px; height: 100px;">
                            <img src="img/anh8.png" class="img-zoomin img-fluid w-100 h-100 rounded-circle" alt="">
                        </div>
                        <div class="features-content text-start py-3">
                            <p class="text-uppercase mb-2">Hot</p>
                            <a href="#" class="h6">
                                Mua đi mua đi
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Product -->
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
    <!-- product end -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#" class="d-flex flex-column flex-wrap">
                            <p class="text-white mb-0 display-6">STORE</p>
                            <small class="text-light" style="letter-spacing: 11px; line-height: 0;">H&D</small>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex position-relative rounded-pill overflow-hidden">
                            <input class="form-control border-0 w-100 py-3 rounded-pill" type="email"
                                placeholder="example@gmail.com">
                            <button type="submit"
                                class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute"
                                style="top: 0; right: 0;">Đăng ký ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-1">
                        <h4 class="mb-4 text-white">Thông tin của chúng tôi</h4>
                        <p class="text-secondary line-h">Địa chỉ: <span class="text-white">Ngõ 18, Tạ Quang Bửu</span>
                        </p>
                        <p class="text-secondary line-h">Email: <span class="text-white">Example@gmail.com</span></p>
                        <p class="text-secondary line-h">Phone: <span class="text-white">113</span></p>
                        <div class="d-flex line-h">
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube text-dark"></i></a>
                            <a class="btn btn-light btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in text-dark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-2">
                        <div class="d-flex flex-column mb-4">
                            <h4 class="mb-4 text-white">Chủ tịch</h4>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                        <img src="img/footer-1.jpg" class="img-zoomin img-fluid rounded-circle w-100"
                                            alt="">
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        <p class="text-uppercase text-white mb-3">Huy</p>
                                        <a href="#" class="h6 text-white">
                                            Hãy đến với chúng tôi
                                        </a>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec
                                            9, 2024</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                        <img src="img/footer-2.jpg" class="img-zoominimg-fluid rounded-circle w-100"
                                            alt="">
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        <p class="text-uppercase text-white mb-3">Duy</p>
                                        <a href="#" class="h6 text-white">
                                            Mua ngay đi chờ chi
                                        </a>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec
                                            9, 2024</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="d-flex flex-column text-start footer-item-3">
                        <h4 class="mb-4 text-white">Thể loại</h4>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i>
                            Gaming</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Học
                            tập</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Mỏng
                            nhẹ</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Cao
                            cấp</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Mua
                            nhiều nhất</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Hót
                            Hòn Họt</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-4">
                        <h4 class="mb-4 text-white">Ảnh sản phẩm hot</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-2.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <!-- <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a
        href="https://themewagon.com">ThemeWagon</a>
    </div>
    </div>
    </div>
    </div> -->
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>