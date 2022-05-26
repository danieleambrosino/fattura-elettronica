<?php

use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType;

final class FatturaElettronicaBuilder
{
	private FatturaElettronicaHeaderType $fatturaElettronicaHeader;
	private iterable $fatturaElettronicaBody = [];

	public function setDatiAnagraficiCedente(
		string $nome,
		string $cognome,

	) {
	}

	// public function build(): FatturaElettronicaType
	// {
	// }
}
