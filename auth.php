<!DOCTYPE html>
<html>
<head>
	<title>Order Summary</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, target-densitydpi=device-dpi"/>
    
    <!-- <link rel="stylesheet" type="text/css" href="css/cssauth.css"> -->
    
    <style type="text/css">
        small {
			float: right;
		}
		th {
			padding-right: 2em;
			font-weight: normal;
			text-align: left;
		}
		.box {
		    position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
			max-width: 100%;
			width: 50%;
			border: 3px solid salmon;
			padding: 2em 2em 4em 2em;
			border-radius: 14px;
		}
		.header {
			margin: 0;
		}
		.img {
			text-align: center;
		}
		.content {
		    margin-top: 2em;
		}
		table.ta {
			font-size: 16px;
		}
		table.tb {
			font-family: miriam fixed;
			font-size: 23px;
			letter-spacing: 1px;
		}
		hr {
			width: 60%;
			border: none;
			outline: 1px solid #c7c7c7;
		}
		.hidden {
		    display: none;
		}
		.gen {
		    margin-top: 2em;
		    text-align: center;
		    border: 2px solid skyblue;
		    padding: 1.4em 0;
		}
		.gen a {
		    text-decoration: none;
		    color: salmon;
		}
		.gen a:hover {
		    color: skyblue;
		}
		.notice {
		    margin-top: 1em;
		}
		.info {
		    margin-bottom: 0;
		}
    </style>
    
    <link rel="icon" href="https://zeedanisthe.best/assets/icon-z.png">

</head>
<body>

<div class="box">
	<div class="header">
		<div class="img">
			<img src="css/icon-z.png">
		</div>
	</div>

	<div class="content">
		<p class="info">Berikut adalah detail orderan kamu:</p>

<?php
/* menu list */
// PAKET A (AYAM)
$paketAA = "Nasi + Ayam (Sayap) [GEPREK] + Sambal Lalapan + Es Teh";
$paketAB = "Nasi + Ayam (Pupu) [GEPREK] + Sambal Lalapan + Es Teh";
// PAKET A (AYAM)

// PAKET B (LELE)
$paketBA = "Nasi + Lele [GEPREK] + Sambal Lalapan + Es Teh";
// PAKET B (LELE)
/* menu list */



/* count SUBTOTAL */
// PRICE PAKET A (AYAM)
$priceAA = "12000";
$priceAB = "13000";
// PAKET A (AYAM)

// PRICE PAKET B (LELE)
$priceBA = "13500";
// PRICE PAKET B (LELE)
/* count SUBTOTAL */



/* count GRAND TOTAL [qty * SUBTOTAL]  */
// PRICE PAKET A (AYAM)
$priceZA = $_POST['qty'] * $priceAA;
$priceZB = $_POST['qty'] * $priceAB;
// PRICE PAKET A (AYAM)

