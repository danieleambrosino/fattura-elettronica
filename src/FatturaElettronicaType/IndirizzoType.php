<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class IndirizzoType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 60)]
		public readonly string $indirizzo,

		#[Length(max: 8)]
		public readonly ?string $numeroCivico = null,

		#[Length(exactly: 5)]
		public readonly string $cap,

		#[Length(max: 60)]
		public readonly string $comune,

		#[Length(exactly: 2)]
		public readonly ?string $provincia = null,

		#[Length(exactly: 2)]
		public readonly string $nazione,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('Indirizzo', $this->indirizzo);
		if ($this->numeroCivico) {
			$writer->writeElement('NumeroCivico', $this->numeroCivico);
		}
		$writer->writeElement('CAP', $this->cap);
		$writer->writeElement('Comune', $this->comune);
		if ($this->provincia) {
			$writer->writeElement('Provincia', $this->provincia);
		}
		$writer->writeElement('Nazione', $this->nazione);
	}
}
