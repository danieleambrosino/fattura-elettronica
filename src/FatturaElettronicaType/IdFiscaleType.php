<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class IdFiscaleType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(exactly: 2)]
		public readonly string $idPaese,

		#[Length(max: 28)]
		public readonly string $idCodice,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('IdPaese', $this->idPaese);
		$writer->writeElement('IdCodice', $this->idCodice);
	}
}
