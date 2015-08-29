<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveys extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('survey');
	}

	public function index()
	{
		$questions=$this->survey->getQuestions();
		$choices=$this->survey->getChoices();
		$this->load->view('survey',array('questions'=>$questions,'choices'=>$choices));
	}
}