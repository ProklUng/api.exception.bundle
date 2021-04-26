<?php

namespace Prokl\ApiExceptionBundle\ExampleExceptions;

use Prokl\ApiExceptionBundle\Exception\HttpException;

/**
 * Class DemoApiBundleVariableException
 * Exception, описанный в конфигурации бандла, с переменной.
 * throw new DemoApiBundleException('255') // Параметры - строка!
 * @package Fedy\API\Exceptions
 *
 * @since 25.10.2020
 */
class DemoApiBundleVariableException extends HttpException
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct();
    }
}
