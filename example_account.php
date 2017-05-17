<?php

	/* Uncomment if you wish to change default keys */
	// $API_AUTH_KEY	= '';
	// $API_AUTH_SECRET	= '';
	
	$Lbc_Account = new LocalBitcoins_Account_API($API_AUTH_KEY,$API_AUTH_SECRET);

/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/account_info/{username}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#account_info
/* Permissions: 	Read
**/
	/*
		$username 	= 'BeBot';
		$res		= $Lbc_Account->Info($username);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/dashboard/"
/* Documentation: 	https://localbitcoins.com/api-docs/#dashboard
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: $Lbc_Account->Dashboard(array('id__gt='=>'50'));
		$res		= $Lbc_Account->Dashboard();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/dashboard/released/"
/* Documentation: 	https://localbitcoins.com/api-docs/#dashboard-released
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: lb_DashboardReleased(array('id__gt='=>'50'));
		$res		= $Lbc_Account->DashboardReleased();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/dashboard/canceled/"
/* Documentation: 	https://localbitcoins.com/api-docs/#dashboard-canceled
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: lb_DashboardReleased(array('id__gt='=>'50'));
		$res		= $Lbc_Account->DashboardCanceled();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/dashboard/closed/"
/* Documentation: 	https://localbitcoins.com/api-docs/#dashboard-closed
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: lb_DashboardReleased(array('id__gt='=>'50'));
		$res		= $Lbc_Account->DashboardClosed();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/logout/"
/* Documentation: 	https://localbitcoins.com/api-docs/#logout
/* Permissions: 	Read
**/
	/*
		$res		= $Lbc_Account->Logout();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/myself/"
/* Documentation: 	https://localbitcoins.com/api-docs/#myself
/* Permissions: 	Read,Write
**/
	/*
		$res		= $Lbc_Account->Myself();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK (pagination not tested)
/* Base: 			"/api/notifications/"
/* Documentation: 	https://localbitcoins.com/api-docs/#notifications
/* Permissions: 	Read
**/
	/*
		// for pagination use an array in params eg: lb_Notifications(array('id__gt='=>'50'));
		$res 		= $Lbc_Account->Notifications();
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/notifications/mark_as_read/{notification_id}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#notifications-read
/* Permissions: 	Read,Write
**/
	/*
		$notification_id 	= '1a981b8d623a';
		$res 				= $Lbc_Account->NotificationsMarkAsRead($notification_id);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/pincode/"
/* Documentation: 	https://localbitcoins.com/api-docs/#pin
/* Permissions: 	Read
**/
	/*
		$pincode 	= '1234';
		$res 		= $Lbc_Account->Pincode($pincode);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/real_name_verifiers/{username}/"
/* Documentation: 	https://localbitcoins.com/api-docs/#real-name-verifiers
/* Permissions: 	Read
**/
	/*
		$username	= 'henu.tester';
		$res		= $Lbc_Account->RealNameVerifiers($username);
		print_r($res);
	*/


/** ---------------------------------------------------------------- TEST OK
/* Base: 			"/api/recent_messages/"
/* Documentation: 	https://localbitcoins.com/api-docs/#recent-messages
/* Permissions: 	Read
**/
	/*
		$res		= $Lbc_Account->RecentMessages();
		print_r($res);
	*/
	
	/*
		$after 		= '2017-05-03T04:58:34+00:00';
		$res		= $Lbc_Account->RecentMessages($after);
		print_r($res);
	*/
