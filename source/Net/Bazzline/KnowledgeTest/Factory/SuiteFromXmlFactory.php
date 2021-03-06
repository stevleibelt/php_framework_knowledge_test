<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use SimpleXMLElement;

/**
 * Class SuiteFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class SuiteFromXmlFactory extends FactoryAbstract implements FactoryFromSourceInterface
{
    /**
     * Creates object
     *
     * @param string $filename - the source
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
     * @return \Net\Bazzline\KnowledgeTest\TestCase\SuiteInterface
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function fromSource($filename)
    {
        if ((!file_exists($filename))
            || (!is_readable($filename))) {
            throw new FactoryInvalidArgumentException(
                'Source filename does not exists or is not readable'
            );
        }

        $simpleXml = new SimpleXMLElement(
            file_get_contents($filename)
        );

        $pathsToTestCase = (array) $simpleXml->pathToTextCase;
        if (empty($pathsToTestCase)) {
            throw new FactoryInvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = $this->serviceLocator->getNewSuite();
        $factory = $this->serviceLocator->getTestCaseFactory();

        $suite->setName($simpleXml->name);
        $suite->setLanguage($simpleXml->language);
        $suite->setDescription($simpleXml->description);
        foreach ($pathsToTestCase as $testCaseFilename) {
            if (file_exists($testCaseFilename)
                && is_readable($testCaseFilename)) {
                $testCaseFactory = $factory->getFactoryByFilename($testCaseFilename);
                $testCase = $testCaseFactory->fromSource($testCaseFilename);
                $suite->addTestCase($testCase);
            }
        }

        return $suite;
    }
}