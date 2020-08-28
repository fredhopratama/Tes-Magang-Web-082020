<!DOCTYPE html>
<?php
include 'config.php';
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
                            <li class="breadcrumb-item active">Tambah Tautan Bundel</li>
                        </ol>                          
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Tautan Bundel Baru</div>
                                <div class="card-body">
                                    <?php
                                    if(isset($_POST["update"])){
                                        $id_tautan_bundel = $_POST["id_tautan_bundel"];
                                        
                                        $data_update = "SELECT * from master__tautan_bundel where id_tautan_bundel=$id_tautan_bundel";
										$update = mysqli_query($konek, $data_update);
										while($row = mysqli_fetch_assoc($update)) {                                    
                                    ?>
                                    <form role="form" action="listbundle.php" method="POST">
										<div class="form-group">
                                        
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
											<input type="text" class="form-control" name="nama_pengguna" value="<?php echo $row["nama_pengguna"]?>" readonly>											
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Tautan Bundel</label>
                                            <input class="form-control" name="nama_tautan_bundel" value="<?php echo $row["nama_tautan_bundel"]; ?>" required>
                                        </div>

										<div class="form-group">
                                            <label>Link Tautan</label><br>
                                            <textarea class="form-control" name="link_tautan" required><?php echo $row["link_tautan"];?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" name="ubah" value="Simpan Perubahan">
                                            <a href="listbundle.php" class="btn btn-danger">Batal</a>
                                        </div>
                                    </form>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                    <form role="form" action="" method="POST">
										<div class="form-group">
                                        
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
											<input type="text" class="form-control" name="nama_pengguna" placeholder="Masukkan Nama Pengguna" required>											
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Tautan Bundel</label>
                                            <input class="form-control" name="nama_tautan_bundel" placeholder="Masukkan Nama Tautan Bundel" required>
                                        </div>

										<div class="form-group">
                                            <label>Link Tautan</label><br>
                                            <input class="form-control" name="link_tautan" required></input>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                                            <input type="reset" class="btn btn-danger" name="clear" value="Bersihkan">
                                        </div>
                                    </form>
                                <?php
                                    }
                                ?>
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


<?php
    if (isset($_POST['simpan'])) {
        $nama_tautan_bundel = $_POST['nama_tautan_bundel'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $link_tautan = $_POST['link_tautan'];
            $sqlc = "select count(*) as jum from master_tautan_bundel where nama_tautan_bundel = '$nama_tautan_bundel'";
	        $result1= mysqli_query($konek, $sqlc);
		    $row = mysqli_fetch_assoc($result1);

            $sql = "INSERT INTO master_tautan_bundel (nama_tautan_bundel, nama_pengguna, link_tautan status_link) VALUES ('$nama_tautan_bundel', '$nama_pengguna', '$link_tautan', 1)";
            $result = mysqli_query($konek, $sql);
?>
        <script language='JavaScript'>
            alert("Data Tautan Bundel Berhasil Ditambah")
        </script>
<?php
    }
?>