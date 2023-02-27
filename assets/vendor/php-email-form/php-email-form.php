<?php
  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = $email; 
    
    // WARNING: Be sure to change this. This is the address that the email will be sent to
    $to = 'melo0294@outlook.com'; 
    
    $subject = "Message from ".$name." ";
    
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Por favor, digite seu nome';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Por favor, digite um e-mail válido';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Por favor, digite uma mensagem';
    }
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Obrigado! Nós retornaremos seu contato o mais breve possível.</div>';
  } else {
    $result='<div class="alert alert-danger">Desculpe, ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente.</div>';
  }
}
  }
?>