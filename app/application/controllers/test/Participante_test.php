<?php
class Participante_test extends CI_Controller {
	
	/**
	 * Persona_test se usa para poder probar completo ABM de participante.
	 * 
	 */
	
	public $id_participante;
	public $id_tipo_participante = 1;
	public $id_equipo = 1;
	public $nombre;
	public $apellido;
	public $numero_camiseta;
	public $id_tipoposicion_juego;
	public $id_tipo_estado_jugador;
	public $numero_carnet_socio;
	public $trayectoria;
	public $telefono;
	public $telefono_celular;
	public $telefono_radio;
	public $email;
	public $fecha_nacimiento;
	public $calle;
	public $piso;
	public $numero;
	public $depto;
	public $codpostal;
	public $id_provincia;
	public $localidad;
	public $nacionalidad;
	public $id_estado_civil;
	public $conyuge_nombre;
	public $id_tipo_doc;
	public $nro_doc;
	public $cobertura_medica;
	public $fecha_apto_medico;
	public $fecha_creacion;
	public $id_usuario;
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Participante_model');
		$this->load->library('unit_test');
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		$this->alta_test();
				
 		$this->consulta_test_por_idparticipante();
 		 		
 		$this->consulta_test_por_equipo();
 		 		
 		$this->consulta_test_participantes_por_tipo();
 		 		
 		$this->consulta_test_por_id_inexistente();
 		
 		$this->consulta_test_por_equipo_inexistente();
 		 		
 		$this->consulta_test_por_tipo_participante_inexistente();
		
 		$this->baja_test();
 		
 		$this->consulta_test_tipos_de_participantes();
 		
 		$this->consulta_test_tipos_de_estados_de_participantes();
 		
 		$this->consulta_test_tipos_de_estados_civiles_de_participantes();
 		
 		$this->consulta_test_tipos_de_documentos_de_participantes();
 		
 		$this->consulta_test_provincias();
 		
 		$this->consulta_test_tipos_de_posiciones_de_juego();
 		
