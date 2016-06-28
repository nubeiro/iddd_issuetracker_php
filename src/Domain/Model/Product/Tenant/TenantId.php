<?php

namespace Issuetracker\Domain\Model\Product\Tenant;

class TenantId
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {

        $this->id = $id;
    }
}