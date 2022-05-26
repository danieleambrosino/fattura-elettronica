<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DateTimeInterface;
use XMLWriter;

class DatiVeicoliType extends AbstractXmlSerializable
{

	public function __construct(
		public readonly DateTimeInterface $data,
		public readonly string $totalePercorso,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('Data', $this->data->format('Y-m-d'));
		$writer->writeElement('TotalePercorso', $this->totalePercorso);
	}
}
