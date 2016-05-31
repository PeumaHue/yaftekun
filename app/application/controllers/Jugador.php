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
		$this->datos_formulario = new stdClass();//Instancio una clase vacia para evitar el warning "Creating default object from empty value"
		$this->variables['includes']='<script src="'.base_url('js/bootstrapValidator.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_torneo.js').'"></script>';
		$this->variables['accion'] = site_url('Jugador/alta');
		
		
		$this->variables['id_torneo'] = '';
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
		$this->_setear_variables('', '', site_url('jugador/alta'), site_url('jugador'), '', '');
		//$this->_obtener_combo_modalidad();
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
		$this->_setear_variables('', '', site_url('jugador/editar'), site_url('jugador'), '', site_url('jugador/baja') . '/' . ($id_participante==NULL ? $this->input->post('id_participante') : $id_participante));
		//Si no es un post, no se llama al editar y solo se muestran los campos para editar
		if(!$this->input->post('nombre'))
		{
			$this->datos_formulario->id_participante=$id_participante;
			$jugador = $this->Participante_model->consulta($id_participante);
			$this->datos_formulario->nombre = $jugador->nombre;
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
			else if($this->Torneo_model->editar($this->_obtener_post($this->datos_formulario->id_torneo))['resultado']='OK')
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
	 * Funcion que limpia los campos del formulario
	 * @return void
	 */
	private function _setear_campos()
	{
		$this->datos_formulario->id_torneo = '';
		$this->datos_formulario->nombre = '';
		$this->datos_formulario->cantidad_equipos = '';
		$this->datos_formulario->id_tipo_modalidad = '';
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