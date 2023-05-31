<?php

$sUrl = $argv[1]; // Link
$sXml = $argv[2]; // Arquivo xml em formato texto
$sMet = $argv[3]; // Método a ser envocado

$client = new SoapClient($sUrl);

$xml = simplexml_load_string($sXml);

try {
    $result = $client->$sMet($xml);
    $json_data = json_encode($result, JSON_PARTIAL_OUTPUT_ON_ERROR);
    echo $json_data;

} catch(Exception $e){
    $e->getMessage();
	
}