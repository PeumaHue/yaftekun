<?php
/**
 * Funcion para generar el html de un conjunto de divs con links 
 * @param array $ParamArray contiene 4 claves obligatorias y 3 opcionales.
 * CLAVES OBLIGATORIAS:
 * 		campoID se agrega a ruta para formar el link al que dirije al clickear el div
 *		camposMostrar puede ser un valor o un array con los nombres de campo a mostrar en el div
 *		datos objeto devuelto por el modelo con un conjunto de resultados traidos de la DB como una lista de equipos (tiene que contener los campos de las claves campoID y campoMostrar)
 *
 * CLAVES OPCIONALES:
 * 		divClass clase para cada div default='form-group col-md-4'
 *		linkClass clase para cada <a href default='btn btn-link'
 *		separador_valores cuando camposMostrar sea un array de nombres de campo, las resultados se obtien concatenando esos campos con esta constante (default=' ')
 * @var string
 */
function _renderizar_datos_link($ParamArray){
	/*
	$ParamArray['ruta']
	$ParamArray['campoID']
	$ParamArray['camposMostrar']
	$ParamArray['datos']	
	$ParamArray['divClass']
	$ParamArray['linkClass']
	$ParamArray['separador_valores']
	*/
	if (!array_key_exists('divClass',$ParamArray)) { $ParamArray['divClass']='form-group col-md-4';}
	if (!array_key_exists('linkClass',$ParamArray)) { $ParamArray['linkClass']='btn btn-link';}
	if (!array_key_exists('separador_valores',$ParamArray)) { $ParamArray['separador_valores']=' ';}
	
	$html='';

	if (is_array($ParamArray['camposMostrar']) || $ParamArray['camposMostrar'] instanceof Traversable) {
		foreach ($ParamArray['datos'] as $item):
			$etiquetas = array();
			foreach ($ParamArray['camposMostrar'] as $campo) {$etiquetas[] = $item[$campo];}
				
			$html = $html.'<div class="'.$ParamArray['divClass'].'"><a href="' .site_url($ParamArray['ruta']).'/'.$item[$ParamArray['campoID']] . '" class="'.$ParamArray['linkClass'].'">' . join($ParamArray['separador_valores'],$etiquetas) . '</a></div>';
		endforeach;
	} else
	{
		foreach ($ParamArray['datos'] as $item):
			$html = $html.'<div class="'.$ParamArray['divClass'].'"><a href="' .site_url($ParamArray['ruta']).'/'.$item[$ParamArray['campoID']] . '" class="'.$ParamArray['linkClass'].'">' . $item[$ParamArray['camposMostrar']] . '</a></div>';
		endforeach;
	}
	
	
	return $html;
};

/**
 * Funcion que obtinen un array asociativo para pasarlo como completar un combo
 * util para pasar parametros a form_dropdown.
 * @param 		array 	$ParamArray contiene 3 claves obligatorias y 2 opcionales:
 * CLAVES OBLIGATORIAS:
 * 		dato objeto devuelto por el modelo con un conjunto de resultados traidos de la DB como una lista de equipos (tiene que contener los campos de las claves campo_clave y campo_descripcion)
 * 		campo_clave nombre del campo clave
 * 		campo_descripcion nombre del campo a mostrar en el combo (si es que se usa para un combo)
 * CLAVES OPCIONALES:
 * 		cadena_sin_seleccion el nombre de la cadena del diccionario que se usa para mostrar en el combo cuando no se selecciono nada (default NULL=form_combo_seleccionar)
 * 		separador_valores cuando $campo_descripcion sea un array de nombres de campo, las valores se obtien concatenando esos campos con esta constante (default ' ')
 * @return array con lista y clave seleccionada
 */
//function _obtener_array_asociativo($datos, $campo_clave, $campo_descripcion, $cadena_sin_seleccion=NULL, $separador_valores=' ')
function _obtener_array_asociativo($ParamArray)
{
	
	if (!array_key_exists('cadena_sin_seleccion',$ParamArray)) { $ParamArray['cadena_sin_seleccion']='form_combo_seleccionar';}
	if (!array_key_exists('separador_valores',$ParamArray)) { $ParamArray['separador_valores']=' ';}
	
	//$datos, $campo_clave, $campo_descripcion, $cadena_sin_seleccion=NULL, $separador_valores=' '
	
	
	$resultado[''] = lang($ParamArray['cadena_sin_seleccion']);
	if (is_array($ParamArray['campo_descripcion']) || $ParamArray['campo_descripcion'] instanceof Traversable) {
		foreach ($ParamArray['datos'] as $i)
		{
			$etiquetas = array();
			foreach ($ParamArray['campo_descripcion'] as $d) {$etiquetas[] = $i[$d];}

			$resultado[$i[$ParamArray['campo_clave']]] = join($ParamArray['separador_valores'],$etiquetas);
		}	
	} else 
	{
		foreach ($ParamArray['datos'] as $i)
		{
			$resultado[$i[$ParamArray['campo_clave']]] = $i[$ParamArray['campo_descripcion']];
		}	
	}
	
	return $resultado;
}