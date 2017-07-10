<?php

namespace utilities;

class SendSMS
{
    public static function replier($url)
    {
        $f3 = \Base::instance();
        if($f3->get('SMS') == 1)
        {
            $reply = file_get_contents($url);

            if (strstr($reply, "<succes>")) {
                return true;
            } else {
                return false;
            }
        }
        else
        {
            return true;
        }
    }
}