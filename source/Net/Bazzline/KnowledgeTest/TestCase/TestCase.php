<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

use Net\Bazzline\KnowledgeTest\TestCase\AnswerInterface;
use Net\Bazzline\KnowledgeTest\TestCase\QuestionInterface;

/**
 * Class TestCase
 *
 * @package Net\Bazzline\KnowledgeTest\TestCase
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class TestCase implements TestCaseInterface
{
    /**
     * @var AnswerInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    protected $answer;

    /**
     * @var QuestionInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    protected $question;

    /**
     * @{inheritdoc}
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function getAnswer()
    {
        if (is_null($this->answer)) {
            throw new RuntimeException(
                'Answer not set.'
            );
        }

        return $this->answer;
    }

    /**
     * @{inheritdoc}
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function setAnswer(AnswerInterface $answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @{inheritdoc}
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function getQuestion()
    {
        if (is_null($this->question)) {
            throw new RuntimeException(
                'Question not set.'
            );
        }

        return $this->question;
    }

    /**
     * @{inheritdoc}
     *
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-25
     */
    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;

        return $this;
    }
}
