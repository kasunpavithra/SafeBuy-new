<?php
class Chat extends Controller
{
    private $message;
    private $status;
    private $time;
    function __construct($chat_id)
    {
        parent::__construct();

        $this->makeDetails($chat_id);
    }
    function makeDetails($chat_id)
    {
        $this->loadModel("Chat");
        $chatData = $this->model->getChatData($chat_id)[0];
        $this->message = $chatData["message"];
        $this->status = $chatData["status"];
        $this->time = $chatData["time"];
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }
}
