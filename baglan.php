<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "execc";
// MySQL veritabanına bağlanma
$conn = mysqli_connect($servername, $username, $password, $database);

// Bağlantıyı kontrol et
if (!$conn) {
    die("MySQL bağlantısı başarısız: " . mysqli_connect_error());
}
?>
