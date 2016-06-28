<?php

namespace Issuetracker\Domain\Model\Product;

use Rhumsaa\Uuid\Uuid;

class ProductId
{
    private $id;

    public function __construct(Uuid $id = null)
    {
        $this->id = $id;
        if (is_null($this->id)) {
            $this->id = Uuid::uuid4();
        }
    }

    public function id() :Uuid
    {
        return $this->id;
    }

}