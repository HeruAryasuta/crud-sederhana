<?php

$db_conn = mysqli_connect('localhost','root','','crud');

if(mysqli_connect_errno()){
	echo 'Gagal terhubung ke database: '.mysqli_connect_error();
	exit();
}

?>