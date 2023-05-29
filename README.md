# consWebServSOAP_comLine
Consumo de webservice SOAP. Execução via linha de comando

<hr>

## Dependência
```
sudo apt-get install php-soap
service apache2 restart
```

<hr>

## Teste para verificar funcionamento da dependência
```
<?php
    phpinfo();
```
get soap Soap Client => enabled 
Soap Server => enabled 
soap.wsdl_cache => 1 => 1 
soap.wsdl_cache_dir => /tmp => /tmp 
soap.wsdl_cache_enabled => 1 => 1 
soap.wsdl_cache_limit => 5 => 5 
soap.wsdl_cache_ttl => 86400 => 86400

<hr>

## Exemplo para testes
https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl
```
$client = new SoapClient("https://...");
var_dump($client->__getFunctions());
```

<hr>

## Json & Array de XML em 3 linhas:
```
$xml = simplexml_load_string($xml_string);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
```

<hr>

## Exibe informção sobre uma variável de forma legível
```
print_r($result);
```

<hr>

## Acessar um nó específico
```
$json_data = json_encode((array) $result->cabecalho);
```

<hr>

## JSON_PARTIAL_OUTPUT_ON_ERROR 
Esse parâmetro possibilita que o código seja executado mesmo com problemas durante o processamento
```
$json_data = json_encode($result, JSON_PARTIAL_OUTPUT_ON_ERROR);
```