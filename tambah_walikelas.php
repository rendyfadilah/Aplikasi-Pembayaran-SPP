<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
 

               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH DATA WALIKELAS</h3>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                               <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
           
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
	<form action="" method="post" >
		<table class="table " >
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<input class="form-control" type="text" name="kelas" placeholder="Masukan Kelas" size="30">
				</td>
			</tr>
			<tr>
				<td>Pilih Guru/Wali Kelas</td>
				<td>:</td>
				<td>
					<select class="form-control"  name="guru">
						<option value="" selected >- Pilih guru -</option>
						<?php
						$data = $koneksi -> query("SELECT * FROM guru ORDER BY idguru ASC");
						while ($dta = mysqli_fetch_assoc($data)) {
							echo "<option value = '$dta[idguru]'>$dta[namaguru]</option>" ;
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button class="btn btn-success" type="submit" name="tambah">SIMPAN</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
 if ( isset($_POST['tambah']) ) {
 	$kelas = $_POST['kelas'];
 	$guru  = $_POST['guru'];

 	$simpan = $koneksi -> query("INSERT INTO walikelas (kelas, idguru) VALUES('$kelas','$guru')");
 	if( $simpan ){
 		echo "
 		<script>
 		alert('data wali berhasil ditambahkan');
 		document.location.href = 'walikelas.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data wali gagal ditambahkan');
 		document.location.href = 'walikelas.php';
 		</script>
 		";
 	}
 }


?>
</div>
</table>
</div>
</div>
</div>
</div>
</div>
