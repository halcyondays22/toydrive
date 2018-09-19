<?php

/* This section validates the input boxes - note that is checking for objects by what they are named - it looks for "name", "email", and "message" which are what the input boxes are named in the HTML; this section also checks for a valid email address in the email box */
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
  /* If any of the boxes are empty or the email isn't valid, the user is redirected to a file named "error.html", which can be designed as desired */
    echo file_get_contents("error.html");
     exit();
} else {
  /* Otherwise, if the boxes are filled and a valid email is provided, the email is sent - note that this is getting items by what they are named in the HTML again, and renaming them as $name, #email_address, and $message */
    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $message = $_POST['message'];

  /* This is the subject line of the email you will get - it will put in the name the user inputs */
    $email_subject = "Website Contact Form:  $name";

  /* This is the body of the email you will get - it has a title, then a message, then lists the information from the user. You can add or delete from this section as needed. */
    $email_body = '<html><head><title>Hello!</title></head>'."\r\n";
    $email_body .= "You have a new message from your website.\n\n"."Information:\n\nName: $name\nEmail: $email_address\n\nMessage:\n$message";

    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
  
  /* Change this to your email address */
    $headers .= 'From:  <"tom.raley@gmail.com">';

  /* Also change this to your email address */
    mail("tom.raley@gmail.com", $email_subject, $email_body, $headers);

  /* The user will be redirected to a file called "thanks.html", which can be designed as desired */
    echo file_get_contents("thanks.html");
    exit();
}

?>