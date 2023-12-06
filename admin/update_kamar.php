<?php

include 'koneksi.php';

if(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $tipe_kamar = $_POST['type'];
    $jumlah_kamar = $_POST['jumlah_kamar'];

    $sql = "UPDATE tabel_kamar SET type_kamar = '$tipe_kamar', jumlah = '$jumlah_kamar' WHERE id_kamar = '$id'";
    $query = mysqli_query($koneksi, $sql);

    if(!$query) {
        echo "<script>alert('Data gagal diubah');</script>";
    }
    header('Location: home.php');

}

?>