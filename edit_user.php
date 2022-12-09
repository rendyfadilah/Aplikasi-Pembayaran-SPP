<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser='$_GET[id]'");
$dta = mysqli_fetch_assoc($data);
include 'header.php';
?>
<script src="main.js"></script>

<div class="container">
  <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="tampil_user.php">User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Edit Data User</h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table"><form action="" method="post">
<table class="table ">
	<tr>
		<td> Nama Lengkap</td>
		<td>
			<input class="form-control" type="text" name="nama"value="<?= $dta['nama'] ?>">
		</td>
	</tr>
	<tr>
		<div class="alert alert-warning">
				<span><b>Biarkan Jika tidak diganti</b></span>
			</div>
		<td> Username</td>
		<td>
			<input type="hidden" name="id" value="<?= $dta['iduser'] ?>">
			<input class="form-control" type="text" name="user" value="<?= $dta['username'] ?>">
		</td>
	</tr>
	<tr>
		<td> Password</td>
		<td>
			<input class="form-control" type="Password" id="pass" name="pass" value="<?= $dta['password'] ?>">
			<input type="checkbox" name="cek" onclick="ShowPass()"> Show/Hide Password
		</td>
	</tr>
	<tr>
		<td> Level</td>
		<td>
			<input class="form-control" type="text" name="level"value="<?= $dta['level'] ?>">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="ubah">UPDATE</button>
			
		</td>
	</tr>
</table>
</form>

<?php
 if ( isset($_POST['ubah']) ) {
 	$id   = $_POST['id'];
 	$user = $_POST['user'];
 	$pass = $_POST['pass'];
 	$p    = hash('sha1', $pass);
 	$nama = $_POST['nama'];
 	$level = $_POST['level'];

 	$ubah = $koneksi -> query("UPDATE user SET
 	     username = '$user', 
 		 password     = '$p',
 		 nama = '$nama',
 		 level = '$level' WHERE iduser =".$id);

 	if( $ubah ){
 		echo "
 		<script>
 		alert('data admin berhasil diupdate');
 		document.location.href = 'tampil_user.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data admin gagal diupdate');
 		document.location.href = 'tampil_user.php';
 		</script>
 		";
 	}
 }


?>
</div>

</div>
</div>
</div>
</div>
</div>
<?php  include 'footer.php';  ?>