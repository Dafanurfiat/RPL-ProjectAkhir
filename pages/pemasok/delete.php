<?php 
require "functions.php";
$id = $_GET["id"];

if(delete_stok($id) > 0){
	echo "
		<script>
			alert('orderan berhasil dihapus');
			document.location.href='stockpemasok.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('orderan gagal dihapus, karena sedang dalam perjalan, mohon menunggu!');
			document.location.href='stockpemasok.php';
		</script>
	";
}

?>