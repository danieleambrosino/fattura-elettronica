<?php

namespace DanieleAmbrosino\FatturaElettronica;

use XMLWriter;

abstract class AbstractXmlSerializable
{
	final public function toXml(string $tagName, XMLWriter $writer)
	{
		$writer->startElement($tagName);
		$this->writeContentToXml($writer);
		$writer->endElement();
	}

	abstract protected function writeContentToXml(XMLWriter $writer): void;
}
