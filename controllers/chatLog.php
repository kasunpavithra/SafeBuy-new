<?php
require_once("Chat.php");
class ChatLog extends Controller
{

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
    function makeDetails($customer_id)
    {
        //   var_dump($this);
        $chat_idList = $this->model->getChatIDList($customer_id);

        foreach ($chat_idList as $chatID) {

            array_push($this->messageList, new Chat($chatID[0]));
        }
    }

    /**
     * Get the value of messageList
     */
    public function getMessageList()
    {
        return $this->messageList;
    }
}
