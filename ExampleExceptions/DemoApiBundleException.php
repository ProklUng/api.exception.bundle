<?php

namespace Prokl\ApiExceptionBundle\ExampleExceptions;

use Prokl\ApiExceptionBundle\Exception\HttpException;

/**
 * Class DemoApiBundleException
 * Простой exception, описанный в конфигурации бандла.
 * throw new DemoApiBundleException('Ошибка')
 * @package Fedy\API\Exceptions
 *
 * @since 25.10.2020
 */
class DemoApiBundleException extends HttpException
{

}
