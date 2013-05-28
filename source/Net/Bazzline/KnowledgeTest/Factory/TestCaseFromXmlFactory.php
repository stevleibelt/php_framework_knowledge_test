<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\TestCase;
use SimpleXMLElement;

/**
 * Class TestCaseFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCaseFromXmlFactory extends FactoryAbstract implements FactoryFromSourceInterface
{
    /**
     * Creates object
     *
     * @param string $filename - the source
     *  example:
     *      <?xml version="1.0" encoding="utf-8" ?>
     *      <answer>
     *          <type>
     *              SelectMultipleAnswer
     *          </type>
     *          <opportunity>
     *              First Answer
     *          </opportunity>
     *          <opportunity>
     *              Second Answer
     *          </opportunity>
     *          <opportunity>
     *              Third Answer
     *          </opportunity>
     *          <opportunity>
     *              Fourth Answer
     *          </opportunity>
     *          <validOpportunity>
     *              Second Answer
     *          </validOpportunity>
     *          <validOpportunity>
     *              Third Answer
     *          </validOpportunity>
     *      </answer>
     *      <question>
     *          <problemDefinition>
     *              This is an example problem
     *          </problemDefinition>
     *          <hint>
     *              This is an example hint and a hint is optional
     *          </hint>
     *      </question>
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\TestCase
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
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

        if (!isset($simpleXml->question)) {
            throw new FactoryInvalidArgumentException(
                'No question found in suite'
            );
        }

        if (!isset($simpleXml->answer)) {
            throw new FactoryInvalidArgumentException(
                'No answer found in suite'
            );
        }

        $testCase = $this->serviceLocator->getNewTestCase();
        $questionFactory = $this->serviceLocator->getQuestionFromXmlFactory();
        $answerFactory = $this->serviceLocator->getAnswerFromXmlFactory();

        $question = $questionFactory->fromSource($simpleXml->question);
        $answer = $answerFactory->fromSource($simpleXml->answer);

        $testCase->setQuestion($question);
        $testCase->setAnswer($answer);

        return $testCase;
    }
}