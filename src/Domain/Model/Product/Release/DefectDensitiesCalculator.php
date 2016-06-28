<?php

namespace Issuetracker\Domain\Model\Product\Release;


class DefectDensitiesCalculator
{
    /**
     * @var  SeverityTotals
     */
    private $severityTotals;

    /**
     * @var SeverityWeights
     */
    private $severityWeights;

    public function __construct(
        SeverityTotals $severityTotals,
        SeverityWeights $severityWeights
    ) {
        $this->severityTotals = $severityTotals;
        $this->severityWeights = $severityWeights;
    }

    public function defectDensity(Measurement $measurement) :DefectDensity
    {
        // TODO: ...
        return null;
    }
}