<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CalendarController extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('LibroModel');

		$prefs = array(
			'start_day'    => 'monday',
			'month_type'   => 'long',
			'day_type'     => 'short'
		);

		$this->load->library('calendar', $prefs);
	}

	public function index()
	{
		$data['calendar'] = $this->crearCalendario();

		$data['generos'] = $this->LibroModel->getGeneros();
		$this->load->view('layout/header', $data);
		$this->load->view('ViewCalendar', $data);
		$this->load->view('layout/footer');
	}

	public function crearCalendario()
	{
		$mes = date('m');
		$year = date('Y');

		

		return $this->calendar->generate($year, $mes);
	}
}
