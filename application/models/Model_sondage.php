<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_sondage extends CI_Model {



	public $titre ="";
	public $lieu ="";
	public $cle;
	public $duree;
	public $createur;

	public function __construct(){
		$this->load->database();
	}


	public function create_sondage($data) {
		return	$this->db->insert('Sondage', $data);

	}


	public function check_cle($cle_sondage) {
		$query = $this->db->query("SELECT cle FROM Sondage WHERE cle='$cle_sondage';");
		$row = $query->row();
		$i=0;
		foreach ($query->result_array() as $row) {
			$i++;
		}
		if ($i==0) {
			return true;
		} else {
			return false;
		}
	}

}

?>