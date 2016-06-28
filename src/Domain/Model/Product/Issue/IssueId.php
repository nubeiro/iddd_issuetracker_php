<?php

namespace Issuetracker\Domain\Model\Product\Issue;

use Rhumsaa\Uuid\Uuid;

class IssueId
{
    private $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function id() :Uuid
    {
        return $this->id;
    }
}