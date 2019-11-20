<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\TransferStats;
use function GuzzleHttp\Psr7\str;

require './vendor/autoload.php';

$sr = ServerRequest::fromGlobals();

$request = new Request($sr->getMethod(), substr($sr->getUri()->getPath(), 1), $sr->getHeaders(), $sr->getBody());
//$serverRequest = $serverRequest->withRequestTarget($uri->getPath());

$guzzle = new Client([
    'verify'      => false,
    'http_errors' => false,
    'timeout'     => 1,
]);

$response = $guzzle->send($request);

echo str($response);
