<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
	<HEAD>
		<TITLE>fx</TITLE>
	</HEAD>
	<BODY>
		<!-- currencylayer API documentation: https://currencylayer.com/documentation -->

		<?php
		// set API Endpoint and access key (and any options of your choice)
		$endpoint = 'live';
		include 'accesskey.php';
		$access_key = $my_key;

		// Initialize CURL:
		$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);

		// Decode JSON response:
		$exchangeRates = json_decode($json, true);

		// Access the exchange rate values, e.g. GBP and print to screen:
		echo "USD/CAD: ", round($exchangeRates['quotes']['USDCAD'],3),"<br>";
		echo "CAD/USD: ", round(1 / $exchangeRates['quotes']['USDCAD'],3);		
		?>

	</BODY>
</HTML>
