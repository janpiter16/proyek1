<?php

include 'koneksi.php';

if(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $tipe_kamar = $_POST['type_kamar'];
    $fasilitas = $_POST['fasilitas'];

    $sql = "UPDATE tabel_fasilitas_kamar SET type_kamar = '$tipe_kamar', fasilitas = '$fasilitas' WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    if(!$query) {
        echo "<script>alert('Data gagal diubah');</script>";
    }
    header('Location: fasilitas_kamar.php');

}

?>