<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query_sql = "SELECT * FROM tbl_users
                WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($koneksi, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store user information in session
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // Check the user's role and redirect accordingly
        if ($row['role'] == 'Admin') {
            header("Location: admin/home.php");
        } else {
            header("Location: admin/fasilitas_kamar.php");
        }
    } else {
        echo "<center><h1>Email atau Password Anda Salah. Silahkan Coba Login Kembali.</h1>
        <button><strong><a href='index.html'>Login</a></strong></button></center>";
    }
} else {
    echo "Invalid request method.";
}
?>
