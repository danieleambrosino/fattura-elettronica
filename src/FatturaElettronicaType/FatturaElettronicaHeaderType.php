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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType\RappresentanteFiscaleType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CessionarioCommittenteType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\DatiTrasmissioneType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\SoggettoEmittente;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\TerzoIntermediarioSoggettoEmittenteType;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

class FatturaElettronicaHeaderType extends AbstractXmlSerializable
{
	const FE_CODE = 1.0;

	public function __construct(
		#[Valid]
		public readonly DatiTrasmissioneType $datiTrasmissione,

		#[Valid]
		public readonly CedentePrestatoreType $cedentePrestatore,

		#[Valid]
		public readonly CessionarioCommittenteType $cessionarioCommittente,

		#[Valid]
		public readonly ?RappresentanteFiscaleType $rappresentanteFiscale = null,

		#[Valid]
		public readonly ?TerzoIntermediarioSoggettoEmittenteType $terzoIntermediarioSoggettoEmittente = null,

		public readonly ?SoggettoEmittente $soggettoEmittente = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiTrasmissione->toXml('DatiTrasmissione', $writer);
		$this->cedentePrestatore->toXml('CedentePrestatore', $writer);
		if ($this->rappresentanteFiscale) {
			$this->rappresentanteFiscale->toXml('RappresentanteFiscale', $writer);
		}
		$this->cessionarioCommittente->toXml('CessionarioCommittente', $writer);
		if ($this->terzoIntermediarioSoggettoEmittente) {
			$this->terzoIntermediarioSoggettoEmittente->toXml('TerzoIntermediarioSoggettoEmittente', $writer);
		}
		if ($this->soggettoEmittente) {
			$writer->writeElement('SoggettoEmittente', $this->soggettoEmittente->value);
		}
	}
}
