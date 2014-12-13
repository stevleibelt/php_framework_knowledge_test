<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class FreeTextAnswer
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class FreeTextAnswer extends AnswerAbstract
{
    /**
     * Validates given opportunity.
     *
     * @return boolean
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function validateSelectedOpportunities()
    {
        $isValid = false;

        if (count($this->selectedOpportunities) == 1) {
            $isValid = true;
            $freeText = strtolower(end($this->selectedOpportunities));

            foreach ($this->validOpportunities as $needle) {
                if (stripos($freeText, $needle) === false) {
                    $isValid = false;

                    break;
                }
            }
        }

        return $isValid;
    }

    /**
     * Returns the percentage (0 up to 100) of accuracy.
     *
     * @return integer
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function getPercentageOfAccuracy()
    {
        $freeText = strtolower(end($this->selectedOpportunities));
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidOpportunitiesInFreeText = 0;

        foreach ($this->validOpportunities as $needle) {
            if (stripos($freeText, $needle) !== false) {
                $numberOfValidOpportunitiesInFreeText++;
            }
        }

        $accuracy = $numberOfValidOpportunities / $numberOfValidOpportunitiesInFreeText;
        $percentage = number_format($accuracy, 2);

        return $percentage;
    }
}