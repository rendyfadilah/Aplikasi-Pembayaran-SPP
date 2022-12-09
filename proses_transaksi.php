<?php include "header.php"; ?>
<?php
ob_start();
if(isset($_SESSION['login'])) {
	include_once 'koneksi.php';
	if($_GET['act'] == 'bayar') {

		$idspp	= $_GET['id'];
		$nisn	= $_GET['nisn'];

		//no bayar
		$today = date("ymd");
		$query = mysqli_query($koneksi, "SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
		$data  = mysqli_fetch_array($query);
		$lastNoBayar	= $data['last'];
		$lastNoUrut		= substr($lastNoBayar, 6, 4);
		$nextNoUrut		= $lastNoUrut;
		$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

		//tanggal bayar
		$tglbayar		= date('Y-m-d');

		//id user
		$user = $_SESSION['id'];
		mysqli_query($koneksi, "UPDATE spp SET nobayar 	='$nextNoBayar',
												tglbayar	='$tglbayar',
												ket 		='LUNAS',
												iduser 		='$user'
											WHERE idspp='$idspp'");
		header ('location:transaksi.php?nisn='.$nisn);
	}
	elseif($_GET['act']=='batal'){

		$idspp	= $_GET['id'];
		$nisn	= $_GET['nisn'];
		mysqli_query($koneksi, "UPDATE spp SET nobayar 	= null,
												tglbayar	= null,
												ket 		=null,
												iduser 		=null
											WHERE idspp='$idspp'");
		header('location:transaksi.php?nisn='.$nisn);
		ob_flush();
	}
}

?>
<?php include "footer.php"; ?>