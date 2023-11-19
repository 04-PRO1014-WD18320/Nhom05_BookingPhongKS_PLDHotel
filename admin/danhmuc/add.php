
<form action="index.php?pg=adddm" method="POST">
  <div class="mb-3">
    <label  class="form-label">Tên phòng</label>
    <input type="text" class="form-control" name="type_name" aria-describedby="emailHelp">
  </div>
  <!-- <div class="mb-3">
    <label  class="form-label">Ảnh</label>
    <input type="file" class="form-control" name="img">
  </div> -->
  <div class="mb-3">
    <label  class="form-label">Số người</label>
    <input type="text" class="form-control" name="max_people" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label  class="form-label">Số giường</label>
    <input type="text" class="form-control" name="max_bed" aria-describedby="emailHelp">
  </div>

  <button type="submit" name="themmoi" class="btn btn-primary">Submit</button>
  <div>
    <?php
    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </div>
</form>