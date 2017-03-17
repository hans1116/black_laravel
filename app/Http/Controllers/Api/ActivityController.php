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

class ActivityController extends Controller {

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
	
	public function save_activity($id) {
		$this -> authentication();

		$category_id = Input::get("category_id");
		$title = Input::get("title");
		$description = Input::get("description");
		$address = Input::get("address");
		$payment_type = Input::get("payment_type");
		$payment_method = Input::get("payment_method");
		$cost_1 = Input::get("cost_1");
		$cost_2 = Input::get("cost_2");
		$is_public = Input::get("is_public");
		$report_date = Input::get("report_date");
		$start_time = Input::get("start_time");
		$limit_time = Input::get("limit_time");
		$min_member_count = Input::get("min_member_count");
		$max_member_count = Input::get("max_member_count");
		$gender = Input::get("gender");
		$invited_friends = Input::get("invited_friends");
		$invited_groups = Input::get("invited_groups");
		$deals_id = Input::get("deals_id");
		$activity_join_condition = Input::get("activity_join_condition");
		$longitude = $this -> _curr_longitude;
		$latitude = $this -> _curr_latitude;
		$user_id = $this -> _userid;
		$created_date = date("Y-m-d H:i:s");
		$photo_url = "";
		
		$end_time = date("Y-m-d H:i:s", strtotime($start_time)*1 + $limit_time);
		
		if (isset($_FILES['photo'])) :
			$filename = $this -> generate_token(16) . ".jpg";
			if (move_uploaded_file($_FILES["photo"]["tmp_name"], public_path() . "/upload/activity/" . $filename)) :
				$photo_url = Config::get("app.url") . "/upload/activity/" . $filename;
			endif;
		endif;
		
		if ($id == 0) :
			$newid = DB::table("activity") -> insertGetId(array("id" => null, "category_id" => $category_id, "title" => $title, "description" => $description, "longitude" => $longitude, "latitude" => $latitude, "address" => $address, "photo_url" => $photo_url, "payment_type" => $payment_type, "payment_method" => $payment_method, "cost_1" => $cost_1, "cost_2" => $cost_2, "is_public" => $is_public, "report_date" => $report_date, "start_time" => $start_time, "limit_time" => $limit_time, "end_time" => $end_time, "min_member_count" => $min_member_count, "max_member_count" => $max_member_count, "gender" => $gender, "invited_friends" => $invited_friends, "invited_groups" => $invited_groups, "deals_id" => $deals_id, "activity_join_condition" => $activity_join_condition, "user_id" => $user_id, "created_date" => $created_date, "status" => 100));
		else :
			DB::table("activity") -> where("id", $id) -> update(array("category_id" => $category_id, "title" => $title, "description" => $description, "longitude" => $longitude, "latitude" => $latitude, "address" => $address, "payment_type" => $payment_type, "payment_method" => $payment_method, "cost_1" => $cost_1, "cost_2" => $cost_2, "is_public" => $is_public, "report_date" => $report_date, "start_time" => $start_time, "limit_time" => $limit_time, "end_time" => $end_time, "min_member_count" => $min_member_count, "max_member_count" => $max_member_count, "gender" => $gender, "invited_friends" => $invited_friends, "invited_groups" => $invited_groups, "deals_id" => $deals_id, "activity_join_condition" => $activity_join_condition, "created_date" => $created_date));
			if ($photo_url != "") :
				DB::table("activity") -> where("id", $id) -> update(array("photo_url" => $photo_url));
			endif;
		endif;

		echo json_encode(array("success" => true));
	}

	public function categories() {
		$this -> authentication();

		$data = DB::table("activity_category") -> orderby("name") -> get();
		echo json_encode(array("success" => true, "categories" => $data));
	}
	
	public function search() {
		$this -> authentication();
		
		$gender = Input::get("gender");
		$categories = Input::get("categories");
		$index = Input::get("index");
		
		if ($index == 0) {
			$start = 0;
			$end = 10;
		} else {
			$start = $index * 10;
			$end = 10;
		}

		$sql = "select a.*, b.photo as user_photo, b.username, b.birthday, b.gender, 
					case when a.user_id = ".$this->_userid." then 1 else -1 end as is_mine,
					case when (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") is null then -1
					else (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") end as is_join,
					(select count(*) from activity_comment where activity_id = a.id) as comment_count,
					(select count(*) from activity_report where activity_id = a.id) as report_count,
					( 3959 * ACOS( COS( RADIANS(" . $this->_curr_latitude . ") ) 
								              * COS( RADIANS( a.latitude ) ) 
								              * COS( RADIANS( a.longitude ) - RADIANS(" . $this->_curr_longitude . ") ) 
								              + SIN( RADIANS(" . $this->_curr_latitude . ") ) 
								              * SIN( RADIANS( a.latitude ) ) ) ) AS distance
				from activity a, users b where a.user_id = b.id ";
		if($gender > 0) {
			$sql .= " and b.gender = " . $gender;
		}
		if($categories != "") {
			$sql .= " and a.category_id in (" . $categories . ")";
		}
		$sql .= " order by created_date desc limit $start, $end";
		
		$result = DB::select($sql);
		
		echo json_encode(array("success" => true, "result" => $result));
	}
	
	public function join($id) {
		$this -> authentication();
		
		$check = DB::table("activity_join")->where("activity_id", $id)->where("join_id", $this->_userid)->first();
		if(!empty($check)) {
			echo json_encode(array("success" => false, "error" => "You have already joined in this activity."));
			exit;
		}
		
		$activity = DB::table("activity")->where("id", $id)->first();
		
		if($activity->is_paid == 1) :
			DB::table("activity_join")->insert(array("activity_id" => $id, "join_id" => $this -> _userid, "is_accept" => 1, "joined_date" => date("Y-m-d H:i:s")));
		
			$count_joined = DB::table("activity_join")->where("activity_id", $id)->count();
			if($count_joined == $activity -> max_member_count) :
				DB::table("activity")->where("id", $id)->update(array("status" => 99));
			endif;
		else :
			DB::table("activity_join")->insert(array("activity_id" => $id, "join_id" => $this -> _userid, "is_accept" => 100, "joined_date" => date("Y-m-d H:i:s")));
		endif;
		
		echo json_encode(array("success" => true));
	}
	
	public function post_comment($id) {
		$this -> authentication();
		
		$comment = Input::get("comment");
		DB::table("activity_comment")->insert(array("id" => null, "activity_id" => $id, "user_id" => $this->_userid, "comment" => $comment, "posted_date" => date("Y-m-d H:i:s")));
		echo json_encode(array("success" => true));
	}
	
	public function activity($id) {
		$this -> authentication();
		
		$main_info = DB::select("select a.*, b.photo, b.username, b.gender as user_gender, b.birthday,
									(select count(c.id) from activity_comment c where c.activity_id = ".$id.") as comment_count,
									(select count(d.id) from activity_report d where d.activity_id = ".$id.") as report_count,
									case when a.user_id = ".$this->_userid." then 1 else -1 end as is_mine,
									case when (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") is null then -1
									else (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") end as is_join
								from activity a, users b
								where a.user_id = b.id
									and a.id = " . $id);
/*		$main_info = DB::table('activity')
			            ->join('users', 'activity.user_id', '=', 'users.id')
			            ->select('activity.*', 'users.photo', 'users.username', 'users.gender', 'users.birthday')
			            ->first();*/
		$joined_users = DB::table('activity_join')
				            ->join('users', 'activity_join.join_id', '=', 'users.id')
				            ->select('activity_join.*', 'users.photo', 'users.username')
							->where('activity_join.activity_id', $id)
							->orderBy('joined_date', 'desc')
				            ->get();
		$comments = DB::table('activity_comment')
						->join('users', 'activity_comment.user_id', '=', 'users.id')
						->select('activity_comment.*', 'users.photo', 'users.username')
						->where('activity_comment.activity_id', $id)
						->orderBy('posted_date', 'desc')
						->get();
		
		$distance = $this->distance($this->_curr_latitude, $this->_curr_longitude, $main_info[0]->latitude, $main_info[0]->longitude);
		
		echo json_encode(array(
			"success" => true,
			"activity_info" => $main_info[0],
			"joined_users" => $joined_users,
			"comments" => $comments,
			"distance" => $distance
		));
	}
	
	public function report($id) {
		$this -> authentication();
		
		$content = Input::get("content");
		
		$newid = DB::table("activity_report")->insertGetId(array("id" => null, "activity_id" => $id, "user_id" => $this->_userid, "content" => $content, "photo_url" => "", "reported_date" => date("Y-m-d H:i:s")));
		if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "") :
			$filename = $this -> generate_token(16) . ".jpg";
			if (move_uploaded_file($_FILES["photo"]["tmp_name"], public_path() . "/upload/report/" . $filename)) :
				DB::table("activity_report") -> where("id", $newid) -> update(array("photo_url" => Config::get("app.url") . "/upload/report/" . $filename));
			endif;
		endif;
		
		echo json_encode(array("success" => true));
	}
	
	public function get_my_activities() {
		$this -> authentication();
		
		$sql = "select	a.id as activity_id, a.title, a.description, count(b.user_id) as user_count, a.photo_url, a.created_date
				from 	activities a
					left join activity_join b on a.id = b.activity_id
				where 	a.user_id = ".$this->_userid."
				group by a.id
				order by a.created_date desc";
		$activities = DB::select($sql);
		
		echo json_encode(array("success" => true, "activities" => $activities));
	}
	
	public function pending_users($id) {
		$this -> authentication();
		
		$users = DB::table("users")
			->join('activity_join', 'activity_join.join_id', '=', 'users.id')
			->where("activity_join.activity_id", $id)
			->where("activity_join.is_accept", 100)
            		->select('activity_join.joined_date', 'users.photo', 'users.username', 'users.id as user_id')
			->orderBy('joined_date', 'desc')
            		->get();
		
		echo json_encode(array("success" => true, "users" => $users));
	}
	
	public function accept_pending_user($id) {
		$this -> authentication();
		
		$user_ids = Input::get("user_ids");
		
		$activity = DB::table("activity")->where("id", $id)->first();
		
		if(!($activity->is_paid == 1) && $user_ids != "") :
			DB::table("activity_join")->where("activity_id", $id)->whereIn('join_id', explode(",", $user_ids))->update(array("is_accept" => 1));
			DB::table("activity_join")->where("activity_id", $id)->where("is_accept", 100)->delete();			
		endif;

		DB::table("activity")->where("id", $id)->update(array("status" => 99));
		
		echo json_encode(array("success" => true));
	}
	
	public function decline_pending_user($id) {
		$this -> authentication();
		
		$user_id = Input::get("user_ids");
		
		DB::table("activity_join")->where("activity_id", $id)->whereIn('join_id', explode(",", $user_ids))->delete();
		
		echo json_encode(array("success" => true));
	}
	
	public function delete_activity($id) {
		$this -> authentication();
		
		DB::table("activity")->where("id", $id)->delete();
		
		echo json_encode(array("success" => true));
	}
	
	public function quit($id) {
		$this -> authentication();
		
		DB::table("activity_join")->where("activity_id", $id)->where("join_id", $this->_userid)->delete();
		
		echo json_encode(array("success" => true));
	}

	public function related_activities() {
		$this -> authentication();
		
		$activities = DB::select("select a.*, b.photo, b.username, b.gender as user_gender, b.birthday,
									(select count(c.id) from activity_comment c where c.activity_id = a.id) as comment_count,
									(select count(d.id) from activity_report d where d.activity_id = a.id) as report_count,
									case when a.user_id = ".$this->_userid." then 1 else -1 end as is_mine,
									case when (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") is null then -1
									else (select distinct c.is_accept from activity_join c where c.activity_id = a.id and c.join_id = ".$this->_userid.") end as is_join
								from activity a, users b
								where a.user_id = b.id
									and (b.id = " . $this->_userid . " or a.id in (select c.activity_id from activity_join c where c.join_id = ".$this->_userid."))
								group by a.id
								order by a.created_date desc");
		
		echo json_encode(array("success" => true, "activities" => $activities));
	}

}