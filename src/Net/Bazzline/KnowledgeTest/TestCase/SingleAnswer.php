<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class SingleAnswer
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SingleAnswer extends AnswerAbstract
{
    /**
     * Validates given opportunity.
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function validateSelectedOpportunities()
    {
        $isValid = ((count($this->selectedOpportunities) == 1)
            && (in_array($this->opportunities, end($this->selectedOpportunities))));

        return $isValid;
    }

    /**
     * Returns the percentage (0 up to 100) of accuracy.
     *
     * @return integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getPercentageOfAccuracy()
    {
        return ($this->validateSelectedOpportunities()) ? 100 : 0;
    }
}