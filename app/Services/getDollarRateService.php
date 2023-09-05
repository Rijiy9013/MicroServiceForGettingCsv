<?php

namespace App\Services;

class getDollarRateService
{
    private $key = "92732b0473534bf084ed510dc9da6e90";
    private $actual_course = 0;
    private $start_time = 0;

    public function __construct(){
        $this->start_time = microtime(true);
    }

    public function getDollarRate()
    {
        if ((microtime(true) - $this->start_time) / 60 >= 60){
            $this->start_time = microtime(true);
            $oxr_url = "https://openexchangerates.org/api/latest.json?app_id=" . $this->key;
            $ch = curl_init($oxr_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $json = curl_exec($ch);
            curl_close($ch);
            $oxr_latest = json_decode($json);
            $this->actual_course = $oxr_latest->rates->RUB;
        }
        return $this->actual_course;
    }


}
