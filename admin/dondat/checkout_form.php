<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-out Form</title>
</head>
<body>

<form action="checkout_process.php" method="post">
<div class="container mt-5">
    <form action="checkout_process.php" method="post">
        <div class="form-group">
            <label for="full_name">Họ và Tên:</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Số Điện Thoại:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="room_number">Số Phòng:</label>
            <input type="text" class="form-control" id="room_number" name="room_number" required>
        </div>

        <div class="form-group">
            <label for="checkin_date">Ngày Nhận Phòng:</label>
            <input type="date" class="form-control" id="checkin_date" name="checkin_date" required>
        </div>

        <div class="form-group">
            <label for="checkout_date">Ngày Trả Phòng:</label>
            <input type="date" class="form-control" id="checkout_date" name="checkout_date" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Phương Thức Thanh Toán:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="credit_card">Thẻ Tín Dụng</option>
                <option value="cash">Tiền Mặt</option>
                <!-- Thêm phương thức thanh toán khác nếu cần -->
            </select>
        </div>

        <div class="container mt-5">
    <fieldset>
        <legend>Dịch Vụ Đã Sử Dụng:</legend>
        <?php foreach ($listdv as $dichvu): ?>
            <?php if ($dichvu['service_price'] > 0): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="<?= $dichvu['service_id'] ?>" name="services[]" value="<?= $dichvu['service_id'] ?>">
                    <label class="form-check-label" for="<?= $dichvu['service_id'] ?>">
                        <?= $dichvu['service_name'] ?>
                    </label>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </fieldset>
</div>

        <button type="submit" class="btn btn-primary">Xác Nhận Thanh Toán</button>
    </form>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Hóa Đơn</title>
    <!-- Bạn có thể bao gồm các tệp CSS khác nếu cần -->
</head>
<body>

    <h1>Thanh Toán Hóa Đơn</h1>

    <form action="process_checkout.php" method="post">
        <!-- Danh sách đồ ăn -->
        <label for="food_menu">Chọn Đồ Ăn:</label>
        <select id="food_menu" name="food_menu[]" multiple>
            <option value="pizza">Pizza - $10</option>
            <option value="burger">Burger - $8</option>
            <option value="pasta">Pasta - $12</option>
            <!-- Thêm các mục khác nếu cần -->
        </select>

        <!-- Nhập số lượng -->
        <label for="quantity">Số Lượng:</label>
        <input type="number" id="quantity" name="quantity[]" min="1" value="1">

        <hr>

        <input type="submit" value="Thanh Toán">
    </form>

    <!-- Bạn có thể bao gồm các tệp JS khác nếu cần -->

</body>
</html>

</body>
</html>
