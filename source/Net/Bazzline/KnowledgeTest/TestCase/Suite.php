<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class Suite
 *
 * @package Net\Bazzline\KnowledgeTest\TestCase
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
class Suite implements SuiteInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $description;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $language;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $name;

    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    private $testCases;

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function __construct()
    {
        $this->description = '';
        $this->language = '';
        $this->name = '';
        $this->testCases = array();
    }

    /**
     * Getter for name
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for name
     *
     * @param string $name - name of the suite
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * Getter for description
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Setter for description
     *
     * @param string $description - description of the suite
     *
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    /**
     * Getter for language
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Setter for language
     *
     * @param string $language - language of suite
     *
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function setLanguage($language)
    {
        $this->language = (string) $language;

        return $this;
    }

    /**
     * Getter for test cases
     *
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getTestCases()
    {
        return $this->testCases;
    }

    /**
     * Adds a test case.
     *
     * @param TestCaseInterface $testCase - a test case
     *
     * @return SuiteInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function addTestCase(TestCaseInterface $testCase)
    {
        $this->testCases[] = $testCase;

        return $this;
    }
}