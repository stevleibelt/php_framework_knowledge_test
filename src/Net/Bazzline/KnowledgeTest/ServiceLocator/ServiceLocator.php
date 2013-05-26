<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\ServiceLocator;

use Net\Bazzline\KnowledgeTest\Factory\AnswerFromPhpArrayFactory;
use Net\Bazzline\KnowledgeTest\Factory\AnswerFromXmlFactory;
use Net\Bazzline\KnowledgeTest\Factory\QuestionFromPhpArrayFactory;
use Net\Bazzline\KnowledgeTest\Factory\QuestionFromXmlFactory;
use Net\Bazzline\KnowledgeTest\Factory\TestCaseFactory;
use Net\Bazzline\KnowledgeTest\Factory\TestCaseFromXmlFactory;
use Net\Bazzline\KnowledgeTest\Factory\TestCaseFromPhpArrayFactory;
use Net\Bazzline\KnowledgeTest\Factory\SuiteFactory;
use Net\Bazzline\KnowledgeTest\Factory\SuiteFromPhpArrayFactory;
use Net\Bazzline\KnowledgeTest\Factory\SuiteFromXmlFactory;
use Net\Bazzline\KnowledgeTest\TestCase\Suite;
use Net\Bazzline\KnowledgeTest\TestCase\TestCase;
use Net\Bazzline\KnowledgeTest\TestCase\Question;
use Net\Bazzline\KnowledgeTest\TestCase\SingleAnswer;
use Net\Bazzline\KnowledgeTest\TestCase\MultipleAnswer;
use Net\Bazzline\KnowledgeTest\TestCase\FreeTextAnswer;
use SimpleXMLElement;

/**
 * Class ServiceLocator
 *
 * @package Net\Bazzline\KnowledgeTest\ServiceLocator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class ServiceLocator
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $instancePool;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function __construct()
    {
        $this->instancePool = array();
    }

    /**
     * @return AnswerFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getAnswerFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('AnswerFromPhpArrayFactory');
    }


    /**
     * @return AnswerFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getAnswerFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('AnswerFromXmlFactory');
    }


    /**
     * @return QuestionFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getQuestionFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('QuestionFromPhpArrayFactory');
    }


    /**
     * @return QuestionFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getQuestionFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('QuestionFromXmlFactory');
    }

    /**
     * @return SuiteFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFactory()
    {
        return $this->getFromInstancePoolOrCreate('SuiteFactory');
    }


    /**
     * @return TestCaseFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFactory()
    {
        return $this->getFromInstancePoolOrCreate('TestCaseFactory');
    }

    /**
     * @return TestCaseFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('TestCaseFromXmlFactory');
    }

    /**
     * @return TestCaseFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('TestCaseFromPhpArrayFactory');
    }

    /**
     * @return SuiteFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('SuiteFromPhpArrayFactory');
    }

    /**
     * @return SuiteFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('SuiteFromXmlFactory');
    }

    /**
     * @return Suite
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewSuite()
    {
        return new Suite();
    }

    /**
     * @return TestCase
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewTestCase()
    {
        return new TestCase();
    }

    /**
     * @return Question
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewQuestion()
    {
        return new Question();
    }

    /**
     * @return SingleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewSingleAnswer()
    {
        return new SingleAnswer();
    }

    /**
     * @return MultipleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewMultipleAnswer()
    {
        return new MultipleAnswer();
    }

    /**
     * @return FreeTextAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewFreeTextAnswer()
    {
        return new FreeTextAnswer();
    }

    /**
     * @param $className
     * @return object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private function getFromInstancePoolOrCreate($className)
    {
        if (!isset($this->instancePool[$className])) {
            $this->instancePool[$className] = new $className();
            if (in_array('ServiceLocatorAwareInterface', get_declared_interfaces($className))) {
                $this->instancePool[$className]->setServiceLocator($this);
            }
        }

        return $this->instancePool[$className];
    }
}