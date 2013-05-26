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
 * Class AnswerFromPhpArrayFactory
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class AnswerFromPhpArrayFactory implements FactoryInterface
{
    /**
     * Creates object
     *
     * @param mixed $source - the source
     *  example:
     *      array(
     *          'type' => 'SelectMultipleAnswer',
     *          'opportunities' => array(
     *              'First Answer',
     *              'Second Answer',
     *              'Third Answer',
     *              'Fourth Answer'
     *          ),
     *          'validOpportunities' => array(
     *              'Second Answer',
     *              'Third Answer'
     *          )
     *      )
     *
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Answer
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

        if (!isset($source['type'])) {
            throw new FactoryInvalidArgumentException(
                'No type found in source array'
            );
        }

        if (!isset($source['opportunities'])) {
            throw new FactoryInvalidArgumentException(
                'No opportunities found in source array'
            );
        }

        if (!isset($source['validOpportunities'])) {
            throw new FactoryInvalidArgumentException(
                'No valid opportunities found in source array'
            );
        }

        $answerClass = $source['type'];
        if (!class_exists('Net\\Bazzline\\KnowledgeTest\\TestCase\\' . $answerClass)) {
            throw new FactoryInvalidArgumentException(
                'Not supported type found in source array'
            );
        }

        $answer = new $answerClass();
        foreach ($source['opportunities'] as $opportunity) {
            $answer->addOpportunity($opportunity);
        }
        foreach ($source['validOpportunities'] as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        return $answer;
    }
}