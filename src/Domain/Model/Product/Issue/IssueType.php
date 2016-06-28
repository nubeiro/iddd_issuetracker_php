<?php

namespace Issuetracker\Domain\Model\Product\Issue;


class IssueType
{
    const DEFECT = 1;

    const FEATURE_REQUEST = 2;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function isDefect() :bool
    {
        return self::DEFECT === $this->value;
    }

    public function isFeatureRequest() :bool
    {
        return self::FEATURE_REQUEST === $this->value;
    }

}