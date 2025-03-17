<?php

require 'utils.php';

header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('Content-Type: application/json'); // Ensure all responses are JSON

// url path values
$baseUrl = 'https://api.briapidevstudio.dev.bbri.io/mock'; //base url

try {
  list($clientId, $clientSecret, $privateKey) = getCredentials();

  $accessToken = getAccessToken(
    $clientId,
    $baseUrl,
    $privateKey
  );

  $externalId = '41807553358950093184162180797837';
  $origin = 'bri.co.id';
  $ipAddress = '172.24.281.24';
  $deviceId = '09864ADCASA';
  $latitude = '-6.108841';
  $longitude = '106.7782137';
  $channelId = '95221';

  $validateInputs = sanitizeInput([
    'externalId' => $externalId,
    'origin' => $origin,
    'ipAddress' => $ipAddress,
    'deviceId' => $deviceId,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'channelId' => $channelId
  ]);

  $response = fetchNotifyPayment(
    $baseUrl,
    $clientId,
    $clientSecret,
    $externalId,
    $ipAddress,
    $deviceId,
    $latitude,
    $longitude,
    $channelId,
    $origin,
    $accessToken
  );

  echo $response;
} catch (InvalidArgumentException $e) {
  // Return a generic error message to the client
  http_response_code(400); // Bad Request

  // Log the error for debugging
  error_log('InvalidArgumentException: ' . $e->getMessage());
} catch (RuntimeException $e) {
  // Return a generic error message to the client
  http_response_code(500); // Internal Server Error

  // Log the error for debugging
  error_log('RuntimeException: ' . $e->getMessage());
} catch (Exception $e) {
  // Return a generic error message to the client
  http_response_code(500); // Internal Server Error

  // Log any other unexpected errors for debugging
  error_log('UnexpectedException: ' . $e->getMessage());
}
