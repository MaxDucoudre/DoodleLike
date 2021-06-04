<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_horaire extends CI_Model {


	public $jour;
	public $mois;
	public $annee;
	public $cle_sondage;

	public function __construct(){
		$this->load->database();
	}


	public function addHoraire($data) {
		return $this->db->insert('Horaire', $data);
	}


	public function checkIfHoraireIsTaken($idDate, $horaire) {

		$query = $this->db->query("SELECT minute,heure FROM Horaire WHERE idDate='$idDate';");
		$row = $query->row();

		foreach ($query->result_array() as $row) {

			if(strlen($row['heure']) == 1) {
				$row['heure'] = "0".$row['heure'];
			}
			if(strlen($row['minute']) == 1) {
				$row['minute'] = "0".$row['minute'];
			}

			if ($row['heure'].":".$row['minute'] == $horaire) {
				return true;
			}

		}
		return false;
	}

	public function getHoraireofSondage($cle_sondage) {
		$query = $this->db->query("SELECT idHoraire,idDate,minute,heure 
									FROM Horaire Natural Join Date Natural Join Sondage
									WHERE Sondage.cle = '$cle_sondage'
									ORDER BY heure ASC, minute ASC;");
		$row = $query->row();
		$allhoraire = null;
		$i=0;
		foreach ($query->result_array() as $row) {
			if(strlen($row['heure']) == 1) {
				$row['heure'] = "0".$row['heure'];
			}
			if(strlen($row['minute']) == 1) {
				$row['minute'] = "0".$row['minute'];
			}

			$allhoraire[$i] = $row['idDate']." : ".$row['heure'].":".$row['minute'];
			$i++;
			}
			return $allhoraire;

	}

	public function getHoraireofDate($idDate) {

		$query = $this->db->query("SELECT minute,heure FROM Horaire WHERE idDate='$idDate';");
		$row = $query->row();
		$i = 0;
		$idHoraire = NULL;
		foreach ($query->result_array() as $row) {

			if(strlen($row['heure']) == 1) {
				$row['heure'] = "0".$row['heure'];
			}
			if(strlen($row['minute']) == 1) {
				$row['minute'] = "0".$row['minute'];
			}


			$idHoraire[$i] = $idDate." ".$row['heure'].":".$row['minute'];
			$i++;
		}

		return $idHoraire;
	}


}

?>