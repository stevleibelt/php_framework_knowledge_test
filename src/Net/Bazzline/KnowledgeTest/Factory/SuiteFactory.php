<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

/**
 * Class SuiteFactory
 * Returns the given factory by file extension.
 * Currently supported are xml and php file extension.
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SuiteFactory extends FactoryAbstract
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
     * @return SuiteFromPhpArrayFactory|SuiteFromXmlFactory
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getFactoryByFilename($filename)
    {
        //we are searching for files with a like ([a-zA-Z]+)Suite.(php|xml)
        if (strlen($filename) < 10) {
            throw new FactoryInvalidArgumentException(
                'Invalid filename given.'
            );
        }

        if (strripos($filename, 'php') !== false) {
            if (!isset($this->instancePool['php'])) {
                $factory = $this->serviceLocator->getSuiteFromPhpArrayFactory();

                $this->instancePool['php'] = $factory;
            }

            return $this->instancePool['php'];
        }

        if (strripos($filename, 'xml') !== false) {
            if (!isset($this->instancePool['xml'])) {
                $factory = $this->serviceLocator->getSuiteFromXmlFactory();

                $this->instancePool['xml'] = $factory;
            }

            return $this->instancePool['xml'];
        }

        throw new FactoryInvalidArgumentException(
            'File extension is not supported.'
        );
    }
}