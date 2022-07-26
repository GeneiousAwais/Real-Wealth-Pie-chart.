<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller  {

	function __construct() {
		parent::__construct();
		$this->load->model('QuestionnaireModel');
		date_default_timezone_set('US/Eastern');
	}

	public function index()
	{
		$scores  = $this->QuestionnaireModel->getAllUsersScore();
		$satisfiedUser = 0;
		$unsatisfiedUser = 0;
		$averageUser = 0;
		$data = array();
		foreach ($scores as $key => $score) {

			if($score->total_score > 0 && $score->total_score <= 50)
				$unsatisfiedUser++;
			else if($score->total_score > 50 && $score->total_score <= 75)
				$averageUser++;
			else
				$satisfiedUser++;
		}
		$data = array(
			'unsatisfiedUser' => $unsatisfiedUser,
			'averageUser' => $averageUser,
			'satisfiedUser' => $satisfiedUser ,
		);
		
		$this->load->view('index', $data);
	}

	public function loadQuestions()
	{
		$questions = $this->QuestionnaireModel->get("questions");
		$cover = $this->QuestionnaireModel->get("question_background_cover");
		$data['questions'] = $questions;
		$data['cover'] = $cover[0];
		$this->load->view('dashboard',$data);
	}

	public function saveQuestionnaire()
	{
		$data = array();
		$scoresRecord = array();
		$data['name'] = $this->input->post('first_name');
		$data['email'] = $this->input->post('email');
		$data['ip'] = $this->get_client_ip();
		$data['created'] = date('Y-m-d');
		$user_id = $this->QuestionnaireModel->insert("life_wheel_users",$data);
		$scoresRecord['created'] = date('Y-m-d');
		$scores = $this->input->post('score');
		foreach ($scores as $key => $score) {
			$scoresRecord['question_id'] = $key;
			$scoresRecord['score'] = $score;
			$scoresRecord['user_id'] = $user_id;
			$this->QuestionnaireModel->insert("questionnaire_answers",$scoresRecord);
		}
		
		redirect('load-success-form/'.$user_id ); 
	}

	public function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	public function loadSuccessForm($id)
	{
		$condition = array('id' => $id);
		$userInfo = $this->QuestionnaireModel->userInfo($condition);
		$result['info'] = array(
			'first_name' => $userInfo->name,
			'email' => $userInfo->email
		);
		$result['categories'] = $this->QuestionnaireModel->getSumofAllCategories($userInfo->id);
		$result['questions_scores'] = $this->QuestionnaireModel->getScoreOfEachQuestion($userInfo->id);
		$result['total_scores'] = $this->QuestionnaireModel->getTotalScore($userInfo->id);
		$this->load->view('success_card', $result);
	}

	public function test()
	{
		$this->load->view('test');
	}


}