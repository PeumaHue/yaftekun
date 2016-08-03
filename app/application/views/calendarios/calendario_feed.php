<?php

$this->load->model('Calendario_model');
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
			'id'    => (int) $Item->id_encuentro,
			'title' => "Partido",
			'start' => $Item->fechaevento,
			'end'   => $Item->fechaevento
	);
endforeach;

$eventList[] ='<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">\n';
$eventList[] ='<channel>\n';

echo json_encode($eventList);

?>