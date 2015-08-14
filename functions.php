<?php
     // Ki?m tra d? li?u khác r?ng
	function checkEmpty($value){
		$flag = false;
		if(!isset($value) || trim($value) == ""){
			$flag = true;
		}
		return $flag;
	}
	
	// Ki?m tra chi?u dài d? li?u
	function checkLength($value, $min, $max){
		$flag 	= false;
		$length	= strlen($value);
		if($length < $min || $length > $max){
			$flag = true;
		}
		return $flag;
	}
?>