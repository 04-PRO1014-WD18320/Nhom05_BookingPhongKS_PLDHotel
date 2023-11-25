<?php
include "header.php";
include "../model/pdo.php";
include "../model/phong.php";
include "../model/danhmuc.php";

if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
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
                    $img_destination = '../upload/' . $img_name;
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
                    $max_people=$_POST['max_people'];
                    $img = $_FILES['img'];
                    $max_bed=$_POST['max_bed'];
                    $img = $_FILES['img'];
                    $img_name = $img['name'];
                    $img_tmp_name = $img['tmp_name'];
                    $img_error = $img['error'];          
                    if ($img_error === 0) {
                        // Di chuyển tệp tạm thời đến một địa chỉ cụ thể trên máy chủ
                        $img_destination = '../upload/' . $img_name;
                        move_uploaded_file($img_tmp_name, $img_destination);
                insert_danhmuc($type_name,$img_destination,$max_people,$max_bed);
                $thongbao="Thêm thành công";
                }
            }
                $sql ="SELECT * FROM type_room WHERE 1";
                $listdanhmuc= pdo_query($sql);
                include "danhmuc/add.php";
                break;

                case "suadm":
                    if(isset($_GET['id']) && ($_GET['id']>0))
                    {
                        $type_room = loadone_dm($_GET['id']);
                    }
                    include "danhmuc/update.php";
                    break;

                case "updatedm":
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $type_id=$_POST['type_id'];
                        $type_name=$_POST['type_name'];
                        $max_people=$_POST['max_people'];
                        $max_bed=$_POST['max_bed'];
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
                    if (isset($type_id)) {
                        $sql = "UPDATE type_room SET 
                                type_name = '$type_name', 
                                img = '$img', 
                                max_people ='$max_people',
                                max_bed ='$max_bed'
                                WHERE type_id = '$type_id'";
                        pdo_execute($sql);
                        $thongbao = "Update thành công";
                    
                        // Ghi đè giá trị của $type_id sau khi thực hiện câu lệnh SQL
                        $type_id = isset($type_id) ? $type_id : 0;  // Nếu $type_id chưa được đặt, đặt nó thành 0
                    }}
                   $listdm=loadall_dm($keyw="",$type_id=0);
                include "danhmuc/listdm.php";
                break;

                case "xoadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_dm($_GET['id']); 
                    }
                    $listdm=loadall_dm();
                    include "danhmuc/listdm.php";                     
                    break;
                    
                case "chitietphong":
                    if(isset($_GET['id']) && ($_GET['id'])>0)
                    {
                     $id = $_GET['id'];
                    $phong=loadone_phong($id);
                    extract($phong);
                    $phong_cungloai=load_phong_cungdm($id,$type_id);
                    include "view/chitietphong.php";
                     }
                    else{
                     include "admin/home.php";
                    }
                     break;
            }
     }
     else{
        include "home.php";
    }
    include "footer.php";
?>