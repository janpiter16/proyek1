<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "crud_alumni";

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

// Cek dan buat kolom 'tahun_lulus' jika belum ada
$checkColumnQuery = "SHOW COLUMNS FROM alumni LIKE 'tahun_lulus'";
$result = $koneksi->query($checkColumnQuery);

if ($result->num_rows == 0) {
    // The 'tahun_lulus' column does not exist, so add it
    $alterTableQuery = "ALTER TABLE alumni ADD COLUMN tahun_lulus VARCHAR(4)";
    $koneksi->query($alterTableQuery);
}

// Fungsi untuk menampilkan data
function tampilkanData()
{
    global $koneksi;
    $result = $koneksi->query("SELECT * FROM alumni");

    echo "<h2>Daftar Alumni</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Tahun Lulus</th>
                <th>Deskripsi</th>
                <th>Jenjang Karir</th>
                <th>Foto</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['jurusan']}</td>
                <td>{$row['tahun_lulus']}</td>
                <td>{$row['deskripsi']}</td>
                <td>{$row['jenjang_karir']}</td>
                <td><img src='{$row['foto']}' alt='Foto' style='max-width: 50px; max-height: 50px;'></td>
            </tr>";
    }

    echo "</table>";
}

// Fungsi untuk menambah data
function tambahData()
{
    global $koneksi;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_lengkap = $_POST["nama_lengkap"];
        $jurusan = $_POST["jurusan"];
        $tahun_lulus = $_POST["tahun_lulus"];
        $deskripsi = $_POST["deskripsi"];
        $jenjang_karir = $_POST["jenjang_karir"];

        // Handle upload foto
        $foto_path = "uploads/";
        $foto_name = time() . ''; // Generate a unique name
        $foto_temp = $_FILES["foto"]["tmp_name"];
        $foto_destination = $foto_path . $foto_name;

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($foto_path)) {
            mkdir($foto_path, 0777, true);
        }

        // Move the uploaded file to the destination
        if (move_uploaded_file($foto_temp, $foto_destination)) {
            $query = "INSERT INTO alumni (nama_lengkap, jurusan, tahun_lulus, deskripsi, jenjang_karir, foto) 
                      VALUES ('$nama_lengkap', '$jurusan', '$tahun_lulus', '$deskripsi', '$jenjang_karir', '$foto_destination')";
            $result = $koneksi->query($query);

            if ($result) {
                echo "Data berhasil ditambahkan.";
            } else {
                echo "Error: " . $query . "<br>" . $koneksi->error;
            }
        } else {
            echo "Error moving uploaded file.";
        }
    }
}

// Tampilkan data
tampilkanData();

// Tambah data form
echo "<h2>Form Tambah Alumni</h2>";
echo "<form action='' method='post' enctype='multipart/form-data'>
        Nama Lengkap: <input type='text' name='nama_lengkap' required><br>
        Jurusan: <input type='text' name='jurusan' required><br>
        Tahun Lulus: <input type='text' name='tahun_lulus' required><br>
        Deskripsi: <textarea name='deskripsi' required></textarea><br>
        Jenjang Karir: <input type='text' name='jenjang_karir' required><br>
        Upload Foto: <input type='file' name='foto' required><br>
        <input type='submit' value='Tambah'>
    </form>";

// Tambah data ke database
tambahData();

$koneksi->close();
?>
