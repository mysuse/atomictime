<?php

namespace RintoExandi\AtomicTime;

use Carbon\Carbon;
use Datetime;
use DatetimeZone;

class Application{

    /**
     * Boot the application
     */
    public function boot()
    {
        // include config, load DI, etc
    }

    /**
     * Run application
     */
    public function run()
    {
        return $this->apiTimeStamp();

    }


    protected function apiTimeStamp(){

        $timeObj = [
            'clientip'=>$this->getClientIP(),
            'utctime'=>date('Y-m-d H:i:s'),
            'timezone'=>'Asia/Jakarta',
            'unixtime'=>time(),
            'gmt'=>'GMT+7',
            'datetime'=>$this->timeapi(),
         ];

      
        $myJSON = json_encode($timeObj);

        return $myJSON;
    }

    protected function timeapi(){

        $current =  Carbon::now(new DateTimeZone('Asia/Jakarta'));

        return $current->format('Y-m-d H:i:s');
    }

    protected function getTimeNow(){
        $tmp_date =date('Y-m-d H:i:s');
        
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $tmp_date, new DateTimeZone('Asia/Jakarta'));
        
        return $date->format('Y-m-d H:i:s');
    }

    protected function getClientIP(){
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else
        {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
   
}