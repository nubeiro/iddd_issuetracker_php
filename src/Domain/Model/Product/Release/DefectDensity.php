<?php


namespace Issuetracker\Domain\Model\Product\Release;


use Issuetracker\Domain\Model\Product\SeverityWeights;

class DefectDensity
{
    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var float
     */
    private $indexFigure;

    /**
     * @var Measurement
     */
    private $measurement;

    /**
     * @var SeverityWeights
     */
    private $weights;

    public function __construct(
        \DateTimeImmutable $date,
        float $indexFigure,
        Measurement $measurement,
        SeverityWeights $weights
    ) {
        $this->date = $date;
        $this->indexFigure = $indexFigure;
        $this->measurement = $measurement;
        $this->weights = $weights;
    }

    public function date() :\DateTimeImmutable
    {
        return $this->date;
    }

    public function indexFigure() :float
    {
        return $this->indexFigure;
    }

    public function measurement() :Measurement
    {
        return $this->measurement;
    }

    public function weights() :SeverityWeights
    {
        return $this->weights;
    }
}