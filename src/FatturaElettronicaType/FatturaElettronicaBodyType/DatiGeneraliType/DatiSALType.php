<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class DatiSALType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 3)]
		public readonly string $riferimentoFase,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('RiferimentoFase', $this->riferimentoFase);
	}
}
