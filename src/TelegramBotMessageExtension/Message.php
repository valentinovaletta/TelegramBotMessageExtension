<?php

namespace TelegramBotMessageExtension;

class Message
{
    private $token;
    private $id;

    public function __construct($token, $id)
    {
        $this->token = $token;
        $this->id = $id;
    }

    public function sendSingleMessage($text, $mode)
    {
        return $this->sendRequest('sendMessage', ['chat_id' => $this->id, 'text' => $text, "parse_mode" => $mode]);
    }

    public function sendSticker($sticker)
    {
        return $this->sendRequest('sendSticker', ['chat_id' => $this->id, 'sticker' => $sticker]);
    }

    public function sendMessagesQueue($messagesArray)
    {
        $i = 1;
        foreach($messagesArray as $message){
            $message['param']['chat_id'] = $this->id;
            $request = $this->sendRequest($message['method'], $message['param']);
            usleep($message['delay']);
            if($i++ < count($messagesArray)){
                $this->sendRequest('deleteMessage', ['chat_id' => $this->id, 'message_id' => $request->result->message_id]);
            }
        }
    }

    private function sendRequest($method, $param=[]) {
        $url = "https://api.telegram.org/bot$this->token/$method?";
        $url .= http_build_query($param);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }   

}