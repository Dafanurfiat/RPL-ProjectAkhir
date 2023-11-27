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


	function approve($id){
		global $conn;
		$query = "UPDATE transaksi SET statusReq=1, status=2 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function notapprove($id){
		global $conn;
		$query = "UPDATE transaksi SET status=4 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function deliv_approve($id){
		global $conn;
		$query = "UPDATE transaksi SET statusReq=1, status=3 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function deliv_notapprove($id){
		global $conn;
		$query = "UPDATE transaksi SET status=4 WHERE idTransaksi='$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}



	function cariHarga($id){
		global $conn;
		$hargaBarang = read_data("SELECT hargaBarang FROM stok WHERE idBarang='$id'");
		$harga = $hargaBarang[0]["hargaBarang"];
		return $harga; 
	}


?>