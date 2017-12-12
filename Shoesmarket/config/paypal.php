<?php
return array(
	//----------------------------
	// set your paypal credential 
	//----------------------------

	'client_id' =>'AR_fJFd_XjsoW7-I2qimB3MNKVhM0tc291JMYxm8lYcUguub6TN6EVeNz8VyTg5elM1QGduiqtF5AwGW',
	'secret' => 'EKbjdyFYUsn7PHR2SEIOV9Z7AYX07uMjZldlstawUYXqzotc85x6X6zthcGJX-3jF_GsZspk7aEfRtx9',

	//----------------
	// SDK Setup
	//---------------

	'settings' => array(
	
	// Set Paypal Mode 2 option 'Live' or 'sandbox'

	'mode' => 'sandbox',

	// Set maximum request time

	'http.ConnectionTimeOut' => 1000,
	
	// Set log Enabled or not

	'log.LogEnabled' => true,

	// Specify the file that want to write on

	'log.FileName' => storage_path() . '/logs/paypal.log',

	//-----------------------------------------------------------------
	//Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	//Logging is most verbose in the 'FINE' level and decreases as you
	//-----------------------------------------------------------------

	'log.LogLevel' => 'FINE'
	),
);
?>