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
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType\TipoCessionePrestazione;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\Natura;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\ScontoMaggiorazioneType;
use DateTimeInterface;
use XMLWriter;

class DettaglioLineeType extends AbstractXmlSerializable
{
	/**
	 * @param CodiceArticoloType[] $codiceArticolo 
	 * @param ScontoMaggiorazione[] $scontoMaggiorazione
	 * @param AltriDatiGestionaliType[] $altriDatiGestionali
	 */
	public function __construct(
		public int $numeroLinea,
		public string $descrizione,
		public float $prezzoUnitario,
		public float $prezzoTotale,
		public float $aliquotaIVA,
		public ?TipoCessionePrestazione $tipoCessionePrestazione = null,
		public array $codiceArticolo = [],
		public ?float $quantita = null,
		public ?string $unitaMisura = null,
		public ?DateTimeInterface $dataInizioPeriodo = null,
		public ?DateTimeInterface $dataFinePeriodo = null,
		public array $scontoMaggiorazione = [],
		public bool $ritenuta = false,
		public ?Natura $natura = null,
		public ?string $riferimentoAmministrazione = null,
		public array $altriDatiGestionali = [],
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('NumeroLinea', $this->numeroLinea);
		if ($this->tipoCessionePrestazione) {
			$writer->writeElement('TipoCessionePrestazione', $this->tipoCessionePrestazione->value);
		}
		foreach ($this->codiceArticolo as $codiceArticolo) {
			$codiceArticolo->toXml('CodiceArticolo', $writer);
		}
		$writer->writeElement('Descrizione', $this->descrizione);
		if ($this->quantita) {
			$writer->writeElement('Quantita', fe_number_format($this->quantita));
		}
		if ($this->unitaMisura) {
			$writer->writeElement('UnitaMisura', $this->unitaMisura);
		}
		if ($this->dataInizioPeriodo) {
			$writer->writeElement('DataInizioPeriodo', $this->dataInizioPeriodo->format('Y-m-d'));
		}
		if ($this->dataFinePeriodo) {
			$writer->writeElement('DataFinePeriodo', $this->dataFinePeriodo->format('Y-m-d'));
		}
		$writer->writeElement('PrezzoUnitario', fe_number_format($this->prezzoUnitario));
		foreach ($this->scontoMaggiorazione as $scontoMaggiorazione) {
			$scontoMaggiorazione->writeXml('ScontoMaggiorazione', $writer);
		}
		$writer->writeElement('PrezzoTotale', fe_number_format($this->prezzoTotale));
		$writer->writeElement('AliquotaIVA', fe_number_format($this->aliquotaIVA));
		if ($this->ritenuta) {
			$writer->writeElement('Ritenuta', 'SI');
		}
		if ($this->natura) {
			$writer->writeElement('Natura', $this->natura->value);
		}
		if ($this->riferimentoAmministrazione) {
			$writer->writeElement('RiferimentoAmministrazione', $this->riferimentoAmministrazione);
		}
		foreach ($this->altriDatiGestionali as $altriDatiGestionali) {
			$altriDatiGestionali->toXml('AltriDatiGestionali', $writer);
		}
	}
}
