<?php
include 'koneksi.php';
$data = $koneksi -> query("SELECT * FROM guru WHERE idguru ='$_GET[id]'");
include 'header.php';
?>

<div class="container">
  <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="tampil_guru.php">Guru</a></li>
                            <li class="breadcrumb-item active">Edit Guru</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Edit Data Guru</h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
<form action="" method="post">
<table class="table">
	<?php
	while ($dta =mysqli_fetch_assoc($data) ) :
	?>
	<tr>
		<td>Nama Guru</td>
		<td>
			<input class="form-control" type="hidden" name="idguru" value="<?= $dta['idguru'] ?>">
			<input class="form-control" type="text" name="guru" value="<?= $dta['namaguru'] ?>" size = "30">
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
<?php endwhile; ?>
</body>
</html>
<?php
 if ( isset($_POST['ubah']) ) {
 	$id   = $_POST['idguru']; 
 	$guru = $_POST['guru'];

 	$ubah = $koneksi -> query("UPDATE guru SET namaguru = '$guru' WHERE idguru = ".$id);
 	if( $ubah ){
 		echo "
 		<script>
 		alert('data guru berhasil diedit');
 		document.location.href = 'tampil_guru.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data guru gagal diedit');
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
<?php  include 'footer.php';  ?>