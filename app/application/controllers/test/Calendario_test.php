<?php
class Calendario_test extends CI_Controller {
	
	/**
	 * Equipo_prueba se usa para poder probar completo ABM de calendario.
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
		$this->consulta_fixture_test();
		echo $this->unit->report();
	}
	
	public function consulta_test()
	{
		$test = $this->Calendario_model->consulta();
		$expected_result = 'is_array';
		$test_name = 'consulta_calendario_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	public function consulta_fixture_test()
	{
		$test = $this->Calendario_model->fixture_consulta(75);
		$expected_result = 'is_array';
		$test_name = 'consulta_fixture_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
}