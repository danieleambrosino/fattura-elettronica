<?php
/**
 * Created by PhpStorm.
 * User: salgua
 * Date: 2018-12-19
 * Time: 18:38
 */

namespace DanieleAmbrosino\FatturaElettronica\Tests;

use DanieleAmbrosino\FatturaElettronica\Enums\ModalitaPagamento;
use DanieleAmbrosino\FatturaElettronica\Enums\RegimeFiscale;
use DanieleAmbrosino\FatturaElettronica\Enums\TipoDocumento;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiBeniServizi\Linea;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiGenerali;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiPagamento;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\Sede;
use DanieleAmbrosino\FatturaElettronica\FatturaElettronicaFactory;
use DanieleAmbrosino\FatturaElettronica\XmlValidator;
use PHPUnit\Framework\TestCase;

class FatturaElettronicaAbiCab extends TestCase
{
    /**
     * @return DatiAnagrafici
     */
    public function testCreateAnagraficaCedente()
    {
        $anagraficaCedente = new DatiAnagrafici(
            '12345678901',
            'Acme SpA',
            'IT',
            '12345678901',
            RegimeFiscale::Ordinario
        );
        $this->assertInstanceOf(DatiAnagrafici::class, $anagraficaCedente);
        return $anagraficaCedente;
    }

    /**
     * @return Sede
     */
    public function testCreateSedeCedente()
    {
        $sedeCedente = new Sede('IT', 'Via Roma 10', '33018', 'Tarvisio', 'UD');
        $this->assertInstanceOf(Sede::class, $sedeCedente);
        return $sedeCedente;
    }

    /**
     * @depends testCreateAnagraficaCedente
     * @depends testCreateSedeCedente
     * @param DatiAnagrafici $datiAnagrafici
     * @param Sede $sede
     * @return FatturaElettronicaFactory
     */
    public function testCreateFatturaElettronicaFactory(DatiAnagrafici $datiAnagrafici, Sede $sede)
    {
        $feFactory = new FatturaElettronicaFactory(
            $datiAnagrafici,
            $sede,
            '+39123456789',
            'info@deved.it',
            new DatiAnagrafici('XYZYZX77M04H888K', 'Dati Cessionario')
        );
        $this->assertInstanceOf(FatturaElettronicaFactory::class, $feFactory);
        return $feFactory;
    }

    /**
     * @return DatiAnagrafici
     */
    public function testCreateAnagraficaCessionario()
    {
        $anaCessionario = new DatiAnagrafici('XYZYZX77M04H888K', 'Pinco Palla');
        $this->assertInstanceOf(DatiAnagrafici::class, $anaCessionario);
        return $anaCessionario;
    }

    /**
     * @return Sede
     */
    public function testCreateSedeCessionario()
    {
        $sedeCessionario = new Sede('IT', 'Via Diaz 35', '33018', 'Tarvisio', 'UD');
        $this->assertInstanceOf(Sede::class, $sedeCessionario);
        return$sedeCessionario;
    }

    /**
     * @depends testCreateFatturaElettronicaFactory
     * @depends testCreateAnagraficaCessionario
     * @depends testCreateSedeCessionario
     * @param FatturaElettronicaFactory $factory
     * @param DatiAnagrafici $datiAnagrafici
     * @param Sede $sede
     * @return FatturaElettronicaFactory
     */
    public function testSetCessionarioCommittente(
        FatturaElettronicaFactory $factory,
        DatiAnagrafici $datiAnagrafici,
        Sede $sede
    ) {
        $factory->setCessionarioCommittente($datiAnagrafici, $sede);
        $this->assertInstanceOf(FatturaElettronicaFactory::class, $factory);
        return $factory;
    }

    /**
     * @return DatiGenerali
     */
    public function testCreateDatiGenerali()
    {
        $datiGenerali = new DatiGenerali(
            TipoDocumento::Fattura,
            '2018-11-22',
            '2018221111',
            122
        );
        $this->assertInstanceOf(DatiGenerali::class, $datiGenerali);
        return $datiGenerali;
    }

    /**
     * @return DatiPagamento
     */
    public function testCreateDatiPagamento()
    {
        $datiPagamento = new DatiPagamento(
            ModalitaPagamento::Contanti,
            '2018-11-30',
            60,
            null,
            null,
            'TP01'
        );
        $datiPagamento->ABI = '12345';
        $datiPagamento->CAB = '56789';
        $datiPagamento->addBlock(new DatiPagamento(
            ModalitaPagamento::Contanti,
            '2018-12-31',
                62,
                null,
                null,
                'TP01'
            )
        );
        $this->assertInstanceOf(DatiPagamento::class, $datiPagamento);
        return $datiPagamento;
    }

    /**
     * @return array
     */
    public function testCreateLinee()
    {
        $linee = [];
        $linee[] = new Linea('Articolo1', 50, 'ABC');
        $linee[]= new Linea('Articolo2', 50, 'CDE');
        $this->assertCount(2, $linee);
        return $linee;
    }

    /**
     * @param array $linee
     * @depends testCreateLinee
     * @return DettaglioLinee
     */
    public function testCreateDettaglioLinee($linee)
    {
        $dettaglioLinee = new DettaglioLinee($linee);
        $this->assertInstanceOf(DettaglioLinee::class, $dettaglioLinee);
        return $dettaglioLinee;
    }

    /**
     * @depends testSetCessionarioCommittente
     * @depends testCreateDatiGenerali
     * @depends testCreateDatiPagamento
     * @depends testCreateDettaglioLinee
     * @param FatturaElettronicaFactory $factory
     * @param DatiGenerali $datiGenerali
     * @param DatiPagamento $datiPagamento
     * @param DettaglioLinee $dettaglioLinee
     * @return \DanieleAmbrosino\FatturaElettronica\FatturaElettronica
     * @throws \Exception
     */
    public function testCreateFattura(
        FatturaElettronicaFactory $factory,
        DatiGenerali $datiGenerali,
        DatiPagamento $datiPagamento,
        DettaglioLinee $dettaglioLinee
    ) {
        $fattura = $factory->create($datiGenerali, $datiPagamento, $dettaglioLinee, '12345');
        $this->assertInstanceOf(FatturaElettronica::class, $fattura);
        return $fattura;
    }

    /**
     * @depends testCreateFattura
     * @param FatturaElettronica $fattura
     */
    public function testGetNomeFattura(FatturaElettronica $fattura)
    {
        $name = $fattura->getFileName();
        $this->assertTrue(strlen($name) > 5);
    }

    /**
     * @depends testCreateFattura
     * @param FatturaElettronica $fattura
     * @throws \Exception
     */
    public function testXmlSchemaFattura(FatturaElettronica $fattura)
    {
        //echo $fattura->toXml();
        $this->assertTrue($fattura->verifica());
    }
}
