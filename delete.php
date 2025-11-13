<?php
$input = json_decode(file_get_contents("php://input"), true);
$index = intval($input['index']);
$file = 'data.xml';

if (file_exists($file)) {
    $xml = simplexml_load_file($file);

    // Hapus elemen berdasarkan index
    unset($xml->mhs[$index]);

    // Simpan kembali file XML
    $xml->asXML($file);

    echo "Data berhasil dihapus";
} else {
    echo "File tidak ditemukan";
}
?>