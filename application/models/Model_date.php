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

	public function check_date_is_taken($date, $cle_sondage) {
		$alldate = $this->getDatefromSondage($cle_sondage);
			var_dump($alldate);

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