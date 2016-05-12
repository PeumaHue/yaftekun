<?php
class Equipo extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Equipo_model');
		$this->load->helper('url');
	}
	
	public function index() {
		$data['equipos'] = $this->Equipo_model->consulta(NULL,NULL);

		$this->load->view('templates/header');
		$this->load->view('equipos/gestionar_equipos',$data);
		$this->load->view('templates/footer');
	}
	
	
}