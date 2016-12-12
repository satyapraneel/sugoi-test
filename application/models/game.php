<?php

Class Game extends CI_Model {
	function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
	        	return null;
        }
        $this->load->model('authenticate');
    }

	public function getUserData($level){
		$email = $this->session->logged_in['email'];
		$user = $this->authenticate->getUserByEmailId($email);
		if(isset($user[0])){
			$user_id = $user[0]->id;
			return $this->getUserGameDetails($user_id,$level);
		}
		return null;

	}

	public function getUserGameDetails($user_id,$level){
		$condition = "user_id =" . "'" . $user_id . "' AND " . "level =" . "'" . $level . "'";
		$this->db->select('*');
		$this->db->from('game');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		return null;
	}

	public function game_insert($data){
		$this->db->insert('game', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}

	public function game_update($data){
		$this->db->set('score', $data['score']);
		$this->db->set('time_taken', $data['time_taken']);
		$this->db->where('user_id', $data['user_id']);
		$this->db->where('level', $data['level']);
		$result = $this->db->update('game');
		if($result){
			return true;
		}
		return false;
	}
}

?>