<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiGeneraliType\DatiGeneraliDocumentoType\DatiCassaPrevidenzialeType;

enum TipoCassa: string
{
	case AvvocatiProcuratoriLegali = 'TC01';
	case DottoriCommercialisti = 'TC02';
	case Geometri = 'TC03';
	case IngegneriArchitetti = 'TC04';
	case Notai = 'TC05';
	case Ragionieri = 'TC06';
	case ENASARCO = 'TC07';
	case ENPACL = 'TC08';
	case ENPAM = 'TC09';
	case ENPAF = 'TC10';
	case ENPAV = 'TC11';
	case ENPAIA = 'TC12';
	case ImpreseSpedizioneAgenzieMarittime = 'TC13';
	case INPGI = 'TC14';
	case ONAOSI = 'TC15';
	case CASAGIT = 'TC16';
	case EPPI = 'TC17';
	case EPAP = 'TC18';
	case ENPAB = 'TC19';
	case ENPAPI = 'TC20';
	case ENPAP = 'TC21';
	case INPS = 'TC22';
}