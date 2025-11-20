<?php
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

$index   = intval($data["index"]);
$nama    = $data["nama_mahasiswa"];
$jurusan = $data["jurusan"];

$xml = simplexml_load_file("data.xml");

// Pastikan index valid
if ($index < 0 || $index >= count($xml->mhs)) {
    echo "ERROR: Index tidak ditemukan!";
    exit;
}

// Update
$xml->mhs[$index]->nama_mahasiswa = $nama;
$xml->mhs[$index]->jurusan = $jurusan;

// Simpan perubahan
$xml->asXML("data.xml");

echo "UPDATED";