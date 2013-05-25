<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
namespace Net\Bazzline\TestCase;

/**
 * Class QuestionInterface
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
interface QuestionInterface
{
    /**
     * Returns a hint to the solution
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getHint();

    /**
     * Returns the current problem
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getProblemDefinition();
}