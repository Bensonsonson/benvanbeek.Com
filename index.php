<?php

require_once 'twigloader.php';

$adminEmail = 'ben_van_beek@hotmail.com';
$name = $email = $subject = $message = $confirmation = '';
$errormessages = array();

if (isset($_POST)&&!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'name': if (!empty($value)) {
                    $name = stripslashes($value);
                } else {
                    $errormessages[] = "Please fill in your name";
                }
                break;
            case 'email': if (!empty($value)) {
                    $email = trim($value);
                } else {
                    $errormessages[] = "Enter your emailaddress please";
                }
                break;
            case 'subject': if (!empty($value)) {
                    $subject = stripslashes($value);
                } else {
                    $errormessages[] = "Please fill in a subject";
                }
                break;
            case 'message': if (!empty($value)) {
                    $message = stripslashes($value);
                } else {
                    $errormessages[] = "Enter a message please";
                }
                break;
        }
    }

    if (empty($errormessages)) {
        $mail = mail($adminEmail, $subject, $message, "From: " . $name . " <" . $email . ">\r\n"
                . "Reply-To: " . $email . "\r\n"
                . "X-Mailer: PHP/" . phpversion());
        if ($mail) {
            $name = $email = $subject = $message = '';
            $confirmation = 'Thank you! Your email has been sent. I will contact you ASAP.';
        } else {
            $confirmation = 'Something went wrong! Please try again.';
        }
    }

    /*
      if (!empty($_POST['name'])) {
      $name = stripslashes($_POST['name']);
      } else {
      $errormessages[] = "Please fill in your name";
      }
      if (!empty($_POST['email'])) {
      $email = trim($_POST['email']);
      } else {
      $errormessages[] = "Enter your emailaddress please";
      }
      if (!empty($_POST['subject'])) {
      $subject = stripslashes($_POST['subject']);
      } else {
      $errormessages[] = "Please fill in a subject";
      }
      if (!empty($_POST['message'])) {
      $message = stripslashes($_POST['message']);
      } else {
      $errormessages[] = "Enter a message please";
      }
     * 
     */
}



$view = $twig->render('index.twig', array('confirmation' => $confirmation, 'errormessages' => $errormessages, 'name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message));
print($view);
?>