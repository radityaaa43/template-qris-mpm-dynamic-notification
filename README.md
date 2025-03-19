# Template Qris MPM Dynamic Notification

This is a simple template for QRIS MPM Dynamic Notification SNAP BI using PHP.

module:
- [Get Token](https://developers.bri.co.id/en/docs/qris-merchant-presented-mode-mpm-dinamis-notification-v11)
- [Notify Payment QR MPM Dynamic](https://developers.bri.co.id/en/docs/qris-merchant-presented-mode-mpm-dinamis-notification-v11)
- [Get Token Dynamic](https://developers.bri.co.id/en/docs/qris-merchant-presented-mode-mpm-dinamis-notification-v11)

## List of Content
- [Instalasi](#instalasi)
  - [Prerequisites](#prerequisites)
  - [How to Setup Project](#how-to-setup-project)
  - [Get Token](#get-token)
  - [Notify Payment QR MPM Dynamic](#interbank-transfer-transfer)
  - [Get Token Dynamic](#intrabank-transfer-inquiry)
- [Caution](#caution)
- [Disclaimer](#disclaimer)

## Instalasi

### Prerequisites
- php
- composer

### How to Setup Project

```bash
1. run command `cd briapi-template-qris-mpm-dynamic-notification-php` to change directory
2. copy .env file by typing 'cp .env.example .env' in the terminal
3. fill the .env file with the required values
4. run composer install to install all dependencies
```

### Get Token
```bash
1. run command `php src/get_token.php serve`
```

### Notify Payment QR MPM Dynamic
```bash
1. fill variable $externalId, eg: '41807553358950093184162180797837'
4. fill variable $origin, eg: 'bri.co.id',
5. fill variable $ipAddress, eg: '172.24.281.24'
6. fill variable $deviceId, eg: '09864ADCASA'
7. fill variable $latitude, eg: '-6.108841'
8. fill variable $longitude, eg: '106.7782137'
9. fill variable $channelId, eg: '95221'
10. run command `php src/notify_payment.php serve`
```

### Get Token Dynamic
```bash
1. run command `php src/get_token_dynamic.php serve`
```

## Caution

Please delete the .env file before pushing to github or bitbucket

## Disclaimer

Please note that this project is just a template on the use of BRI-API php sdk and may have bugs or errors.
