<?php
include "koneksi.php";

if(isset($_POST['hapusbarang'])){ 
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $asal = $_POST['asal'];
    $nim = $_POST['nim'];


    $hapus = mysqli_query($db_conn, "DELETE FROM biodata WHERE nim='$nim' ");
    if($hapus)
    {
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data CANT DELETE"); </script>';
        header("Location:index.php");
    } 
}
?>