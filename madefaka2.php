<?php
date_default_timezone_set('Asia/Jakarta');
include "rendygans.php";
echo color("white","Token: ");
$token = trim(fgets(STDIN));
echo "\n".color("white","Claim?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬VOUCHER 15+10+5▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("white","Claim A..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(25);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(15);
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
         }
  }
