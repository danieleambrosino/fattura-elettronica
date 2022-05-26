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

use DanieleAmbrosino\FatturaElettronica\XmlSerializableInterface;
use XMLWriter;

class DatiRitenutaType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly string $tipoRitenuta,
		public readonly string $importoRitenuta,
		public readonly string $aliquotaRitenuta,
		public readonly string $causalePagamento,
	) {
	}

	public function toXmlBlock(XMLWriter $writer, string $tagName)
	{
		$writer->startElement($tagName);
		$writer->writeElement('TipoRitenuta', $this->tipoRitenuta);
		$writer->writeElement('ImportoRitenuta', $this->importoRitenuta);
		$writer->writeElement('AliquotaRitenuta', $this->aliquotaRitenuta);
		$writer->writeElement('CausalePagamento', $this->causalePagamento);
		$writer->endElement();
	}
}
