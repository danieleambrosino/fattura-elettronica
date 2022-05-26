<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\TerzoIntermediarioSoggettoEmittenteType\DatiAnagraficiTerzoIntermediarioType;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

final class TerzoIntermediarioSoggettoEmittenteType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly DatiAnagraficiTerzoIntermediarioType $datiAnagrafici,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiAnagrafici->toXml('DatiAnagrafici', $writer);
	}
}
