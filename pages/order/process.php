<?php
// process.php
include '../../config.php';

$sqlSelect = "SELECT nama_barang, Jumlah, Image FROM `order`";
$resultSelect = $conn->query($sqlSelect);

if (isset($_POST['action']) && isset($_POST['orderId'])) {
    $action = $_POST['action'];
    $orderId = $_POST['orderId'];
    $inputNumber = $_POST["nomor"];

    // Lakukan operasi berdasarkan tindakan
    if ($action === 'accept') {
        if ($resultSelect->num_rows > 0) {
            while ($row = $resultSelect->fetch_assoc()) {
                $nama = $row['nama_barang'];
                $amount = $row['Jumlah'];
                $gambar = $row['Image'];
                
        
                // Cek apakah data sudah ada di tabel tujuan
                $sqlCheck = "SELECT * FROM `stok-barang` WHERE nama_barang='$nama'";
                $resultCheck = $conn->query($sqlCheck);
        
                if ($resultCheck->num_rows > 0) {
                    // Jika data sudah ada, update jumlah (amount)
                    $sqlUpdate = "UPDATE `stok-barang` SET Jumlah = Jumlah + $inputNumber WHERE nama_barang='$nama'";
                    $conn->query($sqlUpdate);
                } else {
                    // Jika data belum ada, tambahkan ke tabel tujuan
                    $sqlInsert = "INSERT INTO `stok-barang` (nama_barang, Jumlah, Image) VALUES ('$nama', $inputNumber, '$gambar')";
                    $conn->query($sqlInsert);
                }
            }
            // Hapus data dari tabel sumber setelah diproses
            $sqlDelete = "DELETE FROM `order`";
            $conn->query($sqlDelete);
        }
    } elseif ($action === 'decline') {
        // Implementasi logika untuk tindakan decline
        // Hapus data dari tabel berdasarkan orderId
    }

    // Kirim respons ke klien jika diperlukan
    echo "Berhasil"; // atau format JSON atau respons lainnya
}
?>
