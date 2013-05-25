<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Suite;
use \SimpleXMLElement;

/**
 * Class SuiteFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SuiteFromXmlFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example:
     *      <?xml version="1.0" encoding="utf-8" ?>
     *      <name>
     *          Example suite
     *      </name>
     *      <description>
     *          Example description
     *      </description>
     *      <language>
     *          de
     *      </language>
     *      <pathToTestCase>
     *          relative path from suite to test case
     *      </pathToTestCase>
     *      <pathToTestCase>
     *          [optional] relative path from suite to test case
     *      </pathToTestCase>
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Suite
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource($source)
    {
        $simpleXml = new SimpleXMLElement($source);

        $pathsToTestCase = (array) $simpleXml->pathToTextCase;
        if (empty($pathsToTestCase)) {
            throw new FactoryInvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = new Suite();

        $suite->setName($simpleXml->name);
        $suite->setLanguage($simpleXml->language);
        $suite->setDescription($simpleXml->description);
        foreach ($pathsToTestCase as $pathToTestCase) {
            if (file_exists($pathToTestCase)
                && is_readable($pathToTestCase)) {
                $testCaseXml = file_get_contents($pathToTestCase);
                $testCase = TestCaseFromSimpleXmlFactory::fromSource($testCaseXml);
                $suite->addTestCase($testCase);
            }
        }

        return $suite;
    }
}