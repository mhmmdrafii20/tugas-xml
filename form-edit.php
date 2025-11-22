<?php 
    $index = intval($_GET['index']) ?? 0;
    
    $xml = simplexml_load_file('data.xml');

    $item = $xml->barang[$index] ?? null;

    if(!$item){
    echo "Data tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Navigasi -->
    <?php include 'navigation.php'; ?>

    <div class="form-container">
        <h2 class="form-title">Edit Data Barang</h2>
        <form>
            <div class="form-group">
                <input type="hidden" id="index" name="index" value="<?= $index ?>" >
            </div>
            <div class="form-group">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" id="kode_barang" name="kode_barang" value="<?= $item->kode_barang ?>" placeholder="Masukkan kode barang" >
            </div>

            <div class="form-group">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?= $item->nama_barang ?>" placeholder="Masukkan nama barang" >
            </div>

            <div class="form-group">
                <label for="harga_perolehan" class="form-label">Harga Perolehan</label>
                <input type="text" id="harga_perolehan" name="harga_perolehan" value="<?= $item->harga_perolehan ?>" placeholder="Masukkan harga perolehan" >
            </div>

            <div class="form-group">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" id="harga_jual" name="harga_jual" value="<?= $item->harga_jual ?>"  placeholder="Masukkan harga jual">
            </div>

            <div class="form-group">
                <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
                <input type="text" id="jumlah_stok" name="jumlah_stok" value="<?= $item->jumlah_stok ?>"  placeholder="Masukkan jumlah stok" >
            </div>

            <div class="form-group">
                <label for="supplier" class="form-label">Supplier Utama</label>
                <select id="supplier_utama" name="supplier_utama" >
                    <option value="Supplier A"  <?= ($item['supplier_utama'] == 'Supplier A') ? 'selected' : '' ?>>Supplier A</option>
                    <option value="Supplier B"  <?= ($item['supplier_utama'] == 'Supplier B') ? 'selected' : '' ?>>Supplier B</option>
                    <option value="Supplier C"  <?= ($item['supplier_utama'] == 'Supplier C') ? 'selected' : '' ?>>Supplier C</option>
                </select>
            </div>

            <button type="submit" id="btnUbah" class="form-button">Edit Data</button>
        </form>
    </div>
<script src="./main.js" type="module"></script>
</body>
</html>






<!-- Footer -->
<!-- <?php include 'footer.php'; ?>  -->