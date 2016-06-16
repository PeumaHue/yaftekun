<?php




class Equipo_model extends CI_Model {

	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	= 'call equipo_consulta(?, ?, ?, ?, ?)';
	private $sp_alta 		= 'call equipo_alta(?, ?, ?, ?, ?)';
	private $sp_editar 		= 'call equipo_editar(?, ?, ?, ?, ?, ?)';
	private $sp_baja 		= 'call equipo_baja(?)';
	private $sp_ligas		= 'call liga_consulta(?)';
	private $sp_estadios	= 'call estadio_consulta()';
	
	/**
	 * Variables para los atributos del modelo
	 * @var bigint
	*/
	public $id_equipo;
	/**
	 * Variables para los atributos del modelo
	 * @var bigint
	 */
	public $id_liga;
	/**
	 * Variables para los atributos del modelo
	 * @var varchar(100)
	 */
	public $nombre;
	/**
	 * Variables para los atributos del modelo
	 * @var bigint
	 */
	public $id_estadio;
	/**
	 * Variables para los atributos del modelo
	 * @var bigint
	 */
	public $id_usuario;
	/**
	 * Variables para los atributos del modelo
	 * @var datetime
	*/
	public $fecha_creacion;
	/**
	 * Variables para los atributos del modelo
	 * @var mediumblob
	*/
	public $imagen;


	
	
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
	public function consulta($id_equipo, $id_liga, $nombre)
	{
		$query = $this->db->query($this->sp_consulta, array('id_equipo' => $id_equipo, 'id_liga' => $id_liga, 'nombre' => $nombre, 'row_count'=>NULL, 'offset'=>NULL ));

		if($id_equipo)
		{
			if ($query->num_rows() > 0) {
				$row=$query->row_array();
				$this->id_equipo	=$row["id_equipo"];
				$this->id_liga		=$row["id_liga"];
				$this->nombre		=$row["nombre"];
				$this->id_estadio	=$row["id_estadio"];
				$this->id_usuario	=$row["id_usuario"];
				$this->fecha_creacion	=$row["fecha_creacion"];
				$this->imagen		=$row["imagen"];

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
	 * Alta de equipo
	 * @param		object	$equipo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	
	public function alta($equipo)
	{
		#try {
			$query = $this->db->query($this->sp_alta,
					array(
							'id_liga' 		=> $equipo->id_liga,
							'nombre' 		=> $equipo->nombre,
							'id_estadio' 	=> $equipo->id_estadio,
							'id_usuario' 	=> $equipo->id_usuario,
							#'fecha_creacion_IN' => $equipo->fecha_creacion,
							'imagen'			=>$equipo->imagen
					));
			
			if( $query )
			{
				$resultado['resultado']='OK';
				$resultado['id']=$query->row_array()["id"];
			}
			else{
				$resultado['resultado']='ERROR';
			}
				
		#}
		
		#catch (Exception $ex)
		#{
		#	$resultado['resultado']='ERROR';
		#}
		
		#finally
		#{
			if (mysqli_more_results($this->db->conn_id)) {
				mysqli_next_result($this->db->conn_id);
			}
			return $resultado;
		#}
		
	}

	/**
	 * Edicion de persona
	 * @param		object	$equipo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function editar($equipo)
	{
		if($this->db->query($this->sp_editar,
								array(
										'id_equipo'	=> $equipo->id_equipo,
										'id_liga'	=> $equipo->id_liga,
										'nombre'	 	=> $equipo->nombre,
										'id_estadio'	=> $equipo->id_estadio,
										'id_usuario'	=> $equipo->id_usuario,
										'imagen'	 	=> $equipo->imagen
								)
							)
							)
		{
			$resultado['resultado']='OK';
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
	 * Baja de torneo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function baja($equipo)
	{
		if($query = $this->db->query($this->sp_baja, array('id_equipo' => $equipo->id_equipo))) {
			$resultado['resultado']='OK';
		}
		else{
			$resultado['resultado']='ERROR';
		}
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $resultado;
	}
	
	public function obtener_ligas(){
		$query = $this->db->query($this->sp_ligas, array('id_liga' => NULL));
		
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	public function obtener_estadios(){
		$query = $this->db->query($this->sp_estadios);
	
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}

	
	
}