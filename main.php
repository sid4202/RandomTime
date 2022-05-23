<?php

require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;
use Carbon\Carbon;
use GuzzleHttp\Client;

$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv->load();

$min = intval($_ENV["MIN_NUMBER"]);
$max = intval($_ENV["MAX_NUMBER"]);

$client = new GuzzleHttp\Client();
$response = $client->request('GET', "https://www.random.org/integers/?num=1&min=$min&max=$max&col=1&base=10&format=plain&rnd=new");

$daysToAdd = intval($response->getBody()->getContents());
var_dump($daysToAdd);

echo Carbon::now()->addDays($daysToAdd)->floorDay()->toDateString();
