<?php

/**
 * This file is part of deved/fattura-elettronica
 *
 * Copyright (c) Salvatore Guarino <sg@deved.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatore\IscrizioneREAType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType\ContattiType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType\DatiAnagraficiCedenteType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IndirizzoType;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Length;
use XMLWriter;

class CedentePrestatoreType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly DatiAnagraficiCedenteType $datiAnagrafici,

		#[Valid]
		public readonly IndirizzoType $sede,

		#[Valid]
		public readonly ?IndirizzoType $stabileOrganizzazione = null,

		#[Valid]
		public readonly ?IscrizioneREAType $iscrizioneRea = null,

		#[Valid]
		public readonly ?ContattiType $contatti = null,

		#[Length(max: 20)]
		public readonly ?string $riferimentoAmministrazione = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiAnagrafici->toXml('DatiAnagrafici', $writer);
		$this->sede->toXml('Sede', $writer);
		if ($this->stabileOrganizzazione) {
			$this->stabileOrganizzazione->toXml('StabileOrganizzazione', $writer);
		}
		if ($this->iscrizioneRea) {
			$this->iscrizioneRea->toXml('IscrizioneREA', $writer);
		}
		if ($this->contatti) {
			$this->contatti->toXml('Contatti', $writer);
		}
		if ($this->riferimentoAmministrazione) {
			$writer->writeElement('RiferimentoAmministrazione', $this->riferimentoAmministrazione);
		}
	}
}
