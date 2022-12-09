<?php include "header.php"; 
include "koneksi.php";
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
 

               
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">DATA GURU</h3>
                     
                    </div>
                </div>
                <a class ="btn btn-primary" href="tambah_siswa.php">Tambah Data</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                               <div class="table-responsive m-t-40">
<table class='table table-striped table-bordered data'>
	<tr class="info">
		<th>No.</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Biaya</th>
		<th>Aksi</th>
	</tr>
	<?php 
		$sql=mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY kelas ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)) {
			echo "<tr>
				<td>$no</td>
				<td>$d[nisn]</td>
				<td>$d[nis]</td>
				<td>$d[namasiswa]</td>
				<td>$d[kelas]</td>
				<td>$d[tahunajaran]</td>
				<td>$d[biaya]</td>
				<td>
					<a class='btn btn-warning' href='edit_siswa.php?id=$d[idsiswa]'>Edit</a>
					<a class='btn btn-danger' href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
	 ?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
