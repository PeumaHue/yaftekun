<?php
/**
 * Funcion para generar un conjunto de divs con links
 * se carga en la variable $variables['html_datos_ppal']
 * @param string $ruta se convina con site_url para formar el destino del link
 * @param string $campoID se agrega a ruta para formar el link
 * @param string $campoMostrar se muestra como titulo del div
 * @param object $datos resultado de la consulta del modelo con teniendo los campos de los parametros $campoID y $campoMostrar
 * @param string $divClass clase para cada div default='form-group col-md-4'
 * @param string $linkClass clase para cada div default='btn btn-link'
 * @var string
 */
function _renderizar_datos_link($ruta, $campoID, $campoMostrar, $datos, $divClass='form-group col-md-4', $linkClass='btn btn-link'){
	$html='';
	foreach ($datos as $item):
		$html = $html.'<div class="'.$divClass.'"><a href="' .site_url($ruta).'/'.$item[$campoID] . '" class="'.$linkClass.'">' . $item[$campoMostrar] . '</a></div>';
	endforeach;
	return $html;
};

/**
 * Funcion que obtinen un array asociativo para pasarlo como completar un combo
 * util para pasar parametros a form_dropdown.
 * @param 		object 	$datos	obtenidos del modelo
 * @param 		string	$campo_clave nombre del campo clave
 * @param 		string 	$campo_descripcion nombre del campo a mostrar en el combo
 * @return array con lista y clave seleccionada
 */
function _obtener_array_asociativo($datos, $campo_clave, $campo_descripcion)
{
	$resultado[''] = "[".lang('form_combo_seleccionar')."]";
	foreach ($datos as $i)
	{
		$resultado[$i[$campo_clave]] = $i[$campo_descripcion];
	}
	return $resultado;
}