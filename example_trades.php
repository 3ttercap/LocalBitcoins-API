<?php

	/* Uncomment if you wish to change default keys */
	// $API_AUTH_KEY	= '';
	// $API_AUTH_SECRET	= '';

	$Lbc_Trades = new LocalBitcoins_Trades_API($API_AUTH_KEY,$API_AUTH_SECRET);


/** ----------------------------------------------------------------
/* Base: 			"/api/feedback/{username}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#feedback
/* Permissions: 	Read,Write
**/
	/*
		$username 	= 'bebot';
		$feedback 	= 'positive';				// trust, positive, neutral, block, block_without_feedback
		$msg 		= 'Fast and Smooth!!!';		// Feedback message displayed
		
		$res = $Lbc_Trades->Feedback($username,$feedback,$msg);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_release/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-release
/* Permissions: 	Money
**/
	/*
		$contact_id = '';

		$res = $Lbc_Trades->ContactRelease($contact_id);
		print_r($res);
	*/

/** ----------------------------------------------------------------
/* Base: 			"/api/contact_release_pin/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-release-pin
/* Permissions: 	Money_pin
**/
	/*
		$contact_id = '';
		$pincode	= '1234';
		
		$res = $Lbc_Trades->ContactReleasePin($contact_id,pincode);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_mark_as_paid/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-paid
/* Permissions: 	Read,Write
**/
	/*
		$contact_id = '';
		
		$res = $Lbc_Trades->ContactMarkAsPaid($contact_id);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_messages/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-message
/* Permissions: 	Read
**/
	/*
		$contact_id = '';
		
		$res = $Lbc_Trades->ContactMessages($contact_id);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_message_post/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-post
/* Permissions: 	Read,Write
**/
	/*
		$contact_id = '';
		$msg		= '';

		$res = $Lbc_Trades->ContactMessagePost($contact_id,$msg);
		print_r($res);
	*/
	
	/*
		// with optional image as document. eg "/var/home/user/image.jpg"
		$contact_id = '';
		$msg		= '';
		$document	= '';

		$res = $Lbc_Trades->ContactMessagePost($contact_id,$msg,$document);		
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_dispute/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-dispute
/* Permissions: 	Read,Write
**/
	/*
		$contact_id = '';

		$res = $Lbc_Trades->ContactDispute($contact_id);
		print_r($res);
	*/

	/*
		// with optional topic
		$contact_id = '';
		$topic		= '';

		$res = $Lbc_Trades->ContactDispute($contact_id,$topic);
		print_r($res);
	*/

/** ----------------------------------------------------------------
/* Base: 			"/api/contact_cancel/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-cancel
/* Permissions: 	Read,Write
**/
	/*
		$contact_id = '';

		$res = $Lbc_Trades->ContactCancel($contact_id);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_fund/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-fund
/* Permissions: 	Read,Write
**/
	/*
		$contact_id = '';

		$res = $Lbc_Trades->ContactFund($contact_id);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_mark_realname/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-mark-realname
/* Permissions: 	Read,Write
**/
	/*
		$contact_id				= '';
		$confirmation_status	= 1; 	// 1 = Name matches, 2 = Name was different, 3 = Name was not checked, 4 = Name was not visible
		$id_confirmed			= 1; 	// 0 for false, 1 for true.
		
		$res = $Lbc_Trades->ContactMarkRealName($contact_id,$confirmation_status,$id_confirmed);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_mark_identified/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-mark-identified
/* Permissions: 	Read,Write
**/
	/*
		$contact_id	= '';

		$res = $Lbc_Trades->ContactMarkIdentified($contact_id);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_create/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-create
/* Permissions: 	Read
**/
	/*
		$ad_id		= '';
		$amount		= '';

		$res = $Lbc_Trades->ContactCreate($ad_id,$amount));
		print_r($res);
	*/
	
	/*
		// with optional message
		$ad_id		= '';
		$amount		= '';
		$message	= '';
		
		$res = $Lbc_Trades->ContactCreate($ad_id,$amount,$message);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/contact_info/" and "/api/contact_info/{contact_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#contact-info and https://localbitcoins.com/api-docs/#contact-info-id
/* Permissions: 	Read
**/
	/*
		$contact_id	= '123456';

		$res = $Lbc_Trades->ContactInfo($contact_id);
		print_r($res);
	*/
	
	/*
		// up to 50 at a time
		$contacts	= '123456,789123,456789';

		$res = $Lbc_Trades->ContactInfo($contacts);
		print_r($res);
	*/

