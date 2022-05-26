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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType\DatiGenerali;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use Symfony\Component\Validator\Constraints\Range;
use XMLWriter;

class DatiBolloType extends AbstractXmlSerializable
{
	public function __construct(
		#[Range(min: 0, max: 999999999999)]
		public readonly ?float $importoBollo = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('BolloVirtuale', 'SI');
		if ($this->importoBollo) {
			$writer->writeElement('ImportoBollo', fe_number_format($this->importoBollo, 2));
		}
	}
}
