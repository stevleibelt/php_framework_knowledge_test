<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

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

    /**
     * Method to check if a hind is available
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function isHintAvailable();

    /**
     * Sets the hint to find the right answer.
     *
     * @param string $hint - the hint
     *
     * @return QuestionInterface
     * @throws TestCaseInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setHint($hint);

    /**
     * Sets the question
     *
     * @param string $problemDefinition - the question
     *
     * @return QuestionInterface
     * @throws TestCaseInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setProblemDefinition($problemDefinition);
}