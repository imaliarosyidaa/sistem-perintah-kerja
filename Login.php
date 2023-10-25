<?php
 

session_start ();

if (isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

require 'functions.php';

if ( isset($_POST["login"]) ) {

   $username = $_POST ["username"];
   $password = $_POST ["password"];
   $result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username
='$username'");

   //cek username
   if (mysqli_num_rows($result) === 1){

   // cek password
   $row = mysqli_fetch_assoc ($result);
  if ( password_verify($password, $row["password"]) ){

        //set session
         $_SESSION["login"]=true;
         $_SESSION["pass"] = $row["password"];
        header("Location: menu.php");
        exit;

    }

      }

$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
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
                            <h2 class="panel-title">Silahkan Login</h2>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password">
                                    </div>
                                    <?php if (isset($error)): ?>
                                        <p class="text-capitalize text-center" style="color:red;">Username atau password salah</p>
                                    <?php  endif; ?>
                                    <button type="submit" class="btn btn-lg btn-success btn-block" name="login">Login</button>
                                    <p style="font-size:12px;margin-top:10px;"class="text-capitalize text-sm text-secondary">belum punya akun? <a href="index.php">Registrasi disini</a></p>
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