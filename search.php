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
    for ($i = 0; $i < count($xml->barang); $i++) {
        $barang = $xml->barang[$i];

        if (in_array($barang, $result)) {
            echo "<td>$barang->kode_barang</td>";
            echo "<td>$barang->nama_barang</td>";   
            echo "<td>$barang->harga_perolehan</td>";
            echo "<td>$barang->harga_jual</td>";
            echo "<td>$barang->jumlah_stok</td>";
            echo "<td>$barang->supplier_utama</td>";
            echo "<td><a class='btnEdit' href='form-edit.php?index=$i'>Edit</a> <button class='btnDelete' data-index='${i}'>Delete</button></td>";
        }
    }   

?>