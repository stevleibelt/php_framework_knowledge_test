<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Question;
use SimpleXMLElement;

/**
 * Class QuestionFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class QuestionFromXmlFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param string $source - the source
     *  example:
     *      <problemDefinition>
     *          This is an example problem
     *      </problemDefinition>
     *      <hint>
     *          This is an example hint and a hint is optional
     *      </hint>
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Question
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSourceFile($source)
    {
        $simpleXml = new SimpleXMLElement($source);

        if (!isset($simpleXml->problemDefinition)) {
            throw new FactoryInvalidArgumentException(
                'No problemDefinition found in source \SimpleXMLElement'
            );
        }

        $question = new Question();

        $question->setProblemDefinition($simpleXml->problemDefinition);
        if (isset($simpleXml->hint)) {
            $question->setHint($simpleXml->hint);
        }

        return $question;
    }
}