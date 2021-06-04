<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_participant extends CI_Model {

	public $idParticipant;
	public $nom = "";
	public $preneom = "";
	public $idCompte = NULL;

	public function __construct(){
		$this->load->database();
	}


}
