<?php
class expedia {
	/**
	* send message to Expedia Hotel Web Service
	* @return json object decoded.
	**/
	function sendRequest($url){
		$header[] = "Accept: application/json";
		$header[] = "Accept-Encoding: gzip";
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt($ch,CURLOPT_ENCODING , "gzip");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		return json_decode(curl_exec($ch));
	}

}

// simple example to consume rest response in json format for hotel availablitiy.
 $expedia = new expedia();
 echo '<pre>';
 $url  ='http://dev.api.ean.com/ean-services/rs/hotel/v3/avail?minorRev=28&cid=xxx&apiKey=xxx&customerIpAddress=127.0.0.1&customerUserAgent=UATEST&customerSessionId=123&locale=en_US&currencyCode=USD&hotelId=125719&arrivalDate=11/11/2015&departureDate=11/13/2015&includeDetails=true&includeRoomImages=true&room1=2,5,7';
 print_r($expedia->sendRequest($url));
 	exit;
