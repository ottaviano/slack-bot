<?php

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\RequestOptions;

require __DIR__ . '/app/bootstrap.php';

// Choices one URL randomly
$url = $container['parameters']['urls'][array_rand($container['parameters']['urls'])];

// Calls the URL
$httpClient = $container['http.client'];
$response = $httpClient->request('GET', $url);

// Retrieves the image URL from META tag
$data = (new Crawler((string) $response->getBody()))
    ->filterXpath('//meta[@property="og:image"]')
    ->extract(['content']);

// Calls Slack API
if (!empty($data)) {
    $httpClient->request('POST', 'https://slack.com/api/chat.postMessage', [
        RequestOptions::FORM_PARAMS => [
            'token' => $container['parameters']['slack']['bot']['token'],
            'channel' => $container['parameters']['slack']['channel'],
            'text' => $data[0],
        ],
    ]);
}

