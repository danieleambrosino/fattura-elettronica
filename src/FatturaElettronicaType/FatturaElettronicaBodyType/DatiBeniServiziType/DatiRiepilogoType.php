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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType\EsigibilitaIVA;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\Natura;
use XMLWriter;

class DatiRiepilogoType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly float $aliquotaIVA,
		public readonly float $imposta,
		public readonly float $imponibileImporto,
		public readonly ?Natura $natura = null,
		public readonly ?float $speseAccessorie = null,
		public readonly ?float $arrotondamento = null,
		public readonly ?EsigibilitaIVA $esigibilitaIVA = null,
		public readonly ?string $riferimentoNormativo = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('AliquotaIVA', fe_number_format($this->aliquotaIVA));
		if ($this->natura) {
			$writer->writeElement('Natura', $this->natura->value);
		}
		if ($this->speseAccessorie) {
			$writer->writeElement('SpeseAccessorie', fe_number_format($this->speseAccessorie));
		}
		if ($this->arrotondamento) {
			$writer->writeElement('Arrotondamento', fe_number_format($this->arrotondamento));
		}
		$writer->writeElement('ImponibileImporto', fe_number_format($this->imponibileImporto));
		$writer->writeElement('Imposta', fe_number_format($this->imposta));
		if ($this->esigibilitaIVA) {
			$writer->writeElement('EsigibilitaIVA', $this->esigibilitaIVA->value);
		}
		if ($this->riferimentoNormativo) {
			$writer->writeElement('RiferimentoNormativo', $this->riferimentoNormativo);
		}
	}
}
