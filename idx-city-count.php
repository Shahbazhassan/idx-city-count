// access URL and request method
$cityId = '35496';
$accesskey = 'Enter Your Access Key';
$url = 'https://api.idxbroker.com/mls/propertycount/a002?countType=city&countSpecifier='.$cityId;
$method = 'GET';

// headers (required and optional)
$headers = array(
	'Content-Type: application/x-www-form-urlencoded', // required
	'accesskey: '.$accesskey, // required - replace with your own
	'outputtype: json' // optional - overrides the preferences in our API control page
);

// set up cURL
$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

// exec the cURL request and returned information. Store the returned HTTP code in $code for later reference
$response = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code >= 200 || $code < 300)
	$count = json_decode($response,true);
else
	$error = $code;

echo '<pre>';
print_r($response);
echo '<br>';
print_r($code);
echo '<br>';
print_r($count);
echo '<br>';
print_r($error);
