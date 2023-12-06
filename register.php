<?php
require 'koneksi.php';
$fullName = $_POST["fullName"];
$username = $_POST["username"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$gender = $_POST["gender"];

$query_sql = "INSERT INTO tbl_users (fullName, username, email, PhoneNumber, password, confirmPassword, gender)
            VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$password', '$confirmPassword', '$gender')";

if (mysqli_query($koneksi, $query_sql)){
    header("Location: index.html");
}else {
    echo "pendaftaran Gagal : ".mysqli_error($koneksi);
}