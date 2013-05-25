<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Suite;

/**
 * Class SuiteFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SuiteFromPhpArrayFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example: array(
     *      'name' => 'Example suite',
     *      'description' => 'Example description',
     *      'language' => 'de',
     *      'pathToTestCases' => array(
     *          'relative path from suite to test case',
     *          '[optional] relative path from suite to test case'
     *      )
     * )
     *
     * @return object
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource($source)
    {
        if (!is_array($source)) {
            throw new FactoryInvalidArgumentException(
                'Source has to be from type array'
            );
        }

        if (!isset($source['pathToTestCases'])
            || empty($source['pathToTestCases'])) {
            throw new FactoryInvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = new Suite();

        $suite->setName($source['name']);
        $suite->setLanguage($source['language']);
        $suite->setDescription($source['description']);
        foreach ($source['pathToTestCases'] as $pathToTestCase) {
            if (file_exists($pathToTestCase)
                && is_readable($pathToTestCase)) {
                $testCaseArray = require_once $pathToTestCase;
                $testCase = TestCaseFromPhpArrayFactory::fromSource($testCaseArray);
                $suite->addTestCase($testCase);
            }
        }

        return $suite;
    }
}