<?php
session_start();
require 'functions.php';

$id = $_GET["id"];
 $fpk = query("SELECT * FROM tb_fpk WHERE id = $id")[0];
    if ( isset($_POST["submit"]) ) {
        if (ubah($_POST) > 0 ) {
        echo "
        <script> 
        alert('Data Berhasil diubah...!');
        document.location.href='menu.php';
        </script>
        ";
        } else {
        echo "
        <script> 
        alert('Data Gagal diubah...!');
        document.location.href='menu.php';
        </script>
        ";
    }
}
$user = simpanInfoProfil();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">

        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="menu.php"><i class="fa fa-home fa-fw"></i> Homepage</a></li>
            
        </ul>
        <?php
            if ($_SESSION['login'] == true) {
                echo '
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>';
                        echo $user["username"];
                        echo '<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            ';
            }
            ?>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="menu.php"><i class="fa fa-home fa-fw"></i> Homepage</a>
                    </li>
                    <li>
                        <a href="tambah.php"><i class="fa fa-user fa-fw"></i> Tambah Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ubah Data</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $fpk["id"]; ?>">
                                                           
                                            <div class="form-group">
                                                <label for="kode_form">Kode Form</label>
                                                <input class="form-control" type="text" name="kode_form" id="kode_form" value="<?= $fpk["kode_form"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="dept_tujuan">Departemen Tujuan</label>
                                                <input class="form-control" type="text" name="dept_tujuan" id="dept_tujuan" value="<?= $fpk["dept_tujuan"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pj_tujuan">Penanggung Jawab Tujuan</label>
                                                <input class="form-control" type="text" name="pj_tujuan" id="pj_tujuan" value="<?= $fpk["pj_tujuan"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_tujuan">Alamat Tujuan</label>
                                                <input class="form-control" type="text" name="alamat_tujuan" id="alamat_tujuan" value="<?= $fpk["alamat_tujuan"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="dept_asal">Departemen Asal</label>
                                                <input class="form-control" type="text" name="dept_asal" id="dept_asal" value="<?= $fpk["dept_asal"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pj_asal">Penanggung Jawab Asal</label>
                                                <input class="form-control" type="text" name="pj_asal" id="pj_asal" value="<?= $fpk["pj_asal"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_asal">Alamat Asal</label>
                                                <input class="form-control" type="text" name="alamat_asal" id="alamat_asal" value="<?= $fpk["alamat_asal"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_dok_fpk">No Dokumen FPK</label>
                                                <input class="form-control" type="text" name="no_dok_fpk" id="no_dok_fpk" value="<?= $fpk["no_dok_fpk"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_terbit">Tanggal Terbit</label>
                                                <input class="form-control" type="text" name="tgl_terbit" id="tgl_terbit" value="<?= $fpk["tgl_terbit"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="alokasi_beban_kerja">Alokasi Beban Kerja</label>
                                                <input class="form-control" type="text" name="alokasi_beban_kerja" id="alokasi_beban_kerja" value="<?= $fpk["alokasi_beban_kerja"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="rincian_perintah_kerja">Rincian Perintah Kerja</label>
                                                <input class="form-control" type="text" name="rincian_perintah_kerja" id="rincian_perintah_kerja" value="<?= $fpk["rincian_perintah_kerja"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="jmlh">Jumlah</label>
                                                <input class="form-control" type="text" name="jmlh" id="jmlh" value="<?= $fpk["jmlh"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="satuan">Satuan</label>
                                                <input class="form-control" type="text" name="satuan" id="satuanmmmm" value="<?= $fpk["satuan"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="referensi_no_identitas_brg">Referensi</label>
                                                <input class="form-control" type="text" name="referensi_no_identitas_brg" id="referensi_no_identitas_brg" value="<?= $fpk["referensi_no_identitas_brg"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="ket">Keterangan</label>
                                                <input class="form-control" type="text" name="ket" id="ket" value="<?= $fpk["ket"]; ?>">
                                            </div>
                                             
                                            <button type="submit" name="submit" class="btn btn-warning">Ubah Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/morris-data.js"></script>
    <script src="js/startmin.js"></script>
</body>
</html>