<?php
    // Mengambil id dari file index.php
    $id = $_GET['index'];
 
    // Mengambil dari data JSON
    $data = file_get_contents('data.json');
    $data = json_decode($data);
 
    // Menghapus data sesuai index JSON
    unset($data[$id]);
 
    // Mengubah data menjadi format JSON
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $data);
 
    // Mengarahkan pengguna ke halaman utama
    header('location: index.php');
?>