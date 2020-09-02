<?php 
	require "UnsafeCrypto.php";
	// Contoh Pemakaian Encrypt
	// $message = 'Ready your ammunition; we attack at dawn.';
	$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
	// $encrypted = UnsafeCrypto::encrypt($message, $key);
	// $decrypted = UnsafeCrypto::decrypt($encrypted, $key);


	// ========================================

	$response = "GAGAL";
	$msg = "";

	if ($_POST && $_POST['aksi'] && $_POST['aksi'] == 'tambah') {
		$filename = time();
		$data = array(
					'filename' => $filename,
					'nik' => $_POST['nik'], 
					'nama' => $_POST['nama'], 
					'alamat' => $_POST['alamat'], 
				);
		
		$json_encode = json_encode($data);
		// encrypt
		// $json_encode = UnsafeCrypto::encrypt($json_encode, $key);

		$fp = fopen("data/".$filename.".json", "wb");
		fwrite($fp, $json_encode);
		fclose($fp);
		$response = 'SUKSES';
	} else if ($_POST && $_POST['aksi'] && $_POST['aksi'] == 'ubah') {
		$filename = $_POST['id'];
		$data = array(
					'filename' => $filename,
					'nik' => $_POST['nik'], 
					'nama' => $_POST['nama'], 
					'alamat' => $_POST['alamat'], 
				);
		
		$json_encode = json_encode($data);
		// encrypt
		// $json_encode = UnsafeCrypto::encrypt($json_encode, $key);

		$fp = fopen("data/".$filename.".json", "wb");
		fwrite($fp, $json_encode);
		fclose($fp);
		$response = 'SUKSES';
	} else {
		$msg = "Tidak Ada Aksi";
	}

	echo json_encode(
		array(
			'response' => $response, 
			'message' => $msg
		)
	);
?>