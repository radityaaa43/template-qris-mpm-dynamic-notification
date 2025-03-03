<?php

use BRI\QrisMPMDynamicNotification\NotifyPayment;
use BRI\Util\ExecuteCurlRequest;
use BRI\Util\GetAccessToken;
use BRI\Util\PrepareRequest;

require __DIR__ . '/../../briapi-sdk/autoload.php';

require __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..' . '')->load();

function getCredentials(): array {
  $clientId = $_ENV['CONSUMER_KEY'] ?? null; // customer key
  $clientSecret = $_ENV['CONSUMER_SECRET'] ?? null; // customer secret
  $privateKey = $_ENV['PRIVATE_KEY'] ?? null; // private key

  return [
    $clientId,
    $clientSecret,
    $privateKey
  ];
}

function getAccessToken(
  string $clientId,
  string $baseUrl,
  string $privateKey
): string {
  $getAccessToken = new GetAccessToken();

  $accessToken = $getAccessToken->getMockOutbound(
    $clientId,
    $baseUrl,
    $privateKey
  );

  return $accessToken;
}

// Sanitize input parameters
function sanitizeInput(array $inputs): array {
  $sanitized = [];
  foreach ($inputs as $key => $value) {
      $sanitized[$key] = filter_var($value, FILTER_SANITIZE_STRING);
      if (empty($sanitized[$key])) {
          throw new Exception("Invalid input parameter for $key");
      }
  }
  return $sanitized;
}

function fetchNotifyPayment(
  string $baseUrl,
  string $clientId,
  string $clientSecret,
  string $externalId,
  string $ipAddress,
  string $deviceId,
  string $latitude,
  string $longitude,
  string $channelId,
  string $origin,
  string $accessToken
): string {
  $executeCurlRequest = new ExecuteCurlRequest();
  $prepareRequest = new PrepareRequest();

  $qrisMpmDynamicNotification = new NotifyPayment(
    $executeCurlRequest,
    $prepareRequest
  );

  $response = $qrisMpmDynamicNotification->notifyPayment(
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

  return $response;
}

