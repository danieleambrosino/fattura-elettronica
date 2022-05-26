<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;
use XMLWriter;

final class AltriDatiGestionaliType extends AbstractXmlSerializable
{
	public function __construct(
		#[Length(max: 10)]
		public readonly string $tipoDato,

		#[Length(max: 60)]
		public readonly string $riferimentoTesto,

		#[Range(min: 0, max: 1e19 - 1)]
		public readonly float $riferimentoNumero,

		public readonly DateTimeInterface $riferimentoData,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('TipoDato', $this->tipoDato);
		$writer->writeElement('RiferimentoTesto', $this->riferimentoTesto);
		$writer->writeElement('RiferimentoNumero', $this->riferimentoNumero);
		$writer->writeElement('RiferimentoData', $this->riferimentoData->format('Y-m-d'));
	}
}
