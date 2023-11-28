<?php 

	// koneksi
	$conn = mysqli_connect("localhost", "root", "", "db_tendabiru");

	// read
	function read_data($query){

		$transaksi = [];
		global $conn;
		$result = mysqli_query($conn, $query);
		while ($data = mysqli_fetch_assoc($result)){
			$transaksi[] = $data;
		}
		return $transaksi;
	}

	// read
	function read_detail_data($id){

		$dtransaksi = read_data("SELECT s.namaBarang, d.jumlahBarang, d.idBarang
								 FROM detailtransaksi d
								 JOIN stok s on s.idBarang=d.idBarang
								 WHERE d.idDetailTransaksi=$id and d.jumlahBarang>0");
		return $dtransaksi;	
	}

	// create
	function create_data($new_data){

		global $conn;
		$status = 1;
		$statusReq = 1;
		$isKokiReq = 0; 
		$barang = read_data("SELECT * FROM stok");
		$totalHarga = 0;
		for($i=0; $i<sizeof($barang); $i++){
			$totalHarga += $barang[$i]["hargaBarang"] * $new_data[$i + 1];
		}

		$query = "INSERT INTO transaksi 
		 	  	  VALUES
		 	      (null, CURDATE(), '$totalHarga', '$status','$statusReq','$isKokiReq')";
		mysqli_query($conn, $query);

		$newId = read_data("SELECT idTransaksi FROM transaksi ORDER BY idTransaksi DESC LIMIT 1;");
		$newId = intval($newId[0]["idTransaksi"]);

		for ($i = 0; $i < sizeof($barang); $i++) {
			$d_jumlahBarang = $new_data[$i + 1];
			$d_idBarang = $i + 1;
    		$query2 = "INSERT INTO detailTransaksi 
               		   VALUES
               		   ('$newId', '$d_idBarang', '$d_jumlahBarang')";
    		mysqli_query($conn, $query2);
		}
		return mysqli_affected_rows($conn);
	}

	function create_data_makanan($new_data){
		global $conn;
		$namaMakanan = $_POST['nama'];
		$hargaMakanan = $_POST['harga'];
		$gambar = upload();
		if(!$gambar){
			return false;
		}
		$query = "INSERT INTO makanan VALUES (null,'$namaMakanan', '$hargaMakanan', '$gambar')";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}


	function approve($id){
		global $conn;
		$query = "UPDATE transaksi SET statusReq=1, status=1 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function notapprove($id){
		global $conn;
		$query = "UPDATE transaksi SET statusReq=2, status=4 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}


	function cariHarga($id){
		global $conn;
		$hargaBarang = read_data("SELECT hargaBarang FROM stok WHERE idBarang='$id'");
		$harga = $hargaBarang[0]["hargaBarang"];
		return $harga; 
	}

	function delete_transaksi($id){
		global $conn;
		$query = "DELETE FROM transaksi WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		$query = "DELETE FROM detailtransaksi WHERE idDetailTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function isOnProgress($value){
		if($value == 2){
			return true;
		}
	}

	function upload(){
		
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error']; 
		$tmpName = $_FILES['gambar']['tmp_name'];

		$ekstansiFileAcc = ['jpg', 'jpeg', 'png'];
		
		// cek apakah tidak ada gambar yang diupload 
		if ($error === 4){
			echo "<script>
				  	alert('pilih gambar terlebih dahulu');
				  </script>";
			return false;
		}

		// cek apakah yang diupload adalah gambar
		$eksistensiGambar = explode('.', $namaFile);
		$eksistensiGambar = strtolower(end($eksistensiGambar));
		if (!in_array($eksistensiGambar, $ekstansiFileAcc)){ 
			echo "<script>
				  	alert('yang anda upload bukan gambar');
				  </script>";
		}

		if ($ukuranFile > 5000000){ 
			echo "<script>
				  	alert('terlalu besar bro');
				  </script>";
			return false;
		}

		move_uploaded_file($tmpName, 'C:/Xampp/htdocs/template/assets/images/makanan/'.$namaFile);

		return $namaFile;
	}
	function delete_makanan($id){
		global $conn;
		$query = "DELETE FROM makanan WHERE idMakanan='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
?>