<?php
class Equipo extends CI_Controller {
	
	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;
	private $subeimagen;
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
		$this->load->helper(array('url', 'form', 'HYaftekun'));
		$this->load->model('Equipo_model');
		$this->variables['includes']='<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('js/bootstrap-filestyle.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('js/valida_equipos.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/jquery.easy-autocomplete.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.min.css').'" />';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.themes.min.css').'" />';
		$this->conf['upload_path'] = './images/escudos/';
		$this->conf['allowed_types'] = 'gif|jpg|png';
		$this->conf['max_size']     = '2048';		
		//$this->conf['max_width'] = '100';
		//$this->conf['max_height'] = '100';
		$this->subeimagen = false;
		$this->_setear_campos();
	}
	
	public function index() {
		
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(array("ruta"=>'equipo/editar', "campoID"=>'id_equipo',"camposMostrar"=>'nombre',"datos"=>$this->Equipo_model->consulta(NULL,NULL,NULL)));
		$msj = isset($this->variables['mensaje']) ? $this->variables['mensaje'] : ''; 
		$this->_setear_variables('', $msj, site_url('equipo'), site_url('equipo'), '', '');
		$this->load->view('templates/header', $this->variables);
		$this->load->view('equipos/principal_equipo', $this->variables);
		$this->load->view('equipos/busqueda_equipo',$this->variables);
		if ($msj!='') {
			$this->load->view('equipos/mensajes_equipo',$this->variables);
		}
		$this->load->view('templates/footer');
	}

	/**
	 * Funcion que realiza una búsqueda por nombre de equipo
	 * @return void
	 */
	public function obtener_autocomplete($nombre=NULL)
	{
		echo json_encode($this->Equipo_model->consulta(NULL, NULL, $nombre));
	}
	
	/**
	 * Funcion para generar un nuevo equipo
	 */
	public function alta(){
		$this->_setear_variables('','',site_url('equipo/alta'),site_url('equipo'),site_url('equipo'),'');
		$this->variables['ligas']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->obtener_ligas(), "campo_clave"=>'id_liga', "campo_descripcion"=>'nombre', "cadena_sin_seleccion"=>'form_label_liga'));
		$this->variables['estadios']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->obtener_estadios(), "campo_clave"=>'id_estadio', "campo_descripcion"=>'nombre', "cadena_sin_seleccion"=>'form_label_estadio'));
		$this->variables['agregar_o_editar']='Agregar';
		$this->_setear_reglas();
		if ($this->input->method()=='post')
		{
			if ($this->form_validation->run()==FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else 
			{
				$this->subeimagen = ($_FILES['imagen']['tmp_name']!='');
				if ($this->subeimagen)
				{
					$this->load->library('upload', $this->conf);
					if ( ! $this->upload->do_upload('imagen'))
					{
						$this->variables['mensaje'] = $this->upload->display_errors();
					}
					else 
					{						
						$data = array('upload_data' => $this->upload->data());
						$img_full_path = $this->conf['upload_path'] . $data['upload_data']['file_name'];					
							
						// REDIMENSIONAMOS
						$config['image_library'] = 'gd2';
						$config['source_image'] = $img_full_path;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = 200;
						$config['height'] = 200;
					
						$config['new_image'] =$img_full_path;					
					
						$this->load->library('image_lib', $config);
						if (!$this->image_lib->resize()) {
							$this->variables['mensaje']= validation_errors();
						}
					}
				}
				
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if ($this->Equipo_model->alta($this->datos_formulario)['resultado']=='OK')
					{
						$this->variables['mensaje'] = lang('message_guardar_ok');
						$this->variables['reset'] = TRUE;
					}
					else
					{
						$this->variables['mensaje'] = lang('message_guardar_error');
					}
				}
			}
		}
		$this->load->view('templates/header', $this->variables);
		$this->load->view('equipos/principal_equipo',$this->variables);
		$this->load->view('equipos/datos_equipo',$this->variables);
		$this->load->view('equipos/mensajes_equipo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion para modificar un nuevo equipo
	 */
	public function editar($id_equipo=NULL)
	{
		$this->variables['ligas']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->obtener_ligas(), "campo_clave"=>'id_liga', "campo_descripcion"=>'nombre'));
		$this->variables['estadios']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->obtener_estadios(), "campo_clave"=>'id_estadio', "campo_descripcion"=>'nombre'));
		$this->_setear_variables('','',site_url('equipo/editar'),site_url('equipo'),site_url('equipo'),site_url('equipo/baja').'/'.($id_equipo==NULL ? $this->input->post('id_equipo') : $id_equipo));
		$this->variables['agregar_o_editar']='Editar';
		if (!$this->input->post('nombre'))
		{
			$this->_cargar_datos_formulario($this->Equipo_model->consulta($id_equipo,NULL,NULL));
		}
		else 
		{
			$this->subeimagen = ($_FILES['imagen']['tmp_name']!='');
			$this->_setear_reglas();
			if ($this->form_validation->run()==FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else 
			{
				if ($this->subeimagen)
				{
					$this->load->library('upload', $this->conf);
					if (! $this->upload->do_upload('imagen')) 
					{
						$this->variables['mensaje'] = $this->upload->display_errors();
					}
					else 
					{
						$data = array('upload_data' => $this->upload->data());
						$img_full_path = $this->conf['upload_path'] . $data['upload_data']['file_name'];
						
						 
						// REDIMENSIONAMOS
						$config['image_library'] = 'gd2';
						$config['source_image'] = $img_full_path;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = 200;
						$config['height'] = 200;						
						
						$config['new_image'] =$img_full_path;
						
						$this->load->library('image_lib', $config);
						if (!$this->image_lib->resize()) {												
							$this->variables['mensaje']= validation_errors();
						}
						
					}
				}
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if ($this->Equipo_model->editar($this->datos_formulario)['resultado']='OK')
					{
						$this->variables['mensaje'] = lang('message_guardar_ok');
						#$this->variables['reset'] = TRUE;
					}
					else
					{
						$this->variables['mensaje'] = lang('message_guardar_error');
					}	
				}
			}
		}
		$this->load->view('templates/header', $this->variables);
		$this->load->view('equipos/principal_equipo',$this->variables);
		$this->load->view('equipos/datos_equipo',$this->variables);
		$this->load->view('equipos/mensajes_equipo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion de baja
	 * @return void
	 */
	public function baja($id_equipo=NULL)
	{
		$equipo = new stdClass();
		$equipo->id_equipo = $id_equipo;
		if ($this->Equipo_model->baja($equipo)['resultado']='OK')
		{
			$this->variables['mensaje'] = lang('message_guardar_cambios_ok');
		}
		else 
		{
			$this->variables['mensaje'] = lang('message_guardar_error');
		}
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
		if ($this->subeimagen)
		{
			$equipo->imagen 			= $this->upload->data('file_name');
		}
		else 
		{
			$equipo->imagen 			= $this->input->post('imagen_original');
		}
		
		return $equipo;
	}
	
	/**
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->id_equipo = '';
		$this->datos_formulario->id_liga = '';
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->id_estadio = '';
		$this->datos_formulario->id_usuario = '';
		$this->datos_formulario->imagen = '';
		$this->datos_formulario->imagen_original = '';
		$this->datos_formulario->busqueda = '';
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
	
	/**
	 * Funcion que setea las parametros basicos de las variables de la pagina
	 * @return void
	 */
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL, $eliminar=NULL)
	{
		$this->variables['accion'] 		= $accion;
		$this->variables['mensaje'] 	= $mensaje;
		$this->variables['cancelar'] 	= $cancelar;
		$this->variables['volver'] 		= $volver;
		$this->variables['eliminar']	= $eliminar;
		$this->variables['busqueda']	='equipo/busqueda';
		if (!isset($this->variables['reset']))
		{
			$this->variables['reset']=false;
		}
	}
	
	/**
	 * Funcion que carga los datos del formulario
	 * @param 		object		$participante
	 */
	private function _cargar_datos_formulario($objeto){
		$this->datos_formulario->id_equipo          = isset($objeto->id_equipo) ? $objeto->id_equipo : '';
		$this->datos_formulario->id_liga            = isset($objeto->id_liga) ? $objeto->id_liga : '';
		$this->datos_formulario->nombre             = isset($objeto->nombre) ? $objeto->nombre : '';
		$this->datos_formulario->id_estadio         = isset($objeto->id_estadio) ? $objeto->id_estadio : '';
		$this->datos_formulario->id_usuario         = isset($objeto->id_usuario) ? $objeto->id_usuario : '';
		$this->datos_formulario->fecha_creacion     = isset($objeto->fecha_creacion) ? $objeto->fecha_creacion : '';
		$this->datos_formulario->imagen             = isset($objeto->imagen) ? $objeto->imagen : '';
		$this->datos_formulario->imagen_original    = isset($objeto->imagen) ? $objeto->imagen : '';
	}
	
}