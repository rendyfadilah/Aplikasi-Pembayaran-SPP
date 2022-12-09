<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cetak Laporan Tunggakan</title>
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
 	<h3>SMK NEGRI 1 SUMEDANG<br>LAPORAN TUNGGAKAN SPP</h3>
 	<hr>
 	<table width="100%" border="1" cellspacing="0" cellpadding="4">
 		<tr>
 			<th>No.</th>
 			<th>NIS</th>
 			<th>Nama Siswa</th>
 			<th>Kelas</th>
 			<th>Tagihan Bulan</th>
 			<th>Jumlah Tagihan</th>
 			<th>Keterangan</th>
 		</tr>
 		<?php 
 			// $sqlTagihan = mysqli_query($koneksi, "SELECT spp.*,siswa.nisn,siswa.namasiswa,siswa.kelas
 			// 									FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa
 			// 									WHERE spp.ket is NULL
 			// 									ORDER BY siswa.namasiswa ASC");
 		$sqlTagihan = mysqli_query($koneksi, "SELECT spp.*, siswa.nisn,siswa.namasiswa,siswa.kelas 
 											from spp inner join siswa on spp.idsiswa=siswa.idsiswa 
 											where ket = '' ");
 			$no=1;
 			$total = 0;
 			while ($d=mysqli_fetch_array($sqlTagihan)) {
 				echo "<tr>
 				<td align='center'>$no</td>
 				<td align='center'>$d[nisn]</td>
 				<td>$d[namasiswa]</td>
 				<td align='center'>$d[kelas]</td>
 				<td>$d[bulan]</td>
 				<td align='right'>$d[jumlah]</td>
 				<td align='center'>Belum Dibayar</td>
 				</tr>";
 				$no++;
 				$total += $d['jumlah'];
 			}
 		 ?>
 		 <tr>
 		 	<td colspan="5" align="right">Total Tagihan</td>
 		 	<td align="right"><b><?php echo $total; ?></b></td>
 		 	<td></td>
 		 </tr>
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
