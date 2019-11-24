<?php
/**
 * Created by PhpStorm.
 * User: jrhod
 * Date: 2017-11-15
 * Time: 9:01 PM
 */

require __DIR__.'/vendor/autoload.php';


$data = array('firstname' => 'Dev',
    'lastname' => 'Travis',
    'password' => 'rjean12345',
    'email' => 'rjean@viapronto.com',
    'ccnumber' => '9874563210148569',
    'banknumber' => '789',
    'accountnumber'=> '89-654'
);

$client = new \GuzzleHttp\Client([
   'base_uri' => 'http://localhost:8000',
    'defaults' => [
        'exceptions' => false,
    ], 'headers' => [ 'Content-Type' => 'application/json' ]
]);

$response = $client->post('/api/users',[
        'json' => $data
]);


echo $response->getBody();