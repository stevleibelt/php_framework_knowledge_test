<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\TestCase;

/**
 * Class TestCaseFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCaseFromPhpArrayFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $filename - the source
     *  example:
     *      return array(
     *          'question' => array(
     *              'problemDefinition' => 'the problem definition',
     *              'hint' => 'This is an example hint and a hint is optional'
     *          ),
     *          'answer' => array(
     *              'type' => 'SelectMultipleAnswer',
     *              'opportunities' => array(
     *                  'First Answer',
     *                  'Second Answer',
     *                  'Third Answer'
     *              ),
     *              'validOpportunities' => array(
     *                  'Second Answer'
     *              )
     *          )
     *      );
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

        $array = require_once $filename;

        if (!is_array($array)) {
            throw new FactoryInvalidArgumentException(
                'Source has to be from type array'
            );
        }

        if (!isset($array['question'])) {
            throw new FactoryInvalidArgumentException(
                'No question found in suite'
            );
        }

        if (!isset($array['answer'])) {
            throw new FactoryInvalidArgumentException(
                'No answer found in suite'
            );
        }

        $testCase = new TestCase();
        $questionFactory = new QuestionFromPhpArrayFactory();
        $answerFactory = new AnswerFromPhpArrayFactory();

        $question = $questionFactory->fromSource($array['question']);
        $answer = $answerFactory->fromSource($array['answer']);

        $testCase->setQuestion($question);
        $testCase->setAnswer($answer);

        return $testCase;
    }
}