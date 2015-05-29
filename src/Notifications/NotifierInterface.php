<?php namespace Socieboy\Newsletter\Notifications;

interface NotifierInterface {

    public function notify($title, $body, $listName);

}