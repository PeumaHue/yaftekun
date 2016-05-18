<?php
class Torneo extends CI_Controller {
	
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	
	/**
	 * Array para guardar exclusivamente los values del formulario
	 * @var array
	 */
	public $datos_formulario;
	
	/**
	 * Constructor de clase
	 *
	 * Se encarga de hacer el load de los modulos necesarios
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('Torneo_model');
		$this->variables['accion'] = site_url('persona/alta');
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		$this->load->view('templates/header');
		/**
		 * @todo Usar el template principal cuando este adaptado a la última versión de Sergio
		$this->_setear_principal();
		$this->load->view('templates/principal', $this->variables);
		 */
		$this->_renderizar_torneos();
		$this->load->view('torneos/principal_torneo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion que muestra el formulario de alta y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function alta()
	{
		$this->_setear_variables('', '', site_url('torneo/alta'), site_url('torneo'), '');
		$this->_obtener_combo_modalidad();
		$this->_setear_campos();
		$this->_setear_reglas();
		if($this->form_validation->run() == FALSE)
		{
			$this->variables['mensaje']= validation_errors();
		}
		else if($this->Torneo_model->alta($this->_obtener_post())['resultado']='OK')
		{
	
			$this->variables['mensaje'] = lang('message_guardar_ok');
		}
		else
		{
			$this->variables['mensaje'] = lang('message_guardar_error');
		}
		$this->load->view('templates/header');
		$this->_renderizar_torneos();
		$this->load->view('torneos/principal_torneo', $this->variables);
		$this->load->view('torneos/datos_torneo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Obtiene los datos del post y los devuelve en forma de objeto
	 * @return		object		$persona
	 */
	private function _obtener_post()
	{
		$torneo = new stdClass();
		$torneo->nombre 			= $this->input->post('nombre');
		$torneo->cantidad_equipos 	= $this->input->post('cantidad_equipos');
		$torneo->modalidad_juego 	= $this->input->post('modalidad_juego') != '0' ? $this->input->post('modalidad_juego') : '';
		return $torneo;
	}
	
	/**
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->cantidad_equipos = '';
		$this->datos_formulario->modalidad_juego = '';
	}
	
	/**
	 * Funcion que setea las reglas de validacion del formulario y sus mensajes de errores
	 * @todo traducir los mensajes de errores en los archivos de configuracion para no tener que usar set_messsage
	 * @return void
	 */
	private function _setear_reglas()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('cantidad_equipos', 'Cantidad de equipos', 'trim|required');
		$this->form_validation->set_rules('modalidad_juego', 'Modalidad de juego', 'required');
	
		//$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a href="#" class="close" variables-dismiss="alert" aria-label="close">&times;</a>', '</div>');
	}
	
	/**
	 * Funcion que renderiza los ultimos torneos creados
	 * @todo traer solo un TOP 10
	 * 
	 */
	private function _renderizar_torneos()
	{
		$fecha = getdate();
		$torneos = $this->Torneo_model->consulta(NULL, $fecha['year']);
		$html = '';
		foreach ($torneos as $i)
		{
			$html = $html . '<div class="form-group col-md-4"><label class="checkbox-inline">' . $i['nombre'] . '</label></div>';
		}
		$this->variables['torneos']=$html;
	}
	
	/**
	 * Funcion que setea las parametros basicos de las variables de la pagina
	 * @return void
	 */
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL)
	{
		$this->variables['titulo'] 		= $titulo;
		$this->variables['mensaje'] 	= $mensaje;
		$this->variables['accion'] 		= $accion;
		$this->variables['cancelar'] 	= $cancelar;
		$this->variables['volver'] 		= $volver;
	}
	
	/**
	 * Funcion que setea las parametros de la vista templates/principal
	 * @return void
	 */
	private function _setear_principal()
	{
		$this->variables['form_id'] 				= '"Torneos"';
		$this->variables['titulo_label'] 			= 'html_torneo_titulo_default';
		$this->variables['titulo_formato_panel'] 	= 'panel panel-torneos';
		$this->variables['grilla_ppal_label'] 		= 'form_label_torneos';
		$this->variables['datos_ppal'] 				= '';
	}
	
	private function _obtener_combo_modalidad()
	{
		$modalidades = $this->Torneo_model->consulta_tipo_modalidad();
		$descripcion['0'] = "[SELECCIONE]";
		foreach ($modalidades as $i)
		{
			$descripcion[$i['id_tipo_modalidad']] = $i['descripcion'];
		}
		$this->variables['modalidades']=$descripcion;
	}
}