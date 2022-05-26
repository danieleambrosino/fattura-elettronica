<?php

namespace DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaBodyType;

use DanieleAmbrosino\FatturaElettronica\AbstractXmlSerializable;
use XMLWriter;

final class AllegatoType extends AbstractXmlSerializable
{
	public function __construct(
		public readonly string $nomeAttachment,
		public readonly ?string $algoritmoCompressione = null,
		public readonly ?string $formatoAttachment = null,
		public readonly ?string $descrizioneAttachment = null,
		public readonly string $attachment,
	) {
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$writer->writeElement('NomeAttachment', $this->nomeAttachment);
		if ($this->algoritmoCompressione) {
			$writer->writeElement('AlgoritmoCompressione', $this->algoritmoCompressione);
		}
		if ($this->formatoAttachment) {
			$writer->writeElement('FormatoAttachment', $this->formatoAttachment);
		}
		if ($this->descrizioneAttachment) {
			$writer->writeElement('DescrizioneAttachment', $this->descrizioneAttachment);
		}
		$writer->writeElement('Attachment', base64_encode($this->attachment));
	}
}
