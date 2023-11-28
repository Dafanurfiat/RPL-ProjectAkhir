<?php 
require "functions.php";
$id = $_GET["id"];

if(delete_transaksi($id) > 0){
	echo "
		<script>
			alert('orderan berhasil dihapus');
			document.location.href='order.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('orderan gagal dihapus, karena sedang dalam perjalan, mohon menunggu!');
			document.location.href='order.php';
		</script>
	";
}

?>