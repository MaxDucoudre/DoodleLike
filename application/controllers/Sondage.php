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
				'ouvert'=>TRUE,
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
		$this->load->model('model_horaire');

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
			$array_data['allhoraire'] = $this->model_horaire->getHoraireofSondage($sondage['cle']);

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
		$this->load->helper('form');		
		$this->load->model('model_horaire');
		$this->load->model('model_date');

		session_start();

		$sondage = $_SESSION['sondage'];
		$horaire = "horaire";
		$i = 0;
		$index = $horaire.$i;

		while(empty($_GET[$index])) {
			$index = "horaire".$i;
			$i++;
		}

			$horaire = $_GET[$index]; // je récupère la valeur de la date i

			$minute = substr($horaire, 3, 2);
			$heure = substr($horaire, 0, 2);

			$array_date = $_SESSION['dateAct'];

			if($i-1<0) {
				$i=0;
			} else {
				$i = $i-1;
			}
			$idDate = $this->model_date->getIdDatefromDate($sondage['cle'], $array_date[$i]); // j'insere dans la date i

			$horaireToCheck = $heure.":".$minute;


			$compte = $_SESSION['compte'];
			$array_data['allhoraire'] = $this->model_horaire->getHoraireofSondage($sondage['cle']);
			$array_data['alldate'] = $this->model_date->getDatefromSondage($sondage['cle']);
			$array_data['sondage'] = $sondage;
			$array_data['compte'] = $_SESSION['compte'];


			if(!$this->model_horaire->checkIfHoraireIsTaken($idDate,$horaireToCheck)) {

				$data=array(
					'idDate'=>$idDate,
					'minute'=>$minute,
					'heure'=>$heure
				);

				if	($this->model_horaire->ajouter_horaire($data)) {

					$compte = $_SESSION['compte'];
					$alldate = $this->model_date->getDatefromSondage($sondage['cle']);

					$array_data['alldate'] = $alldate;
					$array_data['sondage'] = $sondage;
					$array_data['compte'] = $compte;


					$array_data['allhoraire'] = $this->model_horaire->getHoraireofSondage($sondage['cle']);

					$this->load->view('templates/header_connected', $compte);
					$this->load->view('creation_sondage_sucess', $array_data);
					$this->load->view('templates/footer');
				}
			} else {
				$array_data['allhoraire'] = $this->model_horaire->getHoraireofSondage($sondage['cle']);

				$this->load->view('templates/header_connected', $compte);
				$this->load->view('creation_sondage_sucess', $array_data);
				$this->load->view('templates/footer');	
			}	
		}


		public function participate_sondage() {	

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('model_participant');
			$this->load->model('model_reponse');
			$this->load->model('model_date');
			$this->load->model('model_horaire');
			$this->load->model('model_sondage');

			session_start();

			$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
			$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');


			if(isset($_GET['cle'])) {
				if($_GET['cle'] != null) {
					$cle = $_GET['cle'];
					$_SESSION['cleParticipate'] = $cle;
				}
			}
			$cle = $_SESSION['cleParticipate'];


			if(!$this->model_sondage->check_cle($cle)) {
				if($this->model_sondage->isOpen($cle)) {

					$alldate = $this->model_date->getDatefromSondage($cle);
					$allhoraire = $this->model_horaire->getHoraireofSondage($cle);
					$array_data['alldate'] = $alldate;
					$array_data['allhoraire'] = $allhoraire;
					$array_data['cleSondage'] = $cle;


					if ($this->form_validation->run() === FALSE){
						if(!isset($_SESSION['connected']) || !$_SESSION['connected']) {

							$this->load->view('templates/header');
						} else {
							$compte = $_SESSION['compte'];
							$this->load->view('templates/header_connected',$compte);
						}

						$this->load->view('participer_sondage', $array_data);
						$this->load->view('templates/footer');

					} else {

						$nom = $this->input->post('nom');
						$prenom = $this->input->post('prenom');

						if(!isset($_SESSION['connected']) || !$_SESSION['connected']) { 
							$idCompte = NULL;
						} else {
							$compte = $_SESSION['compte'];
							$idCompte = $compte['idCompte'];
						}

						$data=array(
							'nom'=>$nom,
							'prenom'=>$prenom,
							'idCompte'=>$idCompte
						);

						if(!$this->model_participant->isTaken($nom,$prenom) || !$this->model_participant->compteAlreadyParticipate($idCompte)) {

							$this->model_participant->ajouter_Participant($data);

							$horaire_array = $_SESSION['horaireAct'];

							for($i=0;$i<$_SESSION['numberOfHoraire'];$i++) {

								if($this->input->post($i) === "on") {
								$idParticipant = $this->model_participant->getIdParticipant($nom,$prenom); // a refaire
								$idHoraire = $this->model_horaire->getIdDateWithSondageAndHoraire($cle, $horaire_array[$i]);


								$data_reponse=array(
									'idParticipant'=>$idParticipant,
									'idHoraire'=>$idHoraire,
									'cle'=>$cle
								);
								$this->model_reponse->ajouter_Reponse($data_reponse);
							}

						}
						$this->load->view('templates/header');
						$this->load->view('participer_sondage_sucess');
						$this->load->view('templates/footer');					
					} else {
						if(!isset($_SESSION['connected']) || !$_SESSION['connected']) {

							$this->load->view('templates/header');
						} else {
							$compte = $_SESSION['compte'];
							$this->load->view('templates/header_connected',$compte);
						}
						echo"Participation déjà enregistrée";

						$this->load->view('participer_sondage', $array_data);
						$this->load->view('templates/footer');
					}


				} 
			} else {
				if(!isset($_SESSION['connected']) || !$_SESSION['connected']) {

					$this->load->view('templates/header');
				} else {
					$compte = $_SESSION['compte'];
					$this->load->view('templates/header_connected',$compte);
				}

				$array_data['isclosed'] = true;
				$this->load->view('accueil', $array_data);
				$this->load->view('templates/footer');			
			}

		} else {

			if(!isset($_SESSION['connected']) || !$_SESSION['connected']) {

				$this->load->view('templates/header');
			} else {
				$compte = $_SESSION['compte'];
				$this->load->view('templates/header_connected',$compte);
			}

			$array_data['badkey'] = true;
			$this->load->view('accueil', $array_data);
			$this->load->view('templates/footer');
		}
	}


	public function results() {


		session_start();
		
		$this->load->helper('form');

		$this->load->model('model_sondage');
		$this->load->model('model_horaire');
		$this->load->model('model_date');
		$this->load->model('model_reponse');




		$sondage = $this->model_sondage->getSondage($_GET['cle']);
		$sondage['cle'] = $_GET['cle'];
		$array_data;

		if(isset($_SESSION['compte']) || $_SESSION['connected'] == true) {
			$compte = $_SESSION['compte'];

			$this->load->view('templates/header_connected', $compte);
		} else {
			$this->load->view('templates/header');
		}


		if(!$this->model_sondage->isOpen($_GET['cle'])) {
			$this->load->view('result_sondage', $sondage);

		} else if($this->model_sondage->check_cle($_GET['cle'])) {
			$array_data['isActive'] = true;
			$array_data['badkey'] = true;
			$this->load->view('accueil', $array_data);

		} else {
			$array_data['badkey'] = false;
			$array_data['isActive'] = false;
			$this->load->view('accueil', $array_data);
		}
		
			$this->load->view('templates/footer');


	}
}
	?>