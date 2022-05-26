<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class DatiDDTType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 20)]
		public readonly string $numeroDDT,

		#[Date]
		public readonly string $dataDDT,

		#[Length(max: 4)]
		public readonly ?string $riferimentoNumeroLinea = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('NumeroDDT', $this->numeroDDT);
		$writer->writeElement('DataDDT', $this->dataDDT);
		if ($this->riferimentoNumeroLinea) {
			$writer->writeElement('RiferimentoNumeroLinea', $this->riferimentoNumeroLinea);
		}
	}
}
