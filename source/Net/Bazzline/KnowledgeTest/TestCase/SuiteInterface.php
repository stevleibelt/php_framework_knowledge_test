<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\TestCase;

/**
 * Class SuiteInterface
 *
 * @package Net\Bazzline\KnowledgeTest\TestCase
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
interface SuiteInterface
{
    /**
     * Getter for name
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getName();

    /**
     * Setter for name
     *
     * @param string $name - name of the suite
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function setName($name);

    /**
     * Getter for description
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getDescription();

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
    public function setDescription($description);

    /**
     * Getter for language
     *
     * @return null|string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getLanguage();

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
    public function setLanguage($language);

    /**
     * Getter for test cases
     *
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getTestCases();

    /**
     * Adds a test case.
     *
     * @param TestCaseInterface $testCase - a test case
     *
     * @return SuiteInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function addTestCase(TestCaseInterface $testCase);
}
