<?php

$client = new SoapClient('https://portal.unimedjaboticabal.coop.br/gcs/tiss/solicitacaoProcedimento');

$sXml = '<solicitacaoProcedimentoWS xmlns:ans="http://www.ans.gov.br/padroes/tiss/schemas"
		                               xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		                               xsi:schemaLocation="http://www.ans.gov.br/padroes/tiss/schemas http://www.ans.gov.br/padroes/tiss/schemas/tissV3_03_01.xsd">
			<cabecalho>
				<identificacaoTransacao>
					<tipoTransacao>SOLICITACAO_PROCEDIMENTOS</tipoTransacao>
					<sequencialTransacao>297900</sequencialTransacao>
					<dataRegistroTransacao>2023-05-16</dataRegistroTransacao>
					<horaRegistroTransacao>10:29:40</horaRegistroTransacao>
				</identificacaoTransacao>
				<origem>
					<identificacaoPrestador>
						<codigoPrestadorNaOperadora>272700000046</codigoPrestadorNaOperadora>
					</identificacaoPrestador>
				</origem>
				<destino>
					<registroANS>329886</registroANS>
				</destino>
				<Padrao>3.03.01</Padrao>
				<loginSenhaPrestador>
					<loginPrestador>272700000046</loginPrestador>
					<senhaPrestador>27a163de3d43063cf32c51a61723f00f</senhaPrestador>
				</loginSenhaPrestador>
			</cabecalho>
			<solicitacaoProcedimento>
				<solicitacaoSP-SADT>
					<cabecalhoSolicitacao>
						<registroANS>329886</registroANS>
						<numeroGuiaPrestador>1172134</numeroGuiaPrestador>
					</cabecalhoSolicitacao>
					<dadosBeneficiario>
						<numeroCarteira>2727890237566006</numeroCarteira>
						<atendimentoRN>N</atendimentoRN>
						<nomeBeneficiario>AARON MARTINS PERDIZ</nomeBeneficiario>
					</dadosBeneficiario>
					<dadosSolicitante>
						<contratadoSolicitante>
							<codigoPrestadorNaOperadora>272700000046</codigoPrestadorNaOperadora>
							<nomeContratado>FERNANDO PEDRAO GROTTA</nomeContratado>
						</contratadoSolicitante>
						<profissionalSolicitante>
							<nomeProfissional>FERNANDO PEDRAO GROTTA</nomeProfissional>
							<conselhoProfissional>06</conselhoProfissional>
							<numeroConselhoProfissional>227010</numeroConselhoProfissional>
							<UF>35</UF>
							<CBOS>225125</CBOS>
						</profissionalSolicitante>
					</dadosSolicitante>
					<caraterAtendimento>2</caraterAtendimento>
					<dataSolicitacao>2023-03-25</dataSolicitacao>
					<procedimentosSolicitados>
						<procedimento>
							<codigoTabela>22</codigoTabela>
							<codigoProcedimento>10101039</codigoProcedimento>
							<descricaoProcedimento>EM PRONTO SOCORRO</descricaoProcedimento>
						</procedimento>
						<quantidadeSolicitada>1</quantidadeSolicitada>
					</procedimentosSolicitados>
				</solicitacaoSP-SADT>
			</solicitacaoProcedimento>
			<hash>8648feb8ac132407db08b2731feec770</hash>
		</solicitacaoProcedimentoWS>';

$xml = simplexml_load_string($sXml);

try {
    $result = $client->tissSolicitacaoProcedimento_Operation($xml);
    $json_data = json_encode($result, JSON_PARTIAL_OUTPUT_ON_ERROR);
    echo $json_data;

} catch(Exception $e){
    $e->getMessage();
}