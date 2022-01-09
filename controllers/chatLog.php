<?php
require_once("Chat.php");
class ChatLog extends Controller
{
    private $hasNewMsgsStaff;
    private $hasNewMsgsCus;
    private $messageList;
    private static $ChatLogList = array();
    private function __construct($customer_id)
    {
        parent::__construct();
        $this->loadModel("ChatLog");
        $this->messageList = array();
        $this->makeDetails($customer_id);
    }
    function index()
    {
    }
    static function getInstance($customer_id)
    {
        if (array_key_exists($customer_id, self::$ChatLogList)) {
            return self::$ChatLogList[$customer_id];
        } else {
            self::$ChatLogList[$customer_id] = new ChatLog($customer_id);
            return self::$ChatLogList[$customer_id];
        }
    }
    /* check whether are there any new messages*/ 
    function makeDetails($customer_id)
    {
        //   var_dump($this);
        $chat_idList = $this->model->getChatIDList($customer_id);

        foreach ($chat_idList as $chatID) {
            $chatMsg = new Chat($chatID[0]);
            if(!isset($this->hasNewMsgsStaff) && $chatMsg->getSeenStatStaff()==0){
                $this->hasNewMsgsStaff=1;
            }
            if(!isset($this->hasNewMsgsCus) && $chatMsg->getSeenStatCus()==0){
                $this->hasNewMsgsCus=1;
            }
            array_push($this->messageList, $chatMsg);
        }
        if(!isset($this->hasNewMsgsStaff)){
            $this->hasNewMsgsStaff=0;
        }
        if(!isset($this->hasNewMsgsCus)){
            $this->hasNewMsgsCus=0;
        }
        
    }
    function markAsSeen($customer_id,$side){
        $this->model->markAsSeen($customer_id,$side);
    }

    /**
     * Get the value of messageList
     */
    public function getMessageList()
    {
        return $this->messageList;
    }

    /**
     * Get the value of hasNewMsgsStaff
     */ 
    public function getHasNewMsgsStaff()
    {
        return $this->hasNewMsgsStaff;
    }

    /**
     * Get the value of hasNewMsgsCus
     */ 
    public function getHasNewMsgsCus()
    {
        return $this->hasNewMsgsCus;
    }
}
