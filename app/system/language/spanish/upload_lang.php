<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');



$lang['upload_userfile_not_set'] = "No se ha podido encontrar una variable de tipo POST llamada userfile.";
$lang['upload_file_exceeds_limit'] = "El archivo subido excede el tamaño máximo permitido.";
$lang['upload_file_partial'] = "El archivo fue subido parcialmente.";
$lang['upload_no_file_selected'] = "No ha seleccionado ningún archivo para subir.";
$lang['upload_invalid_filetype'] = "El tipo de archivo que esta tratando de subir no está permitido.";
$lang['upload_invalid_filesize'] = "El archivo que está tratando de subir es más grande que el tamaño permitido.";
$lang['upload_invalid_dimensions'] = "La imagen que está tratando de subir excede los tamaños máximos para el alto y/o ancho.";
$lang['upload_destination_error'] = "Se encontraron problemas mientras se trataba de mover el archivo subido al directorio de destino final.";
$lang['upload_no_filepath'] = "La dirección para subir el archivo parece no ser válida.";
$lang['upload_no_file_types'] = "Todavía no ha especificado ningún archivo permitido.";
$lang['upload_bad_filename'] = "El archivo enviado ya existe en el servidor.";
$lang['upload_not_writable'] = "El directorio de destino no posee permisos de escritura.";
$lang['upload_file_exceeds_form_limit'] = "El archivo subido excede el tamaño máximo permitido por el formulario.";
$lang['upload_no_temp_directory'] = "La carpeta temporal no existe.";
$lang['upload_unable_to_write_file'] = "El fichero no pudo ser escrito a disco.";
$lang['upload_stopped_by_extension'] = "La carga de archivos fue detenido por la extensión.";

/*
$lang['upload_userfile_not_set'] = 'Unable to find a post variable called userfile.';
$lang['upload_file_exceeds_limit'] = 'The uploaded file exceeds the maximum allowed size in your PHP configuration file.';
$lang['upload_file_exceeds_form_limit'] = 'The uploaded file exceeds the maximum size allowed by the submission form.';
$lang['upload_file_partial'] = 'The file was only partially uploaded.';
$lang['upload_no_temp_directory'] = 'The temporary folder is missing.';
$lang['upload_unable_to_write_file'] = 'The file could not be written to disk.';
$lang['upload_stopped_by_extension'] = 'The file upload was stopped by extension.';
$lang['upload_no_file_selected'] = 'You did not select a file to upload.';
$lang['upload_invalid_filetype'] = 'The filetype you are attempting to upload is not allowed.';
$lang['upload_invalid_filesize'] = 'The file you are attempting to upload is larger than the permitted size.';
$lang['upload_invalid_dimensions'] = 'The image you are attempting to upload doesn\'t fit into the allowed dimensions.';
$lang['upload_destination_error'] = 'A problem was encountered while attempting to move the uploaded file to the final destination.';
$lang['upload_no_filepath'] = 'The upload path does not appear to be valid.';
$lang['upload_no_file_types'] = 'You have not specified any allowed file types.';
$lang['upload_bad_filename'] = 'The file name you submitted already exists on the server.';
$lang['upload_not_writable'] = 'The upload destination folder does not appear to be writable.';
*/