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
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiVeicoliType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\AllegatoType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;
use XMLWriter;

class FatturaElettronicaBodyType extends AbstractXmlSerializable
{
	// const FE_CODE = '2.0';

	/**
	 * @param iterable<DatiPagamentoType> $datiPagamento 
	 * @param iterable<AllegatoType> $allegati 
	 */
	public function __construct(
		public readonly DatiGeneraliType $datiGenerali,
		public readonly DatiBeniServiziType $datiBeniServizi,
		public readonly ?DatiVeicoliType $datiVeicoli = null,
		public readonly iterable $datiPagamento = [],
		public readonly iterable $allegati = [],
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiGenerali->toXml('DatiGenerali', $writer);
		$this->datiBeniServizi->toXml('DatiBeniServizi', $writer);
		if ($this->datiVeicoli) {
			$this->datiVeicoli->toXml('DatiVeicoli', $writer);
		}
		foreach ($this->datiPagamento as $datiPagamento) {
			$datiPagamento->writeXml('DatiPagamento', $writer);
		}
		foreach ($this->allegati as $allegato) {
			$allegato->toXml('Allegati', $writer);
		}
	}
}
