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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType;

enum TipoDocumento: string
{
	case Fattura = 'TD01';
	case AccontoSuFattura = 'TD02';
	case AccontoSuParcella = 'TD03';
	case NotaDiCredito = 'TD04';
	case NotaDiDebito = 'TD05';
	case Parcella = 'TD06';
	case FatturaDifferita = 'TD24';
}
