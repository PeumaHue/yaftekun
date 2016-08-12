<?php
class Index extends CI_Controller {
	
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	
	/**
	 * Constructor de clase
	 *
	 * Se encarga de hacer el load de los modulos necesarios
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Torneo_model');
		$this->load->model('Tablero_inicial_model');
		
		$this->_renderizar_torneos();
		$this->_obtener_datos_tablero();
		
		$this->load->view('templates/head');
		
		$this->load->view('templates/main');

		$this->load->view('index', $this->variables);


		$this->load->view('templates/footer');
		$this->load->view ('templates/libraries');		
		
		$this->load->view('templates/end');
		
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		
	}
	
	/**
	 * Funcion que renderiza los torneos creados
	 * 
	 */
	private function _renderizar_torneos()
	{
		$fecha = getdate();
		$torneos = $this->Torneo_model->consulta(NULL, $fecha['year']);
		$html = '';
		foreach ($torneos as $i)
		{
			$html = $html . '<p>' . $i['nombre'] . '</p>';
		}
		$this->variables['torneos']=$html;
	}
	
	/**
	 * Funcion que obtiene los datos del tablero desde el modelo y los carga en variables.
	 *
	 */
	private function _obtener_datos_tablero()
	{
		$tablero = $this->Tablero_inicial_model->consulta();
		$this->variables['tablero_totales']=$tablero;
	}
	
	/**
	 * Funcion que setea las parametros basicos de las variables de la pagina
	 * @return void
	 */
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL)
	{
		$this->variables['titulo'] = $titulo;
		$this->variables['mensaje'] = $mensaje;
		$this->variables['accion'] = $accion;
		$this->variables['cancelar'] = $cancelar;
		$this->variables['volver'] = $volver;
	}
}