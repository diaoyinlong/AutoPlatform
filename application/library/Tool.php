<?php

class Tool
{
    public static function getSign($signArr)
    {
        ksort($signArr);
        $str = '';
        foreach ($signArr as $k => $v) {
            if ($k == 'sign_key' || $k == 'sign_type' || $v == '' || $k == 'sign') {
                continue;
            }
            $str .= $k . '=' . $v . '&';
        }
        $str = rtrim($str, '&') . $signArr['sign_key'];
        return strtoupper(md5($str));
    }

    public static function curlPost($url, $dataArr)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADEROPT, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}