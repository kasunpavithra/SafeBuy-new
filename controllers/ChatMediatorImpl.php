<?php
require_once "ChatMediator.php";
class ChatMediatorImpl implements ChatMediator
{
    private $users;
    function __construt()
    {
        $this->users = array();
    }
    public function sendNotification($id, $msg)
    {
        foreach ($this->users as $user) {
            $user->recieveNotification($id, $msg);
        }
    }
    public function addUser($user)
    {
        if ($this->users == NULL) {
            $this->users = array();
        }
        array_push($this->users, $user);
    }
}
