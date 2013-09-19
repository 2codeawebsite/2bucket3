<?php

class User {

	private $id;
	
	private $first_name;
	private $last_name;
	private $username;
	private $email;
	private $city;
	private $country;
	private $age;
	private $gender;
	private $worktitle;
	private $password;

	public function __construct($first_name, $last_name, $username, $email, $city, $country, $age, $gender, $worktitle, $password) {	
		$this->first_name 	= $first_name;
		$this->last_name 	= $last_name;
		$this->username 	= $username;
		$this->email 		= $email;
		$this->city			= $city;
		$this->country		= $country;
		$this->age			= $age;
		$this->gender		= $gender;
		$this->worktitle	= $worktitle;
		$this->password		= $password;
	}
	
	public static function getUserInstance() {
		return new self();
	}
	
	public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

	public function calculateYeasLeftToLive($age, $gender) {

		$avg_max_age_male = 74;
		$avg_max_age_female = 78;

		if ($age >= 10) {
			if ($age <= 120) {
				if ($gender == 'male') {
					return $avg_max_age_male - $age;
				} else if ($gender == 'female') {
					return $avg_max_age_female - $age;
				}
			} else {
				return false;
			}
		} else {
			return false;
		} 
	}


	public function numberOfUnachievedGoals($totalGoals, $goalsAchieved) {

		$result = $totalGoals - $goalsAchieved;

		if($result >= 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function numberOfUnachievedGoalsProcentage($totalGoals, $goalsAchieved) {

			$result = $goalsAchieved / $totalGoals * 100;
			
			if($result > 100) {
				return false;
			} else {
				return $result;
			}

	}

	/*
	 * Returns a number that represents the chance that the user acheves his Bucket List 
	 * based on years left to live and % of unachieved goals. 
	 * Higher is better chance.
	 * 
	 * Example:
	 * 		Years left to live (33): 	33 / 100 + 1 = 1,33 
	 * 		Uanchieved goalds (40%):	1,33 * 40%  = 1,862
	 * 
	 * */
	public function fearFactor($yearsLeftToLive, $numberOfUnachievedGoalsProcentage) {

		$result = $yearsLeftToLive / 100 + 1;
		$result = $result * ($numberOfUnachievedGoalsProcentage / 100 + 1);

		return $result;
	}
	
	public function fearFactorProcentage($age, $gender, $totalGoals, $goalsAchieved) {

		$yearsLeftToLive = $this->calculateYeasLeftToLive($age, $gender);
		$numberOfUnachievedGoalsProcentage = $this->numberOfUnachievedGoalsProcentage($totalGoals, $goalsAchieved);
		
		$result = $yearsLeftToLive / 100 + 1;
		$result = $result * ($numberOfUnachievedGoalsProcentage / 100 + 1);

		$result = pow(4.3, $result) ;
		
		$result = ($numberOfUnachievedGoalsProcentage == 0) ? '100' : number_format($result,2);
		
		return $result;
	}
	
}

?>
