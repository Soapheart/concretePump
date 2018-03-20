<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $mailContent = "Имя: $name" . "\r\n" . "Почта: $email" . "\r\n" . "Телефон: $phone" . "\r\n" . "Сообщение: $message";     
	$a = mail('soapheart700707@gmail.com','Re: Данные отправлены вашей контактной формой', $mailContent);
	if ($a) {
		echo 'Спасибо! Ваше сообщение успешно отправлено!';
	} else {
		echo 'Ваше сообщение не отправлено!';
	}
}
?>