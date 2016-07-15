<?php
class Director_Tecnico extends CI_Controller {
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
	public $mensaje;
	public $subeimagen_perfil;
	public $subeimagen_perfil_conf_;
	public $subeimagen_perfil_nombre_archivo_final;
	public $imagen_original_perfil;
	
	public function __construct()
	{
		parent::__construct();
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form', 'HYaftekun','email', 'date'));
		$this->load->model('Participante_model');
		$this->load->model('Equipo_model');
		$this->variables['mensaje']= '';
		$this->variables['includes']='<script src="'.base_url('js/bootstrap-filestyle.min.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_dt.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/jquery.easy-autocomplete.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.min.css').'" />';
		$this->variables['includes']= $this->variables['includes'].'<link rel="stylesheet" href="'.base_url('css/easy-autocomplete.themes.min.css').'" />';
		$this->variables['accion'] = site_url('director_tecnico/alta');
		$this->variables['id_participante'] = '';
		$this->variables['reset'] = FALSE;//Variable para indicar si hay que resetear los campos del formulario
		$this->_setear_campos();
		$this->subeimagen_perfil = false;
		$this->subeimagen_perfil_conf_['upload_path'] = './images/directores_tecnicos/';
		$this->subeimagen_perfil_conf_['allowed_types'] = 'gif|jpg|png';
		$this->subeimagen_perfil_conf_['max_size']     = '200';
		$this->subeimagen_perfil_conf_['max_width'] = '1000';
		$this->subeimagen_perfil_conf_['max_height'] = '1000';
	}
	
