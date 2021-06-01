<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doodlelike extends CI_Controller {



	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
			
		session_start();

		if($_SESSION['connected'] == true) {

			var_dump($_SESSION['connected']);
			var_dump($_SESSION['compte']);


			$this->load->view('templates/header_connected', $_SESSION['compte']);
			
		} else {
			$this->load->view('templates/header');
		}


		$this->load->view('accueil');
		$this->load->view('templates/footer');
	}
}
