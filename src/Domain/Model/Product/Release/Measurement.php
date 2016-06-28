<?php

namespace Issuetracker\Domain\Model\Product\Release;

abstract class Measurement
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value() :float
    {
        return $this->value;
    }
}