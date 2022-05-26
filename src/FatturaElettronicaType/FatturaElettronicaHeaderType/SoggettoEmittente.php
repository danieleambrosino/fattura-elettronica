<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;

enum SoggettoEmittente: string
{
	case CessionarioCommittente = 'CC';
	case SoggettoTerzo = 'TZ';
}
