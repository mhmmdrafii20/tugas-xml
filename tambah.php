<?php

	$input = json_decode(file_get_contents("php://input"), true);

	$file = 'data.xml';
	$kode = htmlspecialchars($input['kode_barang']);
	$nama = htmlspecialchars($input['nama_barang']);
	$hp = htmlspecialchars($input['harga_perolehan']);
	$hj = htmlspecialchars($input['harga_jual']);
	$js = htmlspecialchars($input['jumlah_stok']);
	$su = htmlspecialchars($input['supplier_utama']);

	// Jika file sudah ada, load isinya
	if (file_exists($file)) {
		$xml = simplexml_load_file($file);
		// Jika gagal load (misalnya file rusak), buat baru
		if ($xml === false) {
			$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><databarang></databarang>');
		}
	} else {
		// Kalau belum ada, buat struktur root baru
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><databarang></databarang>');
	}

	// Tambahkan elemen baru <mhs>
	$mhs = $xml->addChild('barang');
	$mhs->addChild('kode_barang', $nama);
	$mhs->addChild('nama_barang', $nama);
	$mhs->addChild('harga_perolehan', $hp);
	$mhs->addChild('harga_jual', $hj);
	$mhs->addChild('jumlah_stok', $js);
	$mhs->addChild('supplier_utama', $su);

	// Simpan ke file (overwrite file lama)
	$xml->asXML($file);

	echo "✅ Data berhasil ditambah.";
?>