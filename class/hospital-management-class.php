<?php
class MJ_hmgt_Hospital_Management
{
	public $patient;
	public $doctor;
	public $nurse;
	public $pharmacist;
	public $accountant;
	public $laboratorist;
	public $outpatient;
	public $medicine;
	public $prescription;
	public $operation;
	public $diagnosis;
	public $blood_bank;
	public $role;
	
	
	function __construct($user_id = NULL)
	{
		if($user_id)
		{
			if($this->MJ_hmgt_get_current_user_role() == 'doctor')
			{
				$this->role= "doctor";
			}
			if($this->MJ_hmgt_get_current_user_role() == 'nurse')
			{
				$this->role= "nurse";
			}
		}
	}
	//get current user role
	private function MJ_hmgt_get_current_user_role () {
		global $current_user;
		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);
		return $user_role;
	}
	
}
?>