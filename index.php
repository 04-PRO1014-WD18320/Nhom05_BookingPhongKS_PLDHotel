<?php
//  session_start(); // Bắt đầu phiên
include "model/pdo.php";
include "./controller/login.php";

include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/phong.php";
include "view/header.php";
$listphong=loadall_phong($keyw="",$type_id=0);
$dsdm=loadall_dm($keyw="",$type_id=0);
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "datphong":
            $allowedRoles=[1,2,3];
            checkRole($allowedRoles);
            // if (!isset($_SESSION['idPerson'])) {
                // Nếu người dùng chưa đăng nhập, chuyển hướng hoặc hiển thị thông báo
                // header('Location:view/taikhoan/dangnhap.php'); 
                // echo '<script>window.location.replace("view/taikhoan/dangnhap.php");</script>';// Chuyển hướng đến trang đăng nhập
                // exit;
            // }
            // else{
            $user=loadone_taikhoan($_SESSION["idPerson"]);
            $phong=loadone_phong($_GET['id']);
            $sql="SELECT * FROM type_room WHERE 1";
            $listdanhmuc=  pdo_query($sql);
           include "view/datphong/datphong.php";
        // }
        break;
        case "booking":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // room_id
                $payment_method=$_POST['payment_method'];
                $customerName= $_POST['ten'];
                $id_number= $_POST['idNumber'];
                $email= $_POST['email'];
                $checkinDate= $_POST['ngay_den'];
                $checkoutDate=$_POST['ngay_di'];
                $note=$_POST['ghi_chu'];
                $gia=$_POST['tong_gia'];
                $room_id=$_POST['id'];
                $user_id=$_SESSION["idPerson"];
              
                $sqlktra = "SELECT 1 FROM datphong  
                            INNER JOIN rooms ON rooms.room_id = datphong.room_id
                            WHERE rooms.room_id = $room_id and checked_in != 3 
                                AND (
                                    ('$checkinDate' BETWEEN datphong.checkin_date AND datphong.checkout_date)
                                    OR ('$checkoutDate' BETWEEN datphong.checkin_date AND datphong.checkout_date)
                                    OR (datphong.checkin_date IS NULL AND datphong.checkout_date IS NULL)
                                )";
                $ktra = pdo_query($sqlktra);
                
                if (!empty($ktra)) {
                    // Sử dụng JavaScript để hiển thị thông báo trên trang web
                    echo '<script>alert("Phòng đã được đặt trong thời gian bạn chọn.");</script>';
                    echo '<script>window.history.back();</script>';
                }
              
                
                else{
                    $sql = "INSERT INTO datphong ( room_id,user_id,customer_name,id_number, email, checkin_date, checkout_date,note) 
                    VALUES ('$room_id',' $user_id','$customerName','$id_number','$email', '$checkinDate', '$checkoutDate','$note')";
                    pdo_execute($sql);
                    $ngayHienTai = date("Y-m-d");
                    
                    // var_dump($booking_id);
                    if( $ngayHienTai == $checkinDate){
                        $sql1="UPDATE rooms
                        SET TrangThai = '2'
                        WHERE room_id =". $room_id;
                        pdo_execute($sql1);
                    }
                
                    $_SESSION['confirmation_info'] = array(
                        'customer_name' => $customerName,
                        'id_number' => $id_number,
                        'email' => $email,
                        'checkin_date' => $checkinDate,
                        'checkout_date' => $checkoutDate,
                        'note' => $note,
                        'gia'=> $gia
                    );
                  
                if( $payment_method==1){
                    echo '<script>window.location.replace("view/datphong/xulythanhtoan.php?gia=' . $gia . '");</script>';
                }
                }
                }
                $sqlid = "SELECT MAX(datphong_id) FROM datphong";
                $booking_id = pdo_query_value($sqlid);
                include "view/datphong/xacnhan.php";
                if(isset($_GET['partnerCode'])) {
                    // Kiểm tra xem đã thực hiện thao tác chèn hay chưa
                    if(!isset($_SESSION['payment_inserted'])) {
                        $user_id = $_SESSION["idPerson"];
                        $amount = $_GET['amount'];
                        $paymentOption = $_GET['paymentOption'];
                
                        // Thực hiện thao tác chèn
                        $sql = "INSERT INTO payments (user_id,booking_id,amount_paid) 
                                VALUES ('$user_id','$booking_id','$amount')";
                        pdo_execute($sql);
                
                        // Đánh dấu rằng đã thực hiện thao tác chèn
                        $_SESSION['payment_inserted'] = true;
                    }
                
                    // Dừng xử lý khi load lại trang
                    die();
                }
                
                // Xóa đánh dấu khi cần thực hiện lại thao tác chèn (chẳng hạn, sau khi thực hiện xong các bước xử lý khác)
                unset($_SESSION['payment_inserted']);
                
                break;
        case "danhsach":
            $iddm=$_GET['iddm'];
            $sql="select * from rooms where type_id=".$iddm;
            $phong=pdo_query($sql);
            include "view/danhsach.php";
            break;

       
        case 'chitietphong':
            // xem chi tiết sản phẩm
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $phong =loadone_phong($id);
            extract($phong);
            $listp = load_phong_cungdm($id,$type_id);
            $sql = "SELECT `checkin_date`, `checkout_date` FROM `datphong` where room_id=". $_GET['id'];;
            $ngay=pdo_query($sql);
            // var_dump($ngay);
            }
            include "view/chitietphong.php";
            break;
        case 'timphong':
            $danh_muc_phong= $_POST['roomType'];
            $so_nguoi=$_POST['guests'];
            $ngay_checkin=$_POST['checkin'];
            $ngay_checkout=$_POST['checkout'];
            $sql = "SELECT rooms.img, rooms.room_id, rooms.room_name, rooms.room_price FROM rooms
            INNER JOIN type_room ON rooms.type_id = type_room.type_id
            WHERE type_room.type_id= '$danh_muc_phong'
            AND type_room.max_people >= $so_nguoi
            AND NOT EXISTS (
            SELECT 1 FROM datphong
            WHERE rooms.room_id = datphong.room_id
               and checked_in!=3 and checked_in!=4
        
                and(
                  ('$ngay_checkin' BETWEEN datphong.checkin_date AND datphong.checkout_date)
                  OR ('$ngay_checkout' BETWEEN datphong.checkin_date AND datphong.checkout_date)
                  OR (datphong.checkin_date IS NULL AND datphong.checkout_date IS NULL)
                )
          )
          ";
    // echo($sql);
// Thực hiện câu truy vấn...
           $phong=pdo_query($sql);
        include "view/danhsach.php";
        break;
        case'lichsudon':
            $allowedRoles=[1,2,3];
            checkRole($allowedRoles);
            $user_id=$_SESSION["idPerson"];
            $sql = "SELECT * FROM `datphong` where user_id=". $user_id;
            $don=pdo_query($sql);
            include "view/lichsudon.php";
            break;
    }
}
else{
include "view/home.php";
}
include "view/footer.php";
?>