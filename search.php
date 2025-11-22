<?php 
    $keyword =  $_GET['keyword'] ?? '';
    $keyword = strtolower($keyword);

    $xml = simplexml_load_file("data.xml");

    $query = "//barang[contains(translate(nama_barang, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), '$keyword')]";

    $result = $xml->xpath($query);

    if (!$result) {
        echo "Tidak ditemukan data.";
        exit;
    }
    foreach ($result as $barang) {
        echo "<td>$barang->kode_barang</td>";
        echo "<td>$barang->nama_barang</td>";   
        echo "<td>$barang->harga_perolehan</td>";
        echo "<td>$barang->harga_jual</td>";
        echo "<td>$barang->jumlah_stok</td>";
        echo "<td>$barang->supplier_utama</td>";  
    }   

?>