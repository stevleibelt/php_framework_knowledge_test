<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */

namespace Net\Bazzline\KnowledgeTest\ServiceLocator;

/**
 * Class ServiceLocatorAwareInterface
 *
 * @package Net\Bazzline\KnowledgeTest\ServiceLocator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
interface ServiceLocatorAwareInterface
{
    /**
     * Getter for service locator
     *
     * @return ServiceLocator
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getServiceLocator();

    /**
     * Setter for service locator
     *
     * @param ServiceLocator $serviceLocator - the service locator
     *
     * @return object - current class for fluent interface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setServiceLocator(ServiceLocator $serviceLocator);
}