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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiDDTType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiDocumentiCorrelatiType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiSALType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiTrasportoType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\FatturaPrincipaleType;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Type;
use XMLWriter;

class DatiGeneraliType extends AbstractXmlSerializable
{
	/**
	 * @param array<DatiDocumentiCorrelatiType> $datiOrdineAcquisto 
	 * @param array<DatiDocumentiCorrelatiType> $datiContratto 
	 * @param array<DatiDocumentiCorrelatiType> $datiConvenzione 
	 * @param array<DatiDocumentiCorrelatiType> $datiRicezione 
	 * @param array<DatiDocumentiCorrelatiType> $datiFattureCollegate 
	 * @param array<DatiDDTType> $datiDDT 
	 */
	public function __construct(
		#[Valid]
		public readonly DatiGeneraliDocumentoType $datiGeneraliDocumento,

		#[All([
			new Type(DatiDocumentiCorrelatiType::class),
			new Valid(),
		])]
		public readonly array $datiOrdineAcquisto = [],

		#[All([
			new Type(DatiDocumentiCorrelatiType::class),
			new Valid(),
		])]
		public readonly array $datiContratto = [],

		#[All([
			new Type(DatiDocumentiCorrelatiType::class),
			new Valid(),
		])]
		public readonly array $datiConvenzione = [],

		#[All([
			new Type(DatiDocumentiCorrelatiType::class),
			new Valid(),
		])]
		public readonly array $datiRicezione = [],

		#[All([
			new Type(DatiDocumentiCorrelatiType::class),
			new Valid(),
		])]
		public readonly array $datiFattureCollegate = [],

		#[Valid]
		public readonly ?DatiSALType $datiSAL = null,

		#[All([
			new Type(DatiDDTType::class),
			new Valid(),
		])]
		public readonly array $datiDDT = [],

		#[Valid]
		public readonly ?DatiTrasportoType $datiTrasporto = null,

		#[Valid]
		public readonly ?FatturaPrincipaleType $fatturaPrincipale = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiGeneraliDocumento->toXml('DatiGeneraliDocumento', $writer);
		foreach ($this->datiOrdineAcquisto as $datiOrdineAcquisto) {
			$datiOrdineAcquisto->toXml('DatiDocumentiCorrelati', $writer);
		}
		foreach ($this->datiContratto as $datiContratto) {
			$datiContratto->toXml('DatiDocumentiCorrelati', $writer);
		}
		foreach ($this->datiConvenzione as $datiConvenzione) {
			$datiConvenzione->toXml('DatiDocumentiCorrelati', $writer);
		}
		foreach ($this->datiRicezione as $datiRicezione) {
			$datiRicezione->toXml('DatiDocumentiCorrelati', $writer);
		}
		foreach ($this->datiFattureCollegate as $datiFattureCollegate) {
			$datiFattureCollegate->toXml('DatiDocumentiCorrelati', $writer);
		}
		if ($this->datiSAL) {
			$this->datiSAL->toXml('DatiSAL', $writer);
		}
		foreach ($this->datiDDT as $datiDDT) {
			$datiDDT->toXml('DatiDDT', $writer);
		}
		if ($this->datiTrasporto) {
			$this->datiTrasporto->toXml('DatiTrasporto', $writer);
		}
		if ($this->fatturaPrincipale) {
			$this->fatturaPrincipale->toXml('FatturaPrincipale', $writer);
		}
	}
}
