<?php

$json = file_get_contents('php://input'); 
$action = json_decode($json, true); 
$message	= $action['message']['text']; 
$chat		= $action['message']['chat']['id'];
$user		= $action['message']['from']['id'];
$token		= '1936008759:AAFLdzd-jlOM4mli_HJfKyYzy8q0LkF2Ysg';
$smstoken   = '2dA3c38c9762bb59f8d48cb0Ac30d394'


if ($message == '/nomer@indotp_bot' OR $message == '/nomer' OR !file_exists($filename)) {
	$nom = file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=getNumber&service=$ya&forward=$0&operator=$any'); //формирует запрос на получение номера в формате ACCESS_NUMBER:432112:79019043090
	$arrWithData = explode(':', $nom); 
	file_put_contents($filename, $arrWithData[1].':'.$arrWithData[2]);
	$id = $arrWithData[1];
	$nomer = $arrWithData[2];
} else {
	$getFileWithInfo = file_get_contents($filename);
	$arrWithData = explode(':', $getFileWithInfo);
	$id = $arrWithData[0];
	$nomer = $arrWithData[1];
}

if ($message == '/start@indotp_bot' || $message == '/start') {
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Добро пожаловать в SMS-Activate Telegram Bot! Для справки используйте команду /help'); //Приветственное сообщение
} elseif ($message == '/balance@indotp_bot' || $message == '/balance') {
	$bal= file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=getBalance');
	$balance = trim($bal, "ACCESS_BALANCE:"); 
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Баланс счета: '.$balance.' руб.'); // Баланс личного счета
} elseif ($message == '/nomer@indotp_bot' || $message == '/nomer') {
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text='.$nomer); // запрос номера
} elseif ($message == '/kod@indotp_bot' || $message == '/kod') {
	$status = file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=getStatus&id=$'.$id);
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text='.$status); //присылает смс-сообщение или статус
} elseif ($message == '/help@indotp_bot' || $message == '/help') {
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Сюда можно вписать хелп'); //хелп
} elseif ($message == '/resend@indotp_bot' || $message == '/resend') { 
	$rese = file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=setStatus&status=3&id='.$id);
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Проверяй новый код /kod. Ответ сервера: '.$rese); //новый запрос на код
} elseif ($message == '/cancel@indotp_bot' || $message == '/cancel') {
	$canc = file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=setStatus&status=$-1&id='.$id);
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Отменено: '.$canc); //отменить запрос на номер
} elseif ($message == '/black@indotp_bot' || $message == '/black') {
	$blac = file_get_contents('http://sms-activate.ru/stubs/handler_api.php?api_key=$smstoken&action=setStatus&status=8&id='.$id);
	file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat.'&text=Использованный номер, отмена. Ответ сервера: '.$blac); //Удалить использованный номер
}
?>
