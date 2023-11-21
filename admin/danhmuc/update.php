
<form action="index.php?act=updatedm"  method="post" enctype="multipart/form-data">
<div class="mb-3">
    <label  class="form-label">Mã danh mục</label>
    <input type="text" class="form-control" name="type_id" aria-describedby="emailHelp" disabled>
</div>
<div class="mb-3">
    <label  class="form-label">Tên phòng</label>
    <input type="text" class="form-control" name="type_name" aria-describedby="emailHelp" value="<?php $dm=['type_name']?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Hình ảnh</label>
    <input type="file" class="form-control" name="img" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label  class="form-label">Số người</label>
    <input type="text" class="form-control" name="max_people" aria-describedby="emailHelp" value="<?php $dm=['type_name']?>" disabled>
  </div>
  <div class="mb-3">
    <label  class="form-label">Số giường</label>
    <input type="text" class="form-control" name="max_bed" aria-describedby="emailHelp" value="<?php $dm=['type_name']?>" disabled>
  </div>

  <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
  <div>
    <?php
    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </div>
</form>