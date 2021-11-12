<?php

class dump
{
    public function changeDate($date) {
        if ($date == NULL) {
            return $date;
        }
        return substr($date,6,9).substr($date,2,3).substr($date,-5,-4).substr($date,0,2);
    }
}
?>