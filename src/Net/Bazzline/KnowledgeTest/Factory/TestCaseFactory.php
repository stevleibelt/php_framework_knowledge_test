<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

/**
 * Class TestCaseFactory
 * Returns the given factory by file extension.
 * Currently supported are xml and php file extension.
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCaseFactory
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
     * @param string $filename - filename with extension '.php' or '.xml'
     *
     * @return TestCaseFromPhpArrayFactory|TestCaseFromXmlFactory
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getFactoryByFilename($filename)
    {
        //we are searching for files with a like ([a-zA-Z]+)TestCase.(php|xml)
        if (strlen($filename) < 12) {
            throw new FactoryInvalidArgumentException(
                'Invalid filename given.'
            );
        }

        if (strripos('php', $filename. -3) !== false) {
            if (!isset($this->instancePool['php'])) {
                $this->instancePool['php'] = new TestCaseFromPhpArrayFactory();
            }

            return $this->instancePool['php'];
        }

        if (strripos('xml', $filename. -3) !== false) {
            if (!isset($this->instancePool['xml'])) {
                $this->instancePool['xml'] = new TestCaseFromXmlFactory();
            }

            return $this->instancePool['xml'];
        }

        throw new FactoryInvalidArgumentException(
            'File extension is not supported.'
        );
    }
}