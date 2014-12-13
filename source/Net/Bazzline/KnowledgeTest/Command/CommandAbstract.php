<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Command;

use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocatorAwareInterface;
use Net\Bazzline\Symfony\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CommandAbstract
 *
 * @package Net\Bazzline\KnowledgeTest\Command
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-26
 */
abstract class CommandAbstract extends Command implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocator
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    protected  $serviceLocator;

    /**
     * Getter for service locator
     *
     * @return ServiceLocator
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Setter for service locator
     *
     * @param ServiceLocator $serviceLocator - the service locator
     *
     * @return CommandAbstract
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-05-26
     */
    public function setServiceLocator(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }
}