<?php
     include "model/pdo.php";
     include "model/danhmuc.php";
     include "model/phong.php";
     include "model/taikhoan.php";
     include "view/header.php";
     $listphong=loadall_phong($keyw="",$type_id=0);




if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        case "dsphong":
            $listphong=loadall_phong($keyw="",$type_id=0);
            include "phong/danhsachphong.php";
            break;       
        }
    }
else{
    $listphong=loadall_phong($keyw="",$type_id=0);

    include "view/home.php";
}
include "view/footer.php";