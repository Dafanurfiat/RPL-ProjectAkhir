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

		$dtransaksi = read_data("SELECT s.namaBarang, d.jumlahBarang, d.idBarang, s.fotoBarang 
								 FROM detailtransaksi d
								 JOIN stok s on s.idBarang=d.idBarang
								 WHERE d.idDetailTransaksi=$id and d.jumlahBarang>0");
		return $dtransaksi;	
	}

	// read
	function read_detail_data_usage($id){

		$dtransaksi = read_data("SELECT m.namaMakanan, d.jumlahBarang, d.idMakanan, m.gambar
								 FROM detailOrders d
								 JOIN makanan m on m.idMakanan=d.idMakanan
								 WHERE d.idOrder=$id and d.jumlahBarang>0");
		return $dtransaksi;	
	}

	// create
	function create_data($new_data){

		global $conn;
		$status = 0;
		$statusReq = 0;
		$isKokiReq = 1; 
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
	// create
	function create_data_usage($new_data){

		global $conn;
		$makanan = read_data("SELECT * FROM makanan");
		$totalHarga = 0;
		for($i=0; $i<sizeof($makanan); $i++){
			$totalHarga += $makanan[$i]["hargaMakanan"] * $new_data[$i + 1];
		}

		$query = "INSERT INTO orders 
		 	  	  VALUES
		 	      (null, CURDATE(), '$totalHarga')";
		mysqli_query($conn, $query);

		$newId = read_data("SELECT idOrder FROM orders ORDER BY idOrder DESC LIMIT 1;");
		$newId = intval($newId[0]["idOrder"]);

		for ($i = 0; $i < sizeof($makanan); $i++) {
			$d_jumlahMakanan = $new_data[$i + 1];
			$d_idMakanan = $i + 1;
    		$query2 = "INSERT INTO detailOrders 
               		   VALUES
               		   ('$d_jumlahMakanan', '$newId', '$d_idMakanan')";
    		mysqli_query($conn, $query2);
		}
		return mysqli_affected_rows($conn);
	}

	function cariHarga($id){
		global $conn;
		$hargaBarang = read_data("SELECT hargaBarang FROM stok WHERE idBarang='$id'");
		$harga = $hargaBarang[0]["hargaBarang"];
		return $harga; 
	}

	function cariHarga_usage($id){
		global $conn;
		$hargaBarang = read_data("SELECT hargaMakanan FROM makanan WHERE idMakanan='$id'");
		$harga = $hargaBarang[0]["hargaMakanan"];
		return $harga; 
	}

	function cariIngredients($id){
		global $conn;
		$ingredients = read_data("SELECT k.jumlahBarang, s.namaBarang FROM komposisi k JOIN stok s ON s.IdBarang=k.idBarang WHERE idMakanan='$id'");
		return $ingredients;
	}


?>