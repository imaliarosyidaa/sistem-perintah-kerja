<?php
 

require 'functions.php';
$fpk = query ("SELECT * FROM tb_fpk");
if (isset ($_POST["cari"]) ) {
    $fpk= cari($_POST["keyword"]);
}

if ( isset($_POST["register"]) ) {
    if (registrasi($_POST) > 0 ) {
    echo "
    <script> 
    alert('Data Registrasi Anda Berhasil ditambahkan...!');
    document.location.href='login.php';
    </script>
    ";
    } else {
        echo mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Silahkan Registrasi</h2>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Konfirmasi password" name="password2" type="password" required>
                                    </div>
                                    <?php if (isset($error)): ?>
                                        <p class="text-capitalize text-center" style="color:red;">Username atau password salah</p>
                                    <?php  endif; ?>
                                    <button type="submit" class="btn btn-lg btn-success btn-block" name="register">Registrasi</button>
                                    <p style="font-size:12px;margin-top:10px;"class="text-capitalize text-sm text-secondary">Sudah punya akun? <a href="login.php">Login disini</a></p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/startmin.js"></script>
</body>
</html>