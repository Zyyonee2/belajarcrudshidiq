<?php
	include 'koneksi.php';

	session_start();

	$_SESSION['eksekusi'] = "Halo Semua";

	echo $_SESSION['eksekusi'];

	$query = "SELECT * FROM taruna2;";
	$sql = mysqli_query($conn, $query);
	$no = 0;


?>
<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<!--Font Awesom -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>belajar crud</title>
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">CRUD -BS5</a>
	  </div>
	</nav>

	<!--Judul-->
	<div class="container">
		<h1 class="mt-3">Data Taruna SMKN 3 Pariaman</h1>
		<figure>
		  <blockquote class="blockquote">
		    <p>Berisi data yang telah disimpan didatabase</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    CRUD <cite title="Source Title">Create Read Update Delete </cite>
		  </figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus" aria-hidden="true"> Tambah Data</i>
		</a>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Holy guacamole!</strong> You should check in on some of those fields below.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>

		<div class="table-responsive">
			<div class="table-responsive">
				<table class="table align-middle table-bordered table-hover">
				    <thead>
				      <tr>
				        <th><center>No</center></th>
				        <th>Nisn</th>
				        <th>Nama Taruna</th>
				        <th>Jenis Kelamin</th>
				        <th>Foto Taruna</th>
				        <th>Alamat</th>
				        <th>Aksi</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		while($result = mysqli_fetch_assoc($sql)) {
				    	?>
				      <tr>
				    	<td><center><?php echo ++$no;?>.</center></td>
				    	<td><?php echo $result['nisn']; ?></td>
				    	<td><?php echo $result['nama_taruna']; ?></td>
				    	<td><?php echo $result['jenis_kelamin']; ?></td>
				    	<td>
				    		<img src="img/<?php echo $result['foto_taruna']; ?>" style="width: 100px;">
				    	</td>
				    	<td><?php echo $result['alamat']; ?></td>
				    	<td>
				    		<a href="kelola.php?ubah=<?php echo $result['id_taruna']; ?>" type="button" class="btn btn-success btn-sm">
				    			<i class="fa fa-pencil" aria-hidden="true"></i>
				    		</a>
				    		<a href="proses.php?hapus=<?php echo $result['id_taruna']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin mengahapus data tersebut..??')">
				    			<i class="fa fa-trash" aria-hidden="true"></i>
				    		</a>
				    	</td>
				      </tr>
				      <?php
				      		}
				      ?>
				      </tbody>
				</table>
		</div>
	</div>
</body>
</html>