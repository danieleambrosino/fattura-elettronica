<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\DatiTrasmissioneType;

enum FormatoTrasmissione: string
{
	case VersoPA = 'FPR12';
	case VersoPrivati = 'FPA12';
}