	public function index() {
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(array("ruta"=>'director_tecnico/editar', "campoID"=>'id_participante',"camposMostrar"=>array('apellido','nombre'),"datos"=>$this->Participante_model->consulta(NULL, NULL, 3)));
		$this->load->view('templates/header', $this->variables);
		$this->load->view('directores_tecnicos/principal_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/busqueda_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/mensajes_director_tecnico', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de alta y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function alta()
	{
		$this->_setear_variables('', '', site_url('director_tecnico/alta'),'', site_url('director_tecnico'), '', 'Agregar');
		$this->variables['documentos']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_documentos_de_participantes(), "campo_clave"=>'id_tipo_documento', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_tipo_documento'));
		$this->variables['estados_civiles']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_estados_civiles_de_participantes(), "campo_clave"=>'id_tipo_estado_civil', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_estado_civil'));
		$this->variables['estados']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_estados_de_participantes(), "campo_clave"=>'id_tipo_estado_jugador', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_estado'));
		$this->variables['equipos']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->consulta(NULL, 1, NULL, 500, 0), "campo_clave"=>'id_equipo', "campo_descripcion"=>'nombre', "cadena_sin_seleccion"=>'form_label_equipo')); //@todo
		$this->variables['provincias']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_provincias(), "campo_clave"=> 'id_tipo_provincia', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_provincia'));
		$this->datos_formulario->nombre_archivo_foto='no-foto.png';
		$this->_setear_reglas();
		if ($this->input->method()=='post')
		{
			if($this->form_validation->run() == FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else
			{
				$this->subeimagen_perfil = ($_FILES['nombre_archivo_foto']['tmp_name']!='');
				if ($this->subeimagen_perfil)
				{
					$this->load->library('upload', $this->subeimagen_perfil_conf_);
					$this->upload->initialize($this->subeimagen_perfil_conf_);
					if (!$this->upload->do_upload('nombre_archivo_foto'))
					{
						$this->variables['mensaje'] = $this->upload->display_errors();
					}
					else
					{
						$this->subeimagen_perfil_nombre_archivo_final = $this->upload->data('file_name');
					}
				}
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if($this->Participante_model->alta($this->datos_formulario)['resultado']=='OK')
					{
						$this->variables['mensaje'] = lang('message_guardar_ok');
						$this->variables['reset'] = TRUE;
						$this->datos_formulario->nombre_archivo_foto='no-foto.png';
					}
					else
					{
						$this->variables['mensaje'] = lang('message_guardar_error');
					}
				}
			}
		}
		$this->load->view('templates/header', $this->variables);
		$this->load->view('directores_tecnicos/principal_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/datos_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/mensajes_director_tecnico', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de edición y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function editar($id_participante=NULL)
	{
		$this->_setear_variables('', '', site_url('director_tecnico/editar'), '', site_url('director_tecnico'), site_url('director_tecnico/baja') . '/' . ($id_participante==NULL ? $this->input->post('id_participante') : $id_participante), 'Editar');
		$this->variables['documentos']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_documentos_de_participantes(), "campo_clave"=>'id_tipo_documento', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_tipo_documento'));
		$this->variables['estados_civiles']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_estados_civiles_de_participantes(), "campo_clave"=>'id_tipo_estado_civil', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_estado_civil'));
		$this->variables['estados']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_tipos_de_estados_de_participantes(), "campo_clave"=>'id_tipo_estado_jugador', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_estado'));
		$this->variables['equipos']=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->consulta(NULL, 1, NULL, 500, 0), "campo_clave"=>'id_equipo', "campo_descripcion"=>'nombre', "cadena_sin_seleccion"=>'form_label_equipo')); //@todo
		$this->variables['provincias']=_obtener_array_asociativo(array("datos"=>$this->Participante_model->consulta_provincias(), "campo_clave"=> 'id_tipo_provincia', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_provincia'));
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if (!($this->input->method()=='post'))
		{
			$this->_cargar_datos_formulario($this->Participante_model->consulta($id_participante, NULL, NULL));
		}
		else
		{
			$this->_setear_reglas();
			$this->subeimagen_perfil = ($_FILES['nombre_archivo_foto']['tmp_name']!='');
			$participante = new stdClass();
			if($this->form_validation->run() == FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else
			{
				if ($this->subeimagen_perfil)
				{
					$this->load->library('upload', $this->subeimagen_perfil_conf_);
					$this->upload->initialize($this->subeimagen_perfil_conf_);
					if (!$this->upload->do_upload('nombre_archivo_foto'))
					{
						$this->variables['mensaje'] = $this->upload->display_errors();
					}
					else
					{
						$this->subeimagen_perfil_nombre_archivo_final = $this->upload->data('file_name');
					}
				}
				if ($this->variables['mensaje']=='')
				{
					$this->_cargar_datos_formulario($this->_obtener_post());
					if($this->Participante_model->editar($this->datos_formulario)['resultado']='OK')
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
		$this->load->view('directores_tecnicos/principal_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/datos_director_tecnico', $this->variables);
		$this->load->view('directores_tecnicos/mensajes_director_tecnico', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion de baja
	 * @return void
	 */
	public function baja($id_participante=NULL)
	{
		if($this->Participante_model->baja($id_participante, true)['resultado']='OK')
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
	 * Funcion que realiza una búsqueda por nombre de jugador
	 * @return void
	 */
	public function obtener_autocomplete($apellido_nombre=NULL)
	{
		echo json_encode($this->Participante_model->consulta(NULL, NULL, 3, $apellido_nombre));
	}
	
	/**
	 * Obtiene los datos del post y los devuelve en forma de objeto
	 * @param 		integer 	$id_participante id del participante para cuando se trata de una edición
	 * @return		object		$persona
	 */
	private function _obtener_post($id_participante=NULL)
	{
		$participante = new stdClass();
		$participante->id_participante 	          = $id_participante = '' ? $id_participante : $this->input->post('id_participante');
		$participante->id_tipo_participante       = $this->input->post('id_tipo_participante');
		$participante->nombre_archivo_foto        = $this->input->post('nombre_archivo_foto');
		$participante->nombre 			          = $this->input->post('nombre');
		$participante->apellido                   = $this->input->post('apellido');
		$participante->numero_camiseta            = $this->input->post('numero_camiseta');
		$participante->id_tipo_posicion_juego     = $this->input->post('id_tipo_posicion_juego');
		$participante->id_tipo_estado_jugador     = $this->input->post('id_tipo_estado_jugador');
		$participante->numero_carnet_socio        = $this->input->post('numero_carnet_socio');
		$participante->id_equipo                  = $this->input->post('id_equipo');
		$participante->trayectoria                = $this->input->post('trayectoria');
		$participante->telefono                   = $this->input->post('telefono');
		$participante->telefono_celular           = $this->input->post('telefono_celular');
		$participante->telefono_radio             = $this->input->post('telefono_radio');
		$participante->email                      = $this->input->post('email');
		$participante->fecha_nacimiento           = $this->input->post('fecha_nacimiento');
		$participante->calle			          = $this->input->post('calle');
		$participante->piso                       = $this->input->post('piso');
		$participante->numero                     = $this->input->post('numero');
		$participante->depto                      = $this->input->post('depto');
		$participante->codpostal                  = $this->input->post('codpostal');
		$participante->id_provincia               = $this->input->post('id_provincia');
		$participante->localidad                  = $this->input->post('localidad');
		$participante->nacionalidad               = $this->input->post('nacionalidad');
		$participante->id_tipo_estado_civil          = $this->input->post('id_tipo_estado_civil');
		$participante->conyuge_nombre             = $this->input->post('conyuge_nombre');
		$participante->id_tipo_doc 	              = $this->input->post('id_tipo_doc');
		$participante->nro_doc                    = $this->input->post('nro_doc');
		$participante->id_usuario			      = '1';// @todo Pasar el usuario logueado
		if ($this->subeimagen_perfil)
		{
			$participante->nombre_archivo_foto 			= $this->subeimagen_perfil_nombre_archivo_final;
		}
		else
		{
			$participante->nombre_archivo_foto 			= $this->input->post('imagen_original_perfil');
		}
		return $participante;
	}
	
	/**
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->id_participante = '';
		$this->datos_formulario->id_tipo_participante = 1;
		$this->datos_formulario->nombre_archivo_foto = '';
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->apellido = '';
		$this->datos_formulario->numero_camiseta = '1';
		$this->datos_formulario->id_tipo_posicion_juego = '';
		$this->datos_formulario->id_tipo_estado_jugador = '';
		$this->datos_formulario->numero_carnet_socio = '';
		$this->datos_formulario->id_equipo = '';
		$this->datos_formulario->trayectoria = '';
		$this->datos_formulario->telefono = '';
		$this->datos_formulario->telefono_celular = '';
		$this->datos_formulario->telefono_radio = '';
		$this->datos_formulario->email = '';
		$this->datos_formulario->fecha_nacimiento = '';
		$this->datos_formulario->calle = '';
		$this->datos_formulario->piso = '';
		$this->datos_formulario->numero = '';
		$this->datos_formulario->depto = '';
		$this->datos_formulario->codpostal = '';
		$this->datos_formulario->id_provincia = '';
		$this->datos_formulario->localidad = '';
		$this->datos_formulario->nacionalidad = '';
		$this->datos_formulario->id_tipo_estado_civil = '';
		$this->datos_formulario->conyuge_nombre = '';
		$this->datos_formulario->id_tipo_doc = '';
		$this->datos_formulario->nro_doc = '';
		$this->datos_formulario->nombre_archivo_foto = isset($this->datos_formulario->nombre_archivo_foto) ? $this->datos_formulario->nombre_archivo_foto : 'no-foto.png';
		$this->datos_formulario->imagen_original_perfil = isset($this->datos_formulario->imagen_original_perfil) ? $this->datos_formulario->imagen_original_perfil : '';
		$this->datos_formulario->id_usuario = '';
	}
	
	/**
	 * Funcion que setea las reglas de validacion del formulario y sus mensajes de errores
	 * @todo traducir los mensajes de errores en los archivos de configuracion para no tener que usar set_messsage
	 * @return void
	 */
	private function _setear_reglas()
	{
		$this->form_validation->set_rules('apellido', 'lang:form_label_apellido', 'required');
		$this->form_validation->set_rules('apellido', 'lang:form_label_apellido', 'regex_match[/^[a-zA-Z ]*$/]');
		$this->form_validation->set_rules('nombre', 'lang:form_label_nombre', 'required');
		$this->form_validation->set_rules('nombre', 'lang:form_label_nombre', 'regex_match[/^[a-zA-Z ]*$/]');
		$this->form_validation->set_rules('id_tipo_doc', 'lang:form_label_tipo_documento', 'required');
		$this->form_validation->set_rules('nro_doc', 'lang:form_label_numero_documento', 'required');
		$this->form_validation->set_rules('nro_doc', 'lang:form_label_numero_documento', 'regex_match[/^[0-9]*$|^\s*$/]');
		//$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'regex_match[[0-9]{2}/[0-9]{2}/[0-9]{4}]');
		$this->form_validation->set_rules('nacionalidad', 'lang:form_label_nacionalidad', 'regex_match[/^[a-zA-Z ]*$/]');
		$this->form_validation->set_rules('conyuge_nombre', 'lang:form_label_nombre_conyuge', 'regex_match[/^[a-zA-Z ]*$/]');
		$this->form_validation->set_rules('numero', 'lang:form_label_numero_calle', 'required');
		$this->form_validation->set_rules('numero', 'lang:form_label_numero_calle', 'regex_match[/^[0-9]*$|^\s*$/]');
		$this->form_validation->set_rules('telefono', 'lang:form_label_telefono', 'required');
		$this->form_validation->set_rules('telefono', 'lang:form_label_telefono', 'regex_match[/^[0-9]*$|^\s*$/]');
		$this->form_validation->set_rules('telefono_celular', 'lang:form_label_celular', 'required');
		$this->form_validation->set_rules('telefono_celular', 'lang:form_label_celular', 'regex_match[/^[0-9]*$|^\s*$/]');
		$this->form_validation->set_rules('telefono_radio', 'lang:form_label_radio', 'required');
		$this->form_validation->set_rules('telefono_radio', 'lang:form_label_radio', 'regex_match[/^[0-9]*$|^\s*$/]');
		$this->form_validation->set_rules('email', 'lang:form_label_mail', 'valid_email|xss_clean');
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
	 * @param 		object		$participante
	 */
	private function _cargar_datos_formulario($objeto)
	{
		$this->datos_formulario->id_participante            = isset($objeto->id_participante) ? $objeto->id_participante : '';
		$this->datos_formulario->id_tipo_participante       = 3;
		$this->datos_formulario->nombre_archivo_foto        = isset($objeto->nombre_archivo_foto) ? $objeto->nombre_archivo_foto : '';
		$this->datos_formulario->nombre                     = isset($objeto->nombre) ? $objeto->nombre : '';
		$this->datos_formulario->apellido                   = isset($objeto->apellido) ? $objeto->apellido : '';
		$this->datos_formulario->numero_camiseta            = isset($objeto->numero_camiseta) ? $objeto->numero_camiseta : '';
		$this->datos_formulario->id_tipo_posicion_juego     = isset($objeto->id_tipo_posicion_juego) ? $objeto->id_tipo_posicion_juego : '';
		$this->datos_formulario->id_tipo_estado_jugador     = isset($objeto->id_tipo_estado_jugador) ? $objeto->id_tipo_estado_jugador : '';
		$this->datos_formulario->numero_carnet_socio        = isset($objeto->numero_carnet_socio) ? $objeto->numero_carnet_socio : '';
		$this->datos_formulario->id_equipo                  = isset($objeto->id_equipo) ? $objeto->id_equipo : '';
		$this->datos_formulario->trayectoria                = isset($objeto->trayectoria) ? $objeto->trayectoria : '';
		$this->datos_formulario->telefono                   = isset($objeto->telefono) ? $objeto->telefono : '';
		$this->datos_formulario->telefono_celular           = isset($objeto->telefono_celular) ? $objeto->telefono_celular : '';
		$this->datos_formulario->telefono_radio             = isset($objeto->telefono_radio) ? $objeto->telefono_radio : '';
		$this->datos_formulario->email                      = isset($objeto->email) ? $objeto->email : '';
		$this->datos_formulario->fecha_nacimiento           = isset($objeto->fecha_nacimiento) ? $objeto->fecha_nacimiento : NULL;
		$this->datos_formulario->calle                      = isset($objeto->calle) ? $objeto->calle : '';
		$this->datos_formulario->piso                       = isset($objeto->piso) ? $objeto->piso : '';
		$this->datos_formulario->numero                     = isset($objeto->numero) ? $objeto->numero : '';
		$this->datos_formulario->depto                      = isset($objeto->depto) ? $objeto->depto : '';
		$this->datos_formulario->codpostal                  = isset($objeto->codpostal) ? $objeto->codpostal : '';
		$this->datos_formulario->id_provincia               = isset($objeto->id_provincia) ? $objeto->id_provincia : '';
		$this->datos_formulario->localidad                  = isset($objeto->localidad) ? $objeto->localidad : '';
		$this->datos_formulario->nacionalidad               = isset($objeto->nacionalidad) ? $objeto->nacionalidad : '';
		$this->datos_formulario->id_tipo_estado_civil          = isset($objeto->id_tipo_estado_civil) ? $objeto->id_tipo_estado_civil : '';
		$this->datos_formulario->conyuge_nombre             = isset($objeto->conyuge_nombre) ? $objeto->conyuge_nombre : '';
		$this->datos_formulario->id_tipo_doc                = isset($objeto->id_tipo_doc) ? $objeto->id_tipo_doc : '';
		$this->datos_formulario->nro_doc                    = isset($objeto->nro_doc) ? $objeto->nro_doc : '';
		$this->datos_formulario->nombre_archivo_foto        = isset($objeto->nombre_archivo_foto) ? $objeto->nombre_archivo_foto : '';
		$this->datos_formulario->imagen_original_perfil     = isset($objeto->imagen_original_perfil) ? $objeto->imagen_original_perfil : '';
		$this->datos_formulario->id_usuario                 = isset($objeto->id_usuario) ? $objeto->id_usuario : '';
	}
}