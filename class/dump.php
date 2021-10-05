<?php

class dump
{
    public function changeDate(String $date) {
        return substr($date,6,9).substr($date,2,3)."-".substr($date,0,2);
    }
}
?>