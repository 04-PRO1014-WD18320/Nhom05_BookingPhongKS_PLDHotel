<?php
     include "model/pdo.php";
     include "model/danhmuc.php";
     include "model/phong.php";
     include "model/taikhoan.php";
     



include "view/header.php";
if(isset($_GET['pg'])&&($_GET['pg']!="")){
    $pg=$_GET['pg'];
    switch($pg){
        
            break;
        }
    }
else{
    include "view/home.php";
}
include "view/footer.php";