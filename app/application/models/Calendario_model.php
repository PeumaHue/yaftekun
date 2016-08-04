<?php
class Calendario_model extends CI_Model {

	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	     = 'call calendario_consulta()';
	private $sp_consulta_fixture = 'call fixture_consulta(?)';
	private $sp_alta 		     = '';
	private $sp_editar 		     = 'call calendario_edita_fecha(?, ?)';
	private $sp_baja      		 = '';
	private $sp_ligas	  	     = '';
	private $sp_estadios	     = '';
	
	public $id_encuentro;
	public $id_torneo;
	public $id_ronda;
	public $id_sede;
	public $id_grupo;
	public $id_equipoa;
	public $id_equipob;
	public $fecha_evento;
	public $nro_fecha;
	public $tantosa;
	public $tantosb;
	
		
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
	
	/**
	 * Consulta de fixture
	 *
	 * Consulta de fixture por torneo 
	 * @param 		bigint 	$id_torneo
	 * @return 		object  Retorna un array.
	 */
	public function fixture_consulta($id_torneo=NULL)
	{
		$query = $this->db->query($this->sp_consulta_fixture, array('id_torneo' => $id_torneo));
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}

	public function editafecha($idevento, $fecha)
	{
		if ($this->db->query($this->sp_editar, array('id_encuentro_IN' => $idevento, 'fechaevento_IN' => $fecha)))
		//if ($this->db->query($this->sp_editar))
		{
			$resultado['resultado']='OK';
		}
		else{
			$resultado['resultado']='ERROR';
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
	}

}