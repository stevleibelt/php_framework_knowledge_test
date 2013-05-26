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
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $suites;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setupSuites($input, $output);
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
                    new InputOption('--suite', '-s', InputOption::VALUE_OPTIONAL, 'Only use provided test case suite.'),
                )
            )
            ->setHelp(
                'The <info>%command.name%</info> command is executing all ' . PHP_EOL .
                'availalbe test suites.' . PHP_EOL
            )
        ;
    }

    /**
     * Setup suites
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private function setupSuites(InputInterface $input, OutputInterface $output)
    {
        $suite = $input->getOption('suite');
        $suites = ($suite) ? array($suite) : array();

        if ($suite) {
            $output = $this->addComment($output, 'Using suite "' . $suite . '"');
        } else {
            $path = getcwd();
            $output = $this->addComment($output, 'Searching for suites in path "' . $path . '"');
            $suiteIterator = $this
                ->getServiceLocator()
                ->getNewSuiteFilterDirectoryIterator($path);

            foreach ($suiteIterator as $suite) {
                $suites[] = $suite;

                $output = $this->addInfo($output, 'Found suite "' . $suite . '"');
            }
        }

        $this->suites = $suites;

        return $output;
    }
}