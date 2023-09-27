<?php
	//fungsi
	 include 'fungsi.php';
	
	//Kondisi 
	if(isset($_POST['aksi'])) {
		if($_POST['aksi'] == "add") {

			$berhasil = tambah_data($_POST, $_FILES);


			if($berhasil) {
				header("location: index.php");
			} else {
				echo $berhasil;
			}

  		// Edit Data
		} else if($_POST['aksi'] =="edit") {

			$berhasil = ubah_data($_POST, $_FILES);
			if($berhasil) {
				header("location: index.php");
			} else {
				echo $berhasil;
			}

		}
	} 
	// Hapus Data
	if(isset($_GET['hapus'])) {

		$berhasil = hapus_data($_GET);

		if($berhasil) {
			header("location: index.php");
		} else {
			echo $berhasil;
		}
		// echo "Hapus Data <a href='index.php'>[Home] </a>";
	}
?>
