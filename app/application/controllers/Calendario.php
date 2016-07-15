<?php
class Calendario extends CI_Controller {

	/**
	 * Array para guardar todas las variables de la pagina
	 * @var array
	 */
	private $variables;




	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
				
		$this->variables['includes']='<link rel="stylesheet" href="'.base_url('assets/fullcalendar-2.9.0/fullcalendar.css').'" />';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('assets/fullcalendar-2.9.0/lib/jquery.min.js').'"></script>';
		$this->variables['includes']=$this->variables['includes'].'<script src="'.base_url('assets/fullcalendar-2.9.0/lib/moment.min.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('assets/fullcalendar-2.9.0/fullcalendar.js').'"></script>';
		$this->variables['includes']= $this->variables['includes'].'<script src="'.base_url('js/valida_calendario.js').'"></script>';
				
	}

	public function index() {

		$msj = isset($this->variables['mensaje']) ? $this->variables['mensaje'] : '';
		$this->_setear_variables('', $msj, site_url('equipo'), site_url('equipo'), '', '');
			

		$this->load->view('templates/header', $this->variables);
		$this->load->view('calendario/principal_calendario', $this->variables);
		$this->load->view('calendario/calendario', $this->variables);
		if ($msj!='') {
			$this->load->view('calendario/mensajes_calendario',$this->variables);
		}
		$this->load->view('templates/footer');
	}
	
	public function reasignarfecha($idEncuentro, $fecha) {
		
		$this->load->model('Calendario_model');
		$this->Calendario_model->editafecha($idEncuentro, $fecha);
		$this->Index();
	}



	
	
	private function _setear_variables($titulo=NULL, $mensaje=NULL, $accion=NULL, $cancelar=NULL, $volver=NULL, $eliminar=NULL)
	{
		$this->variables['accion'] 		= $accion;
		$this->variables['mensaje'] 	= $mensaje;
		$this->variables['cancelar'] 	= $cancelar;
		$this->variables['volver'] 		= $volver;
		$this->variables['eliminar']	= $eliminar;
		$this->variables['busqueda']	='';
		if (!isset($this->variables['reset']))
		{
			$this->variables['reset']=false;
		}
	}
}