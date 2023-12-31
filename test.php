<?php
require __DIR__  . '/vendor/autoload.php';

use Sherl\Sdk\Common\SherlClient;

$env = parse_ini_file('.env');

$sherlClient = new SherlClient(
  $env['API_KEY'],
  $env['API_SECRET'],
  "http://localhost:4200",
  "https://api.sandbox.sherl.io",
);

$login = $sherlClient->auth->signInWithEmailAndPassword($env['USERNAME'], $env['PASSWORD']);

$sherlClient->registerAuthToken($login->access_token);

$me = $sherlClient->person->getMe();