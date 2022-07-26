<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionnaireModel extends CI_Model {

	
	public function get($table){
		$query = $this->db->get($table);
		return $query->result();
	}


	public function insert($table, $data)
	{ 
		$this->db->insert($table, $data);
		$id = $this->db->insert_id();
		return $id;
	}


	public function update($table,$data,$condition) 
	{
			$this->db->where($condition);
			return $this->db->update($table,$data); 
	}

	public function delete($table,$condition)
	{
		return $this->db->delete($table, $condition);
	}

	public function getSumofAllCategories($condition)
	{
		$this->db->select('questions.category_id, categories.name AS category_name, categories.color_class,categories.color_code, SUM(questionnaire_answers.score) AS sum')
		->from('questions')
		->join('questionnaire_answers', 'questions.id = questionnaire_answers.question_id')
		->join('categories', 'questions.category_id = categories.id')
		->where('questionnaire_answers.user_id',$condition)->group_by('questions.category_id');
		$result = $this->db->get()->result();
		// echo $this->db->last_query();die;
		return $result;

	}

	public function getScoreOfEachQuestion($condition)
	{
		$this->db->select('DISTINCT(questions.id),questions.question,questionnaire_answers.score')
		->from('questions')
		->join('questionnaire_answers', 'questions.id = questionnaire_answers.question_id')
		->where('questionnaire_answers.user_id',$condition)->order_by('questions.id', 'ASC');
		$result = $this->db->get()->result();
		return $result;

	}

	public function getTotalScore($condition)
	{
		$this->db->select('SUM(score) AS total')
		->from('questionnaire_answers')
		->where('user_id',$condition);
		$result = $this->db->get()->result();
		return $result;

	}

	public function userInfo($condition)
	{
		$this->db->select('*')
		->from('life_wheel_users')
		->where($condition);
		$result = $this->db->get()->row();
		return $result;

	}

	public function checkLogin($condition)
	{
		$this->db->select('*')->from('users')->where($condition);
		$result = $this->db->get()->row();
		// echo $this->db->last_query(); die;
		return $result;

	}

	public function getQuestions()
	{
		$this->db->select('DISTINCT(questions.id),questions.question,questions.status,categories.name AS category_name')
		->from('questions')
		->join('categories', 'questions.category_id = categories.id')
		->order_by('questions.id', 'ASC');
		$result = $this->db->get()->result();
		return $result;

	}

	public function getAllUsersScore(){
		
		$result = $this->db->select("user_id, SUM(score) AS total_score")
		->from('questionnaire_answers')
		->group_by('user_id')->get()->result();
		return $result;

	}

	
}