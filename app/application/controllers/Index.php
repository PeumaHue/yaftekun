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
		$this->_renderizar_torneos();
		$this->load->view('templates/header');
		$this->load->view('index', $this->variables);
		$this->load->view('templates/footer');
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