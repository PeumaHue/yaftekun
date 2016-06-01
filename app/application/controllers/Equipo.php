<?php
class Equipo extends CI_Controller {
	
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	public $conf;
	
	/**
	 * Array para guardar exclusivamente los values del formulario
	 * @var array
	 */
	public $datos_formulario;
	
	
	public function __construct()
	{
		parent::__construct();
		$this->datos_formulario = new stdClass();
		$this->load->library('form_validation');
		$this->load->model('Equipo_model');
		$this->load->helper(array('url', 'form', 'HYaftekun'));
		#echo "<p>NOCACHEADO</p>";
		$this->conf['upload_path'] = './images/escudos/';
		$this->conf['allowed_types'] = 'gif|jpg|png';
		$this->conf['max_size']     = '200';
		$this->conf['max_width'] = '100';
		$this->conf['max_height'] = '100';
		
		$this->load->view('templates/header');
	}
	
	public function index() {
		$this->variables['ligas']=_obtener_array_asociativo($this->Equipo_model->obtener_ligas(), 'id_liga', 'nombre');
		$this->variables['estadios']=_obtener_array_asociativo($this->Equipo_model->obtener_estadios(), 'id_estadio', 'nombre');
		$this->variables['html_datos_ppal'] =_renderizar_datos_link('equipo/editar', 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		
		$this->_setear_campos();
		$this->_setear_variables('','',site_url('equipo/alta'),site_url('equipo'),'','');
				
		$this->load->view('equipos/principal',$this->variables);
		#$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion para generar un nuevo equipo
	 */
	public function alta(){
	

		$this->load->library('upload', $this->conf);
		
		$this->_setear_variables('','',site_url('equipo/alta'),site_url('equipo'),'','');
		$this->_setear_campos();
		$this->_setear_reglas();
		
		if ($this->form_validation->run()==FALSE){
			$this->variables['mensaje']= validation_errors();
		}
		else {
			
			$query = $this->Equipo_model->alta($this->_obtener_post());
			move_uploaded_file($_FILES["imagen"]["tmp_name"], $this->conf->upload_path.$_FILES["imagen"]["name"]);
			
			
		}
		
		$this->variables['ligas']=_obtener_array_asociativo($this->Equipo_model->obtener_ligas(), 'id_liga', 'nombre');
		$this->variables['estadios']=_obtener_array_asociativo($this->Equipo_model->obtener_estadios(), 'id_estadio', 'nombre');
		$this->variables['html_datos_ppal'] =_renderizar_datos_link('equipo/editar', 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		
		$this->load->view('equipos/principal',$this->variables);
		$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
		
	}
	
	/**
	 * Funcion para modificar un nuevo equipo
	 */
	public function editar($id_equipo=NULL)
	{
		$this->variables['ligas']=_obtener_array_asociativo($this->Equipo_model->obtener_ligas(), 'id_liga', 'nombre');
		$this->variables['estadios']=_obtener_array_asociativo($this->Equipo_model->obtener_estadios(), 'id_estadio', 'nombre');
		
		if (!$this->input->post('nombre')){
			$this->_cargar_datos_formulario($this->Equipo_model->consulta($id_equipo,NULL));
			#$this->_setear_variables('','',site_url('equipo/editar').'/'.$this->datos_formulario->id_equipo,site_url('equipo'),'',site_url('equipo/baja'.'/'.$this->datos_formulario->id_equipo));
			$this->_setear_variables('','',site_url('equipo/editar'),site_url('equipo'),'',site_url('equipo/baja'.'/'.$this->datos_formulario->id_equipo));
			
		}
		else {
			/*
			echo $id_equipo;
			die();
			*/
			$this->_setear_campos();
			$this->_setear_variables('','',site_url('equipo/editar'),site_url('equipo'),'',site_url('equipo/baja'.'/'.$this->datos_formulario->id_equipo));
			$this->_setear_reglas();
			if ($this->form_validation->run()==FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else 
			{
				$query = $this->Equipo_model->editar($this->_obtener_post());
			}
		}
		
		$this->variables['html_datos_ppal'] =_renderizar_datos_link('equipo/editar', 'id_equipo','nombre',$this->Equipo_model->consulta(NULL,NULL));
		$this->load->view('equipos/principal',$this->variables);
		$this->load->view('equipos/datos_equipo');
		$this->load->view('templates/footer');
	
	}
	
	public function baja($id_equipo=NULL)
	{
		$equipo = new stdClass();
		$equipo->id_equipo = $id_equipo;
		$this->Equipo_model->baja($equipo);
		$this->index();
	}

	/**
	 * Obtiene los datos del post y los devuelve en forma de objeto
	 * @param 		integer 	$id_equipo id del equipo para cuando se trata de una edición
	 * @return		object		$equipo
	 */
	private function _obtener_post($id_equipo=NULL)
	{
		$equipo = new stdClass();
		$equipo->id_equipo 			= $id_equipo = '' ? $id_equipo : $this->input->post('id_equipo');
		$equipo->id_liga 			= $this->input->post('id_liga');
		$equipo->nombre 			= $this->input->post('nombre');
		$equipo->id_estadio 		= $this->input->post('id_estadio');
		$equipo->id_usuario 		= $this->input->post('id_usuario');
		#$equipo->imagen 			= $this->input->files() # files('name');
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
		#$this->form_validation->set_rules('imagen', lang('form_label_equipo_imagen'), 'required');
		
	}
	
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL, $eliminar=NULL)
	{
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
	
	private function _cargar_datos_formulario($objeto){
		$this->datos_formulario->id_equipo          = $objeto->id_equipo        ;
		$this->datos_formulario->id_liga            = $objeto->id_liga          ;
		$this->datos_formulario->nombre             = $objeto->nombre           ;
		$this->datos_formulario->id_estadio         = $objeto->id_estadio       ;
		$this->datos_formulario->id_usuario         = $objeto->id_usuario       ;
		$this->datos_formulario->fecha_creacion     = $objeto->fecha_creacion   ;
		$this->datos_formulario->imagen             = $objeto->imagen           ;
	}
	
}