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
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('Participante_model');
		$this->load->model('Equipo_model');
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->variables['includes']='<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_jugador.js').'"></script>';
		$this->variables['accion'] = site_url('Jugador/alta');
		$this->variables['id_participante'] = '';
		$this->variables['reset'] = FALSE;//Variable para indicar si hay que resetear los campos del formulario
		$this->load->view('templates/header', $this->variables);
		$this->_setear_campos();
	}
	
	public function index() {
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/busqueda_jugador', $this->variables);
		//$this->load->view('jugadores/mensajes_jugador', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de alta y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function alta()
	{
		$this->_setear_variables('', '', site_url('jugador/alta'), site_url('jugador'), '', '', 'Agregar');
		$this->_obtener_combo_documento();
		$this->_obtener_combo_estado_civil();
		$this->_obtener_combo_estado_jugador();
		$this->_obtener_combo_equipo();
		$this->_obtener_combo_provincia();
		$this->_setear_reglas();
		if($this->form_validation->run() == FALSE)
		{
			$this->variables['mensaje']= validation_errors();
		}
		else
		{
			$query = $this->Torneo_model->alta($this->_obtener_post());
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
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/datos_jugador', $this->variables);
		$this->load->view('templates/footer');
	}
	
	
	/**
	 * Funcion que muestra el formulario de edición y guarda la misma cuando la validacion del formulario no arroja errores
	 * @return void
	 */
	public function editar($id_participante=NULL)
	{
		$this->_setear_variables('', '', site_url('jugador/editar'), site_url('jugador'), '', site_url('jugador/baja') . '/' . ($id_participante==NULL ? $this->input->post('id_participante') : $id_participante), 'Editar');
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if(!$this->input->post('nombre'))
		{
			$this->datos_formulario->id_participante=$id_participante;
			$jugador = $this->Participante_model->consulta($id_participante, NULL, NULL);
			$this->datos_formulario->apellido = $jugador->apellido;
			$this->datos_formulario->nombre = $jugador->nombre;
			$this->datos_formulario->nro_doc = $jugador->nro_doc;	
			$this->datos_formulario->fecha_nacimiento = $jugador->fecha_nacimiento;
			$this->datos_formulario->nacionalidad = $jugador->nacionalidad;
			$this->datos_formulario->conyuge_nombre = $jugador->conyuge_nombre;
			$this->datos_formulario->cobertura_medica = $jugador->cobertura_medica;
			
			//$this->_obtener_combo_modalidad($this->datos_formulario->id_tipo_modalidad);
		}
		else
		{
			$this->_setear_reglas();
			$torneo = new stdClass();
			if($this->form_validation->run() == FALSE)
			{
				$this->variables['mensaje']= validation_errors();
			}
			else if($this->Participante_model->editar($this->_obtener_post($this->datos_formulario->id_participante))['resultado']='OK')
			{
				$this->variables['mensaje'] = lang('message_guardar_cambios_ok');
			}
			else
			{
				$this->variables['mensaje'] = lang('message_guardar_error');;
			}
			//$this->_obtener_combo_modalidad($this->datos_formulario->id_tipo_modalidad);
		}
		$this->_renderizar_jugadores();
		$this->load->view('jugadores/principal_jugador', $this->variables);
		$this->load->view('jugadores/datos_jugador', $this->variables);
		$this->load->view('templates/footer');
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
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->apellido= '';
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->nro_doc = '';
		$this->datos_formulario->fecha_nacimiento = '';
		$this->datos_formulario->nacionalidad = '';
		$this->datos_formulario->conyuge_nombre = '';
		$this->datos_formulario->cobertura_medica = '';
		$this->datos_formulario->trayectoria = '';
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
	
	private function _renderizar_jugadores()
	{
		$jugadores = $this->Participante_model->consulta(NULL, NULL, 1);
		$link_jugador = site_url('jugador/editar');
		$html = '';
		foreach ($jugadores as $i)
		{
			$link_jugador = $link_jugador . '/' . $i['id_participante'];
			$html = $html . '<div class="form-group col-md-4"><a href="' . $link_jugador . '" class="btn btn-link">' . $i['nombre'] . '</a></div>';
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
		$equipos = $this->Equipo_model->consulta(NULL, 1);  //@todo 
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
	
	
	
}