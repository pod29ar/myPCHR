<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('delivery_date'))
{
	function delivery_date()
	{
		$today = date('j-M-Y',strtotime("today"));
		$date = array('Today');

		for ($x=1; $x<7; $x++) {
			array_push($date, date('j-M-Y',strtotime("+${x} day")));
		}

		return $date;
	}
}

if ( ! function_exists('delivery_time'))
{
	function delivery_time()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$now = strtotime("now");
		$hour = date('H', $now);
		$minute = date('i', $now);
		$minute -= $minute % 15;
		if ($minute == 60) {
			$hour++;
			$minute = 00;
		}
		$time = "${hour}:${minute}";
		if ($hour < 11) {
			$time = "11:00";
		}
		$dif = 0;

		$delTime = array('Now');
		while ($now < strtotime("today 21:30")) {
			$dif += 15;
			$now = strtotime("+${dif} minutes ${time}");
			array_push($delTime, date('H:i', $now));
		}

		return $delTime;
	}
}
