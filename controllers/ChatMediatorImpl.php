<?php
class ChatMediatorImpl implements ChatMediator
{
    private $users;
    function __construt()
    {
        $this->users = array();
    }
    public function sendNotification($msg)
    {
        foreach ($this->users as $user) {
            $user->recieveNotification($msg);
        }
    }
    public function addUser($user)
    {
        array_push($this->users, $user);
    }
}
