<?php

$method = $_SERVER['REQUEST_METHOD'];

$project_name = "Вождение";
$admin_email  = "rysdaulet91@gmail.com";
$server_mail = "<rysdaulet91@gmail.com>";
$form_subject = "Заявка";


//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	foreach ( $_POST as $key => $value ) {
		if ( $value != "") {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} 

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.$project_name.' '.$server_mail. PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers);