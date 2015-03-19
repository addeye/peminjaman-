<?php
//variabel koneksi mysql server
$HOST = "localhost"; // Host database
$USER = "root"; // Usernama database
$PASSWORD = ""; // Password database
$DATABASE = "ruangkelas"; // Nama database

 
//konek ke mysql server
$sqli = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
 
//mengecek jika terjadi gagal koneksi
if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database. ";
    exit;
  
}
?>
