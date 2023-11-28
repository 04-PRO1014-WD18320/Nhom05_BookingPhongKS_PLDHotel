








    <div class="container mt-4">
    <div class="row">
        <!-- Bên trái - Chi tiết phòng -->
<div class="col-md-8">
            <div class="card">
            <?php extract($phong);?>
                <?php
                echo '<div class="card-img-top"><img src="' . $img . '"></div>';?>
                <div class="card-body">
                    <?php
                    echo '<h5 class="card-img-top">'.$room_name.'</h5>';
                    echo '<h5 class="card-img-top">'.$description.'</h5>';
                    echo '<h5 class="card-img-top">'.$room_price.'</h5>';
                ?>
                <button type="button" class="btn btn-primary"  href="index.php?pg=">Đặt ngay</button>
                    </div>
            </div>
        </div>

        <!-- Bên phải - Danh sách phòng -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    
                    <?php
                    foreach ($listp as $p) {
                        extract($p);
                        $linkp="index.php?pg=chitietphong&id=".$room_id;
                        echo '<div class="card-img-top"><img src="' . $img . '"></div>';
                        echo '<li><a href="'.$linkp.'">'.$room_name.'</a></li>';
                        echo '<h5 class="card-img-top">'.$description.'</h5>';
                    echo '<h5 class="card-img-top">'.$room_price.'</h5>';

                    }
                    ?>
                </a>
                <!-- Thêm các sản phẩm cùng loại khác tương tự -->
            </div>
        </div>
    </div>
</div>









