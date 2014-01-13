<?php
//*** Email address to submit form from ***//
define('SEND_EMAIL', 'info@documentator.org');

//*** Email address to submit form to ***//
define('RECEIVE_EMAIL', 'info@whizzin.com');

//*** Thank you message ***//
define('THANK_YOU', _t('Thank you for contacting us We will reply soon'));

//*** Message if mail function fails to send the email ***//
define('ERROR_SEND', _t('There was an error sending your email Please try again later'));

//*** Fields to output ***//

define("CONTACT_FIELDS", serialize (
	array (
		
		array (
			'name' => 'name',
			'label' => _t('Your name'),
			'type' => 'text',
			'required' => true
		),
		
		array (
			'name' => 'email',
			'label' => _t('Your email'),
			'type' => 'text',
			'required' => true
		),
		
		array (
			'name' => 'type',
			'label' => _t('Topic'),
			'type' => 'select',
			'options' => array (
				'sales' => _t('Sales'),
				'billing' => _t('Billing'),
				'support' => _t('Technical support')
			),
			'required' => true
		),
		
		array (
			'name' => 'subject',
			'label' => _t('Subject'),
			'type' => 'text',
			'required' => true
		),
		
		array (
			'name' => 'message',
			'label' => _t('Your Message'),
			'type' => 'textarea',
			'required' => true
		),
		
	)
));