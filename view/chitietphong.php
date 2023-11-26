<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Thêm mã nhúng vào head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Selected+Font&display=swap" />



</head>

<body>

    <!-- Bắt đầu phần header -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="width: 10%;"> <img src="/img/logo.png" alt=""
                        style="width: 100%;"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Phòng |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Thông tin |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Liên hệ</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                    </ul>
                    <form class="d-flex" role="search" style=" margin-right: 30px;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <button type="button" class="btn btn-secondary" style=" margin-right: 30px;">Đăng nhập</button>

                    <button type="button" class="btn btn-success">Đăng kí</button>

                </div>
        </nav>


        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/banner1.jpg" class="d-block" alt="..." style="width: 100%; height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner2.jfif" class="d-block" alt="..." style="width: 100%; height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner3.png" class="d-block" alt="..." style="width: 100%; height: 600px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class-hidden="carousel-control-prev-icon" aria-hidden="true"></span>
                <span><i class="fas fa-arrow-circle-left" style="font-size: 50px;"></i></span>

            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class-hidden="carousel-control-next-icon" aria-hidden="true"></span>
                <span><i class="fas fa-arrow-circle-right" style="font-size: 50px;"></i></span>
            </button>
        </div>

    </header>
    <!-- Kết thúc phần header -->











    <div class="container mt-4">
    <div class="row">
        <!-- Bên trái - Chi tiết phòng -->
<div class="col-md-8">
            <div class="card">
            <?php extract($phong);?>
                <?php
                $img_path ="upload/";
                $img=$img_path.$img;
                echo '<div class="card-img-top"><img src="' . $img . '"></div>';?>
                <div class="card-body">
                    <?php
                    echo '<h5 class="card-img-top">'.$room_name.'</h5>';
                    echo '<h5 class="card-img-top">'.$description.'</h5>';
                    echo '<h5 class="card-img-top">'.$room_price.'</h5>';
                ?>
                    </div>
            </div>
        </div>

        <!-- Bên phải - Danh sách phòng -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <!-- <img src="product1.jpg" alt="Product 1" class="img-fluid">
                    <h5 class="mt-2">Product 1</h5>
                    <p>Price: $100</p>
                    <p>Beds: 2</p>
                    <p>People: 4</p> -->
                    <?php
                    foreach ($listp as $p) {
                        extract($p);
                        $linkp="index.php?pg=chitietphong&id=".$room_id;
                        echo '<li><a href="'.$linkp.'">'.$room_name.'</a></li>';

                    }
                    ?>
                </a>
                <!-- Thêm các sản phẩm cùng loại khác tương tự -->
            </div>
        </div>
    </div>
</div>










    <footer class="ftco-footer ftco-bg-dark ftco-section" style="background-color: #8798af;">
        <div class="container" style="margin-top: 170px; padding-top: 50px;">
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">pld_hotel</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Useful Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">Blog</a></li>
                  <li><a href="#" class="py-2 d-block">Rooms</a></li>
                  <li><a href="#" class="py-2 d-block">Amenities</a></li>
                  <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Privacy</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">Career</a></li>
                  <li><a href="#" class="py-2 d-block">About Us</a></li>
                  <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                  <li><a href="#" class="py-2 d-block">Services</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-3">
                    <ul>
                      <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                      <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                      <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
        </div>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>



</html>