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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\CedentePrestatoreType;

enum RegimeFiscale: string
{
	case Ordinario = 'RF01';
	case ContribuentiMinimi = 'RF02';
	case Agricoltura = 'RF04';
	case VenditaSalitTabacchi = 'RF05';
	case CommercioFiammiferi = 'RF06';
	case Editoria = 'RF07';
	case GestioneServiziTelefoniaPubblica = 'RF08';
	case RivenditaDocumentiTrasportoPubblico = 'RF09';
	case IntrattenimentiGiochi = 'RF10';
	case AgenzieViaggiTurismo = 'RF11';
	case Agriturismo = 'RF12';
	case VenditeDomicilio = 'RF13';
	case RivenditaBeniUsati = 'RF14';
	case AgenzieVenditeAsta = 'RF15';
	case IvaPerCassaPA = 'RF16';
	case IvaPerCassa = 'RF17';
	case Altro = 'RF18';
	case RegimeForfettario = 'RF19';
}
