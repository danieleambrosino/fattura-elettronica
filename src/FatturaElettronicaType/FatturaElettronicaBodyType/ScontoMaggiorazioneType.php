<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\ScontoMaggiorazioneType\Tipo;
use Symfony\Component\Validator\Constraints\Range;
use XMLWriter;

class ScontoMaggiorazioneType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly Tipo $tipo,

		#[Range(min: 0, max: 999)]
		public readonly ?float $percentuale = null,

		#[Range(min: 0, max: 999999999999)]
		public readonly ?float $importo = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('Tipo', $this->tipo->value);
		if ($this->percentuale !== null) {
			$writer->writeElement('Percentuale', $this->percentuale);
		} elseif ($this->importo !== null) {
			$writer->writeElement('Importo', $this->importo);
		}
	}
}
