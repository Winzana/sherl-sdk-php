<?php
require __DIR__  . '/vendor/autoload.php';

use Sherl\Sdk\Common\SherlClient;

use Sherl\Sdk\Notification\Dto\NotificationFiltersInputDto;

$env = parse_ini_file('.env');

$sherlClient = new SherlClient(
  $env['API_KEY'],
  $env['API_SECRET'],
  "http://localhost:4200",
  "https://api.sandbox.sherl.io",
);

$login = $sherlClient->auth->signInWithEmailAndPassword($env['USERNAME'], $env['PASSWORD']);

$sherlClient->registerAuthToken($login->access_token);

$filters = new NotificationFiltersInputDto();
$filters->sms = 1;
$filters->email = 1; // Supposons que vous voulez aussi filtrer les notifications par email
$filters->uri = "http://example.com"; // Mettez ici l'URI souhaité
$filters->id = "some-unique-id"; // Mettez ici l'ID souhaité

$me = $sherlClient->notification->getNotifications($filters);
