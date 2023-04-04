<?php
include 'koneksi.php';

$nim= $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$asal = $_POST['asal'];


    mysqli_query($db_conn,"INSERT INTO biodata values('$nim', '$nama', '$kelas', '$asal,')");
    header("location: index.php");
?>