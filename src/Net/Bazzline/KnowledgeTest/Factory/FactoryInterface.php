<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\KnowledgeTest\Factory;

/**
 * Class FactoryInterface
 *
 * @package Net\Bazzline\TestCase
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
interface FactoryInterface
{
    /**
     * @param mixed $source - the source
     *
     * @return mixed
     * @throws FactoryInvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function fromSource($source);
}