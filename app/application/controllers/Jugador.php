<?php
class Jugador extends CI_Controller {
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
	
	
	private $subeimagen;
	public $conf;
	
	public $imagen_original;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('Participante_model');
		$this->load->model('Equipo_model');
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->variables['includes']='<script src="'.base_url('js/bootstrap-filestyle.min.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('js/bootstrap-filestyle.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_jugador.js').'"></script>';
		$this->variables['accion'] = site_url('Jugador/alta');
		$this->variables['id_participante'] = '';
		$this->variables['reset'] = FALSE;//Variable para indicar si hay que resetear los campos del formulario
		$this->load->view('templates/header', $this->variables);
		$this->_setear_campos();
		
		$this->conf['upload_path'] = './images/jugadores/';
		$this->conf['allowed_types'] = 'gif|jpg|png';
		$this->conf['max_size']     = '2000';
		$this->conf['max_width'] = '1000';
		$this->conf['max_height'] = '1000';
		$this->subeimagen = false;
		
	}
	
	public function index() {
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/busqueda_jugador', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de alta y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function alta()
	{
		$this->_setear_variables('', '', site_url('jugador/alta'),'', site_url('jugador'), '', 'Agregar');
		$this->_obtener_combo_documento();
		$this->_obtener_combo_estado_civil();
		$this->_obtener_combo_estado_jugador();
		$this->_obtener_combo_equipo();
		$this->_obtener_combo_provincia();
		$this->datos_formulario->nombre_archivo_foto='no-foto.png';
		$this->_setear_reglas();
		if($this->form_validation->run() == FALSE)
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
			}
			
			if ($this->variables['mensaje']=='')
			{
				if($query['resultado']='OK')
				{
					$this->variables['mensaje'] = lang('message_guardar_ok');
					$this->variables['reset'] = TRUE;
				}
				else
				{
					$this->variables['mensaje'] = lang('message_guardar_error');
				}
			}
			
			$query = $this->Participante_model->alta($this->_obtener_post());
			
		}
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/datos_jugador', $this->variables);
		$this->load->view('jugadores/mensajes_jugador', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de edición y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function editar($id_participante=NULL)
	{
		$this->_setear_variables('', '', site_url('jugador/editar'), '', site_url('jugador'), site_url('jugador/baja') . '/' . ($id_participante==NULL ? $this->input->post('id_participante') : $id_participante), 'Editar');
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if(!$this->input->post('nombre'))
		{
			$participante = $this->Participante_model->consulta($id_participante, NULL, NULL);
			$this->datos_formulario->id_participante = $id_participante;
			$this->datos_formulario->id_tipo_participante = 1;
			$this->datos_formulario->nombre_archivo_foto = $participante->nombre_archivo_foto;
			$this->datos_formulario->nombre = $participante->nombre;
			$this->datos_formulario->apellido = $participante->apellido;
			$this->datos_formulario->numero_camiseta = $participante->numero_camiseta;
			$this->datos_formulario->id_tipo_posicion_juego = $participante->id_tipo_posicion_juego;
			$this->_obtener_combo_estado_jugador($this->datos_formulario->id_tipo_estado_jugador = $participante->id_tipo_estado_jugador);
			$this->datos_formulario->numero_carnet_socio = $participante->numero_carnet_socio;
			$this->_obtener_combo_equipo($this->datos_formulario->id_equipo = $participante->id_equipo);
			$this->datos_formulario->trayectoria = $participante->trayectoria;
			$this->datos_formulario->telefono = $participante->telefono;
			$this->datos_formulario->telefono_celular = $participante->telefono_celular;
			$this->datos_formulario->telefono_radio = $participante->telefono_radio;
			$this->datos_formulario->email = $participante->email;
			$this->datos_formulario->fecha_nacimiento = $participante->fecha_nacimiento;
			$this->datos_formulario->calle = $participante->calle;
			$this->datos_formulario->piso = $participante->piso;
			$this->datos_formulario->numero = $participante->numero;
			$this->datos_formulario->depto = $participante->depto;
			$this->datos_formulario->codpostal = $participante->codpostal;
			$this->_obtener_combo_provincia($this->datos_formulario->id_provincia = $participante->id_provincia);
			$this->datos_formulario->localidad = $participante->localidad;
			$this->datos_formulario->nacionalidad = $participante->nacionalidad;
			$this->_obtener_combo_estado_civil($this->datos_formulario->id_estado_civil = $participante->id_estado_civil);
			$this->datos_formulario->conyuge_nombre = $participante->conyuge_nombre;
			$this->_obtener_combo_documento($this->datos_formulario->id_tipo_doc = $participante->id_tipo_doc);
			$this->datos_formulario->nro_doc = $participante->nro_doc;
			$this->datos_formulario->cobertura_medica = $participante->cobertura_medica;
			$this->datos_formulario->fecha_apto_medico = $participante->fecha_apto_medico;
			$this->datos_formulario->nombre_archivo_apto_medico = $participante->nombre_archivo_apto_medico;
			
			$this->datos_formulario->nombre_archivo_foto             = $participante->nombre_archivo_foto;
			$this->datos_formulario->imagen_original    = $participante->nombre_archivo_foto;
		
			
		}
		else
		{
			$this->_setear_reglas();
			$this->subeimagen = ($_FILES['imagen']['tmp_name']!='');
			$participante = new stdClass();
			if($this->form_validation->run() == FALSE)
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
				}
				if ($this->variables['mensaje']=='')
				{
					if($this->Participante_model->editar($this->_obtener_post($this->datos_formulario->id_participante))['resultado']='OK')
					{
						$this->variables['mensaje'] = lang('message_guardar_cambios_ok');
					}
					else
					{
						$this->variables['mensaje'] = lang('message_guardar_error');;
					}
				}
			}
			$this->_obtener_combo_documento($this->input->post('id_tipo_doc'));
			$this->_obtener_combo_estado_civil($this->input->post('id_estado_civil'));
			$this->_obtener_combo_equipo($this->input->post('id_equipo'));
			$this->_obtener_combo_estado_jugador($this->input->post('id_tipo_estado_jugador'));
			$this->_obtener_combo_provincia($this->input->post('id_provincia'));
			if ($this->subeimagen)
			{
				$this->datos_formulario->nombre_archivo_foto = $this->upload->data('file_name');
			}
			else
			{
			    $this->datos_formulario->nombre_archivo_foto = $this->input->post('imagen_original');
			}

		}
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/datos_jugador', $this->variables);
		$this->load->view('jugadores/mensajes_jugador', $this->variables);
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
		$participante->id_estado_civil            = $this->input->post('id_estado_civil');
		$participante->conyuge_nombre             = $this->input->post('conyuge_nombre');
		$participante->id_tipo_doc 	              = $this->input->post('id_tipo_doc');
		$participante->nro_doc                    = $this->input->post('nro_doc');
		$participante->cobertura_medica           = $this->input->post('cobertura_medica');
		$participante->fecha_apto_medico          = $this->input->post('fecha_apto_medico');
		$participante->nombre_archivo_apto_medico = $this->input->post('nombre_archivo_apto_medico');
		$participante->id_usuario			      = '1';// @todo Pasar el usuario logueado
		if ($this->subeimagen)
		{
			$participante->nombre_archivo_foto 			= $this->upload->data('file_name');
		}
		else
		{
			$participante->nombre_archivo_foto 			= $this->input->post('imagen_original');
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
		$this->datos_formulario->id_estado_civil = '';
		$this->datos_formulario->conyuge_nombre = '';
		$this->datos_formulario->id_tipo_doc = '';
		$this->datos_formulario->nro_doc = '';
		$this->datos_formulario->cobertura_medica = '';
		$this->datos_formulario->fecha_apto_medico = '';
		$this->datos_formulario->nombre_archivo_apto_medico = '';
		
		$this->datos_formulario->nombre_archivo_foto = isset($this->datos_formulario->nombre_archivo_foto) ? $this->datos_formulario->nombre_archivo_foto : 'no-foto.png';
		$this->datos_formulario->imagen_original = isset($this->datos_formulario->imagen_original) ? $this->datos_formulario->imagen_original : '';
	}
	
	/**
	 * Funcion que setea las reglas de validacion del formulario y sus mensajes de errores
	 * @todo traducir los mensajes de errores en los archivos de configuracion para no tener que usar set_messsage
	 * @return void
	 */
	private function _setear_reglas()
	{
		$this->form_validation->set_rules('apellido', 'Apellido fff', 'trim|required');
		//$this->form_validation->set_rules('nombre', 'Nombre fff', 'trim|required');
	}
	
	private function _renderizar_jugadores()
	{
		$jugadores = $this->Participante_model->consulta(NULL, NULL, 1);
		$link_jugador = site_url('jugador/editar');
		$html = '';
		foreach ($jugadores as $i)
		{
			$link_jugador = $link_jugador . '/' . $i['id_participante'];
			$html = $html . '<div class="form-group col-md-4"><a href="' . $link_jugador . '" class="btn btn-link">' . $i['nombre'].'&nbsp;'.$i['apellido'].'</a></div>';
			$link_jugador = site_url('jugador/editar');
		}
		$this->variables['jugadores']=$html;
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
	 * Funcion que completa el combo de tipo de documento si no recibe ningún parametro, sino muestra el combo con el id que recibe
	 * @param 		integer 	$id_tipo_documento
	 * @return void
	 */
	private function _obtener_combo_documento($id_tipo_documento=NULL)
	{
		$documentos = $this->Participante_model->consulta_tipos_de_documentos_de_participantes();
		$descripcion[''] = lang('form_label_tipo_documento');
		foreach ($documentos as $i)
		{
			$descripcion[$i['id_tipo_documento']] = $i['descripcion'];
		}
		$this->variables['documentos']=$descripcion;
		$this->variables['documento']= isset($id_tipo_documento) ? $id_tipo_documento : '';
	}
	
	/**
	 * Funcion que completa el combo de tipo de estado civil si no recibe ningún parametro, sino muestra el combo con el id que recibe
	 * @param 		integer 	$id_tipo_estado_civil
	 * @return void
	 */
	private function _obtener_combo_estado_civil($id_tipo_estado_civil=NULL)
	{
		$estados_civiles = $this->Participante_model->consulta_tipos_de_estados_civiles_de_participantes();
		$descripcion[''] = lang('form_label_estado_civil');
		foreach ($estados_civiles as $i)
		{
			$descripcion[$i['id_tipo_estado_civil']] = $i['descripcion'];
		}
		$this->variables['estados_civiles']=$descripcion;
		$this->variables['estado_civil']= isset($id_tipo_estado_civil) ? $id_tipo_estado_civil : '';
	}
	
	/**
	 * Funcion que completa el combo de tipo de estado de jugador si no recibe ningún parametro, sino muestra el combo con el id que recibe
	 * @param 		integer 	$id_tipo_estado_jugador
	 * @return void
	 */
	private function _obtener_combo_estado_jugador($id_tipo_estado_jugador=NULL)
	{
		$estados = $this->Participante_model->consulta_tipos_de_estados_de_participantes();
		$descripcion[''] = lang('form_label_estado');
		foreach ($estados as $i)
		{
			$descripcion[$i['id_tipo_estado_jugador']] = $i['descripcion'];
		}
		$this->variables['estados']=$descripcion;
		$this->variables['estado']= isset($id_tipo_estado_jugador) ? $id_tipo_estado_jugador : '';
	}
	
	/**
	 * Funcion que completa el combo de equipo si no recibe ningún parametro, sino muestra el combo con el id que recibe
	 * @param 		integer 	$id_equipo
	 * @return void
	 */
	private function _obtener_combo_equipo($id_equipo=NULL)
	{
		$equipos = $this->Equipo_model->consulta(NULL, 1, NULL, 500, 0);  //@todo 
		$descripcion[''] = lang('form_label_equipo');
		foreach ($equipos as $i)
		{
			$descripcion[$i['id_equipo']] = $i['nombre'];
		}
		$this->variables['equipos']=$descripcion;
		$this->variables['equipo']= isset($id_equipo) ? $id_equipo : '';
	}
	
	/**
	 * Funcion que completa el combo de provincia si no recibe ningún parametro, sino muestra el combo con el id que recibe
	 * @param 		integer 	$id_tipo_provincia
	 * @return void
	 */
	private function _obtener_combo_provincia($id_tipo_provincia=NULL)
	{
		$provincias = $this->Participante_model->consulta_provincias();
		$descripcion[''] = lang('form_label_provincia');
		foreach ($provincias as $i)
		{
			$descripcion[$i['id_tipo_provincia']] = $i['descripcion'];
		}
		$this->variables['provincias']=$descripcion;
		$this->variables['provincia']= isset($id_tipo_provincia) ? $id_tipo_provincia : '';
	}
	
	public function archivo_upload()
	{
		$this->load->model('Archivo_model');
		
		if ($this->input->post('upload')) {
			$this->Archivo_model->do_upload();
		}
		$data['images'] = $this->Archivo_model->get_images();
	}
	
	
}