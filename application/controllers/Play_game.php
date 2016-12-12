<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	Class Play_Game extends CI_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        if(!$this->session->logged_in){
	        	redirect('user_authentication');
	        }
	        $this->load->model('game');
	        $this->load->model('authenticate');
	    }

		public function index(){
			$level = $this->input->get('level');
			//check whether its invalid level	 
			if($level >3 || $level < 0){
				redirect('user_authentication/user_login_process');
			}
			$email = $this->session->logged_in['email'];
			$userCurrentScore = $this->game->getUserData($level); 
			$userDetail  = $this->authenticate->getUserByEmailId($email);
			$data['level'] = $level;
			$data['userCurrentScore'] = $userCurrentScore;
			$data['user'] = $userDetail[0]->id;
			$design = ['square','rectangle','triangle'];
			$data['shapes'] = $this->getRandomShapes($design);
			$data['time'] = $this->getTime($level);
			$this->load->view('layouts/header-script');
        	$this->load->view('play-game/begin-game', $data);
        	$this->load->view('layouts/footer-script');
		}

		public function getRandomShapes($design){
			$shapes = [];
			for($count = 1;$count <= 30;$count++){
				if($count == 11){
					$design[0] =  'rectangle';
				}
				if($count == 21){
					$design[0] = 'triangle';
				}
				$shapes =  array_merge($shapes,$design);
			}
			shuffle($shapes);
			return $shapes;
		}

		public function getTime($level){
			$times = ['1' => '60', '2' => '45', '3' => 30];
			return $times[$level];
		}

		public function submittedScore(){
			$level = $this->input->post('level');
			$userCurrentScore = $this->game->getUserData($level); 
			$data = array(
				'level' => $this->input->post('level'),
				'user_id' => $this->input->post('user'),
				'score' => $this->input->post('score'),
				'time_taken' => $this->input->post('time_taken'),
				'status' => 1,
				'updated_at' => date('Y-m-d')
				);
			if($userCurrentScore){
				$result = $this->game->game_update($data);
			}
			else{
				$data['created_at'] = date('Y-m-d');
				$result =  $this->game->game_insert($data);
			}
			if($result == false){
				$data['error'] = "Unable to save the score";
			}
			if($result == true){
				$data['sucess'] = "score has been submitted successfully";
			}
			redirect('user_authentication/user_login_process')->with($data);

		}
	}
?>