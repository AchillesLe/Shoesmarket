<?php
return array(
	//----------------------------
	// set your paypal credential 
	//----------------------------

	'client_id' =>'AaeoDReTMU2B6jE7Afe-8oVWybGDKCcKCCdaHrWxIJOalK9KCXgC521HU3Hr1Z9OyfkI--TLGTIDDQJN',
	'secret' => 'EEP9RA3WeTK_hUj1YkqPDbLMVnPcOrrHVynaE6_fXP83YV91px2z4_wcEFILyQPBX-do3TriB9XPqMTj',

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