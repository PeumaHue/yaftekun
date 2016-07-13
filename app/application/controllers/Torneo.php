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
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form', 'HYaftekun','email'));
		$this->load->model('Torneo_model');
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->variables['mensaje']= '';
		$this->variables['includes']='<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/jquery.easy-autocomplete.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_torneo.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.min.css').'" />';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.themes.min.css').'" />';
		$this->variables['accion'] = site_url('persona/alta');
		$this->variables['id_torneo'] = '';
		$this->variables['reset'] = FALSE;//Variable para indicar si hay que resetear los campos del formulario
		$this->_setear_campos();
	}
	
	/**
	 * Funcion que se carga por default al invocar al controlador sin especificar la URL completa
	 * @return void
	 */
	public function index()
	{
		$fecha = getdate();
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(array("ruta"=>'torneo/editar', "campoID"=>'id_torneo',"camposMostrar"=>array('nombre'),"datos"=>$this->Torneo_model->consulta(NULL, $fecha['year'])));
		$this->load->view('templates/header', $this->variables);
		$this->load->view('torneos/principal_torneo', $this->variables);
		$this->load->view('torneos/busqueda_torneo', $this->variables);
		$this->load->view('torneos/mensajes_torneo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion que realiza una búsqueda por nombre de torneo
	 * @return void
	 */
	public function obtener_autocomplete($nombre=NULL)
	{
		echo json_encode($this->Torneo_model->consulta(NULL, NULL, $nombre));
	}
	
	/**
	 * Funcion que muestra el formulario de alta y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function alta()
	{
		$this->_setear_variables('', '', site_url('torneo/alta'), '', site_url('torneo'), '', 'Agregar');
		$this->variables['modalidades']=_obtener_array_asociativo(array("datos"=>$this->Torneo_model->consulta_tipo_modalidad(), "campo_clave"=>'id_tipo_modalidad', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_modalidad_juego'));
		$this->_setear_reglas();
		if ($this->input->method()=='post')
		{
			if($this->form_validation->run() == FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else
			{
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if($this->Torneo_model->alta($this->datos_formulario)['resultado']='OK')
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
		$this->load->view('torneos/principal_torneo', $this->variables);
		$this->load->view('torneos/datos_torneo', $this->variables);
		$this->load->view('torneos/mensajes_torneo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion que muestra el formulario de edición y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function editar($id_torneo=NULL)
	{
		$this->_setear_variables('', '', site_url('torneo/editar'), '', site_url('torneo'), site_url('torneo/baja') . '/' . ($id_torneo==NULL ? $this->input->post('id_torneo') : $id_torneo), 'Editar');
		$this->variables['modalidades']=_obtener_array_asociativo(array("datos"=>$this->Torneo_model->consulta_tipo_modalidad(), "campo_clave"=>'id_tipo_modalidad', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_modalidad_juego'));
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if (!($this->input->method()=='post'))
		{
			$this->_cargar_datos_formulario($this->Torneo_model->consulta($id_torneo));
		}
		else
		{
			$this->_setear_reglas();
			$torneo = new stdClass();
			if($this->form_validation->run() == FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else
			{
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if($this->Torneo_model->editar($this->datos_formulario)['resultado']='OK')
					{
						$this->variables['mensaje'] = lang('message_guardar_cambios_ok');
					}
					else
					{
						$this->variables['mensaje'] = lang('message_guardar_error');;
					}
				}
			}
		}
		$this->load->view('templates/header', $this->variables);
		$this->load->view('torneos/principal_torneo', $this->variables);
		$this->load->view('torneos/datos_torneo', $this->variables);
		$this->load->view('torneos/mensajes_torneo', $this->variables);
		$this->load->view('templates/footer');
	}
	
	/**
	 * Funcion de baja
	 * @return void
	 */
	public function baja($id_torneo=NULL)
	{
		$torneo = new stdClass();
		$torneo->id_torneo = $id_torneo;
		if($this->Torneo_model->baja($torneo)['resultado']='OK')
		{
			$this->variables['mensaje'] = lang('message_guardar_cambios_ok');
		}
		else
		{
			$this->variables['mensaje'] = lang('message_guardar_error');;
		}
		$this->index();
	}
	
	/**
	 * Obtiene los datos del post y los devuelve en forma de objeto
	 * @param 		integer 	$id_torneo id del torneo para cuando se trata de una edición
	 * @return		object		$persona
	 */
	private function _obtener_post($id_torneo=NULL)
	{
		$fecha = getdate();
		$torneo = new stdClass();
		$torneo->id_torneo 			= $id_torneo = '' ? $id_torneo : $this->input->post('id_torneo');
		$torneo->nombre 			= $this->input->post('nombre');
		$torneo->cantidad_equipos 	= $this->input->post('cantidad_equipos');
		$torneo->id_tipo_modalidad 	= $this->input->post('id_tipo_modalidad');
		$torneo->id_liga			= '1';// @todo Por el momento hay una única liga
		$torneo->id_usuario			= '1';// @todo Pasar el usuario logueado
		$torneo->anio				= $fecha['year'];
		return $torneo;
	}
	
	/**
	 * Funcion que inicializa las variables de los campos del formulario para la edición
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->id_torneo = '';
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->cantidad_equipos = '';
		$this->datos_formulario->id_tipo_modalidad = '';
		$this->datos_formulario->id_liga = '';
		$this->datos_formulario->id_usuario = '';
		$this->datos_formulario->anio = '';
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
		$this->form_validation->set_rules('id_tipo_modalidad', 'Modalidad de juego', 'required');
	}
	
	/**
	 * Funcion que setea las parametros basicos de las variables de la pagina
	 * @return void
	 */
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL, $eliminar=NULL, $agregar_o_editar=NULL)
	{
		$this->variables['titulo'] 		= $titulo;
		$this->variables['mensaje'] 	= $mensaje;
		$this->variables['accion'] 		= $accion;
		$this->variables['cancelar'] 	= $cancelar;
		$this->variables['volver'] 		= $volver;
		$this->variables['eliminar']	= $eliminar;
		$this->variables['agregar_o_editar']	= $agregar_o_editar;
	}

	/**
	 * Funcion que carga los datos del formulario
	 * @param 		object		$torneo
	 */
	private function _cargar_datos_formulario($objeto)
	{
		$this->datos_formulario->id_torneo= isset($objeto->id_torneo) ? $objeto->id_torneo : '';
		$this->datos_formulario->nombre = isset($objeto->nombre) ? $objeto->nombre : '';
		$this->datos_formulario->cantidad_equipos = isset($objeto->cantidad_equipos) ? $objeto->cantidad_equipos : '';
		$this->datos_formulario->id_tipo_modalidad = isset($objeto->id_tipo_modalidad) ? $objeto->id_tipo_modalidad : '';
		$this->datos_formulario->id_liga = isset($objeto->id_liga) ? $objeto->id_liga : '';
		$this->datos_formulario->id_usuario = isset($objeto->id_usuario) ? $objeto->id_usuario : '';
		$this->datos_formulario->anio = isset($objeto->anio) ? $objeto->anio : '';
	}
}