<?php 
require "functions.php";
$id = $_GET["id"];

if(approve($id) > 0){
	echo "
		<script>
			alert('orderan berhasil diterima');
			document.location.href='order.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('orderan gagal diterima');
			document.location.href='order.php';
		</script>
	";
}

?>