<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26 
 */

function netBazzlineKnowledgeTestBasicAutoloader($classname)
{
    $namespace = 'Net\\Bazzline\\KnowledgeTest\\';
    //$lengthOfNamespace = strlen($namespace);
    //$lengthOfNamespace = 28;
    //$expectedNamespace = substr($classname, 0, $lengthOfNamespace);
    $expectedNamespace = substr($classname, 0, 28);

    $isSupportedClassnameByNamespace = ($namespace == $expectedNamespace);

    if ($isSupportedClassnameByNamespace) {
        $classNameWithRemovedNamespace = str_replace('Net\\Bazzline\\KnowledgeTest\\', '', $classname);
        $filename = str_replace('\\', DIRECTORY_SEPARATOR, $classNameWithRemovedNamespace) . '.php';
        $includePaths = array(
            realpath(__DIR__ . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR
        );

        foreach ($includePaths as $includePath) {
            $filepath = realpath($includePath . DIRECTORY_SEPARATOR . $filename);

            if (file_exists($filepath)) {
                require_once $filepath;

                break;
            } else {
                echo var_export(
                        array(
                            'classname' => $classname,
                            'filename' => $filename,
                            'filepath' => $filepath,
                            'includedPath' => $includePath
                        ),
                        true
                    ) . PHP_EOL;
            }
        }
    } else {
        return false;
    }
}

spl_autoload_register('netBazzlineKnowledgeTestBasicAutoloader');
