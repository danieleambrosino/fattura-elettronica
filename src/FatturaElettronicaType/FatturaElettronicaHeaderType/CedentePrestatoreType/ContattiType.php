<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class ContattiType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(min: 5, max: 12)]
		public readonly ?string $telefono = null,

		#[Length(min: 5, max: 12)]
		public readonly ?string $fax = null,

		#[Length(min: 7, max: 256)]
		public readonly ?string $email = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->telefono) {
			$writer->writeElement('Telefono', $this->telefono);
		}
		if ($this->fax) {
			$writer->writeElement('Fax', $this->fax);
		}
		if ($this->email) {
			$writer->writeElement('Email', $this->email);
		}
	}
}
