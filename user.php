<?php include "header.php"; ?>
    <div class="main-content">
        <section class="section">
          <div class="section-header">
<?php

include "koneksi.php";

function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$id = time();
		$nm_lengkap = $_POST['nm_lengkap'];
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$lvl = $_POST['lvl'];

		
		if(!empty($nm_lengkap) && !empty($user) && !empty($pass) && !empty($lvl)){
			$sql = "INSERT INTO user (iduser,nama,username,password,level) VALUES(".$id.",'".$nm_lengkap."','".$user."','".$pass."','".$lvl."')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: user.php');
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
					<td>Nama Lengkap</td>
					<td><input class="form-control" type="text" name="nm_lengkap" /></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input class="form-control" type="text" name="user" /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="form-control" type="password" name="pass" /></td>
				</tr>
				<tr>
					<td>Level</td>
					<td><input class="form-control" type="text" name="lvl" /></td>
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
	</div></section>
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM user ORDER BY iduser DESC";
	$query = mysqli_query($koneksi, $sql);
	
	echo "<fieldset>";
	echo "<legend><h2>Data User</h2></legend>";
	
	echo "<table class='table table-bordered table-hover' border='1' cellpadding='10'>";
	echo "<thead>";
	echo "<tr>
			<th>ID User</th>
			<th>Nama User</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Tindakan</th>
		  </tr>
		  </thead>";
	
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $data['iduser']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['level']; ?></td>
				<td>
					<a class="btn btn-info" href="user.php?aksi=update&id=<?php echo $data['iduser']; ?>&nm_lengkap=<?php echo $data['nama']; ?>&user=<?php echo $data['username']; ?>&pass=<?php echo $data['password']; ?>&lvl=<?php echo $data['level']; ?>">Ubah</a> 
					<a class="btn btn-danger" href="user.php?aksi=delete&id=<?php echo $data['iduser']; ?>">Hapus</a>
						
				</td>
			</tr>
		<?php
	}
	echo "</table>";
	echo "</fieldset>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$id = time();
		$nm_lengkap = $_POST['nm_lengkap'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$lvl = $_POST['lvl'];
		
		if(!empty($nm_lengkap)){
			$perubahan = "nama='".$nm_lengkap."',username='".$user."',password='".$pass."',level='".$lvl."'";
			$sql_update = "UPDATE user SET ".$perubahan." WHERE iduser=$id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: user.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){
		?>
			<a class="btn btn-success" href="user.php"> &laquo; Home</a>  
			<a class="btn btn-info" href="user.php?aksi=create">(+) Tambah Data </a>
			<hr>
			
			<form action="" method="POST">
				<table class="table">
<tr>
	<td>Nama User</td>
	<td><input class="form-control" type="text" name="nm_lengkap" value="<?php echo $_GET['nm_lengkap'] ?>"/></td>
</tr>
<tr>
	<td>Username</td>
	<td><input class="form-control" type="text" name="user" value="<?php echo $_GET['user'] ?>"/></td>
</tr>
<tr>
	<td>Nama User</td>
	<td><input  class="form-control" type="password" name="pass" value="<?php echo $_GET['pass'] ?>"/></td>
</tr>
<tr>
	<td>level</td>
	<td><input class="form-control" type="text" name="lvl" value="<?php echo $_GET['lvl'] ?>"/></td>
</tr>
<tr>
	<td>
		<input class="btn btn-primary" type="submit" name="btn_ubah" value="Simpan Perubahan"/> Or <a class="btn btn-danger" href="user.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>
		
	</td>
</tr>

				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				
	</table>
			</form>
		<?php
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM user WHERE iduser=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: user.php');
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
			echo '<a href="user.php"> &laquo; Home</a>';
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
</main>
