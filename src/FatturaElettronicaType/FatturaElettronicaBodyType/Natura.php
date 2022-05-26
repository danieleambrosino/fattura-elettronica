<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

enum Natura: string
{
	case EscluseArt15 = 'N1';

	case NonSoggetteArt7 = 'N2.1';
	case NonSoggetteAltro = 'N2.2';

	case NonImponibiliEsportazioni = 'N3.1';
	case NonImponibiliCessioniIntracomunitarie = 'N3.2';
	case NonImponibiliCessioniSanMarino = 'N3.3';
	case NonImponibiliOperazioniAssimilate = 'N3.4';
	case NonImponibiliDichiarazioniIntento = 'N3.5';
	case NonImponibiliAltreOperazioni = 'N3.6';

	case Esenti = 'N4';

	case RegimeDelMargine = 'N5';
	case InversioneContabileCessioneRottami = 'N6.1';
	case InversioneContabileCessioneOroArgento = 'N6.2';
	case InversioneContabileSubappaltoEdile = 'N6.3';
	case InversioneContabileCessioneFabbricati = 'N6.4';
	case InversioneContabileCessioneTelefoniCellulari = 'N6.5';
	case InversioneContabileCessioneProdottiElettronici = 'N6.6';
	case InversioneContabilePrestazioniCompartoEdile = 'N6.7';
	case InversioneContabileOperazioniSettoreEnergetico = 'N6.8';
	case InversioneContabileAltriCasi = 'N6.9';

	case IvaAssoltaUe = 'N7';

	/**
	 * @deprecated Codice non più valido per le fatture emesse a partire dal primo gennaio 2021
	 */
	case NonSoggette = 'N2';
	/**
	 * @deprecated Codice non più valido per le fatture emesse a partire dal primo gennaio 2021 
	 */
	case NonImponibili = 'N3';
	/**
	 * @deprecated Codice non più valido per le fatture emesse a partire dal primo gennaio 2021
	 */
	case InversioneContabile = 'N6';
}
