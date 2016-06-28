<?php

namespace Issuetracker\Domain\Model\Product;


class IssueAssigner
{
    /**
     * @var string
     */
    private $issueAssignerId;

    public function __construct(string $issueAssignerId)
    {
        $this->issueAssignerId = $issueAssignerId;
    }

    public function issueAssignerId() :string
    {
        return $this->issueAssignerId;
    }

}