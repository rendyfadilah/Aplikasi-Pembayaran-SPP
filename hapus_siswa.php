<?php 
session_start();
include 'koneksi.php';
if (isset($_SESSION['login'])){
	$hapus  = $koneksi -> query("DELETE FROM siswa WHERE idsiswa ='$_GET[id]' ");
	if($hapus){
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'tampil_siswa.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data gagal dihapus data digunakan ditabel lain');
		document.location.href = 'tampil_siswa.php';
		</script>
		";

	}

}else {
	echo "
	<script>
		alert('anda tidak punya akses dihalaman ini');
		document.location.href = 'login.php';
		</script>
	";
}

 ?>