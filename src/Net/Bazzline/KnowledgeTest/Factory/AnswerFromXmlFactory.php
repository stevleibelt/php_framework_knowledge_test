<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\TestCase\SelectMultipleAnswer;
use Net\Bazzline\KnowledgeTest\TestCase\SelectSingleAnswer;
use Net\Bazzline\KnowledgeTest\TestCase\FreeTextAnswer;

/**
 * Class AnswerFromXmlFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class AnswerFromXmlFactory extends FactoryAbstract
{
    /**
     * Creates object
     *
     * @param string $source - the source
     *  example:
     *      <type>
     *          SelectMultipleAnswer
     *      </type>
     *      <opportunity>
     *          First Answer
     *      </opportunity>
     *      <opportunity>
     *          Second Answer
     *      </opportunity>
     *      <opportunity>
     *          Third Answer
     *      </opportunity>
     *      <opportunity>
     *          Fourth Answer
     *      </opportunity>
     *      <validOpportunity>
     *          Second Answer
     *      </validOpportunity>
     *      <validOpportunity>
     *          Third Answer
     *      </validOpportunity>
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Answer
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource($source)
    {
        $simpleXml = new SimpleXMLElement($source);

        if (!isset($simpleXml->type)) {
            throw new FactoryInvalidArgumentException(
                'No type found in source \\SimpleXMLElement'
            );
        }

        if (!isset($source->opportunities)) {
            throw new FactoryInvalidArgumentException(
                'No opportunities found in source \\SimpleXMLElement'
            );
        }

        if (!isset($source->validOpportunities)) {
            throw new FactoryInvalidArgumentException(
                'No valid opportunities found in source \\SimpleXMLElement'
            );
        }

        $answerClass = (string) $source->type;
        if (!class_exists('Net\\Bazzline\\KnowledgeTest\\TestCase\\' . $answerClass)) {
            throw new FactoryInvalidArgumentException(
                'Not supported type found in source \\SimpleXMLElement'
            );
        }

        $answer = new $answerClass();
        $opportunities = (array) $source->opportunities;
        $validOpportunities = (array) $source->validOpportunities;

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }
        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        return $answer;
    }
}