








<div class="container mt-4">
    <div class="row">
        <!-- Bên trái - Chi tiết phòng -->
        <div class="col-md-8">
            <div class="card">
            <?php extract($phong);?>
                <?php
                echo '<div class="card-img-top"><img src="' . $img . '"></div>';?>
                <div class="card-body">
                    <?php
                    echo '<h5 class="card-img-top">'.$room_name.'</h5>';
                    echo '<h5 class="card-img-top">'.$description.'</h5>';
                    echo '<h5 class="card-img-top">'.$room_price.'</h5>';
                ?>
                <button type="button" class="btn btn-primary"  href="index.php?pg=">Đặt ngay</button>
                    </div>
            </div>
        </div>

        <!-- Bên phải - Danh sách phòng -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    
                    <?php
                    foreach ($phong_cungloai as $p) {
                        extract($p);
                        $linkp="index.php?pg=chitietphong&id=".$room_id;
                        echo '<div class="card-img-top"><img src="' . $img . '"></div>';

                        echo '<li><a href="'.$linkp.'">'.$room_name.'</a></li>';
                        echo '<h5 class="card-img-top">'.$description.'</h5>';
                    echo '<h5 class="card-img-top">'.$room_price.'</h5>';

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

