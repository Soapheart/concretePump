<?
header('Content-Type: text/html; charset=utf-8');
if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")){
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
        $headers .= "From: Отправитель <from@example.com>\r\n";
        mail($to, $subject, $message, $headers);
        echo "Ваш запрос успешно отправлен, спасибо Вам! Мы скоро свяжемся с Вами.";
        echo "<br /><br /><a href ='http://xn--80abm6aaebc0abd.xn--p1ai/'>Вернуться на сайт</a>";
}
?>