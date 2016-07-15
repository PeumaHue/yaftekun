<?php
class Calendario_model extends CI_Model {

	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	= 'call calendario_consulta()';
	private $sp_alta 		= '';
	private $sp_editar 		= '';
	private $sp_baja 		= '';
	private $sp_ligas		= '';
	private $sp_estadios	= '';
	
		
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Consulta de equipos
	 *
	 * Consulta de torneos por ID o por Anio
	 * @param 		bigint 	$id_equipo
	 * @param 		bigint 	$id_liga
	 * @return 		mixed 		object|array Si se consulta para clave primaria retorna un objeto.  Caso contrario retorna un array.
	 */
	public function consulta()
	{
		$query = $this->db->query($this->sp_consulta);

		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}



}