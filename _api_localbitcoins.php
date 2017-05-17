<?php
/**
* LocalBitcoins PHP API
* @author: BeBot
* @donation: 1C649ncNBQ5EdoJ1srg5mMyRe4Tmez5DF6
*
* Licensed under the WTFPL license.
* See http://www.wtfpl.net/about/
**/
class LocalBitcoins {

	public function __construct($API_AUTH_KEY = null, $API_AUTH_SECRET = null) {
        $this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
    }

	public function Query($url,$post=array(),$get=array(),$search=array(),$replace=array()) {

		if(!defined('SSL_VERIFYPEER'))		define('SSL_VERIFYPEER',true);
		if(!defined('SSL_VERIFYHOST'))		define('SSL_VERIFYHOST',true);

		// Method
		$api_get 	= array('/api/ads/','/api/ad-get/{ad_id}/','/api/ad-get/','/api/payment_methods/','/api/payment_methods/{countrycode}/','/api/countrycodes/','/api/currencies/','/api/places/','/api/contact_messages/{contact_id}/','/api/contact_info/{contact_id}/','/api/contact_info/','/api/account_info/{username}','/api/dashboard/','/api/dashboard/released/','/api/dashboard/canceled/','/api/dashboard/closed/','/api/myself/','/api/notifications/','/api/real_name_verifiers/{username}/','/api/recent_messages/','/api/wallet/','/api/wallet-balance/','/api/wallet-addr/','/api/merchant/invoices/','/api/merchant/invoice/{invoice_id}/');
		$api_post 	= array('/api/ad/{ad_id}/','/api/ad-create/','/api/ad-delete/{ad_id}/','/api/feedback/{username}/','/api/contact_release/{contact_id}/','/api/contact_release_pin/{contact_id}/','/api/contact_mark_as_paid/{contact_id}/','/api/contact_message_post/{contact_id}/','/api/contact_dispute/{contact_id}/','/api/contact_cancel/{contact_id}/','/api/contact_fund/{contact_id}','/api/contact_mark_realname/{contact_id}/','/api/contact_mark_identified/{contact_id}/','/api/contact_create/{ad_id}/','/api/logout/','/api/notifications/mark_as_read/{notification_id}/','/api/pincode/','/api/wallet-send/','/api/wallet-send-pin/','/api/merchant/new_invoice/','/api/merchant/delete_invoice/{invoice_id}/');
		$api_public	= array('/buy-bitcoins-with-cash/{location_id}/{location_slug}/.json','/sell-bitcoins-for-cash/{location_id}/{location_slug}/.json','/buy-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json','/buy-bitcoins-online/{countrycode:2}/{country_name}/.json','/buy-bitcoins-online/{currency:3}/{payment_method}/.json','/buy-bitcoins-online/{currency:3}/.json','/buy-bitcoins-online/{payment_method}/.json','/buy-bitcoins-online/.json','/sell-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json','/sell-bitcoins-online/{countrycode:2}/{country_name}/.json','/sell-bitcoins-online/{currency:3}/{payment_method}/.json','/sell-bitcoins-online/{currency:3}/.json','/sell-bitcoins-online/{payment_method}/.json','/sell-bitcoins-online/.json','/bitcoinaverage/ticker-all-currencies/','/bitcoincharts/{currency}/trades.json','/bitcoincharts/{currency}/orderbook.json');

		// Init curl
		static $ch = null; $ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; LocalBitcoins API PHP client; '.php_uname('s').'; PHP/'.phpversion().')');

		if(SSL_VERIFYPEER!==true)
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		if(SSL_VERIFYHOST!==true)
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		// Build NONCE
		$mt = explode(' ', microtime());
		$API_AUTH_NONCE = $mt[1].substr($mt[0], 2, 6);

		// Post ? Get ? Public ?
		$is_post = $is_get = $is_public = false;
		$datas = '';
		if (in_array($url,$api_post))
		{
			if (!empty($post))
				$datas = http_build_query($post,'','&');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
			$is_post = true;
		}
		elseif (in_array($url,$api_get))
		{
			if (!empty($get))
				$datas = http_build_query($get,'','&');
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			$is_get = true;
		}
		else
		{
			if (!empty($get))
				$datas = http_build_query($get,'','&');
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			$is_public = true;
		}

		// Something to replace in $url ?
		if(!empty($search))
			$url = str_replace($search,$replace,$url);

		// Add Auth
		if(!$is_public)
		{
			$API_AUTH_SIGNATURE = strtoupper(hash_hmac('sha256', $API_AUTH_NONCE.($this->API_AUTH_KEY).$url.$datas, ($this->API_AUTH_SECRET)));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Apiauth-Key:'.($this->API_AUTH_KEY), 'Apiauth-Nonce:'.$API_AUTH_NONCE, 'Apiauth-Signature:'.$API_AUTH_SIGNATURE));
		}

		// Add Get params
		if (!$is_post && !empty($datas))
			$url .= '?'.$datas;

		// Let's go!
		curl_setopt($ch, CURLOPT_URL, 'https://localbitcoins.com'.$url);
		$res = curl_exec($ch);

		// website/api error ?
		if ($res === false)
			throw new Exception('Could not get reply: '.curl_error($ch));

		// return result
		return json_decode($res);
	}
}
class LocalBitcoins_Advertisements_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function Ads($optional='') {
		if (!empty($optional))
			$res = $this->Query('/api/ads/','',$optional);
		else
			$res = $this->Query('/api/ads/');
		return $res;
	}

	public function AdGet($ad_id) {
		if (strpos($ad_id,',')!==false)
			$res = $this->Query('/api/ad-get/','',array('ads'=>$ad_id));
		else
			$res = $this->Query('/api/ad-get/{ad_id}/','','',array('{ad_id}'),array($ad_id));
		return $res;
	}

	public function AdEdit($ad_id,$arguments) {
		return $this->Query('/api/ad/{ad_id}/',$arguments,'',array('{ad_id}'),array($ad_id));
	}

	public function AdCreate($arguments) {
		return $this->Query('/api/ad-create/',$arguments);
	}

	public function AdDelete($ad_id) {
		return $this->Query('/api/ad-delete/{ad_id}/','','',array('{ad_id}'),array($ad_id));
	}

	public function PaymentMethods($countrycode='') {
		if (!empty($countrycode))
			$res = $this->Query('/api/payment_methods/{countrycode}/','','',array('{countrycode}'),array($countrycode));
		else
			$res = $this->Query('/api/payment_methods/');
		return $res;
	}

	public function Countrycodes() {
		return $this->Query('/api/countrycodes/');
	}

	public function Currencies() {
		return $this->Query('/api/currencies/');
	}

	public function Places($arguments) {
		return $this->Query('/api/places/','',$arguments);
	}
}

class LocalBitcoins_Trades_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function Feedback($username,$feedback,$msg='') {
		if (!empty($msg))
			$res = $this->Query('/api/feedback/{username}/',array('feedback'=>$feedback,'msg'=>$msg),'',array('{username}'),array($username));
		else
			$res = $this->Query('/api/feedback/{username}/',array('feedback'=>$feedback),'',array('{username}'),array($username));
		return $res;
	}

	public function ContactRelease($contact_id) {
		return $this->Query('/api/contact_release/{contact_id}/',array('contact_id'=>$contact_id),'',array('{contact_id}'),array($contact_id));
	}

	public function ContactReleasePin($contact_id,$pincode) {
		return $this->Query('/api/contact_release_pin/{contact_id}/',array('pincode'=>$pincode),'',array('{contact_id}'),array($contact_id));
	}

	public function ContactMarkAsPaid($contact_id) {
		return $this->Query('/api/contact_mark_as_paid/{contact_id}/','','',array('{contact_id}'),array($contact_id));
	}

	public function ContactMessages($contact_id) {
		return $this->Query('/api/contact_messages/{contact_id}/','','',array('{contact_id}'),array($contact_id));
	}

	public function ContactMessagePost($contact_id,$msg,$document='') {
		if (!empty($document))
			$res = $this->Query('/api/contact_message_post/{contact_id}/',array('msg'=>$msg,'document'=>'@'.realpath($document)),'',array('{contact_id}'),array($contact_id));
		else
			$res = $this->Query('/api/contact_message_post/{contact_id}/',array('msg'=>$msg,),'',array('{contact_id}'),array($contact_id));			
		return $res;		
	}

	public function ContactDispute($contact_id,$topic='') {
		if (!empty($topic))
			$res = $this->Query('/api/contact_dispute/{contact_id}/',array('topic'=>$topic),'',array('{contact_id}'),array($contact_id));
		else
			$res = $this->Query('/api/contact_dispute/{contact_id}/','','',array('{contact_id}'),array($contact_id));
		return $res;		
	}

	public function ContactCancel($contact_id) {
		return $this->Query('/api/contact_cancel/{contact_id}/','','',array('{contact_id}'),array($contact_id));
	}

	public function ContactFund($contact_id) {
		return $this->Query('/api/contact_fund/{contact_id}/','','',array('{contact_id}'),array($contact_id));		
	}

	public function ContactMarkRealName($contact_id,$confirmation_status,$id_confirmed) {
		return $this->Query('/api/contact_mark_realname/{contact_id}/',array('confirmation_status'=>$confirmation_status,'id_confirmed'=>$id_confirmed),'',array('{contact_id}'),array($contact_id));	
	}

	public function ContactMarkIdentified($contact_id) {
		return $this->Query('/api/contact_mark_identified/{contact_id}/','','',array('{contact_id}'),array($contact_id));		
	}

	public function ContactCreate($ad_id,$amount,$message='') {
		if (!empty($message))
			$res = $this->Query('/api/contact_create/{ad_id}/',array('amount'=>$amount,'message'=>$message),'',array('{ad_id}'),array($ad_id));
		else
			$res = $this->Query('/api/contact_create/{ad_id}/',array('amount'=>$amount),'',array('{ad_id}'),array($ad_id));
		return $res;		
	}

	public function ContactInfo($contact_id='')	{
		if (strpos($contact_id,',')!==false)
			$res = $this->Query('/api/contact_info/','',array('contacts'=>$contact_id));
		else
			$res = $this->Query('/api/contact_info/{contact_id}/','','',array('{contact_id}'),array($contact_id));
		return $res;		
	}
}

class LocalBitcoins_Account_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function Info($username) {
		return $this->Query('/api/account_info/{username}/','','',array('{username}'),array($username));
	}

	public function Dashboard($pagination='') {
		if (!empty($pagination))
			$res = $this->Query('/api/dashboard/','',$pagination);
		else
			$res = $this->Query('/api/dashboard/');
		return $res;
	}

	public function DashboardReleased($pagination='') {
		if (!empty($pagination))
			$res = $this->Query('/api/dashboard/released/','',$pagination);
		else
			$res = $this->Query('/api/dashboard/released/');
		return $res;
	}

	public function DashboardCanceled($pagination='') {
		if (!empty($pagination))
			$res = $this->Query('/api/dashboard/canceled/','',$pagination);
		else
			$res = $this->Query('/api/dashboard/canceled/');
		return $res;
	}

	public function DashboardClosed($pagination='')	{
		if (!empty($pagination))
			$res = $this->Query('/api/dashboard/closed/','',$pagination);
		else
			$res = $this->Query('/api/dashboard/closed/');
		return $res;
	}

	public function Logout() {
		return $this->Query('/api/logout/');
	}

	public function Myself() {
		return $this->Query('/api/myself/');
	}

	public function Notifications() {
		return $this->Query('/api/notifications/');
	}

	public function NotificationsMarkAsRead($notification_id) {
		return $this->Query('/api/notifications/mark_as_read/{notification_id}/','','',array('{notification_id}'),array($notification_id));
	}

	public function Pincode($pincode) {
		return $this->Query('/api/pincode/',array('pincode'=>$pincode));
	}

	public function RealNameVerifiers($username) {
		return $this->Query('/api/real_name_verifiers/{username}/','','',array('{username}'),array($username));
	}

	public function RecentMessages($after='') {
		if (!empty($after))
			$res = $this->Query('/api/recent_messages/','',array('after'=>$after));
		else
			$res = $this->Query('/api/recent_messages/');
		return $res;
	}
}

class LocalBitcoins_Merchant_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function Invoices($pagination='') {
		if (!empty($pagination))
			$res = $this->Query('/api/merchant/invoices/','',$pagination);
		else
			$res = $this->Query('/api/merchant/invoices/');
		return $res;
	}

	public function NewInvoice($arguments) {
		return $this->Query('/api/merchant/new_invoice/',$arguments);
	}

	public function Invoice($id) {
		return $this->Query('/api/merchant/invoice/{invoice_id}/','','',array('{invoice_id}'),array($id));
	}

	public function DeleteInvoice($id) {
		return $this->Query('/api/merchant/delete_invoice/{invoice_id}/','','',array('{invoice_id}'),array($id));
	}
}

class LocalBitcoins_Wallet_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function Infos() {
		return $this->Query('/api/wallet/');
	}

	public function Balance() {
		return $this->Query('/api/wallet-balance/');
	}

	public function Send($address,$amount) {
		return $this->Query('/api/wallet-send/',array('address'=>$address,'amount'=>$amount));
	}

	public function SendPin($address,$amount,$pincode) {
		return $this->Query('/api/wallet-send/',array('address'=>$address,'amount'=>$amount,'pincode'=>$pincode));
	}

	public function Addr() {
		return $this->Query('/api/wallet-addr/');
	}

}

class LocalBitcoins_Public_API extends LocalBitcoins {

	public function __construct($API_AUTH_KEY=null,$API_AUTH_SECRET=null) {
		$this->API_AUTH_KEY 	= $API_AUTH_KEY;
        $this->API_AUTH_SECRET 	= $API_AUTH_SECRET;
	}

	public function BuyBitcoinsWithCash($arguments) {
		return $this->Query('/buy-bitcoins-with-cash/{location_id}/{location_slug}/.json','','',array('{location_id}','{location_slug}'),array($arguments['location_id'],$arguments['location_slug']));
	}

	public function SellBitcoinsForCash($arguments) {
		return $this->Query('/sell-bitcoins-for-cash/{location_id}/{location_slug}/.json','','',array('{location_id}','{location_slug}'),array($arguments['location_id'],$arguments['location_slug']));
	}

	public function BuyBitcoinsOnline($page=1,$arguments=array()) {
		if (!empty($arguments['countrycode']) && !empty($arguments['country_name']) && !empty($arguments['payment_method']))
			$res = $this->Query('/buy-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json','',array('page'=>$page),array('{countrycode:2}','{country_name}','{payment_method}'),array($arguments['countrycode'],$arguments['country_name'],$arguments['payment_method']));
		elseif (!empty($arguments['countrycode']) && !empty($arguments['country_name']))
			$res = $this->Query('/buy-bitcoins-online/{countrycode:2}/{country_name}/.json','',array('page'=>$page),array('{countrycode:2}','{country_name}'),array($arguments['countrycode'],$arguments['country_name']));
		elseif (!empty($arguments['currency'])&& !empty($arguments['payment_method']))
			$res = $this->Query('/buy-bitcoins-online/{currency:3}/{payment_method}/.json','',array('page'=>$page),array('{currency:3}','{payment_method}'),array($arguments['currency'],$arguments['payment_method']));
		elseif (!empty($arguments['currency']))
			$res = $this->Query('/buy-bitcoins-online/{currency:3}/.json','',array('page'=>$page),array('{currency:3}'),array($arguments['currency']));
		elseif (!empty($arguments['payment_method']))
			$res = $this->Query('/buy-bitcoins-online/{payment_method}/.json','',array('page'=>$page),array('{payment_method}'),array($arguments['payment_method']));
		else
			$res = $this->Query('/buy-bitcoins-online/.json','',array('page'=>$page));
		return $res;
	}

	public function SellBitcoinsOnline($page=1,$arguments=array()) {
		if (!empty($arguments['countrycode']) && !empty($arguments['country_name']) && !empty($arguments['payment_method']))
			$res = $this->Query('/sell-bitcoins-online/{countrycode:2}/{country_name}/{payment_method}/.json','',array('page'=>$page),array('{countrycode:2}','{country_name}','{payment_method}'),array($arguments['countrycode'],$arguments['country_name'],$arguments['payment_method']));
		elseif (!empty($arguments['countrycode']) && !empty($arguments['country_name']))
			$res = $this->Query('/sell-bitcoins-online/{countrycode:2}/{country_name}/.json','',array('page'=>$page),array('{countrycode:2}','{country_name}'),array($arguments['countrycode'],$arguments['country_name']));
		elseif (!empty($arguments['currency'])&& !empty($arguments['payment_method']))
			$res = $this->Query('/sell-bitcoins-online/{currency:3}/{payment_method}/.json','',array('page'=>$page),array('{currency:3}','{payment_method}'),array($arguments['currency'],$arguments['payment_method']));
		elseif (!empty($arguments['currency']))
			$res = $this->Query('/sell-bitcoins-online/{currency:3}/.json','',array('page'=>$page),array('{currency:3}'),array($arguments['currency']));
		elseif (!empty($arguments['payment_method']))
			$res = $this->Query('/sell-bitcoins-online/{payment_method}/.json','',array('page'=>$page),array('{payment_method}'),array($arguments['payment_method']));
		else
			$res = $this->Query('/sell-bitcoins-online/.json','',array('page'=>$page));
		return $res;
	}

	public function Bitcoinaverage() {
		return $this->Query('/bitcoinaverage/ticker-all-currencies/');
	}

	public function ClosedTrades($currency='USD',$since='') {
		if (!empty($since))
			$res = $this->Query('/bitcoincharts/{currency}/trades.json','',array('since'=>$since),array('{currency}'),array($currency));
		else
			$res = $this->Query('/bitcoincharts/{currency}/trades.json','','',array('{currency}'),array($currency));
		return $res;
	}

	public function Orderbook($currency='USD') {
		return $this->Query('/bitcoincharts/{currency}/orderbook.json','','',array('{currency}'),array($currency));
	}
}
