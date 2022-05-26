<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType\DatiRiepilogoType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType\DettaglioLineeType;
use XMLWriter;

final class DatiBeniServiziType extends AbstractXmlSerializable
{
	/**
	 * @param iterable<DettaglioLineeType> $dettagliLinee 
	 * @param iterable<DatiRiepilogoType> $datiRiepilogo 
	 * @return void 
	 */
	public function __construct(
		public readonly iterable $dettagliLinee,
		public readonly iterable $datiRiepilogo,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		foreach ($this->dettagliLinee as $dettaglioLinea) {
			$dettaglioLinea->toXml('DettaglioLinee', $writer);
		}
		foreach ($this->datiRiepilogo as $datiRiepilogo) {
			$datiRiepilogo->toXml('DatiRiepilogo', $writer);
		}
	}
}
