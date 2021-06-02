<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sondage extends CI_Controller {


	public $titre ="";
	public $lieu ="";
	public $cle;
	public $descriptif ="";
	public $duree;
	public $createurId;

	public function create_sondage() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_sondage');

		$this->form_validation->set_rules('titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('lieu', 'Lieu', 'required|trim');
		$this->form_validation->set_rules('duree', 'Durée', 'required|trim');



		if ($this->form_validation->run() === FALSE) {

			session_start();
			$compte = $_SESSION['compte'];

			$this->load->view('templates/header_connected',$compte);
			$this->load->view('creation_sondage');
			$this->load->view('templates/footer');

			} else {

			session_start();
			$compte = $_SESSION['compte'];

				$titre = $this->input->post('titre');
				$lieu = $this->input->post('lieu');
				$duree = $this->input->post('duree');
				$descriptif = $this->input->post('descriptif');


				$permitted_chars = '0123456789abcdef';
				$cle_genere = substr(str_shuffle($permitted_chars),0,64);
				$cle = $compte['idCompte'].$cle_genere;
				while(!$this->model_sondage->check_cle($cle)) {
					$cle_genere = substr(str_shuffle($permitted_chars),0,64);
					$cle = $compte['idCompte'].$cle_genere;
				}

				$data=array(
				'titre'=>$titre,
				'lieu'=>$lieu,
				'descriptif'=>$descriptif,
				'duree'=>$duree,
				'cle'=>$cle,
				'idCompte'=>$compte['idCompte']
			);

			if	($this->model_sondage->create_sondage($data)) {
				$_SESSION['sondage'] = $data;
				$alldate = null;
				$array_data['sondage'] = $data;
				$array_data['compte'] = $compte;
				$array_data['alldate'] = $alldate;
				$this->load->view('templates/header_connected', $compte);
				$this->load->view('creation_sondage_sucess', $array_data);
				$this->load->view('templates/footer');
			}
		}
	}


	public function add_date() {
		$this->load->helper('form');		
		$this->load->library('form_validation');
		$this->load->model('model_date');

		$this->form_validation->set_rules('date', 'Date', 'required|trim');

		if ($this->form_validation->run() === TRUE) {
			session_start();
			$compte = $_SESSION['compte'];
			$sondage = $_SESSION['sondage'];


			$cle = $sondage['cle'];
			$date = $this->input->post('date');
			$jour = substr($date, 8, 2);
			$mois = substr($date, 5, 2);
			$annee = substr($date, 0, 4);			
			$date_verif=$jour."-".$mois."-".$annee;

			$array_data['sondage'] = $sondage;
			$array_data['compte'] = $compte;
			$array_data['alldate'] = $this->model_date->getDatefromSondage($cle);

			if(!$this->model_date->check_date_is_taken($date_verif, $cle)) {


				$data=array(
					'cle'=>$cle,
					'jour'=>$jour,
					'mois'=>$mois,
					'annee'=>$annee
				);


				if	($this->model_date->create_date($data)) {
					$alldate = $this->model_date->getDatefromSondage($cle);
					$array_data['sondage'] = $sondage;
					$array_data['compte'] = $compte;
					$array_data['alldate'] = $alldate;

					$this->load->view('templates/header_connected', $compte);
					$this->load->view('creation_sondage_sucess', $array_data);
					$this->load->view('templates/footer');
				}
			} else {
					$this->load->view('templates/header_connected', $compte);
					$this->load->view('creation_sondage_sucess', $array_data);
					$this->load->view('templates/footer');
			}
		}
	}

	public function add_horaire() {
		var_dump($horaire);
		$this->load->helper('form');		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('horaire', 'horaire', 'required|trim');

		if ($this->form_validation->run() === TRUE) {

			$horaire = $this->input->post('horaire');
			var_dump($horaire);
			/*
			$data=array(
				'idDate'=>$idDate,
				'minute'=>$minute,
				'heure'=>$heure
			);
			*/

		}
	}
}
?>