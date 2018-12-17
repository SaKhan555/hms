<?php 

namespace App\Custome;

use Carbon\Carbon;

Class Custome {

/*------------------------------Date methods------------------------------------*/

public static function store_datetime() {
	$datetime = Carbon::now('Asia/Karachi');
	return $datetime;
}

public static function store_full_date($date) {
	$store_date = strtotime($date); 
	return date("Y-m-d",$store_date);
}

public static function store_year_month($date) {
$store_date = strtotime($date); 
return date("Y-m",$store_date);
}

public static function show_date($date) {
$show_date = strtotime($date); 
return date("d-m-Y",$show_date);
}

public static function days_in_month($month,$year) {
	    $days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    	return $days_in_month;
}

} 