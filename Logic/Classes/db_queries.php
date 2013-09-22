<?php
include_once 'appconfig.php';
include_once 'db_connection.php';
include_once 'user.php';
include_once 'goal.php';

class Queries {
	
	private $instance;
	
	public function getAvarageGoals() {
		$instance = new Connection();
		$result = $instance->run_query('SELECT (SELECT COUNT(ID) FROM goalList WHERE achieved=0) / (SELECT COUNT(ID) FROM user)');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}

	public function procentageAchievedGoalsAllUsers() {
		$instance = new Connection();
		$result = $instance->run_query('SELECT CAST((SELECT COUNT(ID) FROM goalList WHERE achieved=1) / (SELECT COUNT(ID) FROM goal) * 100 as UNSIGNED) as average');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	
	public function createUser($user){
		$instance = new Connection();
		$result = $instance->run_query_last_inserted_id('INSERT INTO user (`facebook_id`, `first_name`, `last_name`, `username`, 
			`email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) 
			VALUES (NULL,"'.$user->first_name.'","'. $user->last_name.'","'. $user->username.'",
			"'. $user->email.'","'.$user->city.'","'. $user->country.'","'. $user->age.'",
			"'. $user->gender.'","'. $user->worktitle.'","'. $user->password.'")');
		return $result;
	}
	
	public function getUserInfo($username) {
		$instance = new Connection();
		$result = $instance->run_query('SELECT * FROM user WHERE username="'.$username.'"');
		return $result->fetch_array(MYSQLI_ASSOC);
	}
	
	public function createGoal($goal){
		$instance = new Connection();
		$bucket = unserialize($goal->bucket);
		$result = $instance->run_query_last_inserted_id('INSERT INTO goal (`user_id`, `start_date`, `title`, `description`) 
			VALUES ("'.$goal->userId.'", "'.$goal->startDate.'", "'.$goal->title.'", "'.$goal->description.'")');
		
		foreach($bucket as $key => $bucketId){
			$instance->run_query('Insert into goalList (user_id,goal,list) Values ("'.$goal->userId.'","'.$result.'","'.$bucketId.'")');
		}
		return $result;
	}
	public function getGoals($userId){
		$instance = new Connection();
		$result = $instance->run_query_return_array('Select g.ID,g.start_date,g.title,g.description,gl.achieved,DATEDIFF(start_date,NOW()) as days from goal g left join goalList gl on g.ID = gl.goal where gl.user_id = "'.$userId.'" order by g.start_date');
		return $result;
	}
	public function getBucketGoals($bucketId){
		$instance = new Connection();
		$result = $instance->run_query_return_array('Select g.ID,g.start_date,g.title,g.description,gl.achieved,DATEDIFF(start_date,NOW()) as days from goal g left join goalList gl on g.ID = gl.goal where gl.list = "'.$bucketId.'" order by g.start_date');
		return $result;
	}
	public function loginAuth($username, $password){
		$instance = new Connection();
		$result = $instance->run_query('SELECT * FROM user WHERE username ="'.$username.'" AND password="'.$password.'"');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	public function getUserId($username) {
		$instance = new Connection();
		$result = $instance->run_query('SELECT `ID` FROM user WHERE username ="'.$username.'"');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	public function createBucketList($userId, $title, $description) {
		$instance = new Connection();
		$result = $instance->run_query('INSERT INTO list (`user_id`, `name`, `description`) 
			VALUES ("'.$userId.'", "'.$title.'", "'.$description.'")');	
		return $result;
	}
	public function getBucketList($userId = false){
		$instance = new Connection();
		if($userId):
			$result = $instance->run_query_return_array('Select l.ID,l.name,l.description from goalList gl left outer join list l on l.ID = gl.list where gl.user_id = "'.$userId.'" group by gl.list order by l.name');
		else :
			$result = $instance->run_query_return_array('Select l.ID,l.name from goalList gl left join list l on l.ID = gl.list group by l.ID order by l.name');
		endif;
		
		return $result;
	}
	public function getBucketListWithGoal($userId = false){
		$instance = new Connection();
		if($userId):
			$result = $instance->run_query_return_array('Select l.ID,l.name from goalList gl left join list l on l.ID = gl.list where gl.user_id = "'.$userId.'" group by l.ID order by l.name');
		else :
			$result = $instance->run_query_return_array('Select l.ID,l.name from goalList gl left join list l on l.ID = gl.list group by l.ID order by l.name');
		endif;
		
		return $result;
	}
	
	/*
	 * This function queries a view that joins tables 'user', 'goal' and 'list'
	 * */
	public function getAllOnUsers($userId = NULL) {
		$instance = new Connection();
		$qry = 'SELECT * FROM all_on_user';
		if($userId) {
			$qry .= ' WHERE user_id ='.$userId;
		}
		return $instance->run_query_return_array($qry);
	}
	
	public function fearFactor($userId) {
		$instance = new Connection();
		$result = $instance->run_query('SELECT (SELECT COUNT(ID) FROM goalList WHERE achieved=1 AND user_id="'.$userId.'") AS achieved, (SELECT COUNT(ID) FROM goal WHERE user_id="'.$userId.'") AS total');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row;
	}

}
?>