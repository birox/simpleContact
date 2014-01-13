<?php
#
# Documentator Credits plugin
# Use of hooks: footer_right
#

//require configuration file
require(plugin_path(__FILE__). DIRECTORY_SEPARATOR .'config.php');

//Start js register
function simplecontact_js($scripts) {
	
	$plugin_url = plugin_url(__FILE__);
	
	$scripts[] = array(
		$plugin_url . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'scripts.js'
	);
	return $scripts;
	
}
hook('js', null, 'simplecontact_js');
//End js register

//Start css register
function simplecontact_css($styles) {
	
	$plugin_url = plugin_url(__FILE__);
	
	$styles[] = array(
		$plugin_url . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'style.css'
	);
	return $styles;
	
}
hook('css', null, 'simplecontact_css');
//End css register

//Start language folder
function simplecontact_translate($translate) {
	
	$plugin_path = plugin_path(__FILE__);
	
	$translate[] = $plugin_path. DIRECTORY_SEPARATOR . 'translate';
	return $translate;
	
}
hook('translate', null, 'simplecontact_translate');
//End language folder

//Start Register pages links
function simplecontact_pages($pages) {
	
	$pages[] = array(
		'contact',
	);
	return $pages;
	
}
hook('pages_url', null, 'simplecontact_pages');
//End Register pages links

//Start Output contact page
function contact_page() {
	
	include(plugin_path(__FILE__). DIRECTORY_SEPARATOR .'views'. DIRECTORY_SEPARATOR .'contact.php');
	
}
hook('page_contact', null, 'contact_page');
//End Output contact page

//Start Ajax call
function simplecontact_ajax($vars) {
	
	// recipient
	$to  = RECEIVE_EMAIL;
	
	// subject
	$subject = (isset($vars['subject']))? $vars['subject'] : DOC_NAME .' contact';
	
	foreach($vars as $key => $value) {
		$fields .= sprintf(
			'<tr>
			  <td>%1$s</td><td>%2$s</td>
			</tr>',
			$key,
			$value
		);
	}
	
	// message
	$message = sprintf(
	'<html>
	<head>
	  <title>%1$s</title>
	</head>
	<body>
	  <table>
		<tr>
		  <th>%2$s</th><th>%3$s</th>
		</tr>
		%4$s
	  </table>
	</body>
	</html>
	',
	$subject,
	_t('Field'),
	_t('Value'),
	$fields
	);
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= sprintf('To: %s', RECEIVE_EMAIL) . "\r\n";
	$headers .= sprintf('From: %s', SEND_EMAIL) . "\r\n";
	
	// Mail it
	$send = mail($to, $subject, $message, $headers);
	
	if($send == true)
		echo json_encode(array('status' => 'success', 'message' => THANK_YOU));
	else
		echo json_encode(array('status' => 'error', 'message' => ERROR_SEND));
	
}
hook('ajax_simpleContact', null, 'simplecontact_ajax');
//End Ajax call



























