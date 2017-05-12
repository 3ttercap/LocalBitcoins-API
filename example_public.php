<?php

	$Lbc_Public = new LocalBitcoins_Public_API();

/** ----------------------------------------------------------------
/* Base: 			"/buy-bitcoins-with-cash/{location_id}/{location_slug}/.json"
/* Documentation: 	https://localbitcoins.com/api-docs/#local-buy
/* Permissions: 	None
**/
	/*
		$location = array(
		'location_id'	=> '1166802422',
		'location_slug'	=> 'paris-france'
		);
		$res = $Lbc_Public->BuyBitcoinsWithCash($location);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/sell-bitcoins-for-cash/{location_id}/{location_slug}/.json"
/* Documentation: 	https://localbitcoins.com/api-docs/#local-sell
/* Permissions: 	None
**/
	/*
		$location = array(
		'location_id'	=> '1166802422',
		'location_slug'	=> 'paris-france'
		);
		$res = $Lbc_Public->SellBitcoinsForCash($location);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/buy-bitcoins-online/.....json"
/* Documentation: 	https://localbitcoins.com/api-docs/#online-buy1 (1 to 6)
/* Permissions: 	None
**/
	/* --- "/buy-bitcoins-online/.json" --- */
	/*
		$pagination = 1;
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination);
		print_r($res);
	*/


	/* --- "/buy-bitcoins-online/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/buy-bitcoins-online/{currency:3}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'currency'			=> 'CAD'
		);
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/buy-bitcoins-online/{currency:3}/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'currency'			=> 'CAD',
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/buy-bitcoins-online/{countrycode:2}/{country_name}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'countrycode'		=> 'CA',
		'country_name'		=> 'canada'
		);
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/buy-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'countrycode'		=> 'CA',
		'country_name'		=> 'canada',
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->BuyBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/sell-bitcoins-online/.....json"
/* Documentation: 	https://localbitcoins.com/api-docs/#online-sell1 (1 to 6)
/* Permissions: 	None
**/
	/* --- "/sell-bitcoins-online/.json" --- */
	/*
		$pagination = 1;
		$res = $Lbc_Public->SellBitcoinsOnline($pagination);
		print_r($res);
	*/


	/* --- "/sell-bitcoins-online/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->SellBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/sell-bitcoins-online/{currency:3}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'currency'			=> 'CAD'
		);
		$res = $Lbc_Public->SellBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/sell-bitcoins-online/{currency:3}/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'currency'			=> 'CAD',
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->SellBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/sell-bitcoins-online/{countrycode:2}/{country_name}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'countrycode'		=> 'CA',
		'country_name'		=> 'canada'
		);
		$res = $Lbc_Public->SellBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


	/* --- "/sell-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json" --- */
	/*
		$pagination 		= 1;
		$arguments = array(
		'countrycode'		=> 'CA',
		'country_name'		=> 'canada',
		'payment_method'	=> 'paypal'
		);
		$res = $Lbc_Public->SellBitcoinsOnline($pagination,$arguments);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/bitcoinaverage/ticker-all-currencies/"
/* Documentation: 	https://localbitcoins.com/api-docs/#ticker-all
/* Permissions: 	None
**/
	/*
		$res = $Lbc_Public->Bitcoinaverage();

		echo $res->USD->avg_1h;
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/bitcoincharts/{currency}/trades.json"
/* Documentation: 	https://localbitcoins.com/api-docs/#trades
/* Permissions: 	None
**/
	/*
		$currency 	= 'USD';
		$res = $Lbc_Public->ClosedTrades($currency);
		print_r($res);
	*/
	
	/* The maximum batch size is of a fetch is 500 entries. Use ?since= parameter with the last tid to iterate more. */
	/*
		$currency 	= 'USD';
		$since_tid 	= '179605';
		$res = $Lbc_Public->ClosedTrades($currency,$since_tid);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/bitcoincharts/{currency}/orderbook.json"
/* Documentation: 	https://localbitcoins.com/api-docs/#orderbook
/* Permissions: 	None
**/
	/*
		$currency = 'USD';
		$res = $Lbc_Public->Orderbook($currency);
		print_r($res);
	*/
