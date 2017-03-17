<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use App\User;
use DB;
use Input;

abstract class Controller extends BaseController {
    use DispatchesJobs, ValidatesRequests;
	
	protected $_userid;
	protected $_curr_longitude;
	protected $_curr_latitude;
	
	public function send_error($error = "Error!") {
		echo json_encode(array("success" => false, "error" => $error));
		exit ;
	}
	
	public function generate_token($length = 8) {
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		//length:36
		$final_rand = '';
		for ($i = 0; $i < $length; $i++) {
			$final_rand .= $chars[rand(0, strlen($chars) - 1)];
		}
		return $final_rand;
	}
	
	public function authentication() {
		$token = Request::header("Access-Token");
                $token = "QfOXNnjwzJGxuUqlB5iUHZi4H6YDR9bcHDqh7ZJDtBYo3VPNoDKG8yXHVvmq";
		$longitude = Request::header("Longitude");
		$latitude = Request::header("Latitude");

		if ($token == "") :
			echo json_encode(array("error" => "You have no access permission."));
			exit ;
		endif;

		$check = User::where('remember_token', $token) -> first();

		if (!empty($check)) :
			DB::table("user_login_history") -> where("user_id", $check -> id) -> update(array("latitude" => $latitude, "longitude" => $longitude, "logged_date" => time()));
			$this -> _userid = $check -> id;
			$this->_curr_longitude = $longitude;
			$this->_curr_latitude = $latitude;
		else :
			echo json_encode(array("error" => "You have no access permission."));
			exit ;
		endif;
		
		// change status to progress
		DB::table("activity")
			->where("start_time", "<=", date("Y-m-d H:i:s"))
			->where("status", "100")
			->update(array("status" => -1));

		DB::table("activity")
			->where("end_time", "<=", date("Y-m-d H:i:s"))
			->where("status", "-1")
			->update(array("status" => 1));
	}
	
	public function distance($lat1, $lon1, $lat2, $lon2, $unit = 'K') {
		$theta = $lon1 - $lon2;
  		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  		$dist = acos($dist);
  		$dist = rad2deg($dist);
  		$miles = $dist * 60 * 1.1515;
  		$unit = strtoupper($unit);

  		if ($unit == "K") {
    		return ($miles * 1.609344);
  		} else if ($unit == "N") {
      		return ($miles * 0.8684);
    	} else {
        	return $miles;
      	}
	}
}
