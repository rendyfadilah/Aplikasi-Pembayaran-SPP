S<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH DATA GURU</h3>
                     
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
		<td>Nama Guru</td>
		<td>
			<input class="form-control" type="text" name="guru" placeholder="Masukan Nama Guru">
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
 	$guru = $_POST['guru'];

 	$simpan = $koneksi -> query("INSERT INTO guru (namaguru) VALUES('$guru')");
 	if( $simpan ){
 		echo "
 		<script>
 		alert('data guru berhasil ditambahkan');
 		document.location.href = 'tampil_guru.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data guru gagal ditambahkan');
 		document.location.href = 'tampil_guru.php';
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
</div>