<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_reponse extends CI_Model {


	public function __construct(){
		$this->load->database();
	}

	public function ajouter_Reponse($data) {
		return $this->db->insert('Reponse', $data);
	}


	public function getReponseofHoraire($idHoraire) {
		$this->load->model('model_compte');

		$query = $this->db->query("
			SELECT nom,prenom,idCompte 
			FROM Participant Natural Join Reponse 
			WHERE idHoraire = '$idHoraire';");

		$row = $query->row();
		$i=0;
		$participant="";
		$allparticipant;
		foreach ($query->result_array() as $row) {

			$participant = $row['nom']." ".$row['prenom'];

			if(isset($row['idCompte'])) {
			if($row['idCompte'] != null) {
				$participant = $this->model_compte->getCompteNameWithId($row['idCompte']);
			} 
		}

			$allparticipant[$i] = $participant;
			$i++;
		}
		if(isset($allparticipant)) {
			return $allparticipant;
		} else {
			return null;
		}

	}

	public function countParticipantInHoraire($idHoraire) {
		$query = $this->db->query("
			SELECT Count(idParticipant) as numparticipant
			FROM Participant natural Join Reponse
			WHERE idHoraire = '$idHoraire';");
		$row = $query->row();
		foreach ($query->result_array() as $row) {
			return $row['numparticipant'];

		}
	}


}