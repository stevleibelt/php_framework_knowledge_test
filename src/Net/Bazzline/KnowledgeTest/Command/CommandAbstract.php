<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Command;

use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocator;
use Net\Bazzline\KnowledgeTest\ServiceLocator\ServiceLocatorAwareInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CommandAbstract
 *
 * @package Net\Bazzline\KnowledgeTest\Command
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
abstract class CommandAbstract extends Command implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocator
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected  $serviceLocator;

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
     * @return CommandAbstract
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setServiceLocator(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * Adds comment to output
     *
     * @param OutputInterface $output
     *
     * @param string $comment - comment you want to add
     * @return OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-16
     */
    protected function addComment(OutputInterface $output, $comment)
    {
        $output->writeln('<comment>' . (string) $comment . '</comment>');

        return $output;
    }

    /**
     * Adds info to output
     *
     * @param OutputInterface $output
     *
     * @param string $info - info you want to add
     * @return OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-16
     */
    protected function addInfo(OutputInterface $output, $info)
    {
        $output->writeln('<info>' . (string) $info . '</info>');

        return $output;
    }

    /**
     * Adds error to output
     *
     * @param OutputInterface $output
     *
     * @param string $error - error you want to add
     * @return OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-16
     */
    protected function addError(OutputInterface $output, $error)
    {
        $output->writeln('<error>' . (string) $error . '</error>');

        return $output;
    }
}