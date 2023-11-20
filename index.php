<?php
include "view/header.php";
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
            case "suaphong":
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $rooms=loadone_phong($_GET['id']);
                }
                $sql="SELECT * FROM type_room WHERE 1";
                $listdanhmuc=  pdo_query($sql);
                include "admin/phong/update.php";
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
                include "admin/phong/danhsachphong.php";
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
            case 'adddm':
                // Kiểm tra khi nhấn vào submit
                if(isset($_POST['themmoi']) && ($_POST['themmoi']))
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
                $sql="INSERT INTO type_room(type_name,img,max_people,max_bed) VALUES ('$type_name','$img','$max_people','$max_bed')";
                pdo_execute($sql);
                $thongbao="Thêm thành công";
                }
                include "admin/danhmuc/add.php";
                break;
            
                case "updatedm":
                    if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                        $type_id=$_POST['type_id'];
                        $type_name=$_POST['type_name'];
                        $img=$_FILES['img']['name'];
                        $max_people=$_POST['max_people'];
                        $max_bed=$_POST['max_bed'];
                        $target_dir = "../upload/";
                        if($img!=""){
                            $sql = "update type_room set type_name ='".$type_name."',img ='".$img."',max_people ='".$max_people."',max_bed ='".$max_bed."' where id=".$type_id;
                            }
                            else{
                                $sql = "update type_room set type_name ='".$type_name."',max_people ='".$max_people."',max_bed ='".$max_bed."' where id=".$type_id;
                            }
                        pdo_execute($sql);
                        $thongbao="Update thành công";
                        
                    }
                include "admin/danhmuc/update.php";
                break;
            }
                // case "xoadm":
                //     if(isset($_GET['id']) && ($_GET['id']>0)){ 
                //         $sql = "delete from danhmuc where id=".$type_id;
                //         pdo_execute($sql);
                // }
                //     $sql =" select * from type_room order by id desc";
                //     $listdanhmuc = pdo_query($sql);
                //     return $listdanhmuc;
                // include "admin/danhmuc/listdm.php";
                // break;
     }
     else{
        include "view/home.php";
    }
    include "view/footer.php";
?>