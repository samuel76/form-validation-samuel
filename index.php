<!DOCTYPE html>
<html>
<head>
	<title>Contoh Form Validation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<center><h1>Aplikasi Coba-coba</h1></center>
	<hr />
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="form.php?action=tambah" class="btn btn-sm btn-primary pull-right">Tambah Data</a>
			</div>
			<div class="col-sm-12">
				<hr>
				<?php 
					require "UnsafeCrypto.php";
					// Contoh Pemakaian Encrypt
					// $message = 'Ready your ammunition; we attack at dawn.';
					$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
					// $encrypted = UnsafeCrypto::encrypt($message, $key);
					// $decrypted = UnsafeCrypto::decrypt($encrypted, $key);

					// Cari File *.json
					$files = glob("data/*.json");
					$data = array();
					foreach ($files as $dt => $fileName) {
						if (file_exists($fileName)) {
							$readFile = fopen($fileName, "r");
							$isiFile = fread($readFile, filesize($fileName));
							// $isiFile = UnsafeCrypto::decrypt($isiFile, $key); // Kalay di encrypt
							$dataFile = json_decode($isiFile);
							array_push($data, $dataFile);
							fclose($readFile);
						}
					}
				?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($data && count($data) > 0) {
									$i = 1;
									foreach ($data as $key) {
										if (!$key) continue; 
							?>	
										<tr>
											<td><?= $i ?></td>
											<td><?= $key->nik ?></td>
											<td><?= $key->nama ?></td>
											<td><?= $key->alamat ?></td>
											<td><a href="form.php?action=ubah&id=<?= $key->filename ?>">Edit</a></td>
										</tr>
							<?php
										$i++;
									}
							?>
							<?php
								} else {
							?>
									<tr>
										<td colspan="5">Belum Ada Data</td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- JQUERY -->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>

	<!-- BOOTSRAP -->
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>