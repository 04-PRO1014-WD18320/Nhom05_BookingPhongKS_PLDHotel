<?php
    session_start(); //bắt đầu session
    $query = "select * from users"; 
    $users =pdo_query($query); 
    // var_dump($users);
    $thongbao="";
    foreach($users as $value){ 
        if(isset($_POST["login"])){
            if(!$_POST["username"] == "" && !$_POST["pass"] == ""){
                if($_POST["username"] == $value["username"] && $_POST["pass"] == $value["password"]){ 
                    $_SESSION["username"] = $_POST["username"]; 
                    // $_SESSION["avatar"] = "./src/images/".$value["picture"];
                    $_SESSION["id"] = $value["role"];
                    $_SESSION["idPerson"] = $value["user_id"];
                    if($_SESSION["id"] ) {
                        header("location:__DIR__ . /../../../admin/index.php");
                        // header("location:./client-view/index.php"); 
                    } else {
                        // header("location:./admin-view/dashboard.php?ctr=dashboard");
                    }
                } else {
                    $thongbao =  "*Nhập sai mật khẩu hoặc tên đăng nhập";
                }
            }
        }
    }
?>