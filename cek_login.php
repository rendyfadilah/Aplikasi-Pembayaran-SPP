<?php
session_start();
if (isset($_SESSION['login']) ) {
	header('Location: index.php');
} 

include 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST') {
$username =$_POST['username'];
$password =md5($_POST['password']);
}

$login = mysqli_query($koneksi,"select * from user where username='$username'and password='$password'");
$cek =mysqli_num_rows($login);
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	//cek jika user sebagai admin
	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location: ./index.php");

	//cek jika user sebagai pegawai
	}else 	if($data['level']=="pegtugas"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location: halaman_petugas.php");

	//cek jika user sebagai siswa
	}else 	if($data['level']=="siswa"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		header("location: halaman_siswa.php");
	}else{
		header("location:index.php?pesan=gagal");

	}
}else{
		header("location:index.php?pesan=gagal");

	}

?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HALAMAN LOGIN</title>
    <style >
    	.col-md-4col-md-offset-4{
    		margin-top: 20px;
    	}
    	body{
    		background:url('img/beasiswa.jpg');
    		background-size: 100%;
    	}
    </style>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>
</head>
<body>

	
	<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div  class="panel panel-info">
		<div class="panel-heading">
			<center><h2>MENU LOGIN</h2>
			<h3>Aplikasi Pembayaran SPP</h3></center>
			<?php if (isset($error) ) :  ?>
				<div class="alert alert-warning">
		<span><b>Peringatan!!</b>Form Belum Lengkap</span>
		</div>
	<?php endif;  ?>

	</div>	
	<div class="panel-body">
		
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td>
					<input class="form-control" type="text" name="username" placeholder="Masukan Username">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input class="form-control" type="Password" name="password" placeholder="password">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button class="btn btn-success" name="login">LOGIN</button>
				</td>
			</tr>
		</table>
	</form>
</div>
</div>
</div>
	</div>
</body>
</html>
<?php include 'footer.php';  ?>
