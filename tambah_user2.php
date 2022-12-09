<?php
include 'koneksi.php';

?>
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
           
<form action="" method="post">
<table class="table ">
	<tr>
		<td>Nama User</td>
		<td>
			<input class="form-control" type="text" name="nama" placeholder="Masukan Nama User">
		</td>
	</tr>
	<tr>
		<td>Username</td>
		<td>
			<input class="form-control" type="text" name="username" placeholder="Masukan Username">
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<input class="form-control" type="text" name="password" placeholder="Masukan Password">
		</td>
	</tr>
	<tr>
		<td>Level</td>
		<td>
			<input class="form-control" type="text" name="level" placeholder="Masukan Level">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="tambah">SIMPAN</button>
		</td>
	</tr>
</table>
</form>

<?php
 if ( isset($_POST['tambah']) ) {
 	$nama = $_POST['nama'];
 	$username = $_POST['username'];
 	$password = md5($_POST['password']);
 	$level = $_POST['level'];

 	$simpan = $koneksi -> query("INSERT INTO user (nama,username,password,level) VALUES('$nama','$username','$password','$level')");
 	if( $simpan ){
 		echo "
 		<script>
 		alert('data user berhasil ditambahkan');
 		document.location.href = 'tampil_user.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data user gagal ditambahkan');
 		document.location.href = 'tampil_user.php';
 		</script>
 		";
 	}
 }


?>
</div>
</div>
</div>
</div></div>
</div>