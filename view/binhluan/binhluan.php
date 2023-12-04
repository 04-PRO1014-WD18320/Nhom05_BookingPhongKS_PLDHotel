<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

$id = $_REQUEST['room_id'];
$dsbl = loadall_binhluan($room_id);

// Function to check profanity
function isProfanity($comment) {
    // Danh sách từ cấm
    $prohibitedWords = ['dm', 'dcm', 'dcmm', 'vcl'];

    foreach ($prohibitedWords as $word) {
        if (stripos($comment, $word) !== false) {
            return true;
        }
    }
    return false;
}

// Check gửi bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guibinhluan'])) {
    $content = $_POST['content'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];

    // Kiểm tra từ khóa tục tĩu
    if (isProfanity($content)) {
        echo '<p style="color: red;">Ngôn từ không phù hợp không được phép.</p>';
    } else {
        // Thêm bình luận
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaybinhluan = date('h:i:sa d/m/Y');
        insert_binhluan($content, $room_id, $user_id, $ngaybinhluan);

        // Hiển thị thông báo thành công
        echo '<p style="color: green;">Bình luận đã được đăng thành công.</p>';

        // Redirect để tránh việc gửi lại dữ liệu khi người dùng làm mới trang
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="row mb">
        <div class="boxtitle">BÌNH LUẬN</div>
        <div class="boxcontent2 binhluan">
            <table>
                <?php foreach ($dsbl as $bl) : ?>
                    <tr>
                        <td><?= $bl['content'] ?></td>
                        <td><?= $bl['room_id'] ?></td>
                        <td><?= $bl['user_id'] ?></td>
                        <td><?= $bl['feedback_date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="boxfooter binhluan">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="text" name="content" placeholder="Bình luận">
                <input type="submit" name="guibinhluan" value="Gửi">
            </form>
        </div>
    </div>
</body>

</html>
