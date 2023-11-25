<main>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <!-- Input Check-in -->
                
                <div class="col-md-3">
                <label for="checkin">Check-in:</label>
                <input type="text" id="checkin" class="datepicker" readonly>
                    </div>
                <!-- Input Check-out -->
                <div class="col-md-3">
                <label for="checkout">Check-out:</label>
                <input type="text" id="checkout" class="datepicker" readonly>
                    </div>
                <script>
                    $(document).ready(function () {
                        var checkinDate;

                        // Kích hoạt datepicker cho input check-in
                        $("#checkin").datepicker({
                            onSelect: function (selectedDate) {
                                checkinDate = new Date(selectedDate);
                                $("#checkout").datepicker("option", "minDate", checkinDate); // Đặt ngày tối thiểu cho ngày check-out
                                $("#checkin").val(selectedDate);
                            }
                        });

                        // Kích hoạt datepicker cho input check-out
                        $("#checkout").datepicker({
                            onSelect: function (selectedDate) {
                                var checkoutDate = new Date(selectedDate);
                                if (checkoutDate < checkinDate) {
                                    alert("Ngày check-out không thể trước ngày check-in!");
                                    $("#checkout").val(""); // Xóa giá trị nếu không hợp lệ
                                } else {
                                    $("#checkout").val(selectedDate);
                                }
                            }
                        });
                    });
                </script>
                
                <div class="col-md-3">
                 <label for="roomType">Thể loại phòng:</label><br>
                 <select id="roomType" class="dropdown" onchange="updateRoomType()">
                     <option value="single">Phòng đơn</option>
                     <option value="double">Phòng đôi</option>
                     <option value="suite">Suite</option>
                 </select>
             </div>
                 <!-- Dropdown Số lượng người -->
                 <div class="col-md-2">
                 <label for="guests">Số lượng người:</label><br>
                 <select id="guests" class="dropdown" onchange="updateGuestCount()">
                     <option value="1">1 người</option>
                     <option value="2">2 người</option>
                     <option value="3">3 người</option>
                     <option value="4">4 người</option>
                 </select>
             </div>
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
                  <div class="col-md-1">
                 <button type="button" class="btn btn-success">Tìm Phòng</button></div>
                <div class="col-md-6" style="margin-top: 30px;">
                    <img src="./img./img1.jpg" class="mx-auto d-block" alt="" width="80%">
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
                    <i style="font-size: 50px; padding-left: 100px; padding-bottom: 10px;" class="fas fa-bell"></i> <br>
                    <p class="h2 text-center">phục vụ 25/7</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 100px; padding-bottom: 10px;" class="fas fa-taxi"></i> <br>
                    <p class="h2 text-center">Đồ ăn ngon</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 100px; padding-bottom: 10px;" class="fas fa-utensils"></i>
                    <br>
                    <p class="h2 text-center">Đưa đón tận nơi</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>
                <div class="col-md-3">
                    <i style="font-size: 50px; padding-left: 100px; padding-bottom: 10px;" class="fas fa-hot-tub"></i>
                    <br>
                    <p class="h2 text-center">Spa</p>
                    <p style="text-align: center;" class="text-muted">A small river named Duden flows by their place and
                        supplies.</p>
                </div>

                <div class="col-md-12" style="margin-top: 60px;margin-bottom: 20px;">
                    <h2 style="text-align: center;">PHÒNG</h2>
                </div>
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 200px;">
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>  
                <div style="text-align: center;" class="col-md-4">

                    <a href="#"><img src="./img/view1.jpg"
                            style="width: 100%; height: 80%;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Kết thúc phần main -->