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
            
        case 'dmphong':
            $sql="select * from type_room";
            $listdm=pdo_query($sql);
            include "admin/danhmuc/listdm.php";
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

    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>