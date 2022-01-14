<?php
    interface ChatMediator {
        public function sendNotification($id,$msg); 
        public function addUser($user);
    }
?>