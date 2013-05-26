<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class AnswerInterface
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
interface AnswerInterface
{
    /**
     * Returns the available opportunities as array.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getOpportunites();

    /**
     *
     * @param string $selectedOpportunity - user selected opportunity
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addSelectedOpportunity($selectedOpportunity);

    /**
     * Validates given opportunity.
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function validateSelectedOpportunities();

    /**
     * Returns the percentage (0 up to 100) of accuracy.
     *
     * @return integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getPercentageOfAccuracy();

    /**
     * Returns an array of correct opportunities.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getValidOpportunities();

    /**
     * Returns type of answer
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getType();

    /**
     * Adds a opportunity
     *
     * @param string $opportunity - a opportunity
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addOpportunity($opportunity);

    /**
     * Adds a valid opportunity
     *
     * @param string $validOpportunity - a valid opportunity
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addValidOpportunity($validOpportunity);
}