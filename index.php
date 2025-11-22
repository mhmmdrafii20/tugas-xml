<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Table Data Mahasiswa</title>
</head>
<body>
<!-- Navigasi -->
<?php include './navigation.php'; ?>
<!-- Footer -->
<?php include './footer.php'; ?> 

<h2 class="main-heading">Data Barang</h2>
<a href="form-tambah.php" class="btnTambah">Tambah Barang</a>

<!-- Search Bar -->
<?php include './search-bar.php'; ?> 

<div class="table-wrapper">
    <table id="table">

    </table>
</div>

<script src="./main.js" type="module"></script>
</body>
</html>