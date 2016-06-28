<?php

namespace Issuetracker\Domain\Model\Product\Release;


class PreferredMeasurements
{
    /**
     * @var KLOCMeasurement
     */
    private $klocMeasurement;

    /**
     * @var ClassesMeasurement
     */
    private $classesMeasurement;

    /**
     * @var BacklogItemsMeasurement
     */
    private $backlogItemsMeasurement;

    public function __construct(
        KLOCMeasurement $klocMeasurement,
        ClassesMeasurement $classesMeasurement,
        BacklogItemsMeasurement $backlogItemsMeasurement
    ) {
        $this->klocMeasurement = $klocMeasurement;
        $this->classesMeasurement = $classesMeasurement;
        $this->backlogItemsMeasurement = $backlogItemsMeasurement;
    }

    public function backlogItemsMeasurement() :BacklogItemsMeasurement
    {
        return $this->backlogItemsMeasurement;
    }

    public function classesMeasurement() :ClassesMeasurement
    {
        return $this->classesMeasurement;
    }

    public function klocMeasurement() :KLOCMeasurement
    {
        return $this->klocMeasurement;
    }
}