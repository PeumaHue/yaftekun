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
		$this->load->model('Calendario_model');
		$this->load->model('Equipo_model');
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
		$this->variables['html_datos_ppal'] =_renderizar_datos_link(array("ruta"=>'torneo/editar', "campoID"=>'id_torneo',"camposMostrar"=>array('id_torneo','nombre'),"datos"=>$this->Torneo_model->consulta(NULL, $fecha['year'])));
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
		$fixture = new stdClass();

		$fixture = $this->Calendario_model->fixture_consulta($id_torneo);
		$datos_torneo = $this->Torneo_model->consulta($id_torneo);
		
		if(is_object($datos_torneo))
		{
			$array['torneo'] = get_object_vars($datos_torneo);
			$datos_torneo = $array;
		}
		
		$datos_torneo['fixture']=$fixture;
		
		$this->_renderizar_tabla(NULL, $fixture);
		
		
		$this->_setear_variables('', '', site_url('torneo/editar'), '', site_url('torneo'), site_url('torneo/baja') . '/' . ($id_torneo==NULL ? $this->input->post('id_torneo') : $id_torneo), 'Editar');
		$this->variables['modalidades']=_obtener_array_asociativo(array("datos"=>$this->Torneo_model->consulta_tipo_modalidad(), "campo_clave"=>'id_tipo_modalidad', "campo_descripcion"=>'descripcion', "cadena_sin_seleccion"=>'form_label_modalidad_juego'));
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if (!($this->input->method()=='post'))
		{
			$this->_cargar_datos_formulario($datos_torneo);
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
		if (is_array($objeto))
		{
			if (isset($objeto['torneo']))
				
			$this->datos_formulario->id_torneo= isset($objeto->id_torneo) ? $objeto->id_torneo : '';
			$this->datos_formulario->nombre = isset($objeto['torneo']['nombre']) ? $objeto['torneo']['nombre'] : '';
			$this->datos_formulario->cantidad_equipos = isset($objeto['torneo']['cantidad_equipos']) ? $objeto['torneo']['cantidad_equipos'] : '';
			$this->datos_formulario->id_tipo_modalidad = isset($objeto['torneo']['id_tipo_modalidad']) ? $objeto['torneo']['id_tipo_modalidad'] : '';
			$this->datos_formulario->id_liga = isset($objeto['torneo']['id_liga']) ? $objeto['torneo']['id_liga'] : '';
			$this->datos_formulario->id_usuario = isset($objeto['torneo']['id_usuario']) ? $objeto['torneo']['id_usuario'] : '';
			$this->datos_formulario->anio = isset($objeto['torneo']['anio']) ? $objeto['torneo']['anio'] : '';
		}
		else{
			$this->datos_formulario->id_torneo= isset($objeto->id_torneo) ? $objeto->id_torneo : '';
			$this->datos_formulario->nombre = isset($objeto->nombre) ? $objeto->nombre : '';
			$this->datos_formulario->cantidad_equipos = isset($objeto->cantidad_equipos) ? $objeto->cantidad_equipos : '';
			$this->datos_formulario->id_tipo_modalidad = isset($objeto->id_tipo_modalidad) ? $objeto->id_tipo_modalidad : '';
			$this->datos_formulario->id_liga = isset($objeto->id_liga) ? $objeto->id_liga : '';
			$this->datos_formulario->id_usuario = isset($objeto->id_usuario) ? $objeto->id_usuario : '';
			$this->datos_formulario->anio = isset($objeto->anio) ? $objeto->anio : '';
		}
	}

	/**
	 * Renderiza una tabla en base a un template HTML y un object|array
	 * @param		string		$template
	 * @param		mixed 		object|array Puede recibir un objeto de una persona o un array de varias
	 * @return		void
	 */
	private function _renderizar_tabla($template=NULL, $datos)
	{
		$equipos_en_torneo=$this->Torneo_model->obtener_equipos(75, null);
		$equipos_en_liga=_obtener_array_asociativo(array("datos"=>$this->Equipo_model->consulta(NULL, 1, NULL), "campo_clave"=>'id_equipo', "campo_descripcion"=>'nombre'));
		$equipos=_obtener_array_asociativo(array("datos"=>$equipos_en_torneo, "campo_clave"=>'numero', "campo_descripcion"=>'numero')); //@todo
		
		//$equipos=_obtener_array_asociativo(array("datos"=>$this->Torneo_model->obtener_equipos(75, null), "campo_clave"=>'numero', "campo_descripcion"=>'numero')); //@todo
		
		//Si los datos a renderizar son un objeto, es porque vino un único registro, se convierte a array para poder iterar el el foreach de mas abajo
		if(is_object($datos))
		{
			$array[0] = get_object_vars($datos);
			$datos = $array;
		}
		
		//EQUIPOS
		$template = isset($template) ? $template : array('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-striped">');
		$this->load->library('table');
		$this->table->set_template($template);
		$this->table->set_heading('Número', 'Equipo');
		foreach ($equipos_en_torneo as $row)
		{
			$this->table->add_row($row['numero'],
					              form_dropdown('cboEquipo'.$row['numero'], $equipos_en_liga, $row['descripcion'], 'class="form-control"'));
		}
		$this->table->add_row('<td colspan=5>Separador</td>');
		$this->variables['tabla_equipos'] = $this->table->generate();
		
		//FIXTURE
		$template = isset($template) ? $template : array('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-striped">');
		$this->load->library('table');
		$this->table->set_template($template);
		$this->table->set_heading('Jornada', 'Fecha del evento', 'Encuentro');
		$contador=1;
		foreach ($datos as $fixture)
		{
			if ($fixture['nro_fecha'] != $contador)
			{
				$this->table->add_row('<td colspan=5>Separador</td>');
				$contador += 1;
			}	
			$this->table->add_row($fixture['nro_fecha'], $fixture['fecha_evento'],
					form_dropdown('cboEquipoA'.$fixture['id_encuentro'], $equipos, $fixture['id_equipoa'], 'class="form-control"'),
					'vs',
					form_dropdown('cboEquipoB'.$fixture['id_encuentro'], $equipos, $fixture['id_equipob'], 'class="form-control"'),
					form_hidden('id_encuentro'.$fixture['id_encuentro'], $fixture['id_encuentro'])
					);
		}
		$this->table->add_row('<td colspan=5>Separador</td>');
		$this->variables['tabla_fixture'] = $this->table->generate();
	}

}