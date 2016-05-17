<?php
class Tablero_inicial_model extends CI_Model {
	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	= 'CALL resumen_consulta()';

	
	/**
	 * Variables para los atributos del modelo
	 * @var string
	 */
	public $total_torneo; 
	public $total_equipo;
	public $total_jugador; 
	public $total_dt;
	public $total_arbitros;
	public $total_delegados;
	
	
	
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * Consulta de tablero
	 * @return 		object con las cantidades de cada tipo de objeto.
	 */
	public function consulta()
	{
		$query = $this->db->query($this->sp_consulta);
		
		if ($query->num_rows() > 0) {
			$row=$query->row_array();
			$this->total_torneo 	=$row["total_torneo"]; 	
			$this->total_equipo	=$row["total_equipo"];
			$this->total_jugador 	=$row["total_jugador"]; 
			$this->total_dt		=$row["total_dt"];
			$this->total_arbitros	=$row["total_arbitros"];
			$this->total_delegados	=$row["total_delegados"];
		}
		else{
			$this->total_torneo 	="0";
			$this->total_equipo	="0";
			$this->total_jugador 	="0";
			$this->total_dt		="0";
			$this->total_arbitros	="0";
			$this->total_delegados	="0";
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $this;
		
	
	}
}