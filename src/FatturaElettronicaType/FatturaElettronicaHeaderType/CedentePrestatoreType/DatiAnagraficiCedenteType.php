<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\AnagraficaType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use XMLWriter;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Date;

class DatiAnagraficiCedenteType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly IdFiscaleType $idFiscaleIVA,

		#[Valid]
		public readonly AnagraficaType $anagrafica,

		public readonly RegimeFiscale $regimeFiscale,

		#[Length(min: 11, max: 16)]
		public readonly ?string $codiceFiscale = null,

		#[Length(max: 60)]
		public readonly ?string $alboProfessionale = null,

		#[Length(exactly: 2)]
		public readonly ?string $provinciaAlbo = null,

		#[Date]
		public readonly ?string $dataIscrizioneAlbo = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->idFiscaleIVA->toXml('IdFiscaleIVA', $writer);

		if ($this->codiceFiscale) {
			$writer->writeElement('CodiceFiscale', $this->codiceFiscale);
		}

		$this->anagrafica->toXml('Anagrafica', $writer);

		if ($this->regimeFiscale) {
			$writer->writeElement('RegimeFiscale', $this->regimeFiscale->value);
		}
	}
}
