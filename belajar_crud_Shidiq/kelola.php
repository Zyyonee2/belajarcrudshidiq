<!DOCTYPE html>
<?php
	include 'koneksi.php';

	$id_taruna = '';
	$nisn = '';
	$nama = '';
	$jkel = '';
	$alamat = '';
	$no = 0;

	if(isset($_GET['ubah'])) {
		$id_taruna = $_GET['ubah'];

		$query = "SELECT * FROM taruna2 WHERE id_taruna = '$id_taruna';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$nisn = $result['nisn'];
		$nama = $result['nama_taruna'];
		$jkel = $result['jenis_kelamin'];
		$alamat = $result['alamat'];


	}
?>
<html>
<head>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<!--Font Awesom -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>belajar crud</title>
	<title>kelola</title>
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-light bg-light mb-3">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">CRUD -BS5</a>
		</div>
	</nav>
	<!--Form Post-->
	<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id_taruna; ?>" name="id_taruna">
			<div class="mb-3 row">
				<label for="nisn" class="col-sm-2 col-form-label">NISN</label>
				<div class="col-sm-10">
					<input required type="text" name="nisn" class="form-control" id="nisn" placeholder=" Ex : 005668" value="<?php echo $nisn; ?>" >
				</div>
			</div>
			<div class="mb-3 row">
				<label for="nama" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_taruna" class="form-control" id="nama" placeholder=" Ex :Rafsan Hidayat" value="<?php echo $nama; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select required id="jkel" name="jenis_kelamin" class="form-select" aria-label="Default select example">
						<option value="Laki-Laki" <?php if($jkel == 'Laki Laki'){echo "selected";} ?>>Laki-Laki</option>
						<option value="Perempuan" <?php if($jkel == 'Perempuan'){echo "selected";} ?>>Prempuan</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="foto" class="col-sm-2 col-form-label">
					Foto Taruna
				</label>
				<div class="col-sm-10">
					<input <?php if(!isset($_GET['ubah'])){echo "required";}?>  type="file" name="foto" class="form-control" id="foto" accept="image/*">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="alamat" class="col-sm-2 col-form-label">
					Alamat
				</label>
				<div class="col-sm-10">
					<textarea required class="form-control"  id="alamat" name="alamat" rows="3" ><?php echo $alamat; ?></textarea>
				</div>
			</div>
			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
						if(isset($_GET['ubah'])) {
						?>
						<button type="submit" value="edit" name="aksi" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
						</button>
						<?php
						} else {
						?>
						<button type="submit" value="add" name="aksi" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Tambahkan
						</button>
						<?php 
						}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-step-backward" aria-hidden="true"></i> Batal
					</a>
				</div>
			</div>
		</form>
	</div>

</body>
</html>