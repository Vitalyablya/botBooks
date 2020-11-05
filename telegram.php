<?php 
$telegram = new Telegram\Bot\Api(TOKENBOT);
// отправка сообщений в телеграмм
function sendMsg($msg){
    global $telegram;
    $response = $telegram->sendMessage([
        'chat_id' => USERID, 
        'text' => $msg
      ]);
    $messageId = $response->getMessageId();
}
?>