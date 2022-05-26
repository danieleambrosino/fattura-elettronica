<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class AnagraficaType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 80)]
		public readonly ?string $denominazione = null,

		#[Length(max: 60)]
		public readonly ?string $nome = null,

		#[Length(max: 60)]
		public readonly ?string $cognome = null,

		#[Length(min: 2, max: 10)]
		public readonly ?string $titolo = null,

		#[Length(min: 13, max: 17)]
		public readonly ?string $codEORI = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->denominazione) {
			$writer->writeElement('Denominazione', $this->denominazione);
		} else {
			$writer->writeElement('Nome', $this->nome);
			$writer->writeElement('Cognome', $this->cognome);
		}
		if ($this->titolo) {
			$writer->writeElement('Titolo', $this->titolo);
		}
		if ($this->codEORI) {
			$writer->writeElement('CodEORI', $this->codEORI);
		}
	}
}
