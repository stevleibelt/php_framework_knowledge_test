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
class QuestionFromPhpFactory implements FactoryInterface
{
    public function fromSource(array $source)
    {
        //@TODO - add validation (to abstract class?)
    }
}