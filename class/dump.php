<?php

class dump
{
    public function changeDate(String $date) {
        return substr($date,-4,-1)+"-"+substr($date,3,4)+"-"+substr($date,0,1);
    }
}
?>