<?php
class Torneo_model extends CI_Model {

	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	= 'call torneo_consulta(?, ?)';
	private $sp_alta 		= 'call torneo_alta(?, ?, ?, ?, ?)';
	private $sp_editar 		= 'call torneo_editar(?, ?, ?, ?, ?)';
	private $sp_baja 		= 'call torneo_baja(?)';
	
	/**
	 * Variables para los atributos del modelo
	 * @var string
	 */
	public $id_torneo;
	public $id_liga;
	public $anio;
	public $nombre;
	public $cantidad_equipos;
	public $id_usuario;
	public $fecha_creacion;	
	
	
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * Consulta de torneo
	 * 
	 * Consulta de torneos por ID o por Anio
	 * @param 		integer 	$id_torneo
	 * @param 		integer 	$anio
	 * @return 		mixed 		object|array Si se consulta para clave primaria retorna un objeto.  Caso contrario retorna un array.
	 */
	public function consulta($id_torneo=NULL, $anio = NULL)
	{
		$query = $this->db->query($this->sp_consulta, array('id_torneo' => $id_torneo, 'anio' => $anio ));
		if($id_torneo)
		{
			if ($query->num_rows() > 0) {
				$row=$query->row_array();
				$this->id_liga=$row["id_liga"];
				$this->id_toneo=$row["id_torneo"];
				$this->anio=$row["anio"];
				$this->nombre=$row["nombre"];
				$this->cantidad_equipos=$row["cantidad_equipos"];
				$this->id_usuario=$row["id_usuario"];
				$this->fecha_creacion=$row["fecha_creacion"];
				
			}
			if (mysqli_more_results($this->db->conn_id)) {
				mysqli_next_result($this->db->conn_id);
			}
			return $this;
		}
		else
		{
			if (mysqli_more_results($this->db->conn_id)) {
				mysqli_next_result($this->db->conn_id);
			}
			return $query->result_array();
		}

	}
	
	/**
	 * Alta de torneo
	 * @param		object	$torneo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function alta($torneo)
	{	
		$query = $this->db->query($this->sp_alta, 
				array(
						'id_liga' 			=> $torneo->id_liga, 
						'anio' 				=> $torneo->anio, 
						'nombre' 			=> $torneo->nombre, 
						'cantidad_equipos' 	=> $torneo->cantidad_equipos,
						'id_usuario'		=>$torneo->id_usuario
				));
				
		if( $query	)
		{	
			$resultado['resultado']='OK';
			$resultado['id']=$query->row_array()["id_torneo"];
		}	
		else{
			$resultado['resultado']='ERROR';
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $resultado;
	}
	
	/**
	 * Edicion de persona
	 * @param		object	$torneo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function editar($torneo)
	{
		if($this->db->query($this->sp_editar, 
				array(
						'id_torneo' 			=> $torneo->id_torneo, 
						'anio' 					=> $torneo->anio, 
						'nombre' 				=> $torneo->nombre, 
						'cantidad_equipos' 		=> $torneo->cantidad_equipos,
						'id_usuario'			=> $torneo->id_usuario
				))
				)
			$resultado['resultado']='OK';
		else{
			$resultado['resultado']='ERROR';
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $resultado;
	}
	
	/**
	 * Baja de torneo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function baja($torneo)
	{
		if($query = $this->db->query($this->sp_baja, array('id_torneo' => $torneo->id_torneo)))
			$resultado['resultado']='OK';
		else{
			$resultado['resultado']='ERROR';
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $resultado;
	}
}