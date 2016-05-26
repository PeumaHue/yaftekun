<?php
class Equipo extends CI_Controller {
	
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
	
	
	public function __construct()
	{
		parent::__construct();
		$this->datos_formulario = new stdClass();
		#$this->_setear_variables('','','equipo/alta','equipo','');
		$this->load->library('form_validation');
		
		$this->load->model('Equipo_model');
		$this->load->helper(array('url', 'form', 'HYaftekun'));
		$this->load->view('templates/header');
		
	}
	
	public function index() {
		$this->_setear_campos();
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(site_url('equipo/editar'), 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		$this->_setear_variables('','',site_url('equipo/alta'),'equipo','');
				
		$this->load->view('equipos/principal',$this->variables);
		#$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion para generar un nuevo equipo
	 */
	public function alta(){
		$this->_setear_variables('','',site_url('equipo/alta'),'equipo','');
		
		$this->_setear_campos();
		$this->_setear_reglas();
		
		if ($this->form_validation->run()==FALSE){
			$this->variables['mensaje']= validation_errors();
		}
		else {
			$query = $this->Equipo_model->alta($this->_obtener_post());
		}
		
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(site_url('equipo/editar'), 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		#$this->load->view('templates/header');
		$this->load->view('equipos/principal',$this->variables);
		$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
		
	}
	
	/**
	 * Obtiene los datos del post y los devuelve en forma de objeto
	 * @param 		integer 	$id_equipo id del equipo para cuando se trata de una edición
	 * @return		object		$equipo
	 */
	private function _obtener_post($id_equipo=NULL)
	{
		
		$equipo = new stdClass();
		$equipo->id_torneo 			= $id_equipo = '' ? $id_equipo : $this->input->post('id_equipo');
		$equipo->id_liga 			= $this->input->post('id_liga');
		$equipo->nombre 			= $this->input->post('nombre');
		$equipo->id_estadio 		= $this->input->post('id_estadio');
		$equipo->id_usuario 		= $this->input->post('id_usuario');
		$equipo->imagen 			= $this->input->post('imagen');
				
		return $equipo;
	}
	
	/**
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->id_equipo = isset($this->datos_formulario->id_equipo) ? $this->datos_formulario->id_equipo : '';
		$this->datos_formulario->id_liga = isset($this->datos_formulario->id_liga) ? $this->datos_formulario->id_liga : '';
		$this->datos_formulario->nombre = isset($this->datos_formulario->nombre) ? $this->datos_formulario->nombre : '';
		$this->datos_formulario->id_estadio = isset($this->datos_formulario->id_estadio) ? $this->datos_formulario->id_estadio : '';
		$this->datos_formulario->id_usuario = isset($this->datos_formulario->id_usuario) ? $this->datos_formulario->id_usuario : '';
		$this->datos_formulario->imagen = isset($this->datos_formulario->imagen) ? $this->datos_formulario->imagen : '';
	}
	/**
	 * Funcion que setea las reglas de validacion del formulario y sus mensajes de errores
	 * @todo traducir los mensajes de errores en los archivos de configuracion para no tener que usar set_messsage
	 * @return void
	 */
	private function _setear_reglas()
	{
		$this->form_validation->set_rules('id_liga', lang('form_label_liga'), 'required');
		$this->form_validation->set_rules('id_estadio', lang('form_label_estadio'), 'required');
		$this->form_validation->set_rules('id_usuario', lang('form_label_usuario'), 'required');
		$this->form_validation->set_rules('nombre', lang('form_label_nombre'), 'required');
		$this->form_validation->set_rules('imagen', lang('form_label_equipo_imagen'), 'required');
		
	}
	
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL, $eliminar=NULL)
	{
		$this->variables['titulo'] 		= $titulo;
		$this->variables['accion'] 		= $accion;
		$this->variables['mensaje'] 	= $mensaje;
		$this->variables['cancelar'] 	= $cancelar;
		$this->variables['volver'] 		= $volver;
		$this->variables['eliminar']	= $eliminar;
		
		
		$this->variables['form_id'] = '"equipos"';
		$this->variables['titulo_label'] = 'html_equipo_titulo_default';
		$this->variables['funcionaltabusqueda'] = 'equipo/alta';
		$this->variables['titulo_formato_panel'] = 'panel-equipos';
		$this->variables['grilla_ppal_label'] = 'form_label_equipo';
		

	}
	
}