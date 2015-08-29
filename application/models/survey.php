<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Model{

	function getQuestions(){
		$query="SELECT * FROM questions
				ORDER BY list_order";
		return $this->db->query($query)->result_array();
	}

	function getChoices(){
		$query="SELECT * FROM choices";
		return $this->db->query($query)->result_array();
	}

	function countQuestions(){
		$query="SELECT COUNT(id) as num_of_questions FROM questions";
		return $this->db->query($query)->row_array();
	}
	
}