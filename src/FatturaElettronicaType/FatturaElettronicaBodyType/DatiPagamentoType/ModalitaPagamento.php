<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType\DatiPagamentoType;

enum ModalitaPagamento: string
{
	case Contanti = 'MP01';
	case Assegno = 'MP02';
	case AssegnoCircolare = 'MP03';
	case ContantiPressoTesoreria = 'MP04';
	case Bonifico = 'MP05';
	case VagliaCambiario = 'MP06';
	case BollettinoBancario = 'MP07';
	case CartaDiPagamento = 'MP08';
	case RID = 'MP09';
	case RIDUtenze = 'MP10';
	case RIDVeloce = 'MP11';
	case RIBA = 'MP12';
	case MAV = 'MP13';
	case QuietanzaErario = 'MP14';
	case GirocontoSpeciale = 'MP15';
	case DomiciliazioneBancaria = 'MP16';
	case DomiciliazionePostale = 'MP17';
	case BollettinoPostale = 'MP18';
	case SEPA = 'MP19';
	case SEPA_CORE = 'MP20';
	case SEPA_B2B = 'MP21';
	case TrattenutaSommeRiscosse = 'MP22';
	case PagoPA = 'MP23';
}
