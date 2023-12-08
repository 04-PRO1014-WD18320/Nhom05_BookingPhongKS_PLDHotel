<main>
<div class="container" style="margin-top: 30px;">

<form action="index.php?pg=timphong" method="post">
<div class="row">
    
          
                <!-- Input Check-in -->
                <div class="col-md-3">
                    <label for="checkin">Check-in:</label>
                    <input type="date" id="checkin" name="checkin" class="form-control" required>
                </div>

                <!-- Input Check-out -->
                <div class="col-md-3">
                    <label for="checkout">Check-out:</label>
                    <input type="date" id="checkout" name="checkout" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="roomType">Thể loại phòng:</label><br>
                    <select id="roomType" name="roomType" class="form-control" onchange="updateRoomType()" required>
                    <option value="">chọn loại phòng</option>
                        <?php 
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            echo '<option value="'. $type_id .'">'.$type_name.'</option>';
                        }
                        ?> 
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="guests">Số lượng người:</label><br>
                    <select id="guests" name="guests" class="form-control" onchange="updateGuestCount()" required>
                    <option value="0">chọn số người</option>
                        <option value="1">1 người</option>
                        <option value="2">2 người</option>
                        <option value="3">3 người</option>
                        <option value="4">4 người</option>
                    </select>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="btn btn-success">Tìm Phòng</button>
                </div>
          
                
    </form>
                <div class="col-md-6" style="margin-top: 30px;">
                    <img src="/Nhom05_BookingPhongKS_PLDHotel/img/img1.jpg" class="mx-auto d-block" alt="" width="80%">
                </div>
                <div class="col-md-6" style="margin-bottom: 40px;">

                    <h1 style="margin-top: 65px; margin-bottom: 30px;">Chào mừng quý khách đến với khách sạn chúng tôi!
                    </h1>
                    <p style=" margin: auto;" class="text-muted">
                        Khách sạn PLD_Hotel, với danh tiếng lâu dài và dịch vụ chất lượng, là một địa điểm nghỉ dưỡng
                        tuyệt vời tại nhiều thành phố trên cả nước Việt Nam. Tọa lạc ở vị trí đắc địa, PLD_Hotel thường
                        mang lại trải nghiệm tuyệt vời cho du khách với tiện ích hiện đại và không gian ấm cúng.
                        <br>
                        Với một loạt các loại phòng nghỉ từ Standard đến Suites, PLD_Hotel đáp ứng đa dạng nhu cầu của
                        khách hàng. Phòng được thiết kế sang trọng, mang đến không gian thoải mái và tiện nghi hiện đại,
                        là nơi lý tưởng để thư giãn sau một ngày dài thăm thú các địa điểm đẹp và thú vị trong khu vực.
                    </p>
                    <ul style="list-style: none; display: flex;margin-top: 10px;">
                        <li style="padding-left: 10px;"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li style="padding-left: 10px;"><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                        <li style="padding-left: 10px;"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li style="padding-left: 10px;"><a href="#"></a></li>
                    </ul>
                </div>


                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 130px; padding-bottom: 10px;" class="fas fa-bell"></i> <br>
                    <p class="h2 text-center">phục vụ 25/7</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 130px; padding-bottom: 10px;" class="fas fa-taxi"></i> <br>
                    <p class="h2 text-center">Đồ ăn ngon</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 130px; padding-bottom: 10px;" class="fas fa-utensils"></i>
                    <br>
                    <p class="h2 text-center">Đưa đón tận nơi</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 130px; padding-bottom: 10px;" class="fas fa-hot-tub"></i>
                    <br>
                    <p class="h2 text-center">Spa</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>

                <div class="col-md-12" style="margin-top: 60px;margin-bottom: 20px;">
                    <h2 style="text-align: center;">PHÒNG</h2>
                </div>
                <div class="container mt-4">

                <div class="dropdown" style="padding-bottom:30px;">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Danh mục
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php 
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    
                                    $linkdm = "index.php?pg=danhsach&iddm=".$type_id; 
                                    
                                    echo '
                                        <li><a class="dropdown-item" href="'.$linkdm.'">'.$type_name.'</a></li>
                                    ';
                                }
                            ?>
                    <!-- <li><a class="dropdown-item" href="#">Mục 2</a></li>
                    <li><a class="dropdown-item" href="#">Mục 3</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Mục khác</a></li> -->
                    </ul>
                </div>
                </div>
                <?php
               
                 foreach ($listphong as $room){
                  
                    extract($room);
                    $img_path="upload/".$img;
                    $ctphong="index.php?pg=chitietphong&id=".$room_id;
                    $datphong="index.php?pg=datphong&id=".$room_id;
                    // if($Trangthai==2){
                    //     $btn='<span
                    //     class="icon-long-arrow-right"style="display: inline-block; background-color: red; color: white; padding: 10px 20px; border-radius: 5px;">Hết phòng</span>';
                    // }
                    // else{
                        $btn='<a href="'.$datphong.'" style="display: inline-block; padding: 10px 20px; background-color: #3498db;
                         color: #ffffff; text-decoration: none; border-radius: 5px;
                         transition: background-color 0.3s ease;"><span style="margin-left: 5px;">Book Now</span></a>';
                    // }
              echo'  <div style="text-align: center;padding: 10px;" class="col-md-4">

                    <a href="'.$ctphong.'"><img src="'.$img_path.'"
                            style="width: 100%; height: 300px;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black; text-decoration:none; href="type_id">'.$room_name.'</a></h3>
                        <p><span class="price mr-2">'.$room_price.'</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1">'.$btn.'</p>
                    </div>
                </div>';
                 }
                ?>
            </div>
           




        </div>
        </div>
        </div>
    </main>

    <!-- Kết thúc phần main -->
    <script>
        // Lấy ngày hôm nay
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;

        // Đặt giá trị tối thiểu cho ngày check-in là ngày hôm nay
        document.getElementById("checkin").setAttribute("min", today);

        // Đặt giá trị tối thiểu cho ngày check-out là ngày hôm nay
        document.getElementById("checkout").setAttribute("min", today);
    </script>
                <!-- Các ô nhập liệu để lưu giá trị đã chọn -->
                 <!-- <input type="text" id="selectedRoomType" readonly>
                 <input type="text" id="selectedGuestCount" readonly> -->
             
                 <script>
                     // Hàm được gọi khi giá trị thể loại phòng thay đổi
                     function updateRoomType() {
                         var roomType = document.getElementById("roomType");
                         var selectedRoomType = roomType.options[roomType.selectedIndex].text;
                         document.getElementById("selectedRoomType").value = selectedRoomType;
                     }
             
                     // Hàm được gọi khi giá trị số lượng người thay đổi
                     function updateGuestCount() {
                         var guests = document.getElementById("guests");
                         var selectedGuestCount = guests.options[guests.selectedIndex].text;
                         document.getElementById("selectedGuestCount").value = selectedGuestCount;
                     }
                 </script>