<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\RappresentanteFiscaleType\DatiAnagraficiRappresentanteType;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

final class RappresentanteFiscaleType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly DatiAnagraficiRappresentanteType $datiAnagrafici,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->datiAnagrafici->toXml('DatiAnagrafici', $writer);
	}
}
