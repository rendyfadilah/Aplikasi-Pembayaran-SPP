<?php
//variable koneksi
$koneksi = mysqli_connect("localhost","root","","db_spp2");

if(!$koneksi){
	echo "Koneksi Database Gagal...!!!";
}
?>