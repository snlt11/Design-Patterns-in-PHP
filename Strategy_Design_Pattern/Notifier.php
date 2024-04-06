<?php 

abstract class Notifier{
    protected $notification;
    public function sendNotification(){
        $this->notification->send();
    }
    public function notificationType(Notify $notify){
        $this->notification = $notify;
    }
}