<?php
class Calendario_test extends CI_Controller {
	
	/**
	 * Equipo_prueba se usa para poder probar completo ABM de equipos.
	 * 
	 */
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calendario_model');
		$this->load->library('unit_test');
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		
		
		$this->consulta_test();
				
		echo $this->unit->report();
		
	}
	
	public function consulta_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Calendario_model->consulta();
		$expected_result = 'is_array';
		$test_name = 'consulta_calendario_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	
	
}