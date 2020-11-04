<?php 
$telegram = new Telegram\Bot\Api(TOKENBOT);

function sendMsg($msg){
    global $telegram;
    $response = $telegram->sendMessage([
        'chat_id' => USERID, 
        'text' => $msg
      ]);
    $messageId = $response->getMessageId();
}
?>