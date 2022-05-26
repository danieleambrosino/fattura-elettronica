<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\DatiTrasmissioneType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use XMLWriter;

final class ContattiTrasmittenteType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(min: 5, max: 12)]
		public readonly ?string $telefono = null,

		#[Email]
		#[Length(min: 7, max: 256)]
		public readonly ?string $email = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->telefono) {
			$writer->writeElement('Telefono', $this->telefono);
		}
		if ($this->email) {
			$writer->writeElement('Email', $this->email);
		}
	}
}
