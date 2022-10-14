<?php
/**
Febrian Ardi Pangestu
https://mujur.id
https://www.facebook.com/MujurdotID
https://instagram.com/idradiation
**/
function crc16($data){
	$crc = 0xFFFF;
	for ($i = 0; $i < strlen($data); $i++){
		$x = (($crc >> 8) ^ ord($data[$i])) & 0xFF;
		$x ^= $x >> 4;
		$crc = (($crc << 8) ^ ($x << 12) ^ ($x << 5) ^ $x) & 0xFFFF;
	}
	return $crc;
}

echo "RAW QRIS STATIS= \n";
$qris_ori = trim(fgets(STDIN));

$panjang_qris_ori_untuk_statis = strlen($qris_ori);
$qris_untuk_statis = $qris_ori;

echo "\nTOTAL TAGIHAN= \n";
$total_tagihan = trim(fgets(STDIN));
$panjang_total_tagihan = strlen($total_tagihan);

$panjang_qris_ori_untuk_dinamis = strlen($qris_ori);
$qris_untuk_dinamis = $qris_ori;

$semua_objek_gabung = "";

if ($panjang_total_tagihan>=1 AND $panjang_total_tagihan<=9){
	while (1){
		$start = substr($qris_untuk_dinamis,0,2);
		if ($start>="00" AND $start<="63"){
			if ($start=="01"){
				$semua_objek_01 = "010212"; //untuk qris dinamis
				$semua_objek_gabung = $semua_objek_gabung.$semua_objek_01;
				
				$objek_["$start"] = $start;
				$panjang_objek_["$start"] = substr($qris_untuk_dinamis,2,2);
				$nilai_objek_["$start"] = substr($qris_untuk_dinamis,4,$panjang_objek_["$start"]);
				
				$panjang_qris_sisa_mulai = 4 + $panjang_objek_["$start"];
				$panjang_qris_sisa_akhir = $panjang_qris_ori_untuk_dinamis - $panjang_qris_sisa_mulai;

				$qris_untuk_dinamis = substr($qris_untuk_dinamis,$panjang_qris_sisa_mulai,$panjang_qris_sisa_akhir);
				continue;
			}
			if ($start>="54"){
				$semua_objek_54 = "540".$panjang_total_tagihan.$total_tagihan; //untuk total tagihan
				$semua_objek_gabung = $semua_objek_gabung.$semua_objek_54;
				
				$objek_["$start"] = $start;
				$panjang_objek_["$start"] = substr($qris_untuk_dinamis,2,2);
				$nilai_objek_["$start"] = substr($qris_untuk_dinamis,4,$panjang_objek_["$start"]);
				
				$panjang_qris_sisa_mulai = 4 + $panjang_objek_["$start"];
				$panjang_qris_sisa_akhir = $panjang_qris_ori_untuk_dinamis - $panjang_qris_sisa_mulai;

				$qris_untuk_dinamis = substr($qris_untuk_dinamis,$panjang_qris_sisa_mulai,$panjang_qris_sisa_akhir);
				
				$semua_objek_["$start"] = $objek_["$start"].$panjang_objek_["$start"].$nilai_objek_["$start"];
				$semua_objek_gabung = $semua_objek_gabung.$semua_objek_["$start"];
				
				while (1){
					$start = substr($qris_untuk_dinamis,0,2);
					if ($start>="00" AND $start<="63"){
					$objek_["$start"] = $start;
					$panjang_objek_["$start"] = substr($qris_untuk_dinamis,2,2);
					$nilai_objek_["$start"] = substr($qris_untuk_dinamis,4,$panjang_objek_["$start"]);
					
					$panjang_qris_sisa_mulai = 4 + $panjang_objek_["$start"];
					$panjang_qris_sisa_akhir = $panjang_qris_ori_untuk_dinamis - $panjang_qris_sisa_mulai;

					$qris_untuk_dinamis = substr($qris_untuk_dinamis,$panjang_qris_sisa_mulai,$panjang_qris_sisa_akhir);
					
					$semua_objek_["$start"] = $objek_["$start"].$panjang_objek_["$start"].$nilai_objek_["$start"];
					$semua_objek_gabung = $semua_objek_gabung.$semua_objek_["$start"];
					}
					else{
						break;
					}
				}
			}
			else{
				$objek_["$start"] = $start;
				$panjang_objek_["$start"] = substr($qris_untuk_dinamis,2,2);
				$nilai_objek_["$start"] = substr($qris_untuk_dinamis,4,$panjang_objek_["$start"]);
				
				$panjang_qris_sisa_mulai = 4 + $panjang_objek_["$start"];
				$panjang_qris_sisa_akhir = $panjang_qris_ori_untuk_dinamis - $panjang_qris_sisa_mulai;

				$qris_untuk_dinamis = substr($qris_untuk_dinamis,$panjang_qris_sisa_mulai,$panjang_qris_sisa_akhir);
				
				$semua_objek_["$start"] = $objek_["$start"].$panjang_objek_["$start"].$nilai_objek_["$start"];
				$semua_objek_gabung = $semua_objek_gabung.$semua_objek_["$start"];
				//echo "objek_$start= ".$semua_objek_["$start"];
			}
		}
		else{
			break;
		}
	}
	
$panjang_qris_dinamis = strlen($semua_objek_gabung);
$panjang_qris_dinamis_crc16 = $panjang_qris_dinamis - 4;
$qris_dinamis_crc16 = substr($semua_objek_gabung,0,$panjang_qris_dinamis_crc16);

$crc16 = strtoupper(dechex(crc16($qris_dinamis_crc16)));

$qris_dinamis_final = $qris_dinamis_crc16.$crc16;


echo "\nRAW QRIS DINAMIS= \n".$qris_dinamis_final;
}
else{
	echo "TOTAL TAGIHAN TERLALU BANYAK / SEDIKIT";
}

exit();
?>
