<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;

enum StatoLiquidazione: string
{
	case InLiquidazione = 'LS';
	case NonInLiquidazione = 'LN';
}
