<?php
date_default_timezone_set('Asia/Jakarta');
include "rendygans.php";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mHallo SgbTeam, Iam @Bananacreamy\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mInput Nama Mu Disini ?: ");
	$input = trim(fgets(STDIN));

	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
		goto ulang;

	return rtrim( $input, "\n" );
ulang:
echo "\n";
echo color("white","\e[61m             (Hallo Mas $input Semoga Dapet Voc'a ya)               \n");
echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("white","📲 Nomor mu a : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("white","Kode Otp sudah dikirim a")."\n";
        otp:
        echo color("white"," Otp : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("white","Berhasil Mendaftar\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("white","+] Akses token mu : ".$token."\n\n");
        save("token.txt",$token);
        echo color("white","\n▬▬▬▬▬▬▬▬▬▬▬▬Claim Voc 20+10▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("white","Claim A..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(30);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(5);
        }
        echo "\n".color("white","Claim B..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        echo "\n".color("white"," Total voucher ".$total." : ");
        echo "\n".color("white"," 1. ".$voucher1);
        echo "\n".color("white"," 2. ".$voucher2);
        echo "\n".color("white"," 3. ".$voucher3);
        echo "\n".color("white"," 4. ".$voucher4);
         setpin:
         echo "\n".color("white","SET PIN GA: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("purple","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ PIN LO = 666123 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"666123"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }else{
         echo color("red","-] OTP SALAH");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("red","!] INPUT ULANG..\n");
         goto otp;
         }
         }else{
         echo color("red","-] NOMOR SALAH/SUDAH TERDAFTAR");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("red","!] MASUKAN LAGI\n");
         goto ulang;
         }
//  }0

//Hacktoberfest2021