		echo $this->unit->report();
	}
	
	/**
	 * Funcion para testear el alta satisfactoria de un participante
	 * @return void
	 */
	public function alta_test()
	{
		$participante = new stdClass();
		$participante->id_participante = NULL;
		$participante->id_tipo_participante = 1;
		$participante->id_equipo = 1;
		$participante->nombre = "JUAN CARLOS";
		$participante->apellido =  "GOYENECHE";
		$participante->numero_camiseta = "10";
		$participante->id_tipoposicion_juego = 1;
		$participante->id_tipo_estado_jugador = 1;
		$participante->numero_carnet_socio = "9999";
		$participante->trayectoria = "HA JUGADO EN BOCA JUNIORS EN EL PERIODO 1973-1978" ;
		$participante->telefono = "46579999";
		$participante->telefono_celular = "1135659878";
		$participante->telefono_radio = "1135659545";
		$participante->email = "JUANK@GMAIL.COM";
		$participante->fecha_nacimiento = 19501010;
		$participante->calle = "RIVADAVIA";
		$participante->piso = 1;
		$participante->numero = 77;
		$participante->depto = "A";
		$participante->codpostal = "1702";
		$participante->id_provincia = 1;
		$participante->localidad = "RANELAGH";
		$participante->nacionalidad = "ARGENTINO";
		$participante->id_estado_civil = 1;
		$participante->conyuge_nombre = "ANGELA BENITEZ";
		$participante->id_tipo_doc = 1;
		$participante->nro_doc = 26965501;
		$participante->cobertura_medica = "OSDE";
		$participante->fecha_apto_medico = 20171010;
		$participante->id_usuario = 1;
		$resultado['resultado']='OK';
		$test = $this->Participante_model->alta($participante);
		$resultado['id'] = $test['id'];
		$expected_result = $resultado;
		$test_name = 'Alta participante';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
		$this->id_participante = $test['id'];
		
		
	}
	
	/**
	 * @todo
	 * Funcion para testear el alta de un participante existente
	 * @return void
	 */
	public function alta_duplicada_test()
	{

	}
	
	
	/**
	 * Funcion para testear la consulta satisfactoria del participante
	 * @return void
	 */
	public function consulta_test_por_idparticipante()
	{
		$test = $this->Participante_model->consulta($this->id_participante, NULL, NULL);
		$expected_result = 'is_object';
		$test_name = 'Consulta participante por ID';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);		
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los participantes de un equipo
	 * @return void
	 */
	public function consulta_test_por_equipo()
	{
		$test = $this->Participante_model->consulta(NULL, $this->id_equipo, NULL);
		$expected_result = 'is_array';
		$test_name = 'Consulta participantes por equipo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);		
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de participantes por tipo
	 * @return void
	 */
	public function consulta_test_participantes_por_tipo()
	{
		$test = $this->Participante_model->consulta(NULL, NULL, $this->id_tipo_participante);
		$expected_result = 'is_array';
		$test_name = 'Consulta participantes por tipo';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);	
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de un participante inexistente por ID
	 * @return void
	 */
	public function consulta_test_por_id_inexistente()
	{
		$test = $this->Participante_model->consulta(0, NULL, NULL);
		$expected_result = array();
		$test_name = 'Consulta de participante por id inexistente';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);	
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de un participante inexistente por ID
	 * @return void
	 */
	public function consulta_test_por_equipo_inexistente()
	{
		$test = $this->Participante_model->consulta(NULL, 4, NULL);
		$expected_result = array();//Espera un array vacio
		$test_name = 'Consulta de participante por equipo inexistente';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);	
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de participantes inexistentes por tipo
	 * @return void
	 */
	public function consulta_test_por_tipo_participante_inexistente()
	{
		$test = $this->Participante_model->consulta(NULL, NULL, 99);
		$expected_result = array();//Espera un array vacio
		$test_name = 'Consulta de participante por tipo participante inexistente';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
		
	/**
	 * Funcion para testear la baja satisfactoria de un participante.  
	 * @return void
	 */
	public function baja_test()
	{
		$test = $this->Participante_model->baja($this->id_participante);
		$resultado['resultado']='OK';
		$expected_result = $resultado;
		$test_name = 'Baja participante por id';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);		
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los tipos de participantes
	 * @return void
	 */
	public function consulta_test_tipos_de_participantes()
	{
		$test = $this->Participante_model->consulta_tipos_de_participantes();
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de participantes';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los tipos de estados de los participantes
	 * @return void
	 */
	public function consulta_test_tipos_de_estados_de_participantes()
	{
		$test = $this->Participante_model->consulta_tipos_de_estados_de_participantes(); 
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de estados de los participantes';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los tipos de estados civiles de los participantes
	 * @return void
	 */
	public function consulta_test_tipos_de_estados_civiles_de_participantes()
	{
		$test = $this->Participante_model->consulta_tipos_de_estados_civiles_de_participantes();
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de estados civiles de los participantes';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los tipos de documentos de los participantes
	 * @return void
	 */
	public function consulta_test_tipos_de_documentos_de_participantes()
	{
		$test = $this->Participante_model->consulta_tipos_de_documentos_de_participantes();
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de documentos de los participantes';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de las provincias
	 * @return void
	 */
	public function consulta_test_provincias()
	{
		$test = $this->Participante_model->consulta_provincias();
		$expected_result = 'is_array';
		$test_name = 'Consulta de provincias';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * Funcion para testear la consulta satisfactoria de los tipos de posiciones de juego
	 * @return void
	 */
	public function consulta_test_tipos_de_posiciones_de_juego()
	{
		$test = $this->Participante_model->consulta_tipos_de_posiciones_de_juego();
		$expected_result = 'is_array';
		$test_name = 'Consulta de tipos de posiciones de juego';
		$notes = var_export($test, true);
		$this->unit->run($test, $expected_result, $test_name, $notes);
	}
	
	/**
	 * @todo
	 * falta validacion de rega de negocio. .
	 * @return void
	 */
	
	
	
}