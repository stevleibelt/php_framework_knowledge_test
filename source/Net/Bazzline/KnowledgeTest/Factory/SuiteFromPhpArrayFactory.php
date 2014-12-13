<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

/**
 * Class SuiteFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class SuiteFromPhpArrayFactory extends FactoryAbstract implements FactoryFromSourceInterface
{
    /**
     * Creates object
     *
     * @param string $filename - the source
     *  example:
     *      return array(
     *          'name' => 'Example suite',
     *          'description' => 'Example description',
     *          'language' => 'de',
     *          'pathToTestCases' => array(
     *              'relative path from suite to test case',
     *              '[optional] relative path from suite to test case'
     *          )
     *      );
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

        $array = require_once($filename);

        if (!is_array($array)) {
            throw new FactoryInvalidArgumentException(
                'Source has to be from type array'
            );
        }

        if (!isset($array['pathToTestCases'])
            || empty($array['pathToTestCases'])) {
            throw new FactoryInvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = $this->serviceLocator->getNewSuite();
        $factory = $this->serviceLocator->getTestCaseFactory();

        $suite->setName($array['name']);
        $suite->setLanguage($array['language']);
        $suite->setDescription($array['description']);
        foreach ($array['pathToTestCases'] as $testCaseFilename) {
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