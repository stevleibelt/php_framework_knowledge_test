<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestCommand
 *
 * @package Net\Bazzline\KnowledgeTest\Command
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCommand extends CommandAbstract
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $configuration = $this->getApplication()->getConfiguration();

        $autoloaderFilepath = realpath($configuration->getFilepathAutoloader()) .
            DIRECTORY_SEPARATOR . $configuration->getFilenameAutoloader();
        $autoloaderWasWritten = false;
        $classmapFilepath = realpath($configuration->getFilepathClassmap()) .
            DIRECTORY_SEPARATOR . $configuration->getFilenameClassmap();
        $classmapWasWritten = false;
        $isForced = $input->getOption('force');
        $onlyCreateClassmapFile = $input->getOption('classmap');
        $onlyCreateAutoloaderFile = $input->getOption('autoloader');

        if (!$onlyCreateAutoloaderFile) {
            $output->writeln('<comment>Generating and writing classmap file.</comment> ');
            $filepathIterator = $this->getFilepathIterator($configuration);
            $classmapFileWriter = $this->getClassmapFileWriter($filepathIterator, $classmapFilepath);
            $classmapWasWritten = $this->writeClassmap($classmapFileWriter, $isForced, $output);

            if ($classmapWasWritten) {
                $output->writeln('<info>Classmap was written to:</info> ' .
                $classmapFilepath);
            } else {
                $output->writeln('<error>Classmap was not written.</error>');
            }
        }

        if (!$onlyCreateClassmapFile
            && $configuration->createAutoloaderFile()) {
            $output->writeln('<comment>Generating and writing autoloader file.</comment> ');
            $autoloaderFileWriter = $this->getAutoloaderFileWriter($autoloaderFilepath, $classmapFilepath);
            $autoloaderWasWritten = $this->writeAutoloaderFile($autoloaderFileWriter, $isForced, $output);

            if ($autoloaderWasWritten) {
                $output->writeln('<info>Autoloader was written to:</info> ' .
                $autoloaderFilepath);
            } else {
                $output->writeln('<error>Autoloader was not written.</error>');
            }
        }
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected  function configure()
    {
        $this
            ->setName('test')
            ->setDescription('Starts the available tests.')
            ->setDefinition(
                array(
                    new InputOption('--testsuite', '-t', InputOption::VALUE_NONE, 'Only use provided test suite.'),
                )
            )
            ->setHelp(
                'The <info>%command.name%</info> command is executing all ' . PHP_EOL .
                'availalbe test suites.' . PHP_EOL
            )
        ;
    }
}