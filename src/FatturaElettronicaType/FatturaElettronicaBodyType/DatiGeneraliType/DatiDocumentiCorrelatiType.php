<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class DatiDocumentiCorrelatiType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 4)]
		public readonly ?string $riferimentoNumeroLinea = null,

		#[Length(max: 20)]
		public readonly string $idDocumento,

		#[Date]
		public readonly ?string $data = null,

		#[Length(max: 20)]
		public readonly ?string $numItem = null,

		#[Length(max: 100)]
		public readonly ?string $codiceCommessaConvenzione = null,

		#[Length(max: 15)]
		public readonly ?string $codiceCUP = null,

		#[Length(max: 15)]
		public readonly ?string $codiceCIG = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->riferimentoNumeroLinea) {
			$writer->writeElement('RiferimentoNumeroLinea', $this->riferimentoNumeroLinea);
		}
		$writer->writeElement('IdDocumento', $this->idDocumento);
		if ($this->data) {
			$writer->writeElement('Data', $this->data);
		}
		if ($this->numItem) {
			$writer->writeElement('NumItem', $this->numItem);
		}
		if ($this->codiceCommessaConvenzione) {
			$writer->writeElement('CodiceCommessaConvenzione', $this->codiceCommessaConvenzione);
		}
		if ($this->codiceCUP) {
			$writer->writeElement('CodiceCUP', $this->codiceCUP);
		}
		if ($this->codiceCIG) {
			$writer->writeElement('CodiceCIG', $this->codiceCIG);
		}
	}
}
