<?php
 
require 'functions.php';

$id = $_GET ["id"];

if (hapus($id) > 0 ) {
    echo "  
    <script> 
        alert('Data Berhasil dihapus...!');
        document.location.href='menu.php';
    </script>
";
} else {
    // echo "Data Gagal Disimpan!!";  //tanpa java script
    // echo "<br>";
    // echo mysqli_error ($conn);


    //Menggunakan pesan java script
echo "
<script> 
alert('Data Gagal ditambahkan...!');
document.location.href='menu.php';
</script>
";

}





?>