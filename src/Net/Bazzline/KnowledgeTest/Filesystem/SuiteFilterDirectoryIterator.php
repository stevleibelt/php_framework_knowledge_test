<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */
namespace Net\Bazzline\KnowledgeTest\Filesystem;

use FilterIterator;

/**
 * Class SuiteFilterDirectoryIterator
 *
 * @package Net\Bazzline\KnowledgeTest\Filesystem
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class SuiteFilterDirectoryIterator extends FilterIterator
{
    /**
     * Filters for files with ending of 'Suite.[php|xml]'
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function accept()
    {
        return (($this->current()->isFile())
                && (preg_match('@\Suite.(php|xml)$@i', $this->current())));
    }
}