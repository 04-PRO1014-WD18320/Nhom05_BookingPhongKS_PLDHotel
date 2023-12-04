<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$id = $_REQUEST['room_id'];

$dsbl = loadall_binhluan($room_id);

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
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo    '<tr><td>' . $content . '</td>';
                    echo    '<td>' . $room_id . '</td>';
                    echo    '<td>' . $user_id . '</td>';
                    echo    '<td>' . $feedback_date . '</td></tr>';
                }

                ?>
            </table>
        </div>
        <div class="boxfooter binhluan">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="text" name="noidung" placeholder="Bình luận">
                <input type="submit" name="guibinhluan" value="Gửi">
            </form>
        </div>

        <?php
        // check gửi bình luận
        if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
            $content = $_POST['content'];
            $room_id = $_POST['room_id'];
           
            $user_id = $_POST['user_id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($content, $room_id, $user_id, $feedback_date);
            header("location:" . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>

</html>