<?php
class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url_helper');
		
		$this->load->view('templates/header');
		$this->load->view('index');
		$this->load->view('templates/footer');

	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		
	}
	
		
}