<?php

$json = json_decode($argv[1], true);
$sUrl = $json['url']; // Link
$sXml = $json['xml']; // Arquivo xml em formato texto
$sMet = $json['met']; // Método a ser envocado

$client = new SoapClient($sUrl);

$xml = simplexml_load_string($sXml);

try {
    $result = $client->$sMet($xml);
    $json_data = json_encode($result, JSON_PARTIAL_OUTPUT_ON_ERROR);
    echo $json_data;

} catch(Exception $e){
    $e->getMessage();
	
}