<?php
// $con = mysqli_connect("localhost", "root", "", "hackathon23");
$host = 'localhost';
$dbname = 'hackathon23';
$user = 'root';
$password = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// $servername = "localhost";
// $database = "u325842128_hackathon23";
// $username = "u325842128_cejess";
// $password = "Sidomulyo23";

// try {
//     $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Koneksi berhasil";
// } catch (PDOException $e) {
//     die("Koneksi gagal: " . $e->getMessage());
// }
?>