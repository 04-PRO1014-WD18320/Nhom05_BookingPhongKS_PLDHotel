<?php
    session_start(); //bắt đầu session để lấy thông tin
    session_destroy();//xóa toàn bộ dữ liệu được lưu trữ trong session
    header("location:../view/taikhoan/dangnhap.php");//điều hướng về trang login.php
?>