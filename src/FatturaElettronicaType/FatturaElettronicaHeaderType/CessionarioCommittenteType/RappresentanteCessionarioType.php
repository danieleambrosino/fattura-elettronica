<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CessionarioCommittenteType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use XMLWriter;

final class RappresentanteCessionarioType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly IdFiscaleType $idFiscaleIVA,
		public readonly ?string $denominazione = null,
		public readonly ?string $nome = null,
		public readonly ?string $cognome = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->idFiscaleIVA->toXml('IdFiscaleIVA', $writer);
		if ($this->denominazione) {
			$writer->writeElement('Denominazione', $this->denominazione);
		}
		if ($this->nome) {
			$writer->writeElement('Nome', $this->nome);
		}
		if ($this->cognome) {
			$writer->writeElement('Cognome', $this->cognome);
		}
	}
}
