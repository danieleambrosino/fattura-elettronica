<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGenerali\DatiCassaPrevidenzialeType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGenerali\DatiRitenutaType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType\DatiGenerali\DatiBolloType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\ScontoMaggiorazioneType;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

final class DatiGeneraliDocumentoType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly TipoDocumento $tipoDocumento,

		#[Length(exactly: 3)]
		public readonly ?string $divisa = null,

		public readonly ?DateTimeInterface $data = null,

		#[Length(max: 20)]
		public readonly ?string $numero = null,

		#[All([
			new Type(DatiRitenutaType::class),
			new Valid(),
		])]
		public readonly array $datiRitenuta = [],

		#[Valid]
		public readonly ?DatiBolloType $datiBollo = null,

		#[Valid]
		public readonly ?DatiCassaPrevidenzialeType $datiCassaPrevidenziale = null,

		#[All([
			new Type(ScontoMaggiorazioneType::class),
			new Valid(),
		])]
		public readonly array $scontoMaggiorazione = [],

		#[Range(min: 0, max: 999999999999)]
		public readonly ?float $importoTotaleDocumento = null,

		#[Range(min: 0, max: 999999999999)]
		public readonly ?float $arrotondamento = null,

		#[Length(max: 200)]
		public readonly ?string $causale = null,

		public readonly bool $art73 = false,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('TipoDocumento', $this->tipoDocumento->value);
		if ($this->divisa) {
			$writer->writeElement('Divisa', $this->divisa);
		}
		if ($this->data) {
			$writer->writeElement('Data', $this->data->format('Y-m-d'));
		}
		if ($this->numero) {
			$writer->writeElement('Numero', $this->numero);
		}
		foreach ($this->datiRitenuta as $datiRitenuta) {
			$datiRitenuta->writeXml('DatiRitenuta', $writer);
		}
		if ($this->datiBollo !== null) {
			$this->datiBollo->toXml('DatiBollo', $writer);
		}
	}
}
