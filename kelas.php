<?php include "header.php"; ?>
<div class="container">
<?php

// --- koneksi ke database
include_once 'koneksi.php';


function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$kelas = $_POST['kelas'];
		$guru = $_POST['guru'];

		
		if(!empty($kelas) && !empty($guru)){
			$sql = "INSERT INTO walikelas (kelas,idguru) VALUES('$kelas','$guru')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: walikelas.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 



		<form action="" method="POST">
			<fieldset>
				<legend><h2>Tambah data</h2></legend>

				<table class="table">
					<tr>
						<td>Kelas</td>
						<td><input class="form-control" type="text" name="kelas" maxlength="40"></td>
					</tr>
					<tr>
						<td>Pilih Guru / Wali Kelas</td>
						<td>
							<select class="form-control" name="guru">
								<option value="" selected> Pilih Guru</option>
								<?php 
									$sqlguru=mysqli_query($koneksi,"SELECT * FROM guru ORDER BY idguru ASC");
									while ($g=mysqli_fetch_array($sqlguru)) {
										echo "<option value='$g[idguru]'>$g[namaguru]</option>";
									}
								 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><input class="btn btn-primary" type="submit" name="btn_simpan" value="Simpan"/></td>
					</tr>
				</table>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</fieldset>
		</form>
	<?php

};
// --- Tutup Fngsi tambah data

// --- Fungsi Baca Data (Read)

function tampil_data($koneksi){
	$sql = mysqli_query($koneksi,"SELECT walikelas.kelas,guru.namaguru
			FROM walikelas
			INNER JOIN guru ON walikelas.idguru=guru.idguru
			ORDER BY walikelas.kelas ASC");
	// $query = mysqli_query($koneksi, $sql);
	$no=1;
	
	echo "<fieldset>";
	echo "<legend><h2>Data User</h2></legend>";
	
	echo "<table class='table'>";
	echo "<tr>
			<th>No</th>
			<th>Kelas</th>
			<th>Walikelas</th>
			<th>Tindakan</th>
		  </tr>";
	
	while($data = mysqli_fetch_array($sql)){
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['kelas']; ?></td>
				<td><?php echo $data['namaguru']; ?></td>
				<td>
					<a class="btn btn-warning" href="walikelas.php?aksi=update&kls=<?php echo $data['kelas']; ?>">Ubah</a>
					<a class="btn btn-danger" href="walikelas.php?aksi=delete&kls=<?php echo $data['kelas']; ?>">Hapus</a>
				</td>
			</tr>

		<?php $no++;
	}
	echo "</table>";
	echo "</fieldset>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$kelas = $_POST['kelas'];
		$guru = $_POST['guru'];
		
		if(!empty($kelas) && !empty($guru)){
			$update = mysqli_query($koneksi, "UPDATE walikelas SET idguru='$guru' WHERE kelas='$kelas'");
			// $update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: walikelas.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}

	}
	
	// tampilkan form ubah
	if(isset($_GET['kls'])) { ?>

			<a href="walikelas.php"> &laquo; Home</a> | 
			<a href="walikelas.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			<?php
				$sqlEdit = mysqli_query($koneksi, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
				$e=mysqli_fetch_array($sqlEdit);
			?>
			<form action="" method="POST">
			<fieldset>
				<legend><h2>Ubah data</h2></legend>
				<table>
					<tr>
						<td>Kelas</td>
						<td><input type="text" name="kelas" value="<?php echo $e['kelas']; ?>" maxlength="40" ></td>
					</tr>
					<tr>
						<td>Pilih Guru / Wali Kelas</td>
						<td>
							<select name="guru">
								<?php 
									$sqlguru=mysqli_query($koneksi,"SELECT * FROM guru ORDER BY id ASC");
									while ($g=mysqli_fetch_array($sqlguru)) {
										if($g['id'] == $e['idguru']) {
											$selected = "selected";
									} else {
										$selected = "";
									}

									echo "<option value='$g[id]' $selected>$g[nama_guru]</option>";
								}
								 ?>
							</select>
						</td>
					</tr>
					<tr><td></td></tr>
					<tr>
						<td><input type="submit" name="btn_ubah" value="Simpan Perubahan"/></td>
						<td> atau <a href="walikelas.php?aksi=delete&kls=<?php echo $_GET['kelas'] ?>"> (x) Hapus data ini</a>!</td>
					</td>
					</tr>
				</table>
				<label>
					
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				
			</fieldset>
			</form>
		<?php
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['kls']) && isset($_GET['aksi'])){
		$hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE kelas='$_GET[kls]'");		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: walikelas.php');
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// ===================================================================

// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="walikelas.php"> &laquo; Home</a>';
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?>
</div>
<?php include "footer.php"; ?>