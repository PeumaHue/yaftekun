<?php
class Equipo extends CI_Controller {
	
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Equipo_model');
		$this->load->helper('url');
		$this->load->helper('HYaftekun');
	}
	
	public function index() {
		$this->variables['html_datos_ppal'] =_renderizar_datos_link('equipo/editar', 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		$this->_setear_variables();
				
		$this->load->view('templates/header');
		$this->load->view('equipos/principal',$this->variables);
		$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion para generar un nuevo equipo
	 */
	public function alta(){
		$this->_renderizar_datos(NULL, NULL);
		$this->_setear_variables();
		
		$this->load->view('templates/header');
		$this->load->view('equipos/principal',$this->variables);
		$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
	}
	
	
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL)
	{
		$this->variables['accion'] = $accion;
		
		$this->variables['form_id'] = '"equipos"';
		$this->variables['titulo_label'] = 'html_equipo_titulo_default';
		$this->variables['funcionaltabusqueda'] = 'equipo/alta';
		$this->variables['titulo_formato_panel'] = 'panel-equipos';
		$this->variables['grilla_ppal_label'] = 'form_label_equipo';
		
		/*
		 * 
		 * 
		$this->variables['titulo'] = $titulo;
		$this->variables['mensaje'] = $mensaje;
		
		$this->variables['cancelar'] = $cancelar;
		$this->variables['volver'] = $volver;
		*/
	}
	
}