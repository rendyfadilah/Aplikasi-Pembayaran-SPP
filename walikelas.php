<?php
include 'koneksi.php';

include "header.php"; ?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
 

               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">DATA WALIKELAS</h3>
                     
                    </div>
                </div>
                <a class ="btn btn-primary" href="tambah_walikelas.php">Tambah Data</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                               <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
<tr>
	<th>NO</th>
	<th>KELAS</th>
	<th>NAMA GURU</th>
	<th>AKSI</th>
</tr>
<?php
	$data = $koneksi -> query("SELECT walikelas.kelas, walikelas.idguru,guru.namaguru FROM walikelas INNER JOIN guru ON walikelas.idguru=guru.idguru ORDER BY walikelas.kelas ASC ");

	$i = 1;
	while($dta = mysqli_fetch_assoc($data)) :
	?>
	<tr>
		<td width="40" align="center"><?=$i;?></td>
		<td align="center"><?= $dta['kelas'] ?></td>
		<td><?= $dta['namaguru'] ?></td>
		<td width="160px">
			<a class="btn btn-warning btn-sm" href="edit_walikelas.php?kls=<?= $dta['kelas'] ?>">EDIT</a> 
			<a class="btn btn-danger btn-sm" href="hapus_walikelas.php?kls=<?= $dta['kelas'] ?>"onclick="return confirm('apakah anda yakin menghapus data?')">HAPUS</a>
		</td>
	</tr>
	<?php $i++ ; ?>
<?php endwhile; ?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
