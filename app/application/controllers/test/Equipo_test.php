<?php
class Equipo_test extends CI_Controller {
	
	/**
	 * Equipo_prueba se usa para poder probar completo ABM de equipos.
	 * 
	 */
	public $id_equipo;
	public $id_liga;
	public $nombre;
	public $id_estadio;
	public $id_usuario;
	public $imagen;
	
	public $iniciado;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Equipo_model');
		$this->load->library('unit_test');
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		$this->iniciado=TRUE;
		
		$this->alta_test();
				
		$this->consulta_equipo_puntual_test();
				
		$this->consulta_equipo_por_nombre_test();
		
		$this->consulta_equipo_liga_test();
				
		$this->consulta_equipo_inexistente_test();
				
		#$this->alta_test();
		
		$this->editar_test($this->id_equipo);
		
		$this->consulta_equipo_liga_inexistente_test();
		
		$this->baja_test($this->id_equipo);
		

		echo $this->unit->report();
		
		echo '<div>otras funciones para testear:<br>
				<ul>
					<li>/baja_test/nro-equipo</li>
				</ul></div>';
	}
	
	/**
	 * Funcion para testear el alta satisfactoria de una persona
	 * @return void
	 */
	public function alta_test()
	{
		$equipo = new stdClass();
		
		$equipo->id_liga=1;
		$equipo->nombre='aldosivi1';
		$equipo->id_estadio=1;
		$equipo->id_usuario=1;
		$equipo->fecha_creacion='20160101';
		$equipo->imagen='C:\Bitnami\wampstack-5.6.19-0\apps\yaftekun\db\imagenes\aldosivi.png';
		
		$test = $this->Equipo_model->alta($equipo);
		$this->id_equipo = $test['id'];
		
		$expected_result['resultado']='OK';
		$expected_result['id']=$test['id'];
		$test_name = 'Alta equipo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}

	/**
	 * Funcion para testear el alta de una persona existente
	 * @return void
	 */
	public function consulta_equipo_puntual_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Equipo_model->consulta($this->id_equipo, NULL,NULL);
		$expected_result = 'is_object';
		$test_name = 'consulta_equipo_puntual_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}

	/**
	 * Funcion para testear el alta de una persona existente
	 * @return void
	 */
	public function consulta_equipo_por_nombre_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Equipo_model->consulta(NULL, NULL,'dos');
		$expected_result = 'is_array';
		$test_name = 'consulta_equipo_puntual_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear el alta de una persona existente
	 * @return void
	 */
	public function consulta_equipo_inexistente_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Equipo_model->consulta(0, NULL, NULL);
		$expected_result = 'is_array';
		$test_name = 'consulta_equipo_inexistente_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta del equipo cargado en el test Alta equipo
	 * @return void
	 */
	public function consulta_equipo_liga_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Equipo_model->consulta(NULL, 1, NULL);
		$expected_result = 'is_array';
		$test_name = 'consulta_equipo_por_liga_test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}

	/**
	 * Funcion para testear la consulta del equipo cargado en el test Alta equipo
	 * @return void
	 */
	public function consulta_equipo_liga_inexistente_test()
	{
		#$test = $this->Equipo_model->consulta(4294967299, NULL);
		$test = $this->Equipo_model->consulta(NULL, 0, NULL);
		$expected_result = 'is_array';
		$test_name = 'consulta equipo liga inexistente test';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta del equipo cargado en el test Alta equipo
	 * @return void
	 */
	public function baja_test($id_equipo)
	{
		$equipo = new stdClass();
		
		$equipo->id_equipo=$id_equipo;
		/*
		$equipo->id_liga=1;
		$equipo->nombre='aldosivi';
		$equipo->id_estadio=1;
		$equipo->id_usuario=1;
		$equipo->fecha_creacion='20160101';
		$equipo->imagen='C:\Bitnami\wampstack-5.6.19-0\apps\yaftekun\db\imagenes\aldosivi.png';
		*/
		
		$test = $this->Equipo_model->baja($equipo);
		$expected_result['resultado']='OK';
		$test_name = 'baja_parametro_test';
		$notes = var_export($test, true);
		
		if (!$this->iniciado){
			echo '<>eliminando el equipo: '.$id_equipo.'</p>';
			echo $this->unit->run($test, $expected_result, $test_name, $notes);
		}
		else{
			$this->unit->run($test, $expected_result, $test_name, $notes);
		}
		#echo $this->unit->report();
	}

	/**
	 * Funcion para testear la edicion del ultimo equipo dado de alta
	 * @return void
	 */
	public function editar_test($id_equipo)
	{
		$equipo = new stdClass();
	
		$equipo->id_equipo=$id_equipo;
		$equipo->id_liga=1;
		$equipo->nombre='EDITADO2';
		$equipo->id_estadio=1;
		$equipo->id_usuario=1;
		$equipo->fecha_creacion='20170101';
		$equipo->imagen='C:\Bitnami\wampstack-5.6.19-0\apps\yaftekun\db\imagenes\editado.png';
		
		$test = $this->Equipo_model->editar($equipo);
		$expected_result['resultado']='OK';
		$test_name = 'editar test';
		$notes = var_export($test, true).$id_equipo;
	
		$this->unit->run($test, $expected_result, $test_name, $notes);
		
		#echo $this->unit->report();
	}
	

	
	
}