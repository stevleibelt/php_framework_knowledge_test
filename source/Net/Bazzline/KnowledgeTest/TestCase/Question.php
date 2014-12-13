<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class Question
 *
 * @package Net\Bazzline\TestCase\Answer
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class Question implements QuestionInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $hint;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $problemDefinition;

    /**
     * @{inheritdoc}
     */
    public function getHint()
    {
        return $this->hint;
    }

    /**
     * @{inheritdoc}
     */
    public function getProblemDefinition()
    {
        return $this->problemDefinition;
    }

    /**
     * @{inheritdoc}
     */
    public function isHintAvailable()
    {
        return (!is_null($this->hint));
    }

    /**
     * @{inheritdoc}
     */
    public function setHint($hint)
    {
        if (strlen((string) $hint) > 1) {
            throw new InvalidArgumentException(
                'Hint must have at least one character.'
            );
        }

        $this->hint = $hint;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function setProblemDefinition($problemDefinition)
    {
        if (strlen((string) $problemDefinition) > 1) {
            throw new InvalidArgumentException(
                'Problem definition must have at least one character.'
            );
        }

        $this->problemDefinition = $problemDefinition;

        return $this;
    }
}