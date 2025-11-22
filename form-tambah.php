<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- Navigasi -->
<?php include './navigation.php'; ?>
    <div class="form-container">
    <h2 class="form-title">Tambah Data Barang</h2>
    <form>
        <div class="form-group">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" id="kode_barang" name="kode_barang" placeholder="Masukkan kode barang">
        </div>

        <div class="form-group">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" >
        </div>

        <div class="form-group">
            <label for="harga_perolehan" class="form-label">Harga Perolehan</label>
            <input type="text" id="harga_perolehan" name="harga_perolehan" placeholder="Masukkan harga perolehan" >
        </div>

        <div class="form-group">
            <label for="harga_jual" class="form-label">Harga Jual</label>
            <input type="text" id="harga_jual" name="harga_jual" placeholder="Masukkan harga jual" >
        </div>

        <div class="form-group">
            <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
            <input type="text" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan jumlah stok" >
        </div>

        <div class="form-group">
            <label for="supplier" class="form-label">Supplier Utama</label>
            <select id="supplier_utama" name="supplier" >
                <option value="">Pilih supplier</option>
                <option value="Supplier A">Supplier A</option>
                <option value="Supplier B">Supplier B</option>
                <option value="Supplier C">Supplier C</option>
            </select>
        </div>

        <button type="submit" id="btnTambah" class="form-button">Tambah Data</button>
    </form>
</div>
<!-- Footer -->
<?php include './footer.php'; ?> 

<script src="./main.js" type="module"></script>
</body>
</html>