// PRICE PAKET B (LELE)
$priceYA = $_POST['qty'] * $priceBA;
// PRICE PAKET B (LELE)
/* count GRAND TOTAL [qty * SUBTOTAL]  */
?>

		<div class="primary">
			<table class="ta">
				   <tr>
					<th><b>Nomor Pesanan:</b></th>
					<th>
						   <b>#<?php echo $_POST['token'];?></b>
					</th>
				</tr>
				<tr>
					<th>Nama:</th>
					<th><?php echo $_POST['who'];?> - <?php echo $_POST['name'];?></th>
				</tr>
				<tr>
					<th>Nomor HP (WhatsApp):</th>
					<th><?php echo $_POST['hp'];?></th>
				</tr>
				<tr>
					<th>Email:</th>
					<th><?php echo $_POST['email'];?></th>
				</tr>
				<tr>
					<th>Alamat:</th>
					<th><?php echo $_POST['addr1'];?>, <?php echo $_POST['addr2'];?></th>
				</tr>
				<tr>
					<th>Kelurahan:</th>
					<th><?php echo $_POST['kel'];?></th>
				</tr>
				<tr>
					<th>Kecamatan:</th>
					<th><?php echo $_POST['kec'];?></th>
				</tr>
				<tr>
					<th>Kota:</th>
					<th><?php echo 'Pekalongan';?></th>
				</tr>
				<tr>
					<th>Pesanan:</th>
					<th>
						    <?php
						// PAKET A (AYAM)	
							if ($_POST['paket'] == "paketaa") {
								echo $paketAA;
							}elseif ($_POST['paket'] == "paketab") {
								echo $paketAB;
						// PAKET B (LELE)
							}elseif ($_POST['paket'] == "paketba") {
								echo $paketBA;
							}
							?>
					</th>
				</tr>
				<th>Sub Total:</th>
					<th>
							<?php
						// PAKET A (AYAM)
							if ($_POST['paket'] == "paketaa") {
								echo $priceAA;
							}elseif ($_POST['paket'] == "paketab") {
								echo $priceAB;
						// PAKET B (LELE)
							}elseif ($_POST['paket'] == "paketba") {
								echo $priceBA;
							}
							?>
					</th>
				<tr>
					<th>Jumlah:</th>
					<th><?php echo $_POST['qty'];?></th>
				</tr>
				<tr>

				</tr>
			</table>
			<hr>
			<table class="tb">
				<tr>
					<th><b>Total:</b></th>
					<th><b>
							<?php
						// PAKET A (AYAM)
							if ($_POST['paket'] == "paketaa") {
								echo $priceZA;
							}elseif ($_POST['paket'] == "paketab") {
								echo $priceZB;
						// PAKET B (LELE)		
							}elseif ($_POST['paket'] == "paketba") {
								echo $priceYA;
							}
							?>
					</b></th>
				</tr>
			</table>
		</div>

		<div class="confirm">
               <div class="hidden"> <!-- get data and send email report of order -->
			       <form action="" method="POST">
    				<input type="text" name="name" value=" <?php echo $_POST['name'];?> ">
    				<input type="text" name="who" value=" <?php echo $_POST['who'];?> ">
    				<input type="text" name="email" value=" <?php echo $_POST['email'];?> ">
    				<input type="text" name="hp" value=" <?php echo $_POST['hp'];?> ">
    				<input type="text" name="addr1" value=" <?php echo $_POST['addr1'];?> ">
    				<input type="text" name="addr2" value=" <?php echo $_POST['addr2'];?> ">
    				<input type="text" name="kel" value=" <?php echo $_POST['kel'];?> ">
    				<input type="text" name="kec" value=" <?php echo $_POST['kec'];?> ">
    				<input type="text" name="paket" value=" <?php echo $_POST['paket'];?> ">
    				<input type="text" name="qty" value=" <?php echo $_POST['qty'];?> ">
    				<input type="text" name="token" value=" <?php echo $_POST['token'];?> ">
    			</form>
			</div>
		</div>

		<div class="gen">
			   <a href="https://api.whatsapp.com/send?phone=6285325093420&text=halo, saya <?php echo $_POST['who'];?> - <?php echo $_POST['name'];?> ingin mengkonfirmasi pesanan saya. Detail pesanan:%0A%0ANomor pesanan: <?php echo $_POST['token'];?>%0A%0ANama: <?php echo $_POST['name'];?>%0A%0ATelah memesan: <?php echo $_POST['paket'];?>%0A%0AJumlah: <?php echo $_POST['qty'];?>%0A%0AAlamat <?php echo $_POST['addr1'];?>, <?php echo $_POST['addr2'];?>%0A%0AKelurahan: <?php echo $_POST['kel'];?>%0A%0AKecamatan: <?php echo $_POST['kec'];?>%0A%0AKota: Pekalongan%0A%0ATerima kasih~" target="_blank">Konfirmasi Pesananmu (via WhatsApp)</a>
		</div>

		<div class="notice">
			<span><small><font color="red" style="italic">**Ambil screenshot halaman ini untuk konfirmasi orderan kamu via WhatsApp</font></small></span>
		</div>
	</div>
</div>
	
<?php $statusMsg = '';
$msgClass = '';
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

       if(!empty($name) && !empty($who) && !empty($email) && !empty($hp) && !empty($addr1) && !empty($addr2) && !empty($kel) && !empty($kec) && !empty($paket) && !empty($qty) && !empty($token)  ){

              if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                     $statusMsg = 'Email does not valid! Please enter your valid email!';
                     $msgClass = 'errordiv';
              }else{
                     $toEmail = 'bakul@tuku.zeedanisthe.best';
                     $emailSubject = 'Orderan masuk dari ['.$kel.'] ';
                     $htmlContent = 'Diorder oleh '.$name.'<p>
                            +=========================+<br>
                              D E T A I L - O R D E R<br>
                            +=========================+<br>
                            <b>Order Number: '.$token.'</b><br>
                            Email: '.$email.'<br>
                            Whatsapp Number: '.$hp.'<br>
                            Name: '.$who.' - '.$name.'<br>
                            Alamat: '.$addr1.' , '.$addr2.'<br>
                            Kelurahan: '.$kel.'<br>
                            Kecamatan: '.$kec.'<br>
                            Kota: Pekalongan <br>
                            +=========================+<br>
                             P E S A N A N - O R D E R<br>
                            +=========================+<br>
                            Telah memesan: '.$paket.'<br>
                            Jumlah: '.$qty.'';

                     $headers = "MIME-Version: 1.0" . "\r\n";
                     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                     // Additional Header
                     $headers .= 'From: '.$name.' <'.$email.'>'. "\r\n";

                     if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                            
                            
                     }else{
                            $statusMsg = 'Failed to submit your data! Please try again later.';
                            $msgClass = 'errordiv';
                            
                     }
              }
       }else{
              $statusMsg = 'Please input blank space';
              $msgClass = 'errordiv';
              
       }
}
?>

</body>
</html>
