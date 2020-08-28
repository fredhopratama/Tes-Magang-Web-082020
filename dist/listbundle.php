<!DOCTYPE html>
<?php
include 'config.php';

if (isset($_POST['hapus'])) {
    $id_tautan_bundel = $_POST['id_tautan_bundel'];      

    $sql = "UPDATE master_tautan_bundel SET status_link=2 where id_tautan_bundel=$id_tautan_bundel";
    mysqli_query($konek, $sql);
?>
    <script language='JavaScript'>
        alert("Link Tautan Bundel Berhasil Dinonaktifkan")        
    </script>
<?php
}

if (isset($_POST['aktif'])) {
    $id = $_POST['id_tautan_bundel'];      

    $sql = "UPDATE master_tautan_bundel SET status=1 where id_tautan_bundel=$id_tautan_bundel";
    mysqli_query($konek, $sql);
?>
    <script language='JavaScript'>
        alert("Link Tautan Berhasil Aktif Kembali")        
    </script>
<?php
}

if (isset($_POST['ubah'])) {
    $nama_tautan_bundel = $_POST['nama_tautan_bundel'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $link_tautan = $_POST['link_tautan'];
    $status_link = $_POST['status_link'];

    $sql = "UPDATE master_tautan_bundel SET nama_tautan_bundel='$nama_tautan_bundel', nama_pengguna='$nama_pengguna',
     link_tautan='$link_tautan', status_link='$status_link' where id_tautan_bundel='$id_tautan_bundel'";
    mysqli_query($konek, $sql);
?>
    <script language='JavaScript'>
        alert("Data Tautan Bundel <?php echo $nama_tautan_bundel; ?> Berhasil Diubah")        
    </script>
<?php
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logognfi.png" style="width:5cm; height:1.2cm"/></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">                    
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dasbor
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Bundel Tautan</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-columns"></i>
                                </div>
                                Bundel Tautan
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listbundle.php">Daftar Tautan Bundel yang Dibuat</a>
                                    <a class="nav-link" href="newlistbundle.php">Tambah Tautan Bundel Baru</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk Sebagai:</div>
                        Fredho Pratama Putra
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Master Tautan Bundel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dasbor</a></li>
                            <li class="breadcrumb-item active">Master Tautan Bundel</li>
                        </ol>                          
                        <div class="card mb-4">
                        <a class="btn btn-primary" href="newlistbundle.php" style="text-align:center margin-left:5cm margin-right:5cm">+Buat Tautan Bundel Baru</a></div>
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Daftar Tautan Bundel
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama Pengguna</th>
                                                <th>Nama Tautan Bundel</th>
                                                <th>Link Tautan</th>
                                                <th>Status Tautan Bundel</th>
                                                <th>Ubah Data</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>                                        
                                        <?php
                                        $data_tb = "SELECT * from master_tautan_bundel order by id_tautan_bundel";
                                        $result_tb = mysqli_query($konek, $data_tb);
                                        if (mysqli_num_rows($result_tb) > 0) {
                                            while ($row = mysqli_fetch_assoc($result_tb)) {
                                                echo "<tbody>";
                                                    echo "<tr>";                                                    
                                                        echo "<td>";
                                                            echo $row["nama_pengguna"];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $row["nama_tautan_bundel"];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $row["link_tautan"];
                                                        echo "</td>";                                                  
                                                            if($row["status_link"]==1){echo "<td style=\"background-color:#99FF99;\">"; echo "Aktif"; echo "</td>";}else{echo "<td style=\"background-color:#FF6666\">"; echo "Tidak Aktif"; echo "</td>";};                                                                                                        
                                                        echo "<td>";
                                                            echo "<form action=\"listbundle.php\" method=\"POST\"><input type=\"hidden\" name=\"id_tautan_bundel\" value=\"".$row["id_tautan_bundel"]."\">";
                                                                echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Update\">";
                                                            echo "</form>";
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"id_tautan_bundel\" value=\"".$row["id_tautan_bundel"]."\">";
                                                                if($row["status_link"]==1){
                                                                    echo "<input class=\"btn btn-danger\" type=\"submit\" name=\"hapus\" value=\"Nonaktifkan\">";
                                                                }else{
                                                                    echo "<input class=\"btn btn-success\" type=\"submit\" name=\"aktif\" value=\"Aktifkan\">";
                                                                }
                                                            echo "</form>";
                                                        echo "</td>";                                                    
                                                    echo "</tr>";
                                                echo "</tbody>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Fredho Pratama Putra 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
