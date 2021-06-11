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

	public function getSondage($cle_sondage) {
		$query = $this->db->query("SELECT titre,lieu,descriptif,duree,ouvert,idCompte FROM Sondage WHERE cle='$cle_sondage';");
		$row = $query->row();
		foreach ($query->result_array() as $sondage) {
			return $sondage;
		}
		return null;
	}

	public function getSondageofCompte($idCompte) {
		$query = $this->db->query("SELECT titre,lieu,descriptif,duree,cle,ouvert FROM Sondage WHERE idCompte='$idCompte' ORDER BY ouvert DESC;");
		$row = $query->row();
		$sondage_array;
		$i=0;
		foreach ($query->result_array() as $sondage) {
			$sondage_array[$i] = $sondage;
			$i++;
		}

		if(!isset($sondage_array)) {
			return null;
		} else {
			return $sondage_array;
		}
	}



	public function fermer_sondage($cleSondage) {
		$data = array(
			'ouvert'=>FALSE
		);
		
		$this->db->where('cle', $cleSondage);
		$this->db->update('Sondage', $data);

		$this->load->helper('url');
	}

	public function isOpen($cleSondage) {
		$query = $this->db->query("SELECT ouvert FROM Sondage WHERE cle='$cleSondage';");
		$row = $query->row();
		foreach ($query->result_array() as $row) {
			return $row["ouvert"];

		}
		return true;
	}

	public function open($clesondage) {
		
	}

}

?>