<?php
require __DIR__  . '/vendor/autoload.php';

use Sherl\Sdk\Common\SherlClient;

$sherlClient = new SherlClient(
  "b97cdb70-6a81-45f7-9004-44e85ac98975",
  "24b78f5d-577b-4ecf-8fe3-3874ad14edef",
  "http://localhost:4200",
  "https://api.sandbox.sherl.io",
);

// var_dump($sherlClient->getOptions());
// var_dump($sherlClient->getClient());

$login = $sherlClient->auth->signInWithEmailAndPassword('benoit.guelin@winzana.com', 'azertyui');

$sherlClient->registerAuthToken($login->access_token);

$me = $sherlClient->person->getMe();
var_dump($me);