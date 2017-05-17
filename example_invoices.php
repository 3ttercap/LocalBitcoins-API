<?php

	/* Uncomment if you wish to change default keys */
	// $API_AUTH_KEY	= '';
	// $API_AUTH_SECRET	= '';

	$Lbc_Merchant = new LocalBitcoins_Merchant_API($API_AUTH_KEY,$API_AUTH_SECRET);


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/merchant/invoices/"
/* Documentation: 	https://localbitcoins.com/api-docs/#invoices
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: $Lbc_Merchant->Invoices()(array('id__gt='=>'50'));
		$res = $Lbc_Merchant->Invoices();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/merchant/new_invoice/"
/* Documentation: 	https://localbitcoins.com/api-docs/#new-invoice
/* Permissions: 	Read
**/
	/*
		$arguments = array(
			'currency' 		=> 'CAD',
			'amount'		=> '29.99',
			'description'	=> 'Product #1',
			// optional arguments
			'return_url'	=> 'https://myweb.site/invoices/123456/'
		);
		$res = $Lbc_Merchant->NewInvoice($arguments);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/merchant/invoice/{invoice_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#invoice-id
/* Permissions: 	Read
**/
	/*
		$invoice_id = 'zfJ2eVW2HhSWyGNhX34K9';
		$res = $Lbc_Merchant->Invoice($invoice_id);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/merchant/delete_invoice/{invoice_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#invoice-delete
/* Permissions: 	Read,Write
**/
	/*
		$invoice_id = 'zfJ2eVW2HhSWyGNhX34K9';
		$res = $Lbc_Merchant->DeleteInvoice($invoice_id);
		print_r($res);
	*/
