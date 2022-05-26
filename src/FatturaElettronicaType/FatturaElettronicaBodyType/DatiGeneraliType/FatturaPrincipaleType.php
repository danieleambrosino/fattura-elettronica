<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class FatturaPrincipaleType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 20)]
		public readonly string $numeroFatturaPrincipale,

		public readonly DateTimeInterface $dataFatturaPrincipale,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('NumeroFatturaPrincipale', $this->numeroFatturaPrincipale);
		$writer->writeElement('DataFatturaPrincipale', $this->dataFatturaPrincipale->format('Y-m-d'));
	}
}
