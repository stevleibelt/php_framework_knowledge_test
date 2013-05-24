<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-25
 */
namespace Net\Bazzline\TestCase\Answer;

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
    public function getOpportunity();

    /**
     *
     * @param integer $id - the id of the selected opportunity indicated as
     *  true
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addGivenValidOpportunityId($id);

    /**
     * Validates given opportunity ids.
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function validateGivenOpportunityIds();

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
     * @return integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getType();
}
