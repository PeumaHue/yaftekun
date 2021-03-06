<?php
class Torneo_model extends CI_Model {
	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 				= 'call torneo_consulta(?, ?, ?, ?, ?)';
	private $sp_alta 					= 'call torneo_alta(?, ?, ?, ?, ?, ?, ?)';
	private $sp_editar 					= 'call torneo_editar(?, ?, ?, ?, ?, ?)';
	private $sp_baja 					= 'call torneo_baja(?)';
	private $sp_consulta_tipo_modalidad = 'call tipo_modalidad_consulta()';
	private $sp_obtener_equipos         = 'call torneo_obtener_equipo(?,?,?)';
	private $sp_configurar_y_armar_fixture  = 'call torneo_configurar_desde_plantilla(?,?,?)';
	private $sp_armar_fixture  			= 'call armar_fixture(?)';
	
	/**
	 * Variables para los atributos del modelo
	 * @var string
	 */
	public $id_torneo;
	public $id_liga;
	public $anio;
	public $id_tipo_modalidad;
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
	public function consulta($id_torneo=NULL, $anio = NULL, $nombre = NULL)
	{
		$query = $this->db->query($this->sp_consulta, array('id_torneo' => $id_torneo, 'anio' => $anio, 'nombre' => $nombre ,'row_count'=>NULL, 'offset'=>NULL));
		if($id_torneo)
		{
			if ($query->num_rows() > 0) {
				$row=$query->row_array();
				$this->id_liga=$row['id_liga'];
				$this->id_torneo=$row['id_torneo'];
				$this->id_tipo_modalidad=$row['id_tipo_modalidad'];
				$this->anio=$row['anio'];
				$this->nombre=$row['nombre'];
				$this->cantidad_equipos=$row['cantidad_equipos'];
				$this->id_usuario=$row['id_usuario'];
				$this->fecha_creacion=$row['fecha_creacion'];
				
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
						'id_tipo_modalidad'	=> $torneo->id_tipo_modalidad,
						'nombre' 			=> $torneo->nombre, 
						'cantidad_equipos' 	=> $torneo->cantidad_equipos,
						'id_usuario'		=>$torneo->id_usuario,
						'id_pla_torneo'		=>1  //@todo
				));
				
		if( $query	)
		{	
			if($query->row_array()["id_torneo"] == 0)
			{
				$resultado['resultado']='ERROR';
			}
			else{
				$resultado['resultado']='OK';
				$resultado['id']=$query->row_array()["id_torneo"];
			}
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
						'id_tipo_modalidad'		=> $torneo->id_tipo_modalidad,
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
	
	/**
	 * Consulta los tipos de modalidades de torneo
	 * @return	array Devuelve un array con los tipos de modalidad
	 */
	public function consulta_tipo_modalidad()
	{
		$query = $this->db->query($this->sp_consulta_tipo_modalidad);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta de equipos por torneo
	 * @param 		integer 	$id_torneo
	 * @param 		string   	$nombre_equipo
	 * @return 		array       Retorna un array.
	 */
	public function obtener_equipos($id_torneo=NULL, $nombre_equipo='', $nombre_equipo_libre='')
	{
		$query = $this->db->query($this->sp_obtener_equipos, array('id_torneo' => $id_torneo, 'NombreEquipo' => $nombre_equipo, 'NombreEquipoL' => $nombre_equipo_libre));
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * configura el torneo para poder generar el fixture
	 * @param 		integer(64) 	$id_torneo
	 * @param 		integer   	$cant_participantes
	 * @param 		integer   	$id_pla_torneo
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function configurar_desde_plantilla_y_armar_fixture($id_torneo, $cant_participantes=0, $id_pla_torneo=1)
	{
		$query = $this->db->query($this->$sp_configurar_y_armar_fixture,
				array(
						'id_torneo' 			=> $id_torneo,
						'cant_participantes' 	=> $cant_participantes,
						'id_pla_torneo'	=> $id_pla_torneo
				));
	
		if( $query	)
		{
			
			$query = $this->db->query($this->$sp_armar_fixture,
					array(
							'id_torneo' 			=> $id_torneo
					));
			if( $query	)
			{
				$resultado['resultado']='OK';
			}
			else{
				$resultado['resultado']='ERROR';
			}

		}
		else{
			$resultado['resultado']='ERROR';
		}
	
		if (mysqli_more_results($this->db->conn_id)) {
			mysqli_next_result($this->db->conn_id);
		}
		return $resultado;
	}
}