<?php 
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tabel_fasilitas_kamar WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header('Location: fasilitas_kamar.php');
    } else {
        echo "<script>alert('gagal hapus data')";
        header('Location: fasilitas_kamar.php');
    }
}
?>