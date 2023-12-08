<?php
session_start();




// Hàm kiểm tra đăng nhập
function login($username, $password) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        return true;
    } else {
        return false;
    }
}

// Hàm kiểm tra quyền truy cập
function checkRole($allowedRoles) {
    if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
        header('Location: login.php');
        exit();
    }

    $userRole = $_SESSION['role'];

    if (!in_array($userRole, $allowedRoles)) {
        echo 'Bạn không có quyền truy cập vào trang này.';
        exit();
    }
}
?>