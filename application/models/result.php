<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Model{

	function countSurveys(){
		$query="SELECT MAX(results.survey_number) AS num FROM results";
		return $this->db->query($query)->row_array();
	}

	function newResult($results,$survey_number){
		$query="INSERT INTO results (choice_id,survey_number) VALUES ";
		foreach($results as $key=>$result){
			if($key==0){
				$query.="(".$result.",".$survey_number.")";
			}
			else{
				$query.=",(".$result.",".$survey_number.")";
			}
		}
		return $this->db->query($query);
	}


	function getResults($gender){
		//if gender==1 : is female
		//if gender==2 : is male
		$query="SELECT DISTINCT * FROM (SELECT results.*,questions.question AS q,questions.list_order AS list_order,questions.id AS q_id,choices.choice AS ch, COUNT(choice_id) AS tally  from results
				LEFT JOIN choices 
				ON results.choice_id=choices.id 
				LEFT JOIN questions 
				ON choices.question_id=questions.id 
				WHERE results.survey_number IN (SELECT survey_number from results where choice_id=?)
				AND questions.id!=1
				GROUP BY choice_id
				ORDER BY tally DESC) AS t1
				GROUP BY q_id
				ORDER BY q_id";

		return $this->db->query($query,array($gender))->result_array();
	}

	function getQuestions(){
		$query="SELECT questions.id,questions.question FROM questions
				WHERE id!=1";
		return $this->db->query($query)->result_array();
	}

	function getAnswers($gender){
		$query="SELECT *,COUNT(results.choice_id) AS choice_cnt FROM choices LEFT JOIN results 
				ON choices.id=results.choice_id 
				LEFT JOIN questions 
				ON choices.question_id=questions.id 
				WHERE results.survey_number IN (SELECT survey_number FROM results WHERE choice_id=?) 
				AND results.choice_id!=?
				GROUP BY choices.id
				ORDER BY choices.id";

		return $this->db->query($query,array($gender,$gender))->result_array();
	}

}