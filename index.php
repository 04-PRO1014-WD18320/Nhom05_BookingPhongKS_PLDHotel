<?php
 session_start(); // Bắt đầu phiên
include "view/header.php";
include "model/pdo.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/phong.php";
$listphong=loadall_phong($keyw="",$type_id=0);
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "datphong":
            if (!isset($_SESSION['idPerson'])) {
                // Nếu người dùng chưa đăng nhập, chuyển hướng hoặc hiển thị thông báo
                // header('Location:view/taikhoan/dangnhap.php'); 
                echo '<script>window.location.replace("view/taikhoan/dangnhap.php");</script>';// Chuyển hướng đến trang đăng nhập
                exit;
            }
            else{
            $user=loadone_taikhoan($_SESSION["idPerson"]);
            $phong=loadone_phong($_GET['id']);
            $sql="SELECT * FROM type_room WHERE 1";
            $listdanhmuc=  pdo_query($sql);
           include "view/datphong/datphong.php";}
        break;
        case "booking":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // room_id
                $customerName= $_POST['ten'];
                $id_number= $_POST['idNumber'];
                $email= $_POST['email'];
                $checkinDate= $_POST['ngay_den'];
                $checkoutDate=$_POST['ngay_di'];
                $note=$_POST['ghi_chu'];
                $gia=$_POST['tong_gia'];
                $room_id=$_POST['id'];
                $sql = "INSERT INTO datphong ( room_id,customer_name,id_number, email, checkin_date, checkout_date,note) 
                VALUES ('$room_id','$customerName','$id_number','$email', '$checkinDate', '$checkoutDate','$note')";
                pdo_execute($sql);

                $_SESSION['confirmation_info'] = array(
                    'customer_name' => $customerName,
                    'id_number' => $id_number,
                    'email' => $email,
                    'checkin_date' => $checkinDate,
                    'checkout_date' => $checkoutDate,
                    'note' => $note,
                    'gia'=> $gia
                );
            
            }
            include "view/datphong/xacnhan.php";
            break;
        case "booked":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // room_id
                $customerName= $_POST['ten'];
                $id_number= $_POST['idNumber'];
                $email= $_POST['email'];
                $checkinDate= $_POST['ngay_den'];
                $checkoutDate=$_POST['ngay_di'];
                $note=$_POST['ghi_chu'];
            $sql = "INSERT INTO datphong ( customer_name,id_number, email, checkin_date, checkout_date,note) 
            VALUES ( '$customerName','$id_number','$email', '$checkinDate', '$checkoutDate','$note')";
             pdo_execute($sql);
            $thongbao="đặt phòng thành công";
            }
            include "view/datphong/xacnhan.php";
        break; 
        }
        case 'chitietphong':
            // xem chi tiết sản phẩm
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $phong =loadone_phong($id);
                extract($phong);
                $listp = load_phong_cungdm($id,$type_id);
                include "view/chitietphong.php";
            } else {
                include "view/home.php";
            }
            break;

        }
else{
    include "view/home.php";
}
include "view/footer.php";
?>