<?php  // Bắt đầu phiên

?>
<form action="index.php?pg=booking" id="bookingForm" method="post" class="container mt-5">
    <input type="hidden" name="price" value="<?=$phong['room_price'];?>" id="price">
    <div class="form-group">
        <label for="ten">Họ và Tên:</label>
        <input type="text" id="ten" name="ten" class="form-control"value="<?=$user['full_name']?>" required>
    </div>
    <div class="form-group">
        <label for="idNumber">Số Căn Cước Công Dân:</label>
        <input type="text" id="idNumber" name="idNumber" class="form-control" value="<?=$user['CCCD_id']?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?=$user['email']?>" required>
    </div>
    <div class="form-group">
        <label for="ten">Tên phòng</label>
        <input type="text" id="ten" name="ten" class="form-control"value="<?=$phong['room_name']?>" required>
        <input type="hidden" name="id" value="<?=$phong['room_id']?>">
    </div>
    <div class="form-group">
        <label for="ngay_den">Ngày Đến:</label>
        <input type="date" id="ngay_den" name="ngay_den" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="ngay_di">Ngày Đi:</label>
        <input type="date" id="ngay_di" name="ngay_di" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ghi_chu">Ghi Chú(nếu có):</label>
        <textarea id="ghi_chu" name="ghi_chu" rows="4" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="tong_gia">Tổng Giá:</label>
        <input type="text" id="tong_gia" name="tong_gia" class="form-control" value="" readonly>
    </div>
    <!-- <div class="form-group">
        <label for="so_nguoi">Số Người:</label>
        <input type="number" id="so_nguoi" name="so_nguoi" class="form-control" required>
    </div> -->

    <div class="form-group">
    <label for="phuong_thuc">Phương thức thanh toán:</label>
    <select id="phuong_thuc" name="payment_method" class="form-control" required>
        <option value="" disabled selected hidden>Chọn phương thức thanh toán</option>
        <option value="1">ATM momo</option>
        <option value="2">Tiền mặt</option>
    </select>
</div>
        <?php 
        // foreach($listdanhmuc as $danhmuc){
        // extract($danhmuc);
        // echo '<option value="'. $type_id .'">'.$type_name.'</option>';
        // }
        ?> 
		<!-- </select> -->
            <!-- <option value="phong_don">Phòng Đơn</option>
            <option value="phong_doi">Phòng Đôi</option> -->
            <!-- Thêm các loại phòng khác nếu cần -->
        <!-- </select> -->
   
            <br>
    <button type="submit" class="btn btn-primary" name="payUrl">Đặt Phòng</button>
</form>
<script>
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
        var ngayDen = new Date(document.getElementById('ngay_den').value);
        var ngayDi = new Date(document.getElementById('ngay_di').value);

        if (ngayDen > ngayDi) {
            alert('Ngày đi phải lớn hơn ngày đến.');
            event.preventDefault(); // Ngăn chặn form submit nếu điều kiện không được đáp ứng
        }
    });


    // // Gán giá trị mặc định cho ngày nhận phòng và ngày trả phòng
    // const today = new Date().toISOString().split('T')[0];
    // document.getElementById('ngay_den').value = today;
    // document.getElementById('ngay_di').value = today;
    
    function tinhTongGia() {
    var ngayDen = document.getElementById("ngay_den").value;
    var ngayDi = document.getElementById("ngay_di").value;
    var giaphong=document.getElementById("price").value;
    var dateNgayDen = new Date(ngayDen);
    var dateNgayDi = new Date(ngayDi);

    var soNgay = Math.ceil((dateNgayDi - dateNgayDen) / (1000 * 60 * 60 * 24));
    var giaMoiNgay = 100;
    var tongGia = soNgay * parseInt(giaphong);

    // Thiết lập giá trị của trường input hidden
    document.getElementById("tong_gia").value = tongGia;

    // (Không cần hiển thị alert ở đây)
}

// Sử dụng sự kiện onchange thay vì onclick
document.getElementById("ngay_den").addEventListener("change", tinhTongGia);
document.getElementById("ngay_di").addEventListener("change", tinhTongGia);
</script>
