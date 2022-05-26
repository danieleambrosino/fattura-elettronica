<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiTrasportoType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\AnagraficaType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

class DatiAnagraficiVettoreType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly IdFiscaleType $idFiscaleIVA,

		#[Length(min: 11, max: 16)]
		public readonly ?string $codiceFiscale = null,

		#[Valid]
		public readonly AnagraficaType $anagrafica,

		#[Length(max: 20)]
		public readonly ?string $numeroLicenzaGuida = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->idFiscaleIVA->toXml('IdFiscaleIVA', $writer);
		if ($this->codiceFiscale) {
			$writer->writeElement('CodiceFiscale', $this->codiceFiscale);
		}
		$this->anagrafica->toXml('Anagrafica', $writer);
		if ($this->numeroLicenzaGuida) {
			$writer->writeElement('NumeroLicenzaGuida', $this->numeroLicenzaGuida);
		}
	}
}
