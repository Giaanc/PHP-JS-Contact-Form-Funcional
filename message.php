<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "email receptor"; //Ingresar email que recibe estos formularios
      $subject = "Enviado desde x POR: $name <$email>";
      $body = "Nombre: $name\nEmail: $email\nTelefono: $phone\nSitio Web: $website\n\nMensaje:\n$message\n\nSaludos,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Tu mensaje fue Enviado";
      }else{
         echo "Disculpa, Fallo el envio de tu mensaje";
      }
    }else{
      echo "Ingresa un Email Valido";
    }
  }else{
    echo "Email y Mensaje Requerido";
  }
?>
