<?php 
include 'koneksi.php';
$sqlsiswa = mysqli_query($koneksi , "SELECT * FROM siswa WHERE idsiswa = '$_GET[id]' ") ;
$sw = mysqli_fetch_assoc($sqlsiswa);

include 'header.php';
 ?>
<div class="container">
  <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="tampil_siswa.php">Siswa</a></li>
                            <li class="breadcrumb-item active">Edit Siswa</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Edit Data Siswa</h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
 	<?php if (isset($error)) : ?>
 		<p style="font-family: arial; color: red; size: 14px;">Silahkan Lengkapi Form Terlebih Dahulu</p>
 	<?php endif; ?>
 	<form action="" method="post">
 	<table class="table">
 		<tr>
 			<td>NISN</td>
 			<td>
 				<input class="form-control" type="hidden" name="idsiswa" value="<?= $sw['idsiswa'] ?>">
 				<input class="form-control" type="text" name="nisn" value="<?= $sw['nisn'] ?>" size="30">
 			</td>
 		</tr>
 		 		<tr>
 			<td>NIS</td>
 			<td>
 				<input class="form-control" type="text" name="nis" value="<?= $sw['nis'] ?>" maxlength="8" size="30">
 			</td>
 		</tr>
 		<tr>
 			<td>Nama Siswa</td>
 			<td>
 				<input class="form-control" type="text" name="namasiswa" value="<?= $sw['namasiswa'] ?>" maxlength="40" size="30">
 			</td>
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
 			<td>TAHUN AJARAN</td>
 			<td>
 				<input class="form-control" type="enum" name="tahunajaran" value="<?= $sw['tahunajaran'] ?>" readonly>
 			</td>
 		</tr>
 		<tr>
 			<td>BIAYA</td>
 			<td>
 				<input class="form-control" type="int" name="biaya" value="<?= $sw['biaya'] ?>" readonly>
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<button class="btn btn-success" type="submit" name="ubah">UPDATE DATA</button>
 			</td>
 		</tr>
 	</table>
 </form>
 
 </body>
 </html>
<?php 
 if (isset($_POST['ubah']) ) {
 	$idsiswa = $_POST['idsiswa'];
 	$nisn  		 = $_POST['nisn'];
 	$nis 		 = $_POST['nis'];
 	$namasiswa 	=$_POST['namasiswa'];
 	$kelas 	 = $_POST['kelas'];
 	$tahunajaran  	 = $_POST['tahunajaran'];
 	$biaya 	=$_POST['biaya'];
 	
 	

 	$ubah = mysqli_query($koneksi , "UPDATE siswa SET nisn= '$nisn',
 		nis = '$nis',
 		kelas ='$kelas',
 		namasiswa ='$namasiswa',
 		tahunajaran = '$tahunajaran',
 		biaya = '$biaya' WHERE idsiswa = '$idsiswa'");


 	if ($ubah){
 		echo "
 		<script>
 		alert('data berhasil diedit');
 		document.location.href = 'tampil_siswa.php';
 		</script>
 		";
 	}else{
 		echo "
 		<script>
 		alert('data gagal diedit');
 		</script>
 		";
 	}
 }


  ?>
</div>
</div>
</div>
</table>
</div>
</div>
</div>
 <?php include 'footer.php'; ?>