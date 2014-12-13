<?php

namespace Test\Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\Factory\AnswerFromPhpArrayFactory;
use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use PHPUnit_Framework_TestCase;
use stdClass;


class AnswerFromPhpArrayFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    private $array;

    /**
     * @var \Net\Bazzline\KnowledgeTest\Factory\AnswerFromPhpArrayFactory
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
        $this->array = array(
            'type' => 'SingleAnswer',
            'opportunities' => array(
                'opportunity one',
                'opportunity two',
                'opportunity three'
            ),
            'validOpportunities' => array(
                'opportunity two'
            )
        );
        $this->factory = new AnswerFromPhpArrayFactory();
        $this->factory->setServiceLocator(new ServiceLocator());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public static function dataProviderInvalidArray()
    {
        return array(
            array(null),
            array(1),
            array('one'),
            array(new stdClass())
        );
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage Source has to be from type array
     * @dataProvider dataProviderInvalidArray
     *
     * @param mixed $source - the invalid source
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithNoArray($source)
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
        unset($this->array['type']);
        $this->factory->fromSource($this->array);
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
        $this->array['type'] = 'Foo';
        $this->factory->fromSource($this->array);
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
        unset($this->array['opportunities']);
        $this->factory->fromSource($this->array);
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
        unset($this->array['validOpportunities']);
        $this->factory->fromSource($this->array);
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
        $this->array['opportunities'] = array();
        $this->factory->fromSource($this->array);
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
        $this->array['validOpportunities'] = array();
        $this->factory->fromSource($this->array);
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No opportunities found in source array
     * @dataProvider dataProviderInvalidArray
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithInvalidOpportunities($source)
    {
        $this->array['opportunities'] = $source;
        $this->factory->fromSource($this->array);
    }

    /**
     * @expectedException \Net\Bazzline\KnowledgeTest\Factory\FactoryInvalidArgumentException
     * @expectedExceptionMessage No valid opportunities found in source array
     * @dataProvider dataProviderInvalidArray
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-28
     */
    public function testFromSourceWithInvalidValidOpportunities($source)
    {
        $this->array['validOpportunities'] = $source;
        $this->factory->fromSource($this->array);
    }

    public function testFromSourceWithValidArray()
    {
        $answer = $this->factory->fromSource($this->array);

        foreach ($this->array as $key => $value) {
            $methodName = 'get' . ucfirst($key);

            if (is_array($value)) {
                $this->assertEquals(
                    array_values($value),
                    array_values($answer->$methodName())
                );
            } else {
                $this->assertEquals(
                    $value,
                    $answer->$methodName()
                );
            }
        }
    }
}
