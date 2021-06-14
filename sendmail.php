<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exeption.php';
  require 'phpmailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->IsHTML(true);

  //От кого письмо
  $mail->setForm('info@fls.guru', 'Фрилансер по жизни');
  //Кому отправлять
  $mail->addAddress('mirors227@gmail.com');
  //Тема письма
  $mail->Subject = 'Привет! "Это фрилансер по жизни"';

  //Тело письма
  $body = '<h1>Встречайте супер письмо</h1>';

  if (trim(!empty(&_POST['name']))) {
    $body.='<p><string>Имя:</strong> '.&_POST['name'].'</p>';
  }
  if (trim(!empty(&_POST['email']))) {
    $body.='<p><string>E-mail:</strong> '.&_POST['email'].'</p>';
  }
  if (trim(!empty(&_POST['message']))) {
    $body.='<p><string>Сообщение:</strong> '.&_POST['message'].'</p>';
  }

  $mail->Body = $body;

  //Отправляем

  if (!$mail->send()) {
    $message = 'Ошибка';
  }else {
      $message = 'Данные отправлены!';
  }
  $response = ['message' => $message];
  header('Content-type: application/json');
  echo json_endcode($response);
  ?>
