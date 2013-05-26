<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\ServiceLocator;

use DirectoryIterator;
use InvalidArgumentException;

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
     * @return \Net\Bazzline\KnowledgeTest\Factory\AnswerFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getAnswerFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\AnswerFromPhpArrayFactory');
    }


    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\AnswerFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getAnswerFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\AnswerFromXmlFactory');
    }


    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\QuestionFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getQuestionFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\QuestionFromPhpArrayFactory');
    }


    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\QuestionFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getQuestionFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\QuestionFromXmlFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\SuiteFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\SuiteFactory');
    }


    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\TestCaseFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\TestCaseFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\TestCaseFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\TestCaseFromXmlFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\TestCaseFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCaseFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\TestCaseFromPhpArrayFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\SuiteFromPhpArrayFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFromPhpArrayFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\SuiteFromPhpArrayFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Factory\SuiteFromXmlFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getSuiteFromXmlFactory()
    {
        return $this->getFromInstancePoolOrCreate('\\Net\\Bazzline\\KnowledgeTest\\Factory\\SuiteFromXmlFactory');
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Suite
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewSuite()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\Suite();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\TestCase
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewTestCase()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\TestCase();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\Question
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewQuestion()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\Question();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\SingleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewSingleAnswer()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\SingleAnswer();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\MultipleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewMultipleAnswer()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\MultipleAnswer();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\TestCase\FreeTextAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewFreeTextAnswer()
    {
        return new \Net\Bazzline\KnowledgeTest\TestCase\FreeTextAnswer();
    }

    /**
     * @return \Net\Bazzline\KnowledgeTest\Command\TestCommand
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewTestCommand()
    {
        $testCommand = new \Net\Bazzline\KnowledgeTest\Command\TestCommand();
        $testCommand->setServiceLocator($this);

        return $testCommand;
    }

    /**
     * @param $path
     * @return DirectoryIterator
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getDirectoryIterator($path)
    {
        return new DirectoryIterator($path);
    }

    /**
     * @param $path
     * @return \Net\Bazzline\KnowledgeTest\Filesystem\SuiteFilterDirectoryIterator
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewSuiteFilterDirectoryIterator($path)
    {
        return new \Net\Bazzline\KnowledgeTest\Filesystem\SuiteFilterDirectoryIterator($this->getDirectoryIterator($path));
    }

    /**
     * @param $path
     * @return \Net\Bazzline\KnowledgeTest\Filesystem\TestCaseFilterDirectoryIterator
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getNewTestCaseFilterDirectoryIterator($path)
    {
        return new \Net\Bazzline\KnowledgeTest\Filesystem\TestCaseFilterDirectoryIterator($this->getDirectoryIterator($path));
    }

    /**
     * @param $className
     * @return object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private function getFromInstancePoolOrCreate($className)
    {
        if (!isset($this->instancePool[$className])
            && (class_exists($className))) {
            $this->instancePool[$className] = new $className();
            if (in_array('ServiceLocatorAwareInterface', class_implements($this->instancePool[$className]))) {
                $this->instancePool[$className]->setServiceLocator($this);
            }
        } else {
            throw new InvalidArgumentException(
                'class name "' . $className . '" not available.'
            );
        }

        return $this->instancePool[$className];
    }
}