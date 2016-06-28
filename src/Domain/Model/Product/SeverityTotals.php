<?php

namespace Issuetracker\Domain\Model\Product;


class SeverityTotals
{
    /**
     * @var int
     */
    private $totalHigh;

    /**
     * @var int
     */
    private $totalMedium;

    /**
     * @var int
     */
    private $totalLow;

    public function __construct(
        int $totalHigh,
        int $totalMedium,
        int $totalLow
    ) {
        $this->totalHigh = $totalHigh;
        $this->totalMedium = $totalMedium;
        $this->totalLow = $totalLow;
    }

    public function adjustWith(SeverityDeltas $deltas) :SeverityTotals
    {
        $totalHigh = $this->totalHigh() + $deltas->highDelta();
        $totalMedium = $this->totalMedium() + $deltas->mediumDelta();
        $totalLow = $this->totalLow() + $deltas->lowDelta();

        return new SeverityTotals($totalHigh, $totalMedium, $totalLow);
    }

    public function total() :int
    {
        return $this->totalHigh() + $this->totalMedium() + $this->totalLow();
    }

    public function totalHigh() :int
    {
        return $this->totalHigh;
    }

    public function totalLow() :int
    {
        return $this->totalLow;
    }

    public function totalMedium() :int
    {
        return $this->totalMedium;
    }

    public function weightedTotal(SeverityWeights $severityWeights) :float
    {
        $highValue = $this->totalHigh() * $severityWeights->highWeight();
        $mediumValue = $this->totalMedium() * $severityWeights->mediumWeight();
        $lowValue = $this->totalLow() * $severityWeights->lowWeight();

        return $highValue + $mediumValue + $lowValue;
    }
}