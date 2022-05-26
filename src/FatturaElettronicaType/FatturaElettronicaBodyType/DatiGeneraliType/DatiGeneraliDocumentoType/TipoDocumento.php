<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType;

enum TipoDocumento: string
{
	case Fattura = 'TD01';
	case AccontoSuFattura = 'TD02';
	case AccontoSuParcella = 'TD03';
	case NotaDiCredito = 'TD04';
	case NotaDiDebito = 'TD05';
	case Parcella = 'TD06';
	case IntegrazioneFatturaReverseChargeInterno = 'TD16';
	case IntegrazioneAcquistoServiziEstero = 'TD17';
	case IntegrazioneAcquistoBeniIntracomunitari = 'TD18';
	case IntegrazioneAcquistoBeniExArt17 = 'TD19';
	case AutofatturaRegolarizzazioneFatture = 'TD20';
	case AutofatturaSplafonamento = 'TD21';
	case EstrazioneBeniDepositoIVA = 'TD22';
	case EstrazioneBeniDepositoIVAConVersamento = 'TD23';
	case FatturaDifferitaExArt21Comma4LetteraA = 'TD24';
	case FatturaDifferitaExArt21Comma4LetteraB = 'TD25';
	case CessioneBeniAmmortizzabiliEPassaggiInterni = 'TD26';
	case FatturaAutoconsumoOCessioniGratuiteSenzaRivalsa = 'TD27';
}