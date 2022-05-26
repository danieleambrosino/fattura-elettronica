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
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CessionarioCommittenteType\DatiAnagraficiCessionarioType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CessionarioCommittenteType\RappresentanteCessionarioType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IndirizzoType;
use DanieleAmbrosino\FatturaElettronica\XmlSerializableInterface;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

class CessionarioCommittenteType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly DatiAnagraficiCessionarioType $datiAnagrafici,

		#[Valid]
		public readonly IndirizzoType $sede,

		#[Valid]
		public readonly ?IndirizzoType $stabileOrganizzazione = null,

		#[Valid]
		public readonly ?RappresentanteCessionarioType $rappresentanteFiscale = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiAnagrafici->toXml('DatiAnagrafici', $writer);
		$this->sede->toXml('Sede', $writer);
		if ($this->stabileOrganizzazione) {
			$this->stabileOrganizzazione->toXml('StabileOrganizzazione', $writer);
		}
		if ($this->rappresentanteFiscale) {
			$this->rappresentanteFiscale->toXml('RappresentanteFiscale', $writer);
		}
	}
}
