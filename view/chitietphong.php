
<<div class="container mt-4">
    <div class="row">
        <!-- Bên trái - Chi tiết phòng -->
        <div class="col-md-8">
            <div class="card">
                <?php if (is_array($phong)) : ?>
                    <?php extract($phong);
                     $img_path = "upload/" . $img;
                     $datphong="index.php?pg=datphong&id=".$room_id; ?>
                   
                    <img src="<?= $img_path ?>" class="card-img-top" alt="<?= $room_name ?>" style="width: 100%; height: 350px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $room_name ?></h5>
                        <p class="card-text"><?= $description ?></p>
                        <p class="card-text">Giá phòng: <?= $room_price ?> VNĐ</p>
                        <a href="<?= $datphong ?>" class="btn btn-primary">Book Now</a>
                    </div>
                <?php endif; ?>
            </div>
            <iframe src="view/binhluan/binhluan.php?room_id=<?= $id ?>" frameborder="0" width="100%" height="300px"></iframe>
        </div>

        <!-- Bên phải - Danh sách phòng và lịch đặt phòng -->
        <div class="col-md-4">
            <div class="list-group">
                <?php foreach ($listp as $p) : ?>
                    <?php
                    extract($p);
                    $img_path = "upload/" . $img;
                    $linkp = "index.php?pg=chitietphong&id=" . $room_id;
                    ?>
                    <a href="<?= $linkp ?>" class="list-group-item list-group-item-action">
                        <img src="<?= $img_path ?>" alt="<?= $room_name ?>" class="img-fluid">
                        <h5 class="mt-2"><?= $room_name ?></h5>
                        <p>Giá phòng: <?= $room_price ?> VNĐ</p>
                    </a>
                <?php endforeach; ?>
            </div>

            <h1>Lịch đặt phòng</h1>
            <div id="dateInfo"></div>
            <div id="calendar"></div>

            <button id="prevMonthBtn" class="btn btn-secondary">Previous Month</button>
            <button id="nextMonthBtn" class="btn btn-secondary">Next Month</button>
        </div>
    </div>
</div>








   

    <?php
      
        $bookedDates = [];
        function getDatesBetween($start, $end) {
            $dates = [];
            $currentDate = strtotime($start);
        
            while ($currentDate <= strtotime($end)) {
                $dates[] = date('Y-m-d', $currentDate);
                $currentDate = strtotime('+1 day', $currentDate);
            }
        
            return $dates;
        }
        if(!empty($ngay)){
            foreach ($ngay as $key ) {
                extract($key);
                $start=$checkin_date;
                $end=$checkout_date;
                if (!isset($bookedDates)) {
                  $bookedDates = [];
              }
                // Thêm tất cả các ngày giữa checkin_date và checkout_date vào mảng
      $dateRange = getDatesBetween($checkin_date, $checkout_date);
      foreach ($dateRange as $date) {
          if (!in_array($date, $bookedDates)) {
              $bookedDates[] = $date;
          }
      }
              
            }
            // var_dump($bookedDates);
            $bookedDatesJSON = json_encode($bookedDates);
          }
     
    ?>
    

<style>   
 #tong {
        max-width: 1000px;
        margin:  auto; /* Thêm margin và set auto để căn giữa */
        /* background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden; */
    }
td.booked {
            background-color: red;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .booked {
            color: red;
        }<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #calendar {
        max-width: 600px;
        margin-top: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    td {
        cursor: pointer;
        position: relative;
    }

    .booked {
        background-color: #e74c3c;
        color: #fff;
    }

    #dateInfo {
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px 15px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

</style>
    <script src="scripts.js"></script>
</body>
</html>

<script>document.addEventListener("DOMContentLoaded", function () {
      const calendarContainer = document.getElementById("calendar");
            const dateInfoContainer = document.getElementById("dateInfo");
            let currentYear, currentMonth;
            const bookedDates =<?php echo $bookedDatesJSON; ?>; // Example of booked dates

    function generateCalendar(year, month) {
        const daysInMonth = new Date(year, month, 0).getDate();
        const firstDay = new Date(year, month - 1, 1).getDay();

        let table = '<table>';
        table += '<thead>';
        table += '<tr>';
        table += '<th>Sun</th>';
        table += '<th>Mon</th>';
        table += '<th>Tue</th>';
        table += '<th>Wed</th>';
        table += '<th>Thu</th>';
        table += '<th>Fri</th>';
        table += '<th>Sat</th>';
        table += '</tr>';
        table += '</thead>';
        table += '<tbody>';

        let dayCounter = 1;

        for (let i = 0; i < 6; i++) {
            table += '<tr>';

            for (let j = 0; j < 7; j++) {
                if ((i === 0 && j < firstDay) || dayCounter > daysInMonth) {
                    table += '<td></td>';
                } else {
                    const date = `${year}-${String(month).padStart(2, '0')}-${String(dayCounter).padStart(2, '0')}`;
                    table += `<td ${bookedDates.includes(date) ? 'class="booked"' : ''}>${dayCounter}</td>`;
                    dayCounter++;
                }
            }

            table += '</tr>';
        }

        table += '</tbody>';
        table += '</table>';

        return table;
    }
   
    function updateCalendar() {
                calendarContainer.innerHTML = generateCalendar(currentYear, currentMonth);
                dateInfoContainer.textContent = `Tháng ${currentMonth}, Năm ${currentYear}`;
            }

            function showPreviousMonth() {
                if (currentMonth === 1) {
                    currentMonth = 12;
                    currentYear--;
                } else {
                    currentMonth--;
                }
                updateCalendar();
            }

            function showNextMonth() {
                if (currentMonth === 12) {
                    currentMonth = 1;
                    currentYear++;
                } else {
                    currentMonth++;
                }
                updateCalendar();
            }

            document.getElementById("prevMonthBtn").addEventListener("click", showPreviousMonth);
            document.getElementById("nextMonthBtn").addEventListener("click", showNextMonth);

            // Initial display
            const currentDate = new Date();
            currentYear = currentDate.getFullYear();
            currentMonth = currentDate.getMonth() + 1;
            updateCalendar();
});
</script>