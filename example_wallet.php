<?php

	/* Uncomment if you wish to change default keys */
	// $API_AUTH_KEY	= '';
	// $API_AUTH_SECRET	= '';

	$Lbc_Wallet = new LocalBitcoins_Wallet_API($API_AUTH_KEY,$API_AUTH_SECRET);


/** ----------------------------------------------------------------
/* Base: 			"/api/wallet/"
/* Documentation: 	https://localbitcoins.com/api-docs/#wallet
/* Permissions: 	Read
**/
	/*
		$res 		= $Lbc_Wallet->Infos();
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/wallet-balance/"
/* Documentation: 	https://localbitcoins.com/api-docs/#wallet-balance
/* Permissions: 	Read
**/
	/*
		$res 		= $Lbc_Wallet->Balance();
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/wallet-send/"
/* Documentation: 	https://localbitcoins.com/api-docs/#wallet-send
/* Permissions: 	Money
**/
	/*
		$address	= '14Xmiu9V1yUMsvQ7d6NA6zEv4xyRX6u9wc';
		$amount		= '0.1';
		$res 		= $Lbc_Wallet->Send($address,$amount);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/wallet-send-pin/"
/* Documentation: 	https://localbitcoins.com/api-docs/#wallet-send-pin
/* Permissions: 	Money_pin
**/
	/*
		$address	= '14Xmiu9V1yUMsvQ7d6NA6zEv4xyRX6u9wc';
		$amount		= '0.1';
		$pincode	= '1234';
		$res 		= $Lbc_Wallet->SendPin($address,$amount,$pincode);
		print_r($res);
	*/


/** ----------------------------------------------------------------
/* Base: 			"/api/wallet-addr/"
/* Documentation: 	https://localbitcoins.com/api-docs/#wallet-addr
/* Permissions: 	Read
**/
	/*
		$res 		= $Lbc_Wallet->Addr();
		print_r($res);
	*/

