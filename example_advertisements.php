<?php

	/* Uncomment if you wish to change default keys */
	// $API_AUTH_KEY	= '';
	// $API_AUTH_SECRET	= '';

	$Lbc_Advertisements = new LocalBitcoins_Advertisements_API($API_AUTH_KEY,$API_AUTH_SECRET);


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/ads/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ads
/* Permissions: 	Read
**/
	/*
		$res = $Lbc_Advertisements->Ads();
		print_r($res);
	*/

	/*
		$optional = array(
			'visible'		=>	'1',
			'trade_type'	=>	'ONLINE_SELL',
			'currency'		=>	'CAD',
			'countrycode'	=>	'CA'
			 //add pagination if needed.
		);
		
		$res = $Lbc_Advertisements->Ads($optional);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/ad-get/" and "/api/ad-get/{ad_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ad-get and https://localbitcoins.com/api-docs/#ad-get-id
/* Permissions: 	Read
**/
	/*
		$ad_id 	= '123456';

		$res = $Lbc_Advertisements->AdGet($ad_id);
		print_r($res);
	*/

	/*
		$ads 	= '123456,789123,456789';  // up to 50 at a time

		$res = $Lbc_Advertisements->AdGet($ads);
		print_r($res);
	*/


/** ---------------------------------------------------------------- NOT TESTED
/* Base: 			"/api/ad/{ad_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ad-id
/* Permissions: 	Read,Write
**/
	/*
		$ad_id 		= '123456';

		$arguments 	= array(
			// Required arguments
			'price_equation' 				=> '',
			'lat'							=> '',
			'lon'							=> '',
			'city'							=> '',
			'location_string'				=> '',
			'countrycode'					=> '',
			'currency'						=> '',
			'account_info'					=> '',
			'bank_name'						=> '',
			'msg'							=> '',
			'sms_verification_required'		=> '',
			'track_max_amount'				=> '',
			'require_trusted_by_advertiser'	=> '',
			'require_identification'		=> ''
			// add your Optional arguments here
		);

		$res = $Lbc_Advertisements->AdEdit($ad_id,$arguments);
		print_r($res);
	*/


/** ---------------------------------------------------------------- NOT TESTED
/* Base: 			"/api/ad-create/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ad-create
/* Permissions: 	Read,Write
**/
	/*
		$arguments 	= array(
			// Required arguments
			'price_equation' 				=> '',
			'lat'							=> '',
			'lon'							=> '',
			'city'							=> '',
			'location_string'				=> '',
			'countrycode'					=> '',
			'currency'						=> '',
			'account_info'					=> '',
			'bank_name'						=> '',
			'msg'							=> '',
			'sms_verification_required'		=> '',
			'track_max_amount'				=> '',
			'require_trusted_by_advertiser'	=> '',
			'require_identification'		=> '',
			'online_provider'				=> '',
			'trade_type'					=> ''
			// add your Optional arguments here
		);

		$res = $Lbc_Advertisements->AdCreate($arguments);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/ad-delete/{ad_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ad-delete
/* Permissions: 	Read,Write
**/
	/*
		$ad_id 	= '123456';
		
		$res = $Lbc_Advertisements->AdDelete($ad_id);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/payment_methods/" and "/api/payment_methods/{countrycode}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#payment-methods
/* Permissions: 	None
**/
	/*
		$res = $Lbc_Advertisements->PaymentMethods();
		print_r($res);
	*/

	/*
		$countrycode = 'CA';
		
		$res = $Lbc_Advertisements->PaymentMethods($countrycode);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/countrycodes/"
/* Documentation: 	https://localbitcoins.com/api-docs/#countrycodes
/* Permissions: 	None
**/
	/*
		$res = $Lbc_Advertisements->Countrycodes();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/currencies/"
/* Documentation: 	https://localbitcoins.com/api-docs/#currencies
/* Permissions: 	None
**/
	/*
		$res = $Lbc_Advertisements->Currencies();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/places/"
/* Documentation: 	https://localbitcoins.com/api-docs/#places
/* Permissions: 	None
**/
	/*
		$arguments 	= array(
			// Required arguments
			'lat'				=> '48.5112',
			'lon'				=> '22055',

			// Optional arguments
			'countrycode'		=> 'FR',
			'location_string'	=> 'paris'
		);

		$res = $Lbc_Advertisements->Places($arguments);
		print_r($res);
	*/

