<?php
/**
 * @package	CodeIgniter
 * @author	Marco Cupo
 * @license	http://opensource.org/licenses/MIT	MIT License
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Helper para manejar el log
 *
 */

// ------------------------------------------------------------------------

if ( ! function_exists('log_inicio_funcion'))
{
	/**
	 * Element
	 *
	 * Lets you determine whether an array index is set and whether it has a value.
	 * If the element is empty it returns NULL (or whatever you specify as the default value.)
	 *
	 * @param	string
	 */
	function log_inicio_funcion($funcion, $ref, $args)
	{
		$CI =& get_instance();
		log_message('debug', 'Se llama a la funcion: ' . $funcion . ' con los argumentos:');
		$arr = array();
		$i = 0;
		foreach($ref->getParameters() as $parameter)
		{
			$nombre = $parameter->getName();
			$arr[$nombre] = $args[$i];
			log_message('debug', $nombre . ': ' . $arr[$nombre]);
			$i++;
		}
		$CI->benchmark->mark('code_start');
	}
/*
 * Ejemplo funcionando en Participante_model
 		//@todo PONER EN UN HELPER
 		log_message('debug', 'Se llama a la funcion: ' . __METHOD__ . ' con los argumentos:');
		$arr = array();
		$ref = new ReflectionMethod(__METHOD__);
		foreach($ref->getParameters() as $parameter)
		{
			$nombre = $parameter->getName();
			$arr[$nombre] = ${$nombre};
			log_message('debug', $nombre . ': ' . $arr[$nombre]);
		}
		$this->benchmark->mark('code_start');
		
		$query = $this->db->query($this->sp_consulta, array('id_participante' => $id_participante, 'id_equipo' => $id_equipo, 'id_tipo_participante' => $id_tipo_participante, 'nombre_apellido' => $nombre_apellido, 'row_count' => NULL, 'offset' => NULL));
		
		//@todo PONER EN UN HELPER
		log_message('debug', 'La ejecucion de la funcion: ' . __METHOD__ . ' arrojo ' . $query->num_rows() . ' registros ');
		$this->benchmark->mark('code_end');
		log_message('info', 'La ejecucion de la funcion: ' . __METHOD__ . ' tardo ' . $this->benchmark->elapsed_time('code_start', 'code_end'));
*/
}

// ------------------------------------------------------------------------