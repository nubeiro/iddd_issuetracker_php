<?php

namespace Issuetracker\Domain\Model\Product\Release;


class KLOCMeasurement extends Measurement
{
    private $value;

    /**
     * KLOCMeasurement constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }
}