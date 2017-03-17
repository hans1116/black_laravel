<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Input;
use DB;
use Request;
use App\User;
use Hash;
use Config;

class SearchController extends Controller {

	/*
	 |--------------------------------------------------------------------------
	 | Default Home Controller
	 |--------------------------------------------------------------------------
	 |
	 | You may wish to use controllers instead of, or in addition to, Closure
	 | based routes. That's great! Here is an example controller method to
	 | get you started. To route to this controller, just add the route:
	 |
	 |	Route::get('/', 'HomeController@showWelcome');
	 |
	 */

	public function search_users() {
		$this -> authentication();

		$gender = Input::get("gender");
		$time_limit = Input::get("time_limit");
		$index = Input::get("index");

		$longitude = 0;
		$latitude = 0;
		$locations = DB::table("user_login_history") -> where("user_id", $this -> _userid) -> first();
		if (!empty($locations)) :
			$longitude = $locations -> longitude;
			$latitude = $locations -> latitude;
		endif;

		$sql = "SELECT 	a.id as user_id, a.username, a.gender, a.birthday, b.user_signature, b.job_name, b.school_name, b.interests, b.interest_place, a.company_name,
						case when a.type = 1 then 
							a.photo 
						else
							(select d.photo_url from user_photos d where d.user_id = a.id order by d.is_avatar desc limit 1)
						end as user_photo,
						(select count(d.user_id) 
							from friends d 
							where (d.user_id = " . $this -> _userid . " or d.friend_id = " . $this -> _userid . ")
						) is_friend,
						c.logged_date,
						3956 * 2 * ASIN(SQRT( POWER(SIN(($latitude - abs(c.latitude))*pi()/180/2),2)
							+COS($latitude*pi()/180 )*COS(abs(c.latitude)*pi()/180)
							*POWER(SIN(($longitude-c.longitude)*pi()/180/2),2))) 
							as distance
				FROM 	users a
						left join user_profile b on a.id = b.user_id
						,user_login_history c
				WHERE 	a.id = c.user_id and a.status = 1 AND a.permission = 1 and a.id != '" . $this -> _userid . "' ";

		if ($gender > 0) :
			$sql .= " AND a.gender in (" . $gender . ") ";
		endif;

		switch($time_limit) :
			case 1 :
				//15 min
				$sql .= " AND " . time() . " - logged_date <= 900 ";
				break;
			case 2 :
				// 60 min
				$sql .= " AND " . time() . " - logged_date <= 3600 ";
				break;
			case 3 :
				// 3 hours
				$sql .= " AND " . time() . " - logged_date <= 10800 ";
				break;
			case 4 :
				// 12 hours
				$sql .= " AND " . time() . " - logged_date <= 43200 ";
				break;
			case 5 :
				// 1 day
				$sql .= " AND " . time() . " - logged_date <= 86400 ";
				break;
			case 6 :
				// 3 days
				$sql .= " AND " . time() . " - logged_date <= 259200 ";
				break;
		endswitch;

		if ($index == 0 || $index == "") {
			$start = 0;
			$end = 15;
		} else {
			$start = $index * 15;
			$end = 15;
		}

		$sql .= " GROUP BY a.id ";
		$sql .= " ORDER BY distance, logged_date desc LIMIT $start, $end";

		$tmp = DB::select($sql);
		$result = array();
		$now = time();
		foreach ($tmp as $one) :
			$result[] = [
				"user_id" => $one -> user_id, 
				"username" => $one -> username, 
				"gender" => $one -> gender, 
				"birthday" => $one -> birthday, 
				"user_signature" => $one -> user_signature, 
				"job_name" => $one -> job_name, 
				"school_name" => $one -> school_name, 
				"interests" => $one -> interests, 
				"interest_place" => $one -> interest_place, 
				"user_photo" => $one -> user_photo, 
				"logged_date" => $one -> logged_date == 0 ? "" : date("Y-m-d H:i:s", $one -> logged_date), 
				"distance" => $one -> distance * 1000, 
				"difference_time" => $now - $one -> logged_date, 
				"is_friend" => $one -> is_friend, 
				"company_name" => $one -> company_name
			];
		endforeach;

		echo json_encode(array("success" => true, "users" => $result));
	}

}