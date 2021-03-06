<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('result');
		$this->load->model('survey');
	}

	public function submit(){
		$num_of_questions=$this->survey->countQuestions();

		//compare number of questions with size of POST array
		if($num_of_questions['num_of_questions']>count($this->input->post())){
			$this->session->set_flashdata('error','Please answer all questions');
			redirect('');
		}
		else{
			$selected_choices=array();
			foreach($this->input->post() as $question){
				//this if was the main problem
				if(is_array($question)){
					foreach($question as $answer){
						array_push($selected_choices,$answer);
					}
				}
				else{
					array_push($selected_choices,$question);
				}
				
			}

			$survey_num=$this->result->countSurveys();

			if($survey_num['num']==null){
				$num=1;
			}
			else{
				$num=$survey_num['num']+1;
			}
			// var_dump($this->input->post());
			// var_dump($selected_choices);
			
			$this->result->newResult($selected_choices,$num);

			redirect('results');
		}
		
	}

	public function display(){
		// $questions=$this->result->getQuestions();
		$f_answers=$this->result->getResults(1);
		$m_answers=$this->result->getResults(2);
		// echo "<h1>females</h1>";
		// var_dump($f_answers);
		
		// var_dump($m_answers);
		$males_json=json_encode($this->result->getAnswers(2));
		$females_json=json_encode($this->result->getAnswers(1));
		$questions_json=json_encode($this->result->getQuestions());

		

		// print_r($males_json);
		// echo "<h1>males</h1>";
		// print_r($females_json);
		// echo "<h1>questions</h1>";
		// print_r($questions_json);

		$this->load->view('results',array('f_answers'=>$f_answers,'m_answers'=>$m_answers,'questions'=>$questions_json,'m_json'=>$males_json,'f_json'=>$females_json));
	}
}