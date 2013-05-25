<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Question;

/**
 * Class QuestionFromPhp
 *
 * @package Net\Bazzline\TestCase
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class QuestionFromPhpArrayFactory implements FactoryInterface
{
    /**
     * Creates question from php array
     *
     * @param array $source
     *  example: array(
     *              'problemDefinition' => 'This is an example problem',
     *              'hint' => 'This is an example hint and a hint is optional'
     *          )
     *
     * @return Question
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource(array $source)
    {
        if (!isset($source['problemDefinition'])) {
            throw new FactoryInvalidArgumentException(
                'No problemDefinition found in source array'
            );
        }
        $question = new Question();

        $question->setProblemDefinition($source['problemDefinition']);
        if (isset($source['hint'])) {
            $question->setHint($source['hint']);
        }

        return $question;
    }
}
