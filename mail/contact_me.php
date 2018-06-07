<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'contact@1001patrimoines.fr';
$email_subject = "1001 PATRIMOINES - demande de contact :  $name";
$email_body = "Vous avez un nouveau message.\n\n"."Nom : $name\n\nEmail : $email_address\n\nTéléphone : $phone\n\nMessage :\n$message";
$headers = "From: no-reply@1001patrimoines.fr\n"; // This is the email address the generated message will be from. We recommend using something like no-reply@1001patrimoines.fr.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
