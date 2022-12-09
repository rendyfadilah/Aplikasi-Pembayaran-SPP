<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cetak Laporan Pembayaran</title>
 	<style type="text/css">
 		body {
 			font-family: Arial;
 		}
 		@media print{
 			.ulah-print{
 				display: none;
 			}
 		}
 		table {
 			border-collapse: collapse;
 		}
 	</style>
 </head>
 <body>
 	<img src="assets/images/1.png" height="50px" width="50px" border="0" align="middle" style="float: left;"> <h3>SMK NEGRI 1 SUMEDANG<br>LAPORAN PEMBAYARAN SPP</h3>
 	<hr>
 	<?php 
		$qSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
		$ds = mysqli_fetch_array($qSiswa);
 	 ?>
 	<table>
 		<tr>
 			<td width="100">Nama Siswa</td>
 			<td width="4">:</td>
 			<td><?php echo $ds['namasiswa']; ?></td>
 		</tr>
 		<tr>
 			<td width="100">NISN</td>
 			<td width="4">:</td>
 			<td><?php echo $ds['nisn']; ?></td>
 		</tr>
 		<tr>
 			<td width="100">Kelas</td>
 			<td width="4">:</td>
 			<td><?php echo $ds['kelas']; ?></td>
 		</tr>
 	</table>
 	<hr>
 	<table width="100%" border="1" cellspacing="0" cellpadding="4">
 		<tr>
 			<th>No.</th>
 			<th>No. Bayar</th>
 			<th>Pembayaran Bulan</th>
 			<th>Jumlah</th>
 			<th>Keterangan</th>
 		</tr>
 		<?php 
 			$sqlBayar = mysqli_query($koneksi, "SELECT spp.*,siswa.nisn,siswa.namasiswa,siswa.kelas
 												FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa
 												WHERE idspp='$_GET[id]'
 												ORDER BY nobayar ASC");
 			$no=1;
 			$total = 0;
 			while ($d=mysqli_fetch_array($sqlBayar)) {
 				echo "<tr>
 				<td align='center'>$no</td>
 				<td align='center'>$d[nobayar]</td>
 				<td>$d[bulan]</td>
 				<td align='right'>$d[jumlah]</td>
 				<td>$d[ket]</td>
 				</tr>";
 				$no++;
 			}
 		 ?>
 	</table>

 	<table width="100%">
 		<tr>
 			<td></td>
 			<td width="200px">
 				<p>Sumedang, <?php echo date('d/m/Y'); ?><br/>
 				Petugas,</p>
 				<br/>
 				<br/>
 				<p>______________________________</p>
 			</td>
 		</tr>
 	</table>

 	<a href="#" class="ulah-print" onclick="window.print();">Cetak/Print</a>
 </body>
 </html>

<?php
} else {
	header('location:login.php');
}
?>
