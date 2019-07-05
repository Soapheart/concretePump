<?
header('Content-Type: text/html; charset=utf-8');

define('SITE_KEY', '6LfLHasUAAAAACkEsmiNttVj-gCCRQ0vrJVtuOc0');
define('SECRET_KEY', '6LfLHasUAAAAAIizOxlMIGc8WJ1b_RuWNhPUBV9U');

if($_POST){
	function getCaptcha($SecretKey) {
		$Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}"); 
		$Return = json_decode($Response);
		return $Return;
		}
	
	$Return = getCaptcha($_POST['g-recaptcha-response']);
	
	if($Return->success == true && $Return->score >= 0.5){
			$to = 'zakaz.nasos@mail.ru';
			$subject = 'Форма на сайте';
			$message = '
					<html>
						<head>
							<title>'.$subject.'</title>
						</head>
						<body>
							<p>Имя: '.$_POST['name'].'</p>
							<p>Телефон: '.$_POST['phone'].'</p>
							<p>Почта: '.$_POST['email'].'</p>
						</body>
					</html>';
			$headers  = "Content-type: text/html; charset=utf-8 \r\n";
			$headers .= "From: Бетононасос.рф <from@example.com>\r\n";
			mail($to, $subject, $message, $headers);
			echo "Ваш запрос успешно отправлен, спасибо Вам! Мы скоро свяжемся с Вами.";
			echo "<br /><br /><a href ='http://xn--80abm6aaebc0abd.xn--p1ai/'>Вернуться на сайт</a>";
		}
		else {
			echo "Вы точно человек?";
		}
	}
	else{
		echo "Условие не фурычит";
	}
?>