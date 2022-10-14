<head>
	<title>Menu Paket | RG</title>
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, target-densitydpi=device-dpi"/>
    
    <!-- <link rel="stylesheet" type="text/css" href="css/cssindex.css"> -->
    <style type="text/css">
                * {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.box {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			border: 1em solid salmon;
			border-radius: 7px;
			padding: 1em 4em 2em 4em;
			width: 70%;
			cursor: default;
		}
		.content {
			float: left;
		}
		.header {
			margin-bottom: 2em;
			text-align: center;
			font-family: verdana;
			font-size: 22px;
			letter-spacing: 1px;
			background-color: skyblue;
			color: #fff;
			padding: 10px;
			border-radius: 7px;
		}
		.content {
			width: 100%;
		}
		#who {
			width: 10%;i
			font-family: arial;
			font-size: 14px;
		}
		.info {
			font-size: 16px;
			font-family: arial;
		}
		p {
			margin-top: 10px;
			font-family: arial;
			font-size: 14px;
		}
		select {
			width: 100%;
			height: 2em;
			font-size: 16px;
			font-family: verdana;
			border: 1.5px solid skyblue;
		}
		option {
			font-size: 16px;
			font-family: verdana;
		}
		input[type="text"] {
			height: 2em;
			width: 50%;
			font-size: 14px;
			border: 1px solid skyblue;
		}
		input[type="submit"] {
			float: right;
			height: 3.4em;
			width: 100%;
			margin-top: 10px;
			cursor: pointer;
			border: 1px solid skyblue;
			border-radius: 7px;
			background-color: skyblue;
			color: #fff;
		}input[type="submit"]:hover {
			background-color: #fff;
			color: salmon;
			border: 1px solid salmon;
		}
		#qty {
			width: 14%;
		}
		hr {
			margin: 8px 0;
			width: 70%;
			border: none;
			outline: 1px solid #c7c7c7;
		}
		.token {
		    display: none;
		}
    </style>
    
    <link rel="icon" href="https://zeedanisthe.best/assets/icon-z.png">

</head>
<body>

<div class="box">
	<div class="header">
		<span>Order Paket | <b>RG</b></span>
	</div>

	<div class="content">
		<?php
		if(isset($_POST['submit'])){
			$who = $_POST['who'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$hp = $_POST['hp'];
			$addr1 = $_POST['addr1'];
			$addr2 = $_POST['addr2'];
			$kel = $_POST['kel'];
			$kec = $_POST['kec'];
			$paket = $_POST['paket'];
			$qty = $_POST['qty'];
			$token = $_POST['token'];
		}
		?>
<?php
/* order number generator */
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$shuffled = str_shuffle($str);
$shuffled = substr($shuffled,1,8);
// $date1 = date("dm");
// $date2 = date("Y");
// $date3 = date("h:i:ss:a");
/* order number generator */

/* menu list */
// PAKET A (AYAM)
$paketAA = "[IDR 12K] Nasi + Ayam (Sayap) [GEPREK] + Sambal Lalapan + Es Teh";
$paketAB = "[IDR 13K] Nasi + Ayam (Pupu) [GEPREK] + Sambal Lalapan + Es Teh";
// PAKET A (AYAM)

// PAKET B (LELE)
$paketBA = "[IDR 13.5K] Nasi + Lele [GEPREK] + Sambal Lalapan + Es Teh";
// PAKET B (LELE)
/* menu list */
?>
		<form action="auth.php" method="POST">
			<div class="info">
				<p>Panggilan:</p>
				<select id="who" name="who">
					<option class="a" name="mr">Bapak</option>
					<option class="b" name="mrs">Ibu</option>
					<option class="c" name="mra">Mas</option>
					<option class="d" name="mrsb">Mbak</option>
				</select>
				<p>Kontak:</p>
				<small><font color="red">**wajib aktif di platform WhatsApp!!</font></small><br>
				<input type="text" class="hp" name="hp" placeholder="081234567890" autocomplete="off" required="" maxlength="13">
				<p>Email:</p>
				<input type="text" name="email" placeholder="contoh@email.com" autocomplete="off" required="">
				<p>Nama:</p>
				<input type="text" name="name" placeholder="Uchiha Zidan" autocomplete="off" required="">
				<p>Alamat lengkap:</p>
				<input type="text" class="addr1" name="addr1" placeholder="Jl. Lari Gg. 1A No. 2-B" autocomplete="off" required=""><br>
				<input type="text" class="addr2" name="addr2" placeholder="RTRW/patokan" autocomplete="off">
				<p>Kelurahan:</p>
				<input type="text" class="kel" name="kel" placeholder="Noyontaan/Poncol/Klego/dst" autocomplete="off" required="">
				<p>Kecamatan:</p>
				<input type="text" class="kec" name="kec" placeholder="Pekalongan Timur/Selatan/Barat/Utara" autocomplete="off" required="">
				<p>Kota:</p>
				<input type="text" class="city" name="city" placeholder="Pekalongan" value="Pekalongan" autocomplete="off" required="" disabled>
			</div>
			<div id="option" name="option">
				<p>Mau beli apa?</p>
				<small><font color="red">**untuk sementara waktu pemesanan online hanya dapat dilakukan untuk 1 jenis paket!!</font></small>
				<select id="paket" name="paket">
					<!-- PAKET A (AYAM) -->
					<option value="pilihPaket" hidden>↓↓↓ Pilih Paket ↓↓↓</option>
					<optgroup label="Paketan Ayam">
    					<option class="PaketAA" value="paketaa" ><?php echo $paketAA?></option>
    					<option class="PaketAB" value="paketab"><?php echo $paketAB?></option>
    				</optgroup>
    				<!-- PAKET B (LELE) -->
    				<optgroup label="Lele">
    					<option class="PaketBA" value="paketba" disabled><?php echo $paketBA?></option>
					</optgroup>
				</select>
			</div>
			<div class="qty">
    			<p>Jumlah pesanan:</p>
    			<input type="text" id="qty" name="qty" placeholder="maksimal 9" autocomplete="off" required="" maxlength="1">
			</div>
			<div class="token">
			    <p>Token:</p>
			    <input type="text" name="token" autocomplete="off" value="<?php echo $shuffled?>">
			</div>
			<input type="submit" name="submit" class="btn" value="Review your order">
		</form>
		<!--<div class="review">
			<a class="asubmit" href="summary/index.php">Next</a>
		</div>-->
	</div>
	<div class="link">
		<span><small>Sebelum melakukan order, alangkah baiknya membaca <a href="#" target="_blank">syarat & ketentuan</a> order online kami. <br>Baca pula: <a href="#" target="blank">cara order</a></small></span>
	</div>
</div>


</body>
