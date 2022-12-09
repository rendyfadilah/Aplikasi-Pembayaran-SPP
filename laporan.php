 <?php include 'header.php'; ?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
<div class="panel panel-info col-md-12">
	<div class="panel-heading">
		                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">LAPORAN DATA</h3>
                    </div>
                </div>

</div>
<div class="container">
	                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                    <table class="table stylish-table">
		<tr>
			<th >Nama Laporan</th>
			<th width="200">Cetak</th>
		</tr>
		<tr>
			<td>Laporan Data Guru</td>
			<td>
			<a href="laporan_data_guru.php" target="_blank"><button class="btn btn-primary btn-sm"  > CETAK</button></a>
				</td>
		</tr> 
		<tr>
			<td>
				Laporan Data Siswa
			</td>
			<td>
			<a href="laporan_data_siswa.php" target="_blank"><button class="btn btn-primary btn-sm" > CETAK</button></a>
			</td>
		</tr>
		<tr>
			<td>
				Laporan Tunggakan
			</td>
			<td>
			<a href="laporan_tunggakan.php" target="_blank"><button class="btn btn-primary btn-sm" > CETAK</button></a>
			</td>
		</tr>
		
		

		<form class="col-md-2" action="laporan_pembayaran_persiswa.php" method="GET" target="_blank" >
			<td>
			<b>Laporan Pembayaran</b>
		</td>
		<td>
			NISN <input class="form-control" type="text" name="nisn">
			Mulai Tanggal <input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
			Sampai Tanggal <input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
			<button class="btn btn-success btn-lg" type="submit" name="tampil">Tampilkan</button>
		</td>
		</form>
	</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div></div>
