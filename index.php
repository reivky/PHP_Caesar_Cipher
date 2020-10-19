<?php  
// cek tombol yang ditekan
// jika tombol enkripsi
if (isset($_POST["enkripsi"])) {
	// buat fungsi yang menampung data input
	function cipher($char, $key){
		// cek apakah yang diinput merupakan alfabet
		if (ctype_alpha($char)) {
			// jika ya, cek lagi apakah merupakan huruf kapital atau tidak
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // jika ya, nilainya A, jika tidak nilainya a | konversi ke ASCII dan tampung kedalam variabel
			// konversi char yang diinput ke ASCII
			$ch = ord($char);
			// buat perhitungan modulus dan tampung kedalam variabel
			$mod = fmod($ch + $key - $nilai, 26); // jumlah alfabet = 26
			// hasil modulus ditambah dengan nilai dan konversi ke bentuk alfabet, tampung dalam variabel
			$hasil = chr($mod + $nilai);
			// kembalikan hasil
			return $hasil;
		} // jika yang diinput bukan alfabet maka kembalikan char
		else{
			return $char;
		}
	} 

	// buat fungsi enkripsi
	function enkripsi($input, $key){
		// buat variabel yang menampung string
		$output = "";
		// buat variabel yang menampung data array
		$chars = str_split($input); // berisi dengan data input yang dikonversi kedalam bentuk array
		// lakukan perulangan untuk menampilkan data array
		foreach($chars as $char){
			// output menampung hasil perulangan data array
			$output .= cipher($char, $key); // yang diisi dengan hasil function cipher()
		} // kembalikan output
		return $output;
	}
	// dan jika tombol dekripsi yang ditekan
} else if (isset($_POST["dekripsi"])) {
	// buat fungsi cipher dan enkripsi lagi
	function cipher($char, $key){
		// cek apakah yang diinput merupakan alfabet
		if (ctype_alpha($char)) {
			// jika ya, cek lagi apakah merupakan huruf kapital atau tidak
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // jika ya, nilainya A, jika tidak nilainya a | konversi ke ASCII dan tampung kedalam variabel
			// konversi char yang diinput ke ASCII
			$ch = ord($char);
			// buat perhitungan modulus dan tampung kedalam variabel
			$mod = fmod($ch + $key - $nilai, 26); // jumlah alfabet = 26
			// hasil modulus ditambah dengan nilai dan konversi ke bentuk alfabet, tampung dalam variabel
			$hasil = chr($mod + $nilai);
			// kembalikan hasil
			return $hasil;
		} // jika yang diinput bukan alfabet maka kembalikan char
		else{
			return $char;
		}
	} 

	// buat fungsi enkripsi
	function enkripsi($input, $key){
		// buat variabel yang menampung string
		$output = "";
		// buat variabel yang menampung data array
		$chars = str_split($input); // berisi dengan data input yang dikonversi kedalam bentuk array
		// lakukan perulangan untuk menampilkan data array
		foreach($chars as $char){
			// output menampung hasil perulangan data array
			$output .= cipher($char, $key); // yang diisi dengan hasil function cipher()
		} // kembalikan output
		return $output;
	}
	// lalu buat function dekripsi
	function dekripsi($input, $key){
		// kembalikan nilai fungsi enkripsi, tapi jumlah alfabet dikurangi key
		return enkripsi($input, 26 - $key);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cesar Cipher</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		.label{
			background-color: #5fabf0; 
			color: white; 
			text-align: center; 
			padding: 5px 10px; 
			border-radius: 5px;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26" style="">Caesar Cipher</span>		
					<div class="label">Pesan </div>

					<!-- form input pesan -->
					<div class="wrap-input100">
						<textarea style="padding-top: 15px;" class="input100" type="text" name="plain"></textarea>
					</div>
					<div class="label">Key</div>

					<!-- form input key -->
					<div class="wrap-input100">
						<input class="input100" type="number" name="key">
					</div>
					<div class="login100-form-title" style="padding-bottom: 30px;">

						<!-- button enkripsi dan dekripsi -->
	                    <button type="submit" name="enkripsi" class="btn btn-success">Enkripsi</button>
	                    <button type="submit" name="dekripsi" class="btn btn-secondary">Dekripsi</button>
				    </div>
				</form>
					<div class="label">Hasil</div>
				    <div style=" padding-top: 10px;" class="wrap-input100">

				    	<!-- hasil enkripsi / dekripsi -->
				    	<!-- buat kondisi output -->
						<textarea style="padding-top: 15px;" class="input100" type="text" name=""><?php  

						if (isset($_POST["enkripsi"])) { // jika tombol enkripsi yang ditekan
							// tampilkan hasil enkripsi
							echo enkripsi($_POST["plain"], $_POST["key"]);
						} // dan jika dekripsi
						else if (isset($_POST["dekripsi"])) {
							echo dekripsi($_POST["plain"], $_POST["key"]);
						}

						?></textarea>
					</div>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>