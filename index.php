<?php

$sUrl = $argv[1]; // Link
$sArq = $argv[2]; // Arquivo (xml/json) em formato texto
$sMet = $argv[3]; // Método a ser envocado

$nTpc = $argv[4] ?? '1'; // Tipo de conteúdo. 1 => string to xml / 2 => string to json

//trace: habilitar as funções de debug (todas iniciam com "__").
//Exceptions: ativará que os erros serão lançados via exceptions (SoapFault)
//cache_wsdl: com o parâmetro WSDL_CACHE_NONE, não haverá cache.
$client = new SoapClient(
    $sUrl,
    array( 
        'trace' => 1, 
        'exceptions' => true, 
        'cache_wsdl' => WSDL_CACHE_NONE
    ) 
);

if ($nTpc == '1') {
    $con = simplexml_load_string($sArq);
} else {
    $con = json_decode($sArq,TRUE);
}

try {
    $result = $client->$sMet($con);
    $json_data = json_encode($result, JSON_PARTIAL_OUTPUT_ON_ERROR);
    echo $json_data;

} catch(SoapFault $exception) {
    echo $exception->getMessage();

}