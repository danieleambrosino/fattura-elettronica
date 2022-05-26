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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatore;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType\SocioUnico;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType\StatoLiquidazione;
use XMLWriter;
use Symfony\Component\Validator\Constraints\Length;

class IscrizioneREAType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(exactly: 2)]
		public readonly string $ufficio,

		#[Length(max: 20)]
		public readonly string $numeroRea,

		#[Length(min: 4, max: 15)]
		public readonly ?float $capitaleSociale = null,

		public readonly ?SocioUnico $socioUnico = null,

		public readonly StatoLiquidazione $statoLiquidazione,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('Ufficio', $this->ufficio);
		$writer->writeElement('NumeroREA', $this->numeroRea);
		if ($this->capitaleSociale) {
			$writer->writeElement('CapitaleSociale', fe_number_format($this->capitaleSociale));
		}
		if ($this->socioUnico) {
			$writer->writeElement('SocioUnico', $this->socioUnico->value);
		}
		$writer->writeElement('StatoLiquidazione', $this->statoLiquidazione->value);
	}
}
