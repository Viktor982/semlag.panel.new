<?php

if(! function_exists('is_date_overlapped')) {
    /**
     * @param $date1_start
     * @param $date1_end
     * @param $date2_start
     * @param $date2_end
     * @return bool
     */
    function is_date_overlapped($date1_start, $date1_end, $date2_start, $date2_end)
    {
        $a = (is_string($date1_start)) ? strtotime($date1_start) : $date1_start;
        $b = (is_string($date1_end)) ? strtotime($date1_end) : $date1_end;
        $c = (is_string($date2_start)) ? strtotime($date2_start) : $date2_start;
        $d = (is_string($date2_end)) ? strtotime($date2_end) : $date2_end;
        return $a <= $d && $b >= $c;
    }
}