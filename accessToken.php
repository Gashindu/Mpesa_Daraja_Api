<?php
$consumerKey = "dycGiZp1iKEUCGtAWQAMDEmZ41DF31w2KYDpiAvURlx8A9L6";
$consumerSecret = "SVls39AuQjFL6QYi4FsAcykM56Sdv2z4Tz9oVHWPoj0bcSPCeX2PynUMfY9CGYeo";
$access_token_url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);

// Disable SSL verification for local development
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);

// Debugging
echo "Status Code: " . $status . "<br>";
var_dump($result); // Print the full response for debugging

if ($status == 200 && isset($result->access_token)) {
    echo $access_token = $result->access_token;
} else {
    echo "Failed to get access token. Response: ";
    var_dump($result); // Print the full response if there's an error
}

if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
}

curl_close($curl);
