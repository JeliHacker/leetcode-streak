<?php
require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://leetcode.com/JeliHacker/');
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$titles = $xpath->evaluate('//div[@class="text-label-1 dark:text-dark-label-1 break-all text-base font-semibold"]');
foreach ($titles as $key => $title) {
    echo $title->textContent;
}