<?php 
require "functions.php";
$id = $_GET["id"];

if(delete_makanan($id) > 0){
	echo "
		<script>
			alert('orderan berhasil dihapus');
			document.location.href='food.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('orderan gagal dihapus, karena sedang dalam perjalan, mohon menunggu!');
			document.location.href='food.php';
		</script>
	";
}

?>