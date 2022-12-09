<?php include 'header.php'; ?>

   <div class="main-content">
        <section class="section">
          <div class="section-header">
 

	           
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">DATA GURU</h3>
                     
                    </div>
                </div>
                <a class ="btn btn-primary" href="tambah_guru.php">Tambah Data</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                                <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
 	<tr>
 		<th>NO</th>
 		<th>ID</th>
 		<th>NAMA GURU</th>
		<th>AKSI</th>
 	</tr>
 	<?php 
 	include 'koneksi.php';
	$data = $koneksi -> query("SELECT * FROM guru ORDER BY idguru DESC");	
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['idguru'] ?></td>
 	 	<td><?= $dta['namaguru'] ?></td>
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm" href="edit_guru.php?id=<?= $dta['idguru'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="hapus_guru.php?id=<?= $dta['idguru'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data?')">HAPUS</a>
 	 	</td>
 	 </tr>
 	 <?php $i++;  ?>
 	<?php endwhile; ?>
 </table>
</body>
</div>
</div>
</div>
</div>
</div>
</section></div>
</div>
<script>
    $(document).ready(function(){
        $('.data').DataTable();
    });
</script>
</html>
