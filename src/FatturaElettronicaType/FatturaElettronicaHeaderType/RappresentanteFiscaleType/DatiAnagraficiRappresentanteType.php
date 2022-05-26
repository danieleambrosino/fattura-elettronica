<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\RappresentanteFiscaleType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\AnagraficaType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use DanieleAmbrosino\FatturaElettronica\XmlSerializableInterface;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

final class DatiAnagraficiRappresentanteType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly IdFiscaleType $idFiscaleIVA,

		#[Length(min: 11, max: 16)]
		public readonly ?string $codiceFiscale = null,

		#[Valid]
		public readonly ?AnagraficaType $anagrafica,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->idFiscaleIVA->toXml('IdFiscaleIVA', $writer);
		if ($this->codiceFiscale) {
			$writer->writeElement('CodiceFiscale', $this->codiceFiscale);
		}
		if ($this->anagrafica) {
			$this->anagrafica->toXml('Anagrafica', $writer);
		}
	}
}
