<?php
class Participante_model extends CI_Model {

	/**
	 * Variables para los stored procedures usados por el modelo
	 * @var string
	 */
	private $sp_consulta 	= 'call participante_consulta(?, ?, ?, ?, ?, ?)';
	private $sp_alta 		= 'call participante_alta(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	private $sp_editar 		= 'call participante_editar(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	private $sp_baja 		= 'call participante_baja(?, ?)';
	private $sp_consulta_tipos_de_participantes = 'call tipo_participante_consulta()';
	private $sp_consulta_tipos_de_estados_de_participantes = 'call tipo_estado_jugador_consulta()';
	private $sp_consulta_tipos_de_estados_civiles_de_participantes = 'call tipo_estado_civil_consulta()';
	private $sp_consulta_tipos_de_documentos_de_participantes = 'call tipo_documento_consulta()';
	private $sp_consulta_provincias = 'call tipo_provincia_consulta()';
	private $sp_consulta_tipos_de_posiciones_juego = 'call tipo_posicion_juego_consulta()';
	
	/**
	 * Variables para los atributos del modelo
	 * @var string
	 */
	public $id_participante;
	public $id_tipo_participante;
	public $nombre_archivo_foto;
	public $nombre;
	public $apellido;
	public $numero_camiseta;
	public $id_tipo_posicion_juego;
	public $id_tipo_estado_jugador;
	public $numero_carnet_socio;
	public $id_equipo;
	public $trayectoria;
	public $telefono;
	public $telefono_celular;
	public $telefono_radio;
	public $email;
	public $fecha_nacimiento;
	public $calle;
	public $piso;
	public $numero;
	public $depto;
	public $codpostal;
	public $id_provincia;
	public $localidad;
	public $nacionalidad;
	public $id_estado_civil;
	public $conyuge_nombre;
	public $id_tipo_doc;
	public $nro_doc;
	public $cobertura_medica;
	public $fecha_apto_medico;
	public $nombre_archivo_apto_medico;
	public $id_usuario;
	
	public $imagen;
	
	
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * Consulta de participante
	 * 
	 * Consulta de participante por ID o por Equipo
	 * @param 		integer 	$id_participante
	 * @param 		integer 	$id_equipo
	 * @param       integer     $id_tipo_participante
	 * @param       varchar     $apellido
	 * @return 		mixed 		object|array Si se consulta para clave primaria retorna un objeto.  Caso contrario retorna un array.
	 */
	public function consulta($id_participante=NULL, $id_equipo = NULL, $id_tipo_participante = NULL, $apellido = NULL)
	{
		$query = $this->db->query($this->sp_consulta, array('id_participante' => $id_participante, 'id_equipo' => $id_equipo, 'id_tipo_participante' => $id_tipo_participante, 'apellido' => $apellido, 'row_count' => NULL, 'offset' => NULL));
		if($id_participante)
		{
			if ($query->num_rows() > 0) 
			{
				$row=$query->row_array();
				$this->id_participante=$row["id_participante"];
				$this->id_tipo_participante=$row["id_tipo_participante"];
				$this->id_equipo=$row["id_equipo"];
				$this->nombre_archivo_foto=$row["nombre_archivo_foto"];
				$this->nombre=$row["nombre"];
				$this->apellido=$row["apellido"];
				$this->numero_camiseta=$row["numero_camiseta"];
				$this->id_tipo_posicion_juego=$row["id_tipo_posicion_juego"];
				$this->id_tipo_estado_jugador=$row["id_tipo_estado_jugador"];
				$this->numero_carnet_socio=$row["numero_carnet_socio"];
				$this->trayectoria=$row["trayectoria"];
				$this->telefono=$row["telefono"];
				$this->telefono_celular=$row["telefono_celular"];
				$this->telefono_radio=$row["telefono_radio"];
				$this->email=$row["email"];
				$this->fecha_nacimiento=$row["fecha_nacimiento"];
				$this->calle=$row["calle"];
				$this->piso=$row["piso"];
				$this->numero=$row["numero"];
				$this->depto=$row["depto"];
				$this->codpostal=$row["codpostal"];
				$this->id_provincia=$row["id_provincia"];
				$this->localidad=$row["localidad"];
				$this->nacionalidad=$row["nacionalidad"];
				$this->id_estado_civil=$row["id_estado_civil"];
				$this->conyuge_nombre=$row["conyuge_nombre"];
				$this->id_tipo_doc=$row["id_tipo_doc"];
				$this->nro_doc=$row["nro_doc"];
				$this->cobertura_medica=$row["cobertura_medica"];
				$this->fecha_apto_medico=$row["fecha_apto_medico"];
				$this->nombre_archivo_apto_medico=$row["nombre_archivo_apto_medico"];
				$this->fecha_creacion=$row["fecha_creacion"];
				$this->id_usuario=$row["id_usuario"];
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
	 * Alta de participante
	 * @param		object	$participante
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function alta($participante)
	{	
		$query = $this->db->query($this->sp_alta, 
				array(
						'id_tipo_participante'	       =>$participante->id_tipo_participante,
						'nombre_archivo_foto'          =>$participante->nombre_archivo_foto,
						'nombre'				       =>$participante->nombre,
						'apellido'				       =>$participante->apellido,
						'numero_camiseta'		       =>$participante->numero_camiseta,
						'id_tipo_posicion_juego'       =>$participante->id_tipo_posicion_juego,
						'id_tipo_estado_jugador'       =>$participante->id_tipo_estado_jugador,
						'numero_carnet_socio'	       =>$participante->numero_carnet_socio,
						'id_equipo'				       =>$participante->id_equipo,
						'trayectoria'			       =>$participante->trayectoria,
						'telefono'				       =>$participante->telefono,
						'telefono_celular'		       =>$participante->telefono_celular,
						'telefono_radio'		       =>$participante->telefono_radio,
						'email'					       =>$participante->email,
						'fecha_nacimiento'		       =>$participante->fecha_nacimiento,
						'calle'					       =>$participante->calle,
						'piso'					       =>$participante->piso,
						'numero'				       =>$participante->numero,
						'depto'					       =>$participante->depto,
						'codpostal'				       =>$participante->codpostal,
						'id_provincia'			       =>$participante->id_provincia,
						'localidad'				       =>$participante->localidad,
						'nacionalidad'			       =>$participante->nacionalidad,
						'id_estado_civil'		       =>$participante->id_estado_civil,
						'conyuge_nombre'		       =>$participante->conyuge_nombre,
						'id_tipo_doc'			       =>$participante->id_tipo_doc,
						'nro_doc'				       =>$participante->nro_doc,
						'cobertura_medica'		       =>$participante->cobertura_medica,
						'fecha_apto_medico'            =>$participante->fecha_apto_medico,
						'nombre_archivo_apto_medico'   =>$participante->nombre_archivo_apto_medico,
						'id_usuario'			       =>$participante->id_usuario
				));
				
		if( $query	)
		{	
			$resultado['resultado']='OK';
			$resultado['id']=$query->row_array()["id_participante"];
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
	 * Edicion de participante
	 * @param		object	$participante
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function editar($participante)
	{
		if($this->db->query($this->sp_editar, 
				array(
						'id_participante'            =>$participante->id_participante,
						'id_tipo_participante'	     =>$participante->id_tipo_participante,
						'nombre_archivo_foto'        =>$participante->nombre_archivo_foto,
						'nombre'				     =>$participante->nombre,
						'apellido'				     =>$participante->apellido,
						'numero_camiseta'		     =>$participante->numero_camiseta,
						'id_tipo_posicion_juego'     =>$participante->id_tipo_posicion_juego,
						'id_tipo_estado_jugador'     =>$participante->id_tipo_estado_jugador,
						'numero_carnet_socio'	     =>$participante->numero_carnet_socio,
						'id_equipo'                  =>$participante->id_equipo,
						'trayectoria'			     =>$participante->trayectoria,
						'telefono'			    	 =>$participante->telefono,
						'telefono_celular'		     =>$participante->telefono_celular,
						'telefono_radio'		     =>$participante->telefono_radio,
						'email'					     =>$participante->email,
						'fecha_nacimiento'		     =>$participante->fecha_nacimiento,
						'calle'					     =>$participante->calle,
						'piso'					     =>$participante->piso,
						'numero'				     =>$participante->numero,
						'depto'					     =>$participante->depto,
						'codpostal'				     =>$participante->codpostal,
						'id_provincia'			     =>$participante->id_provincia,
						'localidad'				     =>$participante->localidad,
						'nacionalidad'			     =>$participante->nacionalidad,
						'id_estado_civil'		     =>$participante->id_estado_civil,
						'conyuge_nombre'		     =>$participante->conyuge_nombre,
						'id_tipo_doc'			     =>$participante->id_tipo_doc,
						'nro_doc'				     =>$participante->nro_doc,
						'cobertura_medica'    	 	 =>$participante->cobertura_medica,
						'fecha_apto_medico'          =>$participante->fecha_apto_medico,
						'nombre_archivo_apto_medico' =>$participante->nombre_archivo_apto_medico,
						'id_usuario'			     =>$participante->id_usuario
				))
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
	 * Baja de participante
	 * @return 		array Devuelve un array con la la clave 'resultado', OK en caso de alta exitosa y sino ERROR
	 */
	public function baja($id_participante, $quitar_de_equipo=TRUE)
	{
		if($query = $this->db->query($this->sp_baja, array('id_participante' => $id_participante, 'quitar_de_equipo' => $quitar_de_equipo))){
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
	 * Consulta los tipos de participantes de torneo
	 * @return	array Devuelve un array con los tipos de participantes
	 */
	public function consulta_tipos_de_participantes()
	{
		$query = $this->db->query($this->sp_consulta_tipos_de_participantes);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta los tipos de estados de los participantes
	 * @return	array Devuelve un array con los posibles tipos de estados de los participantes
	 */
	public function consulta_tipos_de_estados_de_participantes()
	{
		$query = $this->db->query($this->sp_consulta_tipos_de_estados_de_participantes);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta los tipos de estados civiles de los participantes
	 * @return	array Devuelve un array con los posibles tipos de estados civiles de los participantes
	 */
	public function consulta_tipos_de_estados_civiles_de_participantes()
	{
		$query = $this->db->query($this->sp_consulta_tipos_de_estados_civiles_de_participantes);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta los tipos de documentos de los participantes
	 * @return	array Devuelve un array con los posibles tipos de documentos de los participantes
	 */
	public function consulta_tipos_de_documentos_de_participantes()
	{
		$query = $this->db->query($this->sp_consulta_tipos_de_documentos_de_participantes);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta las provincias
	 * @return	array Devuelve un array con las provincias
	 */
	public function consulta_provincias()
	{
		$query = $this->db->query($this->sp_consulta_provincias);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	/**
	 * Consulta las tipos de posiciones de juego de los jugadores
	 * @return	array Devuelve un array con los tipos de posiciones de juego
	 */
	public function consulta_tipos_de_posiciones_de_juego()
	{
		$query = $this->db->query($this->sp_consulta_tipos_de_posiciones_juego);
		if (mysqli_more_results($this->db->conn_id))
		{
			mysqli_next_result($this->db->conn_id);
		}
		return $query->result_array();
	}
	
	
	
	
	
}