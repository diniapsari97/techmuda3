<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=mydb;host=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Gagal Koneksi Karena ' . $e->getMessage();
}

?>