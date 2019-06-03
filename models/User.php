<?php

namespace app\models;
 
use dektrium\user\models\User as BaseUser;
 
class User extends BaseUser
{
    


    public static function limitTitle60($text='') // $transaction['contest_title']
    {
    	return (strlen($text) > 60) ? substr($text, 0, 60).'...' : $text;
    }
}