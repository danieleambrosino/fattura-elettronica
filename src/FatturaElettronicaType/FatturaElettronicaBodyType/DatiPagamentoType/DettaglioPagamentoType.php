<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiPagamentoType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DateInterval;
use DateTimeInterface;
use XMLWriter;

class DettaglioPagamentoType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly ?string $beneficiario = null,
		public readonly ModalitaPagamento $modalitaPagamento,
		public readonly ?DateTimeInterface $dataRiferimentoTerminiPagamento = null,
		public readonly ?DateInterval $giorniTerminiPagamento = null,
		public readonly ?DateTimeInterface $dataScadenzaPagamento = null,
		public readonly float $importoPagamento,
		public readonly ?string $codUfficioPostale = null,
		public readonly ?string $cognomeQuietanzante = null,
		public readonly ?string $nomeQuietanzante = null,
		public readonly ?string $cfQuietanzante = null,
		public readonly ?string $titoloQuietanzante = null,
		public readonly ?string $istitutoFinanziario = null,
		public readonly ?string $iban = null,
		public readonly ?int $abi = null,
		public readonly ?int $cab = null,
		public readonly ?int $bic = null,
		public readonly ?float $scontoPagamentoAnticipato = null,
		public readonly ?DateTimeInterface $dataLimitePagamentoAnticipato = null,
		public readonly ?float $penalitaPagamentiRitardati = null,
		public readonly ?DateTimeInterface $dataDecorrenzaPenale = null,
		public readonly ?string $codicePagamento = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->beneficiario) {
			$writer->writeElement('Beneficiario', $this->beneficiario);
		}
		$writer->writeElement('ModalitaPagamento', $this->modalitaPagamento->value);
		if ($this->dataRiferimentoTerminiPagamento) {
			$writer->writeElement('DataRiferimentoTerminiPagamento', $this->dataRiferimentoTerminiPagamento->format('Y-m-d'));
		}
		if ($this->giorniTerminiPagamento) {
			$writer->writeElement('GiorniTerminiPagamento', $this->giorniTerminiPagamento->days);
		}
		if ($this->dataScadenzaPagamento) {
			$writer->writeElement('DataScadenzaPagamento', $this->dataScadenzaPagamento->format('Y-m-d'));
		}
		$writer->writeElement('ImportoPagamento', $this->importoPagamento);
		if ($this->codUfficioPostale) {
			$writer->writeElement('CodUfficioPostale', $this->codUfficioPostale);
		}
		if ($this->cognomeQuietanzante) {
			$writer->writeElement('CognomeQuietanzante', $this->cognomeQuietanzante);
		}
		if ($this->nomeQuietanzante) {
			$writer->writeElement('NomeQuietanzante', $this->nomeQuietanzante);
		}
		if ($this->cfQuietanzante) {
			$writer->writeElement('CfQuietanzante', $this->cfQuietanzante);
		}
		if ($this->titoloQuietanzante) {
			$writer->writeElement('TitoloQuietanzante', $this->titoloQuietanzante);
		}
		if ($this->istitutoFinanziario) {
			$writer->writeElement('IstitutoFinanziario', $this->istitutoFinanziario);
		}
		if ($this->iban) {
			$writer->writeElement('IBAN', $this->iban);
		}
		if ($this->abi) {
			$writer->writeElement('ABI', $this->abi);
		}
		if ($this->cab) {
			$writer->writeElement('CAB', $this->cab);
		}
		if ($this->bic) {
			$writer->writeElement('BIC', $this->bic);
		}
		if ($this->scontoPagamentoAnticipato) {
			$writer->writeElement('ScontoPagamentoAnticipato', $this->scontoPagamentoAnticipato);
		}
		if ($this->dataLimitePagamentoAnticipato) {
			$writer->writeElement('DataLimitePagamentoAnticipato', $this->dataLimitePagamentoAnticipato->format('Y-m-d'));
		}
		if ($this->penalitaPagamentiRitardati) {
			$writer->writeElement('PenalitaPagamentiRitardati', $this->penalitaPagamentiRitardati);
		}
		if ($this->dataDecorrenzaPenale) {
			$writer->writeElement('DataDecorrenzaPenale', $this->dataDecorrenzaPenale->format('Y-m-d'));
		}
		if ($this->codicePagamento) {
			$writer->writeElement('CodicePagamento', $this->codicePagamento);
		}
	}
}
