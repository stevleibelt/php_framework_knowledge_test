<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\Question;
use SimpleXMLElement;

/**
 * Class QuestionFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class QuestionFromXmlFactory extends FactoryAbstract implements FactoryFromSourceInterface
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
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function fromSource($source)
    {
        $simpleXml = new SimpleXMLElement($source);

        if (!isset($simpleXml->problemDefinition)) {
            throw new FactoryInvalidArgumentException(
                'No problemDefinition found in source \SimpleXMLElement'
            );
        }

        $question = $this->serviceLocator->getNewQuestion();

        $question->setProblemDefinition($simpleXml->problemDefinition);
        if (isset($simpleXml->hint)) {
            $question->setHint($simpleXml->hint);
        }

        return $question;
    }
}