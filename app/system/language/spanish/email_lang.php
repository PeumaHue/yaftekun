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

$lang['email_must_be_array'] = "El m�todo de validaci�n de correo debe ser pasado como un array.";
$lang['email_invalid_address'] = "Direcci�n de correo no es v�lida: %s";
$lang['email_attachment_missing'] = "No se ha podido localizar el archivo adjunto: %s";
$lang['email_attachment_unreadable'] = "No se ha podido abrir el archivo adjunto: %s";
$lang['email_no_recipients'] = "Debe incluir receptores: Para, CC, o BCC";
$lang['email_send_failure_phpmail'] = "No se puede enviar el correo usando la funci�n mail() de PHP.  Su servidor puede no estar configurado para usar este m�todo de env�o.";
$lang['email_send_failure_sendmail'] = "No se puede enviar el correo usando SendMail. Su servidor puede no estar configurado para usar este m�todo de env�o.";
$lang['email_send_failure_smtp'] = "No puedo enviar el correo usando SMTP PHP. Su servidor puede no estar configurado para usar este m�todo de env�o.";
$lang['email_sent'] = "Su mensaje ha sido enviado satisfactoriamente usando el siguiente protocolo: %s";
$lang['email_no_socket'] = "No se puede abrir un socket para Sendmail. Por favor revise las configuraciones.";
$lang['email_no_hostname'] = "No has especificado un servidor SMTP.";
$lang['email_smtp_error'] = "Los siguientes errores SMTP han sido encontrados: %s";
$lang['email_no_smtp_unpw'] = "Error: Debes asignar un usuario y contrase�a para el servidor SMTP.";
$lang['email_failed_smtp_login'] = "Fall� enviando el comando AUTH LOGIN. Error: %s";
$lang['email_smtp_auth_un'] = "Fall� autentificando el usuario. Error: %s";
$lang['email_smtp_auth_pw'] = "Fall� usando la contrase�a. Error: %s";
$lang['email_smtp_data_failure'] = "No se han podido enviar los datos: %s";
$lang['email_exit_status'] = "C�digo de estado de salida: %s";