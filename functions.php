<?php
$conn = mysqli_connect ("localhost", "root", "", "db_perintah_kerja");


function query($query){
    global $conn;
    $result = mysqli_query ($conn, $query);
    $rows =[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function simpanInfoProfil(){
    global $conn;
    $pass = $_SESSION["pass"];

    $username = "SELECT username from tbl_user where password = '$pass'";
    $result = $conn->query($username);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        $error = "Username atau password salah";
       
    }

    return $user;
}
function tambah($data) {
    global $conn;
    $kode_form = $data ["kode_form"];
    $dept_tujuan = $data ["dept_tujuan"];
    $pj_tujuan = $data ["pj_tujuan"];
    $alamat_tujuan = $data ["alamat_tujuan"];
    $dept_asal = $data ["dept_asal"];
    $pj_asal = $data ["pj_asal"];
    $alamat_asal = $data ["alamat_asal"];
    $no_dok_fpk = $data ["no_dok_fpk"];
    $tgl_terbit = $data ["tgl_terbit"];
    $alokasi_beban_kerja = $data ["alokasi_beban_kerja"];
    $rincian_perintah_kerja = $data ["rincian_perintah_kerja"];
    $jmlh = $data ["jmlh"];
    $satuan = $data ["satuan"];
    $referensi_no_identitas_brg = $data ["referensi_no_identitas_brg"];
    $ket = $data ["ket"];
     
     
     
//query insert data
$query = "INSERT INTO tb_fpk values('','$kode_form', '$dept_tujuan', '$pj_tujuan', '$alamat_tujuan','$dept_asal','$pj_asal', '$alamat_asal', '$no_dok_fpk', '$tgl_terbit', '$alokasi_beban_kerja', '$rincian_perintah_kerja', '$jmlh', '$satuan', '$referensi_no_identitas_brg', '$ket')";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);

}
    
function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_fpk WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function simpan_info_profil($pass){
    global $conn;
    mysqli_query($conn, "SELECT username from users WHERE password = $pass");
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
    $id = $data["id"];
    $kode_form = $data ["kode_form"];
    $dept_tujuan = $data ["dept_tujuan"];
    $pj_tujuan = $data ["pj_tujuan"];
    $alamat_tujuan = $data ["alamat_tujuan"];
    $dept_asal = $data ["dept_asal"];
    $pj_asal = $data ["pj_asal"];
    $alamat_asal = $data ["alamat_asal"];
    $no_dok_fpk = $data ["no_dok_fpk"];
    $tgl_terbit = $data ["tgl_terbit"];
    $alokasi_beban_kerja = $data ["alokasi_beban_kerja"];
    $rincian_perintah_kerja = $data ["rincian_perintah_kerja"];
    $jmlh = $data ["jmlh"];
    $satuan = $data ["satuan"];
    $referensi_no_identitas_brg = $data ["referensi_no_identitas_brg"];
    $ket = $data ["ket"];

     

//query Update data
$mysqli_query = "UPDATE  tb_fpk set
            kode_form='$kode_form',
            dept_tujuan='$dept_tujuan',
            pj_tujuan='$pj_tujuan',
            alamat_tujuan='$alamat_tujuan',
            dept_asal='$dept_asal',
            pj_asal='$pj_asal',
            alamat_asal='$alamat_asal',
            no_dok_fpk='$no_dok_fpk',
            tgl_terbit='$tgl_terbit',
            alokasi_beban_kerja='$alokasi_beban_kerja',
            rincian_perintah_kerja='$rincian_perintah_kerja',
            jmlh='$jmlh',
            satuan='$satuan',
            referensi_no_identitas_brg='$referensi_no_identitas_brg',
            ket='$ket'
            WHERE id = $id
            ";

            
mysqli_query($conn,$mysqli_query);
return mysqli_affected_rows($conn);

}

function cari($keyword) {
    
$query = "SELECT * FROM  tb_fpk 
            WHERE 
            kode_form LIKE '%$keyword%' OR
            rincian_perintah_kerja LIKE '%$keyword%' OR
            tgl_terbit LIKE '%$keyword%' 
            ";
return query($query);

}

function registrasi ($data) {
    global $conn;

    $username = strtolower (stripcslashes($data["username"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $password2= mysqli_real_escape_string ($conn, $data["password2"]);

//cek user sudah terdaftar atau belum
$result = mysqli_query($conn, "SELECT username FROM tbl_user where username ='$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
        alert ('username sudah terdaftar..!!');
          </script>";
    return false;
}


    // periksa konfirmasi password baru
    if ( $password !== $password2) {
        echo "<script>
                alert ('Konfirmasi Password tidak sama');
        </script>";
        return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
   // $password = md5($password);
    // var_dump($password);die;  //untuk melihathasil dari md5

    //Tambah user baru

    mysqli_query($conn, "INSERT INTO tbl_user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);
}



?>

