<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_date extends CI_Model {
	

	public $heure;
	public $minute;
	public $date;

	public function __construct(){
		$this->load->database();
	}


	public function create_date($data) {
		return	$this->db->insert('Date', $data);
	}


	public function getDatefromSondage($cle) {
		$query = $this->db->query("SELECT jour,mois,annee FROM Date WHERE cle='$cle';");
		$row = $query->row();
		$alldate = NULL;
		$i = 0;

		foreach ($query->result_array() as $row) {

			if(strlen($row['mois']) == 1) {
				$row['mois'] = "0".$row['mois'];
			}
			if(strlen($row['jour']) == 1) {
				$row['jour'] = "0".$row['jour'];
			}

			$alldate[$i] = $row['jour']."-".$row['mois']."-".$row['annee'];
			$i++;
		}
		return $alldate;
	}

	public function getDateWithId($idDate) {
		$query = $this->db->query("SELECT jour,mois,annee FROM Date WHERE idDate='$idDate';");
		$row = $query->row();


		foreach ($query->result_array() as $row) {

			if(strlen($row['mois']) == 1) {
				$row['mois'] = "0".$row['mois'];
			}
			if(strlen($row['jour']) == 1) {
				$row['jour'] = "0".$row['jour'];
			}

			$date = $row['jour']."-".$row['mois']."-".$row['annee'];
		}
		return $date;
	}

	public function getIdDatefromDate($cle_sondage, $date) {
			$jour = substr($date, 0, 2);
			$mois = substr($date, 3, 2);
			$annee = substr($date, 6, 4);

		$query = $this->db->query("SELECT idDate FROM Date WHERE cle='$cle_sondage' AND jour='$jour' AND mois='$mois' AND annee='$annee';");
		$row = $query->row();


		foreach ($query->result_array() as $row) {
			return $row['idDate'];
		}

	}

	public function getDatewithHoraire($idHoraire) {

	}

	public function check_date_is_taken($date, $cle_sondage) {
		$alldate = $this->getDatefromSondage($cle_sondage);

		if($alldate!=NULL) {
			foreach($alldate as $datelist) {
				if($date == $datelist) {
					return true;
				}
			}
		}
		return false;

	}

}

?>