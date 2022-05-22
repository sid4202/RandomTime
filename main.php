<?php

require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;
use Carbon\Carbon;

$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv->load();

$min = intval($_ENV["MIN_NUMBER"]);
$max = intval($_ENV["MAX_NUMBER"]);

$daysToAdd = rand($min,$max);

echo Carbon::now()->addDays($daysToAdd)->floorDay()->toDateString();
