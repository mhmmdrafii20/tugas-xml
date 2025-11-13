<?php

	$input = json_decode(file_get_contents("php://input"), true);

	// Validasi data
	if (!$input || empty($input['nama_mahasiswa']) || empty($input['jurusan'])) {
		http_response_code(400);
		echo "Data tidak lengkap.";
		exit;
	}

	$file = 'data.xml';
	$nama = htmlspecialchars($input['nama_mahasiswa']);
	$jurusan = htmlspecialchars($input['jurusan']);

	// Jika file sudah ada, load isinya
	if (file_exists($file)) {
		$xml = simplexml_load_file($file);
		// Jika gagal load (misalnya file rusak), buat baru
		if ($xml === false) {
			$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><mahasiswa></mahasiswa>');
		}
	} else {
		// Kalau belum ada, buat struktur root baru
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><mahasiswa></mahasiswa>');
	}

	// Tambahkan elemen baru <mhs>
	$mhs = $xml->addChild('mhs');
	$mhs->addChild('nama_mahasiswa', $nama);
	$mhs->addChild('jurusan', $jurusan);

	// Simpan ke file (overwrite file lama)
	$xml->asXML($file);

	echo "✅ Data berhasil ditambah.";
?>