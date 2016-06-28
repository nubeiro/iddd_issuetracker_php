<?php

namespace Issuetracker\Domain\Model\Product\Release;


class DefectsStatistics
{
    /**
     * @var int
     */
    private $knownDefects;
    /**
     * @var KLOCMeasurement
     */
    private $kloc;

    public function __construct(int $knownDefects, KLOCMeasurement $kloc)
    {
        $this->knownDefects = (float) $knownDefects;
        $this->kloc = (float) $kloc->value();
    }

    public function defectDensity() :float
    {
        return $this->knownDefects / $this->kloc;
    }
}