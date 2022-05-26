<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

enum CondizioniPagamento: string
{
	case PagamentoARate = 'TP01';
	case PagamentoCompleto = 'TP02';
	case Anticipo = 'TP03';
}
