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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGenerali;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType\DatiCassaPrevidenzialeType\TipoCassa;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\Natura;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;
use XMLWriter;

class DatiCassaPrevidenzialeType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly TipoCassa $tipoCassa,

		#[Length(min: 4, max: 6)]
		public readonly string $aliquotaCassa,

		#[Range(min: 0, max: 999999999999)]
		public readonly float $importoContributoCassa,

		#[Range(min: 0, max: 999999999999)]
		public readonly ?float $imponibileCassa = null,

		#[Range(min: 0, max: 999)]
		public readonly float $aliquotaIVA,

		public readonly ?bool $ritenuta = null,

		public readonly ?Natura $natura = null,

		#[Length(max: 20)]
		public readonly ?string $riferimentoAmministrazione = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('TipoCassa', $this->tipoCassa->value);
		$writer->writeElement('AlCassa', $this->aliquotaCassa);
		$writer->writeElement('ImportoContributoCassa', $this->importoContributoCassa);
		if ($this->imponibileCassa) {
			$writer->writeElement('ImponibileCassa', $this->imponibileCassa);
		}
		$writer->writeElement('AliquotaIVA', $this->aliquotaIVA);
		if ($this->ritenuta) {
			$writer->writeElement('Ritenuta', $this->ritenuta ? 'SI' : 'NO');
		}
		if ($this->natura) {
			$writer->writeElement('Natura', $this->natura->value);
		}
		if ($this->riferimentoAmministrazione) {
			$writer->writeElement('RiferimentoAmministrazione', $this->riferimentoAmministrazione);
		}
	}
}
