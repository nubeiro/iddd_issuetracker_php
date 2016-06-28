<?php

namespace Issuetracker\Domain\Model\Product;


class SeverityWeights
{
    /**
     * @var float
     */
    private $highWeight;

    /**
     * @var float
     */
    private $mediumWeight;

    /**
     * @var float
     */
    private $lowWeight;

    public function __construct(
        float $highWeight,
        float $mediumWeight,
        float $lowWeight
    ) {
        $this->highWeight = $highWeight;
        $this->mediumWeight = $mediumWeight;
        $this->lowWeight = $lowWeight;
    }

    public function highWeight() :float
    {
        return $this->highWeight;
    }

    public function lowWeight() :float
    {
        return $this->lowWeight;
    }

    public function mediumWeight() :float
    {
        return $this->mediumWeight;
    }
}