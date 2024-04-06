<?php
require_once('Notify.php');
require_once('EmailNotify.php');
require_once('PhoneNotify.php');
require_once('SMSNotify.php');
require_once('Notifier.php');
require_once('EmailUser.php');
require_once('PhoneUser.php');


class User
{
    public function __construct()
    {
        $bb = new EmailUser();
        $bb->notificationType(new PhoneNotify() );
        $bb->sendNotification(); 
    }
}
new User();
