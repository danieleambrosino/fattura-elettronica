<?php

namespace DanieleAmbrosino\FatturaElettronica;

interface XmlSerializableInterface
{
	public function exportToXml(): string;
}
