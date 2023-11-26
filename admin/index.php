<?php
include "header.php";
include "../model/pdo.php";
include "../model/phong.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "listdv":
            $sql="SELECT * FROM `service` WHERE 1";
            $listdv=pdo_query($sql);
            include "dichvu/listdv.php";
            break;
        case "listdon":
            $sql="SELECT * FROM `datphong` WHERE 1";
            $listdon=pdo_query($sql);
            include "dondat/listdon.php";
            break;
        case "checkin":
            $bookingId = $_GET["id"];
            $sql = "UPDATE datphong SET checked_in = 1 WHERE datphong_id = $bookingId";
            pdo_execute($sql);
            $sql="SELECT * FROM `datphong` WHERE 1";
            $listdon=pdo_query($sql);
            include "dondat/listdon.php";
            break;
        case "checkout":
            $bookingId = $_GET["id"];
            $sql = "UPDATE datphong SET checked_in = 4 WHERE datphong_id = $bookingId";
            pdo_execute($sql);
            $sql="SELECT * FROM `datphong` WHERE 1";
            $listdon=pdo_query($sql);
            $sql="SELECT * FROM `service` WHERE 1";
            $listdv=pdo_query($sql);
            include "dondat/checkout_form.php";
            break;
        case "cancel":
            $bookingId = $_GET["id"];
            $sql = "UPDATE datphong SET checked_in = 3 WHERE datphong_id = $bookingId";
            pdo_execute($sql);
            $sql="SELECT * FROM `datphong` WHERE 1";
            $listdon=pdo_query($sql);
            include "dondat/listdon.php";
            break;
        case "dsphong":
            $listphong=loadall_phong($keyw="",$type_id=0);
            include "phong/danhsachphong.php";
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
                    $img_destination = './upload/' . $img_name;
                    move_uploaded_file($img_tmp_name, $img_destination);
    
                    insert_phong($room_name,$img_destination,$description,$room_price,$type_id,$Trangthai);
                    $thongbao="Thêm thành công";
                }
            }
            $sql="SELECT * FROM type_room WHERE 1";
            $listdanhmuc=  pdo_query($sql);
            include "phong/add.php";
            break;

        case "xoaphong":
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_phong($_GET['id']); 
            }
            $listphong=loadall_phong();
            include "phong/danhsachphong.php";                     
            break;
        // case "adddm":
        //     // Kiểm tra khi nhấn vào submit
        //     if(isset($_POST['themmoi'])&&($_POST['themmoi']))
        //     {
        //         $type_name=$_POST['type_name'];
        //         $max_people=$_POST['max_people'];
        //         $max_bed=$_POST['max_bed'];
        //         $sql="insert into type_room(type_name, max_people, max_bed) values('$type_name', '$max_people', '$max_bed')";
        //         pdo_execute($sql);
        //         $thongbao="Thêm thành công";
        //     }
        //     else{
        //         echo"không có gì";
        //     }
        //     include "admin/danhmuc/add.php";
        //     break;
        case "listtk":
            $listtk=loadall_taikhoan();
            include "taikhoan/listtk.php";
            break;
        case "xoatk":
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_taikhoan($_GET['id']); 
            }
            $listtk=loadall_taikhoan();
            include "taikhoan/listtk.php";
            break;

        case "suaphong":
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $rooms=loadone_phong($_GET['id']);
            }
            $sql="SELECT * FROM type_room WHERE 1";
            $listdanhmuc=  pdo_query($sql);
            include "phong/update.php";
            break; 

        case "updatephong":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy giá trị từ form
                $room_id = $_POST['room_id'];
                $room_name = $_POST['room_name'];
                $description = $_POST['description'];
                $room_price = $_POST['room_price'];
                $type_id = $_POST['type_id'];
                $trangthai = $_POST['Trangthai'];
                $oldimg = $_POST["oldimg"];
                // Xử lý ảnh nếu có được chọn
                if (!empty($_FILES['img']['tmp_name']))  {
                    $upload_dir = "upload/"; // Thư mục lưu trữ ảnh
                    $img_path = $upload_dir . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
                    $img=$img_path;
                }
                else{
                    $img=$oldimg;
                }
                $sql="UPDATE rooms SET 
                room_name = '$room_name', 
                img = '$img', 
                description = '$description', 
                room_price = '$room_price', 
                type_id = '$type_id', 
                Trangthai = '$trangthai' 
                WHERE room_id = '$room_id'";
                pdo_execute($sql);
                $thongbao ="Cập nhật thành công";
            
            }
            $listphong=loadall_phong($keyw="",$type_id=0);
            include "phong/danhsachphong.php";
            break; 
            case "xoaphong":
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_phong($_GET['id']); 
                }
                $listphong=loadall_phong();
                include "phong/danhsachphong.php";                     
                break;
        case "listdm":
            $listdm=loadall_dm($keyw="",$type_id=0);
            include "danhmuc/listdm.php";
            break;
        case 'adddm':
                // Kiểm tra khi nhấn vào submit
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $type_name=$_POST['type_name'];
                    $img=$_FILES['img']['name'];
                    $max_people=$_POST['max_people'];
                    $max_bed=$_POST['max_bed'];
                    $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    
                } else {
    
                }
                insert_danhmuc($type_name,$img,$max_people,$max_bed);
                $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

                case "suadm":
                    if(isset($_GET['id']) && ($_GET['id']>0))
                    {
                        $dm = loadone_dm($_GET['id']);
                    }
                    $sql ="SELECT * FROM type_room WHERE id=".$_GET['id'];
        case "updatedm":
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $dm=loadone_dm($_GET['id']);
                        $type_id=$_POST['type_id'];
                        $type_name=$_POST['type_name'];
                        $img=$_FILES['img']['name'];
                        $max_people=$_POST['max_people'];
                        $max_bed=$_POST['max_bed'];
                        $oldimg = $_POST["oldimg"];
                    // Xử lý ảnh nếu có được chọn
                    if (!empty($_FILES['img']['tmp_name']))  {
                        $upload_dir = "../upload/"; // Thư mục lưu trữ ảnh
                        $img_path = $upload_dir . basename($_FILES['img']['name']);
                        move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
                        $img=$img_path;
                    }
                    else{
                        $img=$oldimg;
                    }
                    $sql="UPDATE type_room SET 
                    type_name = '$type_name', 
                    img = '$img', 
                    -- max_people = '$max_people', 
                    -- max_bed = '$max_bed', 
                    WHERE type_id = '$type_id'";
                        pdo_execute($sql);
                        $thongbao="Update thành công";
                    }
                   $listdm=loadall_dm();
                include "danhmuc/update.php";
                break;

                case "xoadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_dm($_GET['id']); 
                    }
                    $listdm=loadall_dm();
                    include "danhmuc/listdm.php";                     
                    break;
            }

     } else{
        include "home.php";
    }
    include "footer.php";
?>