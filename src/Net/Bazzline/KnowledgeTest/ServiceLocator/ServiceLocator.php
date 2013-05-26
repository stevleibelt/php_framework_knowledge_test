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
use Net\Bazzline\KnowledgeTest\Factory\SuiteFactory;

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
     * @param $className
     * @return object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private function getFromInstancePoolOrCreate($className)
    {
        if (!isset($this->instancePool[$className])) {
            $this->instancePool[$className] = new $className();
        }

        return $this->instancePool[$className];
    }
}