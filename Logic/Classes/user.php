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
		$this->password	= $password;
	}

	public function getInstance() {
		 return new self(); 
	}

	public function getUserId() {
		return $this->id;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getCity() {
		return $this->city;
	}

	public function getCountry() {
		return $this->country;
	}

	public function getAge() {
		return $this->age;
	}

	public function getGender() {
		return $this->gender;
	}

	public function getWorktitle() {
		return $this->worktitle;
	}

	public function getPassword() {
		return $this->password;
	}


	public function calculateYeasLeftToLive($age, $gender) {

		$avg_max_age_male = 74;
		$avg_max_age_female = 78;

		if ($age >= 10 && $age < 120) {
			if ($gender == 'male') {
				return $avg_max_age_male - $age;
			} else if ($gender == 'female') {
				return $avg_max_age_female - $age;
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

			return $goalsAchieved / $totalGoals * 100;

	}

	/*
	 * Returns a number that represents the chance that the user acheves his Bucket List 
	 * based on years left to live and % of unachieved goals. 
	 * Higher is better.
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
}

?>