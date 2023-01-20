<?php
include 'koneksi.php';

    if(isset($_POST['editdata'])){ 
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $asal = $_POST['asal'];
        $nimb = $_POST['nimb'];
        $niml = $_POST['niml'];

        $update = mysqli_query($db_conn, "UPDATE biodata SET  nim='$nimb', nama='$nama', kelas='$kelas', asal='$asal' WHERE nim='$niml'  ");
        if($update)
        {
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            header("Location:index.php");
        } 
 
    }

/*if(isset($_POST['hapusbarang'])){
    $nimm = $_POST['nim'];

    $hapus = mysqli_query($db_conn, "DELETE FROM biodata where nim='$nim'");
    if($hapus)
    {
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
        header("Location:index.php");
    } 
}*/
?>