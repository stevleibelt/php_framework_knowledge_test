<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class AnswerInterface
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
abstract class AnswerAbstract
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $opportunities;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $selectedOpportunities;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $validOpportunities;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function __construct()
    {
        $this->opportunities = array();
        $this->selectedOpportunities = array();
        $this->validOpportunities = array();
    }

    /**
     * Returns the available opportunities as array.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getOpportunites()
    {
        return $this->opportunities;
    }

    /**
     *
     * @param string $opportunity - s
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function addSelectedOpportunity($opportunity)
    {
        $this->selectedOpportunities[] = $opportunity;

        return $this;
    }

    /**
     * Returns an array of correct opportunities.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getValidOpportunities()
    {
        return $this->validOpportunities;
    }

    /**
     * Returns type of answer
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getType()
    {
        $classNameWithNamespace = get_class($this);
        $classNameWithoutNamespace = explode('\\', $classNameWithNamespace);

        return end($classNameWithoutNamespace);
    }

    /**
     * Adds a opportunity
     *
     * @param string $opportunity - a opportunity
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function addOpportunity($opportunity)
    {
        $this->opportunities[] = $opportunity;

        return $this;
    }

    /**
     * Adds a valid opportunity
     *
     * @param string $validOpportunity - a valid opportunity
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function addValidOpportunity($validOpportunity)
    {
        $this->validOpportunities[] = $validOpportunity;

        return $this;
    }
}