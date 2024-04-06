<?php
require_once('Notify.php');
require_once('EmailNotify.php');
require_once('PhoneNotify.php');
require_once('SMSNotify.php');


class User
{
    public function __construct($type)
    {
        $obj = null;
        switch ($type) {
            case 'Email':
                $obj = new EmailNotify();
                break;
            case 'Phone':
                $obj = new PhoneNotify();
                break;
            case 'SMS':
                $obj = new SMSNotify();
                break;
            default:
                echo "Unknown type";
        }
        $obj->send();
    }
}
new User('Phone');
