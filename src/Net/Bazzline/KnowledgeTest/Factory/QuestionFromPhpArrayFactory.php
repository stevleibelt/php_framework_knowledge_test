<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Question;

/**
 * Class QuestionFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class QuestionFromPhpArrayFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example:
     *      array(
     *          'problemDefinition' => 'This is an example problem',
     *          'hint' => 'This is an example hint and a hint is optional'
     *      )
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Question
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSourceFile($source)
    {
        if (!is_array($source)) {
            throw new FactoryInvalidArgumentException(
                'Source has to be from type array'
            );
        }

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