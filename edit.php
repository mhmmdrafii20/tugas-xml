<?php
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

$index   = intval($data["index"]);
$kode   = $data["kode_barang"];
$nama    = $data["nama_barang"];
$hp = $data["harga_perolehan"];
$hj = $data["harga_jual"];
$js = $data["jumlah_stok"];
$su = $data["supplier_utama"];

$xml = simplexml_load_file("data.xml");

// Pastikan index valid
if ($index < 0 || $index >= count($xml->barang)) {
    echo "ERROR: Index tidak ditemukan!";
    exit;
}

// Update
$xml->barang[$index]->kode_barang = $kode;
$xml->barang[$index]->nama_barang = $nama;
$xml->barang[$index]->harga_perolehan = $hp;
$xml->barang[$index]->harga_jual = $hj;
$xml->barang[$index]->jumlah_stok = $js;
$xml->barang[$index]->supplier_utama = $su;

// Simpan perubahan
$xml->asXML("data.xml");