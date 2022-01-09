<?php
class Chat extends Controller
{
    private $message;
    private $status;
    private $time;
    private $seenStatStaff;
    private $seenStatCus;
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
        if((!$chatData["seen"]) && (!$chatData["status"])){
            $this->seenStatStaff = 0;
        }else{
            $this->seenStatStaff = 1;
        }
        if((!$chatData["seen"]) && ($chatData["status"])){
            $this->seenStatCus = 0;
        }else{
            $this->seenStatCus = 1;
        }
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

    /**
     * Get the value of seenStatStaff
     */ 
    public function getSeenStatStaff()
    {
        return $this->seenStatStaff;
    }

    /**
     * Get the value of seenStatCus
     */ 
    public function getSeenStatCus()
    {
        return $this->seenStatCus;
    }
}
