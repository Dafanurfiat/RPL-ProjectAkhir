<?php 
require "functions.php";
$id = $_GET["id"];

if(notapprove($id) > 0){
	echo "
		<script>
			alert('orderan berhasil ditolak');
			document.location.href='order.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('orderan gagal ditolak');
			document.location.href='order.php';
		</script>
	";
}

?>