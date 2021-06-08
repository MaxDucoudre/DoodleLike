<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_participant extends CI_Model {

	public $idParticipant;
	public $nom = "";
	public $prenom = "";
	public $idCompte = NULL;

	public function __construct(){
		$this->load->database();
	}


	public function ajouter_Participant($data) {
		return $this->db->insert('Participant', $data);
	}

	public function getIdParticipant($nom, $prenom) {
		$query = $this->db->query("
			SELECT idParticipant 
			FROM Participant
			WHERE nom='$nom' AND prenom='$prenom';");

		$row = $query->row();

		foreach ($query->result_array() as $row) {
			return $row['idParticipant'];
		}
	}

	public function getIdParticipantWithCompte($idCompte) {
		$query = $this->db->query("SELECT idParticipant
			FROM Participant 
			WHERE idCompte = '$idCompte';");
		$row = $query->row();
		foreach ($query->result_array() as $row) {
			return $row['idParticipant'];
		}
	}


	public function isTaken($nom, $prenom) {
		$query = $this->db->query("
			SELECT nom,prenom 
			FROM Participant
			WHERE nom='$nom' AND prenom='$prenom';");

		$row = $query->row();
		$i=0;
		foreach ($query->result_array() as $row) {
			$i++;
		}
		if($i!=0) {
			return true;
		}
		return false;
	}

	public function compteAlreadyParticipate($idCompte) {
		$query = $this->db->query("
			SELECT idCompte 
			FROM Participant
			WHERE idCompte='$idCompte';");

		$row = $query->row();
		$i=0;

		foreach ($query->result_array() as $row) {
			$i++;
		}
		
		if($i!=0) {
			return true;
		}
		return false;
	}

}
