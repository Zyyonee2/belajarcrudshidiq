<?php 
	//Koneksi
	include 'koneksi.php';

	// fungsi tambah data
	function tambah_data($data, $files) {
		$nisn = $data['nisn'];
		$nama = $data['nama_taruna'];
		$jkel = $data['jenis_kelamin'];
		$alamat = $data['alamat'];

		$split = explode('.', $files['foto']['name']);
		$ekstensi = $split[count($split)-1];

		$foto = $nisn.'.'.$ekstensi;

		$dir = "img/";//directorty
		$tmpfile = $files['foto']['tmp_name']; //tempat awl file
		move_uploaded_file($tmpfile, $dir.$foto);//eksekusi pemindahan foto
		//Tambah Data
		$query = "INSERT INTO taruna2 VALUES(null, '$nisn', '$nama', '$jkel', '$foto', '$alamat')";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
	function ubah_data($data, $files){
			$id_taruna = $_POST['id_taruna'];
			$nisn = $_POST['nisn'];
			$nama = $_POST['nama_taruna'];
			$jkel = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];

			// edit foto
			$queryshow = "SELECT * FROM taruna2 WHERE id_taruna = '$id_taruna';";
			$sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
			$result = mysqli_fetch_assoc($sqlshow);

			if($files['foto']['name'] == "") {
				$foto = $result['foto_taruna'];
			} else {
				$split = explode('.', $files['foto']['name']);
				$ekstensi = $split[count($split)-1];

				$foto = $result['nisn'].'.'.$ekstensi;
				unlink("img/".$result['foto_taruna']);
				move_uploaded_file($files['foto']['tmp_name'], 'img/'.$foto);//eksekusi pemindahan foto

			}
			// edit data
			$query = "UPDATE taruna2 SET nisn= '$nisn', nama_taruna = '$nama', jenis_kelamin ='$jkel', alamat = '$alamat', foto_taruna = '$foto' WHERE id_taruna = '$id_taruna';";
			$sql = mysqli_query($GLOBALS['conn'], $query);

			return true;
	}
	function hapus_data($data) {
		$id_taruna = $data['hapus'];
		$queryshow = "SELECT * FROM taruna2 WHERE id_taruna = '$id_taruna';";
		$sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
		$result = mysqli_fetch_assoc($sqlshow);

		// Hapus Foto
		unlink("img/".$result['foto_taruna']);

		$query = "DELETE FROM taruna2 WHERE id_taruna = '$id_taruna';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>