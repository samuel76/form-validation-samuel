<!DOCTYPE html>
<html>
<head>
	<title>Contoh Form Validation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<style type="text/css">
		/* ini saya copy-paste dari CSS - SmartaAdmin */
		.smart-form .checkbox.state-error i,
		.smart-form .radio.state-error i,
		.smart-form .state-error input,
		.smart-form .state-error select,
		.smart-form .state-error textarea,
		.smart-form .toggle.state-error i {
		 background:#fff0f0;
		 border-color:#A90329
		}
		.smart-form .toggle.state-error input:checked+i {
		 background:#fff0f0
		}
		.smart-form .state-error+em {
		 display:block;
		 margin-top:6px;
		 padding:0 1px;
		 font-style:normal;
		 font-size:11px;
		 line-height:15px;
		 color:#D56161
		}
		.smart-form .rating.state-error+em {
		 margin-top:-4px;
		 margin-bottom:4px
		}
		.smart-form .state-error select+i {
		 background:#FFF0F0;
		 box-shadow:0 0 0 9px #FFF0F0
		}
		.state-error .icon-append,
		.state-error .icon-prepend {
		 color:#ed1c24
		}
		.smart-form .checkbox.state-success i,
		.smart-form .radio.state-success i,
		.smart-form .state-success input,
		.smart-form .state-success select,
		.smart-form .state-success textarea,
		.smart-form .toggle.state-success i {
		 background:#f0fff0;
		 border-color:#7DC27D
		}
		.smart-form .toggle.state-success input:checked+i {
		 background:#f0fff0
		}
		.smart-form .note-success {
		 color:#6fb679
		}
		.smart-form .state-success select+i {
		 background:#f0fff0;
		 box-shadow:0 0 0 9px #f0fff0
		}
		.smart-form .button.state-disabled,
		.smart-form .checkbox.state-disabled,
		.smart-form .input.state-disabled input,
		.smart-form .radio.state-disabled,
		.smart-form .select.state-disabled,
		.smart-form .textarea.state-disabled,
		.smart-form .toggle.state-disabled {
		 cursor:default!important;
		 opacity:.6!important
		}
		.smart-form .checkbox.state-disabled:hover i,
		.smart-form .input.state-disabled:hover input,
		.smart-form .radio.state-disabled:hover i,
		.smart-form .select.state-disabled:hover select,
		.smart-form .textarea.state-disabled:hover textarea,
		.smart-form .toggle.state-disabled:hover i {
		 border-color:#e5e5e5!important
		}
		.smart-form .state-disabled.checkbox input+i:after,
		.smart-form .state-disabled.checkbox input:checked+i,
		.smart-form .state-disabled.radio input+i:after,
		.smart-form .state-disabled.radio input:checked+i,
		.smart-form .state-disabled.toggle input:checked+i {
		 border-color:#e5e5e5!important;
		 color:#333!important
		}
		.smart-form .state-disabled.radio input+i:after {
		 background-color:#333
		}
	</style>

	<?php 
		$isiFile = array();
		if ($_GET['action'] && $_GET['action'] == 'ubah') {
			if ($_GET['id'] && file_exists("data/".$_GET['id'].".json")) {
				$readFile = fopen("data/".$_GET['id'].".json", "r");
				$isiFile = json_decode(fread($readFile, filesize("data/".$_GET['id'].".json")));
				fclose($readFile);
			}
		}
		
	?>


	<!-- LADDA -->
	<link rel="stylesheet" type="text/css" href="css/ladda/ladda-themeless.min.css">
</head>
<body>
	<center><h1><?= $_GET['action'] && $_GET['action'] == 'tambah' ? 'Tambah' : 'Ubah' ?> Data</h1></center>
	<hr />
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
				<hr>
			</div>
			<div class="col-sm-12">
				<form class="smart-form form-horizontal" id="form-coba-coba" action="action.php" method="POST">
					<input type="hidden" name="aksi" id="aksi" value="<?= $_GET['action'] && $_GET['action'] == 'tambah' ? 'tambah' : 'ubah' ?>">
					<input type="hidden" name="id" id="id" value="<?= $isiFile && $isiFile->filename ?  $isiFile->filename : '' ?>">
					<div class="form-group">
					    <label for="nik" class="col-sm-2 control-label">NIK</label>
					    <div class="col-sm-10">
					    	<div>
					    		<input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK" value="<?= $isiFile && $isiFile->nik ?  $isiFile->nik : '' ?>">
					    	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="nama" class="col-sm-2 control-label">Nama</label>
					    <div class="col-sm-10">
					    	<div>
					    		<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" value="<?= $isiFile && $isiFile->nama ?  $isiFile->nama : '' ?>">
					    	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="nama" class="col-sm-2 control-label">Alamat</label>
					    <div class="col-sm-10">
					    	<div>
					    		<textarea  class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat"><?= $isiFile && $isiFile->alamat ?  $isiFile->alamat : '' ?></textarea>
					    	</div>
					    </div>
				  	</div>
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">	
					    	<span id="errMsg" class="text text-danger"></span>
					    	<button type="submit"  class="ladda-button ladda-button-form btn btn-sm btn-primary pull-right" data-style="zoom-in">SIMPAN</button>
					    </div>
				 	</div>
				</form>
			</div>
		</div>
	</div>


	<!-- JQUERY -->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>

	<!-- BOOTSRAP -->
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>

	<!-- JQUERY VALIDATION -->
	<script type="text/javascript" src="js/jquery-validate/jquery.validate.min.js"></script>

	<!-- JQUERY FORM -->
	<script type="text/javascript" src="js/jquery-form/jquery-form.min.js"></script>

	<!-- LADDA -->
	<script type="text/javascript" src="js/ladda/spin.min.js"></script>
	<script type="text/javascript" src="js/ladda/ladda.min.js"></script>
	<script type="text/javascript" src="js/ladda/ladda.jquery.min.js"></script>

	<script type="text/javascript">
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		$(document).ready(function() {
			var errorClass = 'invalid';
			var errorElement = 'em';
			var l = $('.ladda-button-form').ladda();

			var $saveForm = $("#form-coba-coba").validate({
				errorClass: errorClass,
				errorElement: errorElement,
				highlight: function(element) {
					$(element).parent().removeClass('state-success').addClass("state-error");
					$(element).removeClass('valid');
				},
				unhighlight: function(element) {
					$(element).parent().removeClass("state-error").addClass('state-success');
					$(element).addClass('valid');
				},
				// Rules for form validation
				rules: {
					nik: {
						required: true
					},
					nama: {
						required: true
					},
					alamat: {
						required: true
					}
				},
				// Messages for form validation
				messages: {
					nik: {
						required: 'NIK wajib diisi!'
					},
					nama: {
						required: 'Nama wajib diisi!'
					},
					alamat: {
						required: 'Alamat wajib diisi!'
					}
				},
				// Ajax form submition
				submitHandler: function(form) {
					$(form).ajaxSubmit({
						dataType: 'json',
						type: "POST",
						beforeSend: function() {
							l.ladda('start');
						},
						success: function(data) {
							if (data.response == "SUKSES") {
								location.href = "index.php";
								console.log(data.response);
							} else {
								$("#errMsg").html(data.errMsg);
							}
						},
						complete: function() {
							l.ladda('stop');
							
						},
						error: function(data) {}
					});
				},

				// Do not change code below
				errorPlacement: function(error, element) {
					error.insertAfter(element.parent());
				}
			});

		});
	</script>

</body>
</html>