<?php

namespace Issuetracker\Domain\Model\Product\Release;


use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class Release
{
    /**
     * @var TenantId
     */
    private $tenantId;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var ReleaseId
     */
    private $releaseId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $defectDensityHistory;

    /**
     * @var array
     */
    private $preferredMeasurements;

    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        ReleaseId $releaseId,
        string $name,
        string $description
    ) {
        $this->defectDensityHistory = [];
        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->releaseId = $releaseId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @todo this is returning a
     * Collection<DefectDensity> unmodifiableList in Java
     * @return array
     */
    public function defectDensityHistory() :array
    {
        return $this->defectDensityHistory;
    }

    public function description() :string
    {
        return $this->description;
    }

    public function name() :string
    {
        return $this->name;
    }

    public function preferredMeasurements() :array
    {
        return $this->preferredMeasurements;
    }

    public function productId() :ProductId
    {
        return $this->productId;
    }

    public function recordPreferredMeasurements(
        array $preferredMeasurements
    ) {
        $this->preferredMeasurements = $preferredMeasurements;
    }

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }

    public function releaseId() :ReleaseId
    {
        return $this->releaseId;
    }

    private function allPreferredMeasurements() :array
    {
        $measurements = [];
        if ($this->preferredMeasurements()->backlogItemsMeasurement() != null) {
            $measurements[] = $this->preferredMeasurements()->backlogItemsMeasurement();
        } else {
            if ($this->preferredMeasurements()->classesMeasurement() != null) {
                $measurements[] = $this->preferredMeasurements()->classesMeasurement();
            } else {
                if ($this->preferredMeasurements()->klocMeasurement() != null) {
                    $measurements[] = $this->preferredMeasurements()->klocMeasurement();
                }
            }
        }

        return $measurements;
    }
}