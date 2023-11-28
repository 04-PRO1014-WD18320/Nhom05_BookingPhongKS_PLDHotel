<?php
                 foreach ($phong as $room){
                    extract($room);
                    $ctphong="index.php?pg=chitietphong&id=".$room_id;
              echo'  <div style="text-align: center;" class="col-md-4">

                    <a href="'.$ctphong.'"><img src="'.$img.'"
                            style="width: 200px; height: 200px;" alt=""></a>
                    <div style="background-color: #d6c08a;" class="text p-3 text-center">
                        <h3 class="mb-3"><a style="color: black;" href="type_id">'.$room_name.'</a></h3>
                        <p><span class="price mr-2">'.$room_price.'</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="Book" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>';
                 }
                ?>