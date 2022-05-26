<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CessionarioCommittenteType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\AnagraficaType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use DanieleAmbrosino\FatturaElettronica\XmlSerializableInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

final class DatiAnagraficiCessionarioType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly AnagraficaType $anagrafica,

		#[Valid]
		public readonly ?IdFiscaleType $idFiscaleIVA = null,

		#[Length(min: 11, max: 16)]
		public readonly ?string $codiceFiscale = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->idFiscaleIVA) {
			$this->idFiscaleIVA->toXml('IdFiscaleIVA', $writer);
		}
		if ($this->codiceFiscale) {
			$writer->writeElement('CodiceFiscale', $this->codiceFiscale);
		}
		$this->anagrafica->toXml('Anagrafica', $writer);
	}
}
