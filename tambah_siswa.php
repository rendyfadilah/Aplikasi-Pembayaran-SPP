<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
 

               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH DATA USER</h3>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                               <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
           
		

	<form action="" method="POST">
				<table class="table">
					<tr>
						<td>NISN</td>
						<td><input class="form-control" type="text" name="nisn" maxlength="10"></td>
					</tr>
					<tr>
					<tr>
						<td>NIS</td>
						<td><input class="form-control" type="text" name="nis" maxlength="8"></td>
					</tr>
					<tr>
						<td>Nama Siswa</td>
						<td><input class="form-control" type="text" name="nama" maxlength="40"></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>
							<select class="form-control" name="kelas">
								<option value="" selected>-- Pilih Kelas --</option>
								<?php 
									$sqlKelas=mysqli_query($koneksi,"SELECT * FROM walikelas ORDER BY kelas ASC");
									while ($k=mysqli_fetch_array($sqlKelas)) { ?>
										<option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>";
										<?php
									}
								 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tahun Ajaran</td>
						<td><input class="form-control" type="text" name="tahunajaran" value="2020/2021" readonly></td>
					</tr>
					<tr>
						<td>SPP /bulan</td>
						<td><input class="form-control" type="text" name="biaya"></td>
					</tr>
					<tr>
						<td>Jatuh Tempo Pertama</td>
						<td><input class="form-control" type="date" name="jatuhtempo" value="2020-07-10" ></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="btn btn-success" type="submit" value="Simpan"/></td>
					</tr>
				</table>
			</form>


<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
		$idsiswa = time();
		$nisn = $_POST['nisn'];
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$tahunajaran = $_POST['tahunajaran'];
		$biaya = $_POST['biaya'];
		$awaltempo = $_POST['jatuhtempo']; 

		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);


		// if(!empty($nisn) && !empty($namasiswa) && !empty($kelas)){
		if($nisn==''){
			echo "Form belum lengkap...";
		} else {
			$simpan = mysqli_query($koneksi, "insert into siswa(idsiswa,nisn,nis,namasiswa,kelas,tahunajaran,biaya) values('$idsiswa','$nisn','$nis','$nama','$kelas','$tahunajaran','$biaya')");
		if(!$simpan){
			echo "Penyimpanan data gagal..";			
		} else {
			$ds =  mysqli_fetch_array(mysqli_query($koneksi, "select idsiswa from siswa order by idsiswa desc limit 1"));
			$idsiswa = $ds['idsiswa'];

			for($i=0; $i<12; $i++){
				$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

				$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

				mysqli_query($koneksi, "insert into spp(idsiswa,jumlah,bulan,jatuhtempo) values('$idsiswa','$biaya','$bulan','$jatuhtempo')");
			}
			header('location:tampil_siswa.php');
			
		}
	}

}
?>
</div>
</div>
</div>
</div>
</div>
</div>

