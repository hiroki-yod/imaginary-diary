<?php

namespace App\Libraries;

class Functions
{
    public static function toggleSwitch()
    {
        $headers = [
            "Content-Type: application/json",
            'Authorization: '. env('switch_token')
        ];
        
        $url = 'https://api.switch-bot.com/v1.0/devices/'. env('device_id') .'/commands';
        $p = array(
                    "command" => 'toggle',
                    "parameter" => 'default',
                    "commandType" => 'command'
                );
        $param = json_encode($p);
        
        // 必要に応じてオプションを追加してください。
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers);
        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $param);
        
        $response = curl_exec($ch);
        curl_close($ch);
    }
}