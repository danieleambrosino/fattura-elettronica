<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiTrasportoType\DatiAnagraficiVettoreType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IndirizzoType;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Valid;
use XMLWriter;

final class DatiTrasportoType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		public readonly ?DatiAnagraficiVettoreType $datiAnagraficiVettore = null,

		#[Length(max: 80)]
		public readonly ?string $mezzoTrasporto = null,

		#[Length(max: 100)]
		public readonly ?string $causaleTrasporto = null,

		#[Range(min: 0, max: 9999)]
		public readonly ?int $numeroColli = null,

		#[Length(max: 100)]
		public readonly ?string $descrizione = null,

		#[Length(max: 10)]
		public readonly ?string $unitaMisuraPeso = null,

		#[Range(min: 0, max: 9999999)]
		public readonly ?float $pesoLordo = null,

		#[Range(min: 0, max: 9999999)]
		public readonly ?string $pesoNetto = null,

		public readonly ?DateTimeInterface $dataOraRitiro = null,

		public readonly ?DateTimeInterface $dataInizioTrasporto = null,

		#[Length(exactly: 3)]
		public readonly ?string $tipoResa = null,

		#[Valid]
		public readonly ?IndirizzoType $indirizzoResa = null,

		public readonly ?DateTimeInterface $dataOraConsegna = null,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		if ($this->datiAnagraficiVettore) {
			$this->datiAnagraficiVettore->toXml('DatiAnagraficiVettore', $writer);
		}
		if ($this->mezzoTrasporto) {
			$writer->writeElement('MezzoTrasporto', $this->mezzoTrasporto);
		}
		if ($this->causaleTrasporto) {
			$writer->writeElement('CausaleTrasporto', $this->causaleTrasporto);
		}
		if ($this->numeroColli) {
			$writer->writeElement('NumeroColli', $this->numeroColli);
		}
		if ($this->descrizione) {
			$writer->writeElement('Descrizione', $this->descrizione);
		}
		if ($this->unitaMisuraPeso) {
			$writer->writeElement('UnitaMisuraPeso', $this->unitaMisuraPeso);
		}
		if ($this->pesoLordo) {
			$writer->writeElement('PesoLordo', $this->pesoLordo);
		}
		if ($this->pesoNetto) {
			$writer->writeElement('PesoNetto', $this->pesoNetto);
		}
		if ($this->dataOraRitiro) {
			$writer->writeElement('DataOraRitiro', $this->dataOraRitiro->format(DateTimeInterface::ATOM));
		}
		if ($this->dataInizioTrasporto) {
			$writer->writeElement('DataInizioTrasporto', $this->dataInizioTrasporto->format('Y-m-d'));
		}
		if ($this->tipoResa) {
			$writer->writeElement('TipoResa', $this->tipoResa);
		}
		if ($this->indirizzoResa) {
			$this->indirizzoResa->toXml('IndirizzoResa', $writer);
		}
		if ($this->dataOraConsegna) {
			$writer->writeElement('DataOraConsegna', $this->dataOraConsegna->format(DateTimeInterface::ATOM));
		}
	}
}
