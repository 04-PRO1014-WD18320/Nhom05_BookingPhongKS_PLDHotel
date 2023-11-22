<?php
include "header.php";
include "model/pdo.php";
include "model/phong.php";
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "dsphong":
            $listphong=loadall_phong($keyw="",$type_id=0);
            include "admin/phong/danhsachphong.php";
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
                    $img = $_FILES['img'];
                    $img_name = $img['name'];
                    $img_tmp_name = $img['tmp_name'];
                    $img_error = $img['error'];
                    
                    if ($img_error === 0) {
        // Di chuyển tệp tạm thời đến một địa chỉ cụ thể trên máy chủ
                    $img_destination = 'upload/' . $img_name;
                    move_uploaded_file($img_tmp_name, $img_destination);
    
                    insert_phong($room_name,$img_destination,$description,$room_price,$type_id,$Trangthai);
                    $thongbao="Thêm thành công";
                    }
                }
                $sql="SELECT * FROM type_room WHERE 1";
                $listdanhmuc=  pdo_query($sql);
                include "admin/phong/add.php";
                break;
        case "xoaphong":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_phong($_GET['id']); 
                    }
                    $listphong=loadall_phong();
                    include "admin/phong/danhsachphong.php";                     
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
        include "home.php";
    }
    include "footer.php";
?>