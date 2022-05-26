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

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\DatiTrasmissioneType\ContattiTrasmittenteType;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType\DatiTrasmissioneType\FormatoTrasmissione;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\IdFiscaleType;
use XMLWriter;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotNull;

class DatiTrasmissioneType extends AbstractXmlSerializable
{
	public function __construct(
		#[Valid]
		#[NotNull]
		public readonly IdFiscaleType $idTrasmittente,

		#[Length(max: 10)]
		#[NotNull]
		public readonly string $progressivoInvio,

		#[Length(exactly: 5)]
		#[NotNull]
		public readonly FormatoTrasmissione $formatoTrasmissione,

		#[Length(min: 6, max: 7)]
		#[NotNull]
		public readonly string $codiceDestinatario,

		#[Valid]
		public readonly ?ContattiTrasmittenteType $contattiTrasmittente = null,

		#[Length(min: 7, max: 256)]
		#[Email]
		public readonly ?string $pecDestinatario = null
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->idTrasmittente->toXml('IdTrasmittente', $writer);

		$writer->writeElement('ProgressivoInvio', $this->progressivoInvio);
		$writer->writeElement('FormatoTrasmissione', $this->formatoTrasmissione->value);
		$writer->writeElement('CodiceDestinatario', $this->codiceDestinatario);

		if ($this->contattiTrasmittente) {
			$this->contattiTrasmittente->toXml('ContattiTrasmittente', $writer);
		}

		if ($this->pecDestinatario) {
			$writer->writeElement('PECDestinatario', $this->pecDestinatario);
		}
	}
}
