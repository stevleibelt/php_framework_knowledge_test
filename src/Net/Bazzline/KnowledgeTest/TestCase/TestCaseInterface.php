<?php
/**
 * Defines the interface for each test case.
 * A test case contains one question class and one answer class. Both are injected into the test case.
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

use Net\Bazzline\TestCase\Answer;
use Net\Bazzline\TestCase\Question;

/**
 * Class TestCaseInterface
 *
 * @package Net\Bazzline\TestCase
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
interface TestCaseInterface
{
    /**
     * Getter for answer
     *
     * @return AnswerInterface
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getAnswer();

    /**
     * Setter for answer
     *
     * @param AnswerInterface $answer - answer object
     *
     * @return TestCaseInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function setAnswer(AnswerInterface $answer);

    /**
     * Getter for question
     *
     * @return QuestionInterface
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getQuestion();

    /**
     * Setter for question
     *
     * @param QuestionInterface $question - question object
     *
     * @return TestCaseInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function setQuestion(QuestionInterface $question);

    /**
     * Returns a number that indicates what kind of challenge the current
     *  test case is,
     *
     * @return integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getLevelOfDifficulty();

    /**
     * Returns a ISO 639-1 language code.
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getLanguageCode();
}