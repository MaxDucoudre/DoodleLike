<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	public function create_compte() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_compte');

		$this->form_validation->set_rules('login', 'Login', 'required|is_unique[Compte.login]');
		$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[Compte.email]');

		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');


		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('creer_compte');
			$this->load->view('templates/footer');

		} else {
			$login = $this->input->post('login');
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$data=array(
				'login'=>$login,
				'nom'=>$nom,
				'prenom'=>$prenom,
				'email'=>$email,
				'password'=>$password
			);

			if ($this->model_compte->create_compte($data)){
				$this->load->view('templates/header_connected', $data);
				$this->load->view('creer_compte_sucess', $data);
				$this->load->view('templates/footer');
			}

			session_start();
			$compte = $this->model_compte->getCompte($login);
			$_SESSION['connected'] = true;
			$_SESSION['compte'] = $compte;		
		}
	}


	public function connect_compte() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_compte');

		$this->form_validation->set_rules('login', 'Login', 'required|trim');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim');


		if ($this->form_validation->run() === FALSE) {

			$this->load->view('templates/header');
			$this->load->view('connection_compte');
			$this->load->view('templates/footer');
		} else {

			$login = $this->input->post('login');
			$password = $this->input->post('password');

			if(!$this->model_compte->check_password($login, $password)) {
				$this->load->view('templates/header');
				$this->load->view('connection_compte');
				$this->load->view('templates/footer');

			} else {
				session_start();

				$compte = $this->model_compte->getCompte($login);
				$_SESSION['connected'] = true;
				$_SESSION['compte'] = $compte;
				$this->load->view('templates/header_connected', $compte);
				$this->load->view('connection_sucess', $compte);
				$this->load->view('templates/footer');

			}
		}
	}

	public function disconnect_compte() {
		$this->load->helper('form');
		session_start();
		$_SESSION['connected'] = false;
		$_SESSION['compte'] = null;

		$this->load->helper('form');
		$this->load->view('templates/header');
		$this->load->view('accueil');
		$this->load->view('templates/footer');
	}

	public function profil() {
		session_start();
		$this->load->helper('form');
		$this->load->model('model_sondage');
		$compte = $_SESSION['compte'];

		$this->load->view('templates/header_connected', $compte);
		$this->load->view('profil', $compte);
		$this->load->view('templates/footer');
	}

	public function clore_sondage($cle_sondage) {
		session_start();
		$this->load->helper('form');

		$this->load->model('model_sondage');
		$this->model_sondage->fermer_sondage($cle_sondage);
		$compte = $_SESSION['compte'];

		$this->resultat_sondage($cle_sondage);

	}

	public function resultat_sondage($cle_sondage) {

		if(!isset($_SESSION)) {
			session_start();
		}
		$this->load->helper('form');

		$this->load->model('model_sondage');
		$this->load->model('model_horaire');
		$this->load->model('model_date');
		$this->load->model('model_reponse');


		$sondage = $this->model_sondage->getSondage($cle_sondage);
		$sondage['cle'] = $cle_sondage;
		
		$compte = $_SESSION['compte'];

		$this->load->view('templates/header_connected', $compte);
		$this->load->view('result_sondage', $sondage);
		$this->load->view('templates/footer');

	}



}


