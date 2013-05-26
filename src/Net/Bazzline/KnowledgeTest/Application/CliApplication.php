<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Application;

use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * Class Application
 *
 * @package Net\Bazzline\KnowledgeTest\Application
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class CliApplication extends SymfonyApplication
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    const NAME = 'Test Case Application';

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    const VERSION = '1.0.0';
    /**
     * @var ServiceLocator;
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $serviceLocator;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function __construct()
    {
        parent::__construct(self::NAME, self::VERSION);

        $this->serviceLocator = new ServiceLocator();
        //$this->add(new ManualCommand());
    }
}
