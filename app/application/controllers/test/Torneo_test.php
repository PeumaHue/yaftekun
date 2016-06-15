<?php
class Torneo_test extends CI_Controller {
	
	/**
	 * Liga_prueba se usa para poder probar completo ABM de torneos. Este necesita una Liga.
	 * 
	 */
	public $id_liga_prueba = 9999;
	public $anio_prueba = 2016;
	public $id_tipo_modalidad_prueba = 1;
	public $id_torneo_prueba;
	
	public $id_liga;
	public $id_torneo;
	public $anio;
	public $nombre;
	public $cantidad_equipos;
	public $id_usuario;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Torneo_model');
		$this->load->library('unit_test');
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		$this->alta_test();
		$this->consulta_test_por_anio();
		$this->consulta_test();
		$this->consulta_test_por_torneo_inexistente();	
		$this->consulta_test_por_nombre();
		$this->baja_test();
		$this->consulta_tipo_modalidad();
		echo $this->unit->report();
	}
	
	/**
	 * Funcion para testear el alta satisfactoria de una persona
	 * @return void
	 */
	public function alta_test()
	{
		$torneo = new stdClass();
		
		$torneo->id_liga 					= $this->id_liga_prueba;
		$torneo->id_torneo 					= NULL;
		$torneo->anio 						= $this->anio_prueba;
		$torneo->id_tipo_modalidad			= $this->id_tipo_modalidad_prueba;
		$torneo->nombre 					= 'Torneo nacional sub 60-';
		$torneo->cantidad_equipos			= '14';
		$torneo->id_usuario					= 99;
		
		$resultado['resultado']='OK';
		$test = $this->Torneo_model->alta($torneo);
		$this->id_torneo_prueba = $test['id'];				##Este es el id del torneo creado. 
		
		$resultado['id']=$test['id'];
		
		$expected_result = $resultado;
		$test_name = 'Alta torneo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * @todo
	 * Funcion para testear el alta de una persona existente
	 * @return void
	 */
	public function alta_duplicada_test()
	{
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de todos los torneos
	 * @return void
	 */
	public function consulta_test()
	{
		$test = $this->Torneo_model->consulta();
		$expected_result = 'is_array';
		$test_name = 'Consulta torneo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria del torneo de un anio
	 * @return void
	 */
	public function consulta_test_por_anio()
	{
		$test = $this->Torneo_model->consulta('', $this->anio_prueba);
		$expected_result = 'is_array';
		$test_name = 'Consulta torneos por anio';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta de un torneo inexistente
	 * @return void
	 */
	public function consulta_test_por_torneo_inexistente()
	{
		$test = $this->Torneo_model->consulta('','2050');
		$expected_result = 'is_array'; //Espera un array vacio
		$test_name = 'Consulta de torneo por anio inexistente';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta por nombre de torneo
	 * @return void
	 */
	public function consulta_test_por_nombre()
	{
		$test = $this->Torneo_model->consulta(NULL, NULL,'Torneo');
		$expected_result = 'is_array';
		$test_name = 'Consulta de torneo por nombre. Solo deben aparecer los torneos que empiecen con la palabra Torneo.';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}	
		
	/**
	 * Funcion para testear la baja satisfactoria de un torneo.  
	 * @return void
	 */
	public function baja_test()
	{
	
		$torneo = new stdClass();
		
		$torneo->id_liga 			= $this->id_liga_prueba;
		$torneo->id_torneo 			= $this->id_torneo_prueba;
		$torneo->anio 				= $this->anio_prueba;
		$torneo->nombre 			= 'Torneo nacional sub 60-';
		$torneo->cantidad_equipos	= '14';
		$torneo->id_usuario			= 99;
		
		
		$test = $this->Torneo_model->baja($torneo);
		$resultado['resultado']='OK';
		$expected_result = $resultado;
		$test_name = 'Baja torneo por cuil';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de un torneo
	 * @return void
	 */
	public function consulta_tipo_modalidad()
	{
		$test = $this->Torneo_model->consulta_tipo_modalidad();
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de modalidad de torneo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * @todo
	 * falta validacion de rega de negocio. .
	 * @return void
	 */	
}