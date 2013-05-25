<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Question;
use SimpleXMLElement;

/**
 * Class QuestionFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class QuestionFromSimpleXmlFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example:
     *      <problemDefinition>
     *          This is an example problem
     *      </problemDefinition>
     *      <hint>
     *          This is an example hint and a hint is optional
     *      </hint>
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

        if (!isset($source->problemDefinition)) {
            throw new FactoryInvalidArgumentException(
                'No problemDefinition found in source \SimpleXMLElement'
            );
        }

        $question = new Question();

        $question->setProblemDefinition($source->problemDefinition);
        if (isset($source->hint)) {
            $question->setHint($source->hint);
        }

        return $question;
    }
}