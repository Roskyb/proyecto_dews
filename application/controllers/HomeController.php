<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->model('LibroModel');
		$data['generos'] = $this->LibroModel->getGeneros();
		$data['libros'] = $this->LibroModel->getLibros();
		$this->load->view('layout/header', $data);
		$this->load->view('ViewLibros', $data);
		$this->load->view('layout/footer');
	}

	public function genero($genero){
		$this->load->model('LibroModel');
		$data['generos'] = $this->LibroModel->getGeneros();
		$data['libros'] = $this->LibroModel->getLibros($genero);
		$this->load->view('layout/header', $data);
		$this->load->view('ViewLibros', $data);
		$this->load->view('layout/footer');	
	}

	public function prestarLibros()
	{
		
	}
}
