<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cetak Laporan Data Siswa</title>
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
 	<h3>LAPORAN DATA GURU</h3>
 	<hr>
 	<table width="100%" border="1" cellspacing="0" cellpadding="4">
 		<tr>
 			<th>No.</th>
 			<th>NIS</th>
 			<th>Nama Siswa</th>
 			<th>Kelas</th>
 			<th>Tahun Ajaran</th>
 		</tr>
 		<?php 
 			$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nisn ASC");
 			$no=1;
 			while ($d=mysqli_fetch_array($sqlSiswa)) {
 				echo "<tr>
 				<td align='center'>$no</td>
 				<td align='center'>$d[nisn]</td>
 				<td>$d[namasiswa]</td>
 				<td align='center'>$d[kelas]</td>
 				<td align='center'>$d[tahunajaran]</td>
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
