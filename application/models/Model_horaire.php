<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_horaire extends CI_Model {


	public $jour;
	public $mois;
	public $annee;
	public $cle_sondage;

	public function __construct(){
		$this->load->database();
	}


}

?>