<?php

namespace Test\Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\Factory\AnswerFromXmlFactory;
use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use PHPUnit_Framework_TestCase;
use stdClass;


class AnswerFromXmlFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    private $xmlAsArray;

    /**
     * @var \Net\Bazzline\KnowledgeTest\Factory\AnswerFromXmlFactory
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    private $factory;

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function setUp()
    {
        $this->xmlAsArray = array(
            'type' => '<type>SingleAnswer</type>',
            'opportunities' => array(
                '<opportunity>First Answer</opportunity>',
                '<opportunity>Second Answer</opportunity>',
                '<opportunity>Third Answer</opportunity>',
                '<opportunity>Fourth Answer</opportunity>',
            ),
            'validOpportunities' => array(
                '<validOpportunity>Second Answer</validOpportunity>'
            )
        );

        $this->factory = new AnswerFromXmlFactory();
        $this->factory->setServiceLocator(new ServiceLocator());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public static function dataProviderInvalidXml()
    {
        return array(
            array(null),
            array(1),
            array('one'),
        );
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage String could not be parsed as XML
     * @dataProvider dataProviderInvalidXml
     *
     * @param mixed $source - the invalid source
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function stestFromSourceWithNoArray($source)
    {
        $this->factory->fromSource($source);
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No type found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithMissingType()
    {
        unset($this->xmlAsArray['type']);
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage Not supported type found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithInvalidType()
    {
        $this->xmlAsArray['type'] = 'Foo';
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No opportunities found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithMissingOpportunities()
    {
        unset($this->xmlAsArray['opportunities']);
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No valid opportunities found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithMissingValidOpportunities()
    {
        unset($this->xmlAsArray['validOpportunities']);
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No opportunities found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithEmptyOpportunities()
    {
        $this->xmlAsArray['opportunities'] = array();
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No valid opportunities found in source array
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithEmptyValidOpportunities()
    {
        $this->xmlAsArray['validOpportunities'] = array();
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No opportunities found in source array
     * @dataProvider dataProviderInvalidXml
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithInvalidOpportunities($source)
    {
        $this->xmlAsArray['opportunities'] = $source;
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No valid opportunities found in source array
     * @dataProvider dataProviderInvalidXml
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithInvalidValidOpportunities($source)
    {
        $this->xmlAsArray['validOpportunities'] = $source;
        $this->factory->fromSource(implode('', $this->xmlAsArray));
    }

    public function testFromSourceWithValidArray()
    {
        $answer = $this->factory->fromSource(implode('', $this->xmlAsArray));

        $this->asserEquals(
            'SingleAnswer',
            $answer->getType()
        );
        $this->asserEquals(
            array_values(array(
                'First Answer',
                'Second Answer',
                'Third Answer',
                'Fourth Answer'
            )),
            array_values($answer->getOpportunities())
        );
        $this->asserEquals(
            array_values(array(
                'Second Answer'
            )),
            array_values($answer->getValidOpportunities())
        );
    }
}
