<?php
class Jugador extends CI_Controller {
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Participante_model');
		$this->load->helper('url');
	}
	
	public function index() {
		// JUGADOR: id_tipo_participante (1)
		$this->_renderizar_datos(NULL, NULL, 1);
		$this->_setear_variables();
		$this->load->view('templates/header');
		$this->load->view('templates/principal',$this->variables);
		$this->load->view('jugadores/datos_jugador');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion para generar una lista de jugadores que se pasara en una variable a la pagina
	 * se carga en la variable $variables['datos_ppal']
	 * @var string
	 */
	private function _renderizar_datos($idparticipante, $idEquipo, $id_tipo_participante){
		$datos_ppal='<ul class="list-inline small interlineado-X1">';
		foreach (($this->Participante_model->consulta($idparticipante, $idEquipo, $id_tipo_participante)) as $item):
		$datos_ppal=$datos_ppal.'<li class="col-xs-12 col-sm-3">'.$item['nombre'].'&nbsp;'.$item['apellido'].'</li>';
		endforeach;
		$datos_ppal=$datos_ppal.'</ul>';
	
		$this->variables['datos_ppal'] = $datos_ppal;
	}
	
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL)
	{
		$this->variables['form_id'] = '"jugadores"';
		$this->variables['titulo_label'] = 'html_jugador_titulo_default';
		$this->variables['titulo_formato_panel'] = 'panel panel-jugadores';
		$this->variables['grilla_ppal_label'] = 'form_label_jugador';
	
		/*
			$this->variables['titulo'] = $titulo;
			$this->variables['mensaje'] = $mensaje;
			$this->variables['accion'] = $accion;
			$this->variables['cancelar'] = $cancelar;
			$this->variables['volver'] = $volver;
			*/
	}
	
}