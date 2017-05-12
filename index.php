<?php

	// Your default Api Public Key
	$API_AUTH_KEY = '';

	// Your default API Secret Key
	$API_AUTH_SECRET = '';

	// Put them to true after tests.
	define('SSL_VERIFYPEER',false);
	define('SSL_VERIFYHOST',false);

	// Include the LocalBitcoins API
	include('_api_localbitcoins.php');
	$LocalBitcoins = new LocalBitcoins($API_AUTH_KEY,$API_AUTH_SECRET);

	/*
		--------------------- Examples ---------------------
	*/

	/* --- Account Example --- */
	include('example_account.php');

	/* --- Advertisements Example --- */
	include('example_advertisements.php');

	/* --- Merchant Invoices Example --- */
	include('example_invoices.php');

	/* --- Trades Example --- */
	include('example_trades.php');

	/* --- Wallet Example --- */
	include('example_wallet.php');

	/* --- Public Market Data Example --- */
	include('example_public.php');
