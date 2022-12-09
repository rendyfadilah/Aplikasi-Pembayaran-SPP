<?php include "header.php"; ?>
<div class="panel-body">

	<div class="container">
	</div>
	

<?php

// --- koneksi ke database
include_once 'koneksi.php';

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$id = time();
		$nm_guru = $_POST['nm_guru'];
		
		if(!empty($nm_guru)){
			$sql = "INSERT INTO guru (idguru,namaguru) VALUES(".$id.",'".$nm_guru."')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: guru.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
		<form action="" method="POST">
			<table class="table">
				<tr>
					<td>Nama Guru</td>
					<td><input class="form-control" type="text" name="nm_guru" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-success" type="submit" name="btn_simpan" value="Simpan"/></td>
				</tr>
				<h3 align="center">Tambah data</h3>
				
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</table>
		</form>
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM guru ORDER BY namaguru ASC";
	$query = mysqli_query($koneksi, $sql);
	$no=1;
	
	echo "<h3 align='center'>Data Guru</h3>";
	echo "<a class='btn btn-primary' href='guru.php?aksi=create'>Tambah Data</a>";
	echo "<p>";
	echo "<table class='table table-bordered table-striped'>";
	echo "<tr>
			<th>No.</th>
			<th>ID Guru</th>
			<th>Nama Guru</th>
			<th>Tindakan</th>
		  </tr>";
	
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td width="40px" align="center"><?php echo $no; ?></td>
				<td><?php echo $data['idguru']; ?></td>
				<td><?php echo $data['namaguru']; ?></td>
				<td width="200px" align="center">
					<a class="btn btn-warning btn_sm" href="guru.php?aksi=update&id=<?php echo $data['idguru']; ?>&nm_guru=<?php echo $data['namaguru']; ?>">Ubah</a>
					<a class="btn btn-danger btn_sm" href="guru.php?aksi=delete&id=<?php echo $data['idguru']; ?>">Hapus</a>
				</td>
			</tr>
		<?php $no++;
	}
	echo "</table>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$nm_guru = $_POST['nm_guru'];
		
		if(!empty($nm_guru)){
			$perubahan = "namaguru='".$nm_guru."'";
			$sql_update = "UPDATE guru SET ".$perubahan." WHERE idguru=$id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: guru.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){
		?>		
		<h2 align="center">Ubah data</h2>
			<form action="" method="POST">
				<table class="table">
					<tr>
						<td>Nama Guru</td>
						<td><input class="form-control" type="text" name="nm_guru" value="<?php echo $_GET['nm_guru'] ?>"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="btn btn-success" type="submit" name="btn_ubah" value="Simpan Perubahan"/></td>
					</tr>
				</table>
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

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM guru WHERE id=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: guru.php');
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
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			// tampil_data($koneksi);
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

<?php include "footer.php"; ?>