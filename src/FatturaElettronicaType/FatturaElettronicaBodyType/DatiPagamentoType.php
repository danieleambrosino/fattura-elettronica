<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use XMLWriter;

class DatiGeneraliType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly CondizioniPagamento $condizioniPagamento,
		public readonly array $dettaglioPagamento,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
	}
}
