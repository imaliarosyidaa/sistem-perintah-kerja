<?php
 

session_start();

if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}

// Koneksi Ke database memanggil pada halaman function.php
require 'functions.php';

//UNTUK MENGURUTKAN DATA
 
$jml_data_per_halaman = 3;
$jml_data = count(query("SELECT * FROM tb_fpk"));
$jml_halaman = ceil($jml_data/$jml_data_per_halaman);
$halaman_prioritas = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$data_awal = ($jml_data_per_halaman * $halaman_prioritas) - $jml_data_per_halaman;


$fpk = query ("SELECT * FROM tb_fpk LIMIT $data_awal,$jml_data_per_halaman");

//Tombol Cari di klik
if (isset ($_POST["cari"]) ) {
$fpk= cari($_POST["keyword"]);

}
$user = simpanInfoProfil();
?>

<!DOCTYPE html >
<html >
<head>
<title>Halaman Admin</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/metisMenu.min.css" rel="stylesheet">
<link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="css/startmin.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="menu.php"></a>
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
                            <li class="sidebar-search">
                            <form action="" method="post">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="cari">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                </form>
                            </li>
                            
                            <li>
                                <a href="menu.php"><i class="fa fa-home fa-fw"></i> Homepage</a>
                            </li>
                            <li>
                                <a href="tambah.php"><i class="fa fa-user fa-fw"></i> Tambah Data  </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
            <h1 class="page-header">Daftar Laporan Perintah Kerja</h1>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Kode Form</th>
                <th>Departemen Tujuan</th>
                <th>Penanggung Jawab Tujuan</th>
                <th>ALamat Tujuan</th>
                <th>Departemen Asal</th>
                <th>Penanggung Jawab Asal</th>
                <th>Alamat Asal</th>
                <th>No Dokumen FPK</th>
                <th>Tanggal Terbit</th>
                <th>Alokasi Beban Kerja</th>
                <th>Rincian Perintah Kerja</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Referensi</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ;?>
            <?php foreach($fpk as $row):?>
            <tr>
            <td><?=$i++;?></td>
            <td>
            <a href="ubah.php?id=<?= $row["id"];?>"class="btn btn-warning">Ubah</a>
            <a href="hapus.php?id=<?= $row["id"];?>"class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
             
            <td> <?= $row ["kode_form"]; ?></td>
            <td> <?= $row ["dept_tujuan"]; ?></td>
            <td> <?= $row["pj_tujuan"];?></td>
            <td> <?= $row ["alamat_tujuan"]; ?></td>
            <td> <?= $row ["dept_asal"]; ?></td>
            <td> <?= $row ["pj_asal"]; ?></td>
            <td> <?= $row ["alamat_asal"]; ?></td>
            <td> <?= $row ["no_dok_fpk"]; ?></td>
            <td> <?= $row["tgl_terbit"];?></td>
            <td> <?= $row ["alokasi_beban_kerja"]; ?></td>
            <td> <?= $row ["rincian_perintah_kerja"]; ?></td>
            <td> <?= $row ["jmlh"]; ?></td>
            <td> <?= $row ["satuan"]; ?></td>
            <td> <?= $row ["referensi_no_identitas_brg"]; ?></td>
            <td> <?= $row ["ket"]; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            </div>
            </div>
            </div>
            </div>
            </div>


<nav class="text-center">
  <ul class="pagination">
  <?php if($halaman_prioritas > 1) : ?>
  <li class="page-item">
      <a class="page-link" href="?halaman=<?= $halaman_prioritas -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php endif;?>
<?php for($i = 1; $i <= $jml_halaman; $i++) : ?>
    <?php if ($i == $halaman_prioritas) : ?>
    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a></li>
    <?php else : ?>
    <li class="page-item "><a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a></li>
    <?php endif;?>
<?php endfor;?>

<?php if($halaman_prioritas < $jml_halaman) :?> 
      <a class="page-link" href="?halaman=<?= $halaman_prioritas + 1;?>"aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<?php endif;?>
    
  </ul>
</nav>
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