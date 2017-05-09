<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if (isset($_POST['sname'])) {
    $sname=$_POST['sname'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    //Default text
    //$msgtype = $_POST['msgtype'];
    $msgtype = "text;"
    if($msgtype=='text'){
        $html='';
    }
    else{
        $msg = htmlentities($msg);
        $html=$msg;
        $msg='';
    }
    $mgClient = new Mailgun('key-b7024d2e0345c6ec0154744142c8faa4');
    //enter domain which you find in Default Password 
    $domain = "https://api.mailgun.net/v3/web.hughesflyingservice.com";

    # Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
    "from" => "$sname <postmaster@web.hughesflyingservice.com>",
     "to" => "Baz <$to>",
     "subject" => "$subject",
     "text" => "$msg!",
     'html' => "$html"
    ));
}
?>