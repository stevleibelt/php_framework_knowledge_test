<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Filesystem;

use FilterIterator;

/**
 * Class TestCaseFilterDirectoryIterator
 *
 * @package Net\Bazzline\KnowledgeTest\Filesystem
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCaseFilterDirectoryIterator extends FilterIterator
{
    /**
     * Filters for files with ending of 'TestCase.[php|xml]'
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function accept()
    {
        return (($this->current()->isFile())
                && (preg_match('@\TestCase.(php|xml)$@i', $this->current())));
    }
}