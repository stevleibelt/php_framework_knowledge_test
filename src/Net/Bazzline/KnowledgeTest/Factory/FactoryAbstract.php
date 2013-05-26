<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */

namespace Net\Bazzline\KnowledgeTest\Factory;

use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocatorAwareInterface;

/**
 * Class FactoryAbstract
 *
 * @package Net\Bazzline\KnowledgeTest\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
abstract class FactoryAbstract implements FactoryInterface, ServiceLocatorAwareInterface
{
    private $serviceLocator;

    /**
     * Getter for service locator
     *
     * @return ServiceLocator
     * @author stev leibelt <artodeto@arcor.de>
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
     * @return FactoryAbstract
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setServiceLocator(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }
}