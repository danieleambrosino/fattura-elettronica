<?php

namespace DanieleAmbrosino\FatturaElettronica;

use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaType\FatturaElettronicaHeaderType;
use XMLWriter;

class FatturaElettronicaType extends AbstractXmlSerializable implements XmlSerializableInterface
{
	/**
	 * @param iterable<FatturaElettronicaBodyType> $fatturaElettronicaBody
	 */
	public function __construct(
		public readonly FatturaElettronicaHeaderType $fatturaElettronicaHeader,
		public readonly iterable $fatturaElettronicaBody = [],
	) {
	}

	public function exportToXml(): string
	{
		$writer = new XMLWriter;
		$writer->openMemory();
		$writer->setIndent(true);
		$writer->setIndentString("\t");
		$writer->startDocument('1.0', 'UTF-8');
		$writer->startElement('FatturaElettronica');
		$writer->writeAttribute('versione', 'FPR12');
		$writer->writeAttribute('xmlns', 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2');
		$writer->writeAttribute('xmlns:ds', 'http://www.w3.org/2000/09/xmldsig#');
		$writer->writeAttribute('xmlns:p', 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2/dati');
		$writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
		$writer->writeAttribute('xsi:schemaLocation', 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd');
		$this->writeContentToXml($writer);
		$writer->endElement();
		$writer->endDocument();
		return $writer->outputMemory();
	}

	protected function writeContentToXml(XMLWriter $writer): void
	{
		$this->fatturaElettronicaHeader->toXml('FatturaElettronicaHeader', $writer);
		foreach ($this->fatturaElettronicaBody as $fatturaElettronicaBody) {
			$fatturaElettronicaBody->toXml('FatturaElettronicaBody', $writer);
		}
	}
}
