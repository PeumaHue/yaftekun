<?php
class Calendario_feed extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('url');
		$this->load->model('Calendario_model');
	}
	
	public function index() {
	
		$Items = $this->Calendario_model->consulta();
		
		$eventList = array();            // Assemble list of all events here
		
		
		$eventList[] ='<?xml version="1.0" encoding="UTF-8" ?>';
		$eventList[] ='<rss version="2.0">';
		
		$eventList[] ='<channel>';
		$eventList[] ='<title>Fechas Yaftekun Torneo Actual</title>';
		$eventList[] ='<link>http://www.Yaftekun.com</link>';
		$eventList[] ='<description>Almanaque torneo señor oficial</description>';
		
		foreach($Items as $Item):
			$eventList[] = array(             
					'id'    => (int) $Item['id_encuentro'],
					'title' => "Partido",
					'start' => $Item['fechaevento'],
					'end'   => $Item['fechaevento']
			);
		endforeach;
		
		
		$eventList[] ='</channel>\n';
		$eventList[] ='</rss>';
		echo json_encode($eventList);
	}
}
	?>