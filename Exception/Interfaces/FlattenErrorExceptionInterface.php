<?php

namespace Prokl\ApiExceptionBundle\Exception\Interfaces;

/**
 * Interface FlattenErrorExceptionInterface
 */
interface FlattenErrorExceptionInterface
{
    /**
     * Flatten errors
     *
     * @return array
     */
    public function getFlattenErrors();
}
