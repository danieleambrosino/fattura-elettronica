<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiBeniServiziType;

enum EsigibilitaIVA: string
{
	case Immediata = 'I';
	case Differita = 'D';
	case ScissionePagamenti = 'S';
}
