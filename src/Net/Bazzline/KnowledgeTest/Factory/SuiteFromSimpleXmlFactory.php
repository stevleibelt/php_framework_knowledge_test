<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Suite;
use \SimpleXMLElement;

/**
 * Class SuiteFromSimpleXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SuiteFromSimpleXmlFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example:
     *      <suite>
     *          <?xml version="1.0" encoding="utf-8" ?>
     *          <name>
     *              Example suite
     *          </name>
     *          <description>
     *              Example description
     *          </description>
     *          <language>
     *              de
     *          </language>
     *          <pathToTestCase>
     *              relative path from suite to test case
     *          </pathToTestCase>
     *          <pathToTestCase>
     *              [optional] relative path from suite to test case
     *          </pathToTestCase>
     *      </suite>
     *
     * @return object
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource($source)
    {
        if (!$source instanceof SimpleXMLElement) {
            throw new FactoryInvalidArgumentException(
                'Source has to be from type \SimpleXMLElement'
            );
        }

        $pathsToTestCase = (array) $source->pathToTextCase;
        if (empty($pathsToTestCase)) {
            throw new FactoryInvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = new Suite();

        $suite->setName($source->name);
        $suite->setLanguage($source->language);
        $suite->setDescription($source->description);
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