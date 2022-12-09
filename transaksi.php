<?php include "header.php"; ?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
 
                        <h3 class="text-themecolor m-b-0 m-t-0">PEMBAYARAN</h3>
                    
                </div>
<form method="GET" action="">
	               <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <td >*Masukan NISN siswa untuk melakukan pembayaran</td>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
		<tr>
			<td>NISN : </td><td><input class="form-control" type="text" name="nisn"></td>
			<td><input class="btn btn-success" type="submit" name="cari" value="Cari Siswa"></td>
		</tr>
	</table>
</form>
<?php
include "koneksi.php";
if(isset($_GET['nisn']) && $_GET['nisn']!=''){
	$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nisn=$ds['nisn'];
?>
<h3>Biodata Siswa</h3>
<table class="table">
	<tr>
		<td>NISN</td>
		<td>:</td>
		<td><?php echo $ds['nisn']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>
<h3>Tagihan SPP Siswa</h3>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>
	<?php
		$sql = mysqli_query($koneksi, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)){
			echo "<tr>
				<td>$no</td>
				<td>$d[bulan]</td>
				<td>$d[jatuhtempo]</td>
				<td>$d[nobayar]</td>
				<td>$d[tglbayar]</td>
				<td>$d[jumlah]</td>
				<td>$d[ket]</td>
				<td align='center'>";
				if($d['nobayar']==''){
					echo "<a class='btn btn-success' href='proses_transaksi.php?nisn=$nisn&act=bayar&id=$d[idspp]'>Bayar</a>";
					}else{
						echo "<a class='btn btn-danger' href='proses_transaksi.php?nisn=$nisn&act=batal&id=$d[idspp]'>Batal</a>
								<a class='btn btn-info' target='_blank' href='cetak_slip_transaksi.php?nisn=$nisn&id=$d[idspp]' target='_blank'>Cetak</a>";
					}
				echo "</td>
			</tr>";
			$no++;
		}
	?> 
</table>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
