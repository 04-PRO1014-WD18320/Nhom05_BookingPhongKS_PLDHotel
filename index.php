<?php
include "view/header.php";
include "model/pdo.php";
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "dsphong":
            $sql="select * from rooms";
            $listphong=pdo_query($sql);
            include "admin/danhsachphong.php";
            break;
        case "themphong":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ các trường nhập
                $room_id = $_POST['room_id'];
                $room_name = $_POST['room_name'];
                $img = $_FILES['img']; // Dữ liệu từ trường tệp tải lên
                $description = $_POST['description'];
                $room_price = $_POST['room_price'];
                $type_id = $_POST['type_id'];
                $Trangthai = $_POST['Trangthai'];
                $sql = "INSERT INTO rooms (room_name, img, description, room_price, type_id, Trangthai) VALUES ($room_name, $img_destination, $description, $room_price, $type_id, $Trangthai)";
                pdo_execute($sql);
                $thongbao="Thêm thành công";
            }
            include "admin/phong/add.php";
            break;
            
        case "dmphong":
            include "admin/danhmuc.php";
            break;
        case "adddm":
            // Kiểm tra khi nhấn vào submit
            if(isset($_POST['themmoi'])&&($_POST['themmoi']))
            {
                $type_name=$_POST['type_name'];
                $max_people=$_POST['max_people'];
                $max_bed=$_POST['max_bed'];
                $sql="insert into type_room(type_name, max_people, max_bed) values('$type_name', '$max_people', '$max_bed')";
                pdo_execute($sql);
                $thongbao="Thêm thành công";
            }
            else{
                echo"không có gì";
            }
            include "admin/danhmuc/add.php";
            break;
        case "updatedm":
            include "admin/danhmuc/update.php";
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>