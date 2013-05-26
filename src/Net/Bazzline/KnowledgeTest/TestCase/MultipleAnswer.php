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
class MultipleAnswer extends AnswerAbstract
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
        $arrayDiff = array_diff_assoc($this->selectedOpportunities, $this->validOpportunities);

        $isValid = empty($arrayDiff);

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
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidSelectedOpportunities = 0;

        foreach ($this->selectedOpportunities as $selectedOpportunity) {
            if (isset($this->validOpportunities[md5($selectedOpportunity)])) {
                $numberOfValidSelectedOpportunities++;
            }
        }

        $accuracy = $numberOfValidOpportunities / $numberOfValidSelectedOpportunities;
        $percentage = number_format($accuracy, 2);

        return $percentage;
    }
}