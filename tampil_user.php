<?php include 'header.php'; ?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
 

               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">DATA USER</h3>
                     
                    </div>
                </div>
                <a class ="btn btn-primary" href="tambah_user.php">Tambah Data</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                               <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
    <tr>
 	<tr>
 		<th>NO</th>
 		<th>ID</th>
 		<th>NAMA USER</th>
 		<th>USERNAME</th>
 		<th>PASSWORD</th>
 		<th>LEVEL</th>
		<th>AKSI</th>
 	</tr>
 	<?php 
 	include 'koneksi.php';
	$data = mysqli_query($koneksi,"SELECT * FROM user ORDER BY iduser ASC");	
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['iduser'] ?></td>
 	 	<td><?= $dta['nama'] ?></td>
 	 	<td><?= $dta['username'] ?></td>
 	 	<td><?= $dta['password'] ?></td>
 	 	<td><?= $dta['level'] ?></td>
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm" href="edit_user.php?id=<?= $dta['iduser'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="user_hapus.php?id=<?= $dta['iduser'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data User? ')">HAPUS</a>
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
</div>
</section>
</html>
