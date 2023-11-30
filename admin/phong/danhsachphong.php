<!DOCTYPE html>
<html lang="en">

    <title>Danh sách phòng</title>

    <!-- Custom fonts for this template -->
    <link href="templatefree/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templatefree/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="templatefree/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body id="page-top">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách phòng</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách phòng</h6>
                            <a href="index.php?pg=themphong" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Thêm mới</a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Img</th>
                                            <th>Mô tả</th>
                                            <th>giá phòng</th>
                                            <th>Trạng thái</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>id</th>
                                            <th>Name</th>
                                            <th>Img</th>
                                            <th>Mô tả</th>
                                            <th>giá phòng</th>
                                            <th>Trạng thái</th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                   <?php                    
                foreach ($listphong as $room){
                extract($room);
                $suaphong="index.php?pg=suaphong&id=".$room_id;
                $xoaphong="index.php?pg=xoaphong&id=".$room_id;
                $hinhpath= "../upload/".$img;
                if(is_file($hinhpath)){
                    $hinh="<img src='".$hinhpath."' height='200'>";
                }else{
                    $hinh="no photo";
                }
                echo ' <tr>
                <td>'.$room_id.'</td>
                <td>'.$room_name.'</td>
                <td>'.$hinh.'</td>
                <td>'.$description.'</td>
                <td>'.$room_price.'</td>
                <td>'.($Trangthai == 1 ? 'Available' : 'Unavailable').'</td>

                <td><a href="'.$suaphong.'"><input type="button" value="Sửa"></a>  <a href="'.$xoaphong.'">
                 <input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa\')"></a> </td>
            </tr>';
            }

            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>