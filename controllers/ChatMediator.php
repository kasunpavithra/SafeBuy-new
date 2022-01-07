<?php
    interface ChatMediator {
        public function sendNotification($msg); 
        public function addUser($user);
    }
?>