<?php

namespace Aturtoko\Services;

class Aturtoko
{
	public static function get($routes, $tokens)
	{
		$url = env('SERVICES_URL', 'http://localhost').''.$routes;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    'X-Access-Token: '.$tokens
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$result = json_decode($response, true);

		return $result;
	}

	public static function post($routes, $tokens, $dataBody)
	{
		$url = env('SERVICES_URL', 'http://localhost').''.$routes;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($dataBody),
		  CURLOPT_HTTPHEADER => array(
		  	'Content-Type: application/json',
		    'X-Access-Token: '.$tokens
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$result = json_decode($response, true);

		return $result;
	}
}
