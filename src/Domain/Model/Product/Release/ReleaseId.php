<?php

namespace Issuetracker\Domain\Model\Product\Release;


use Rhumsaa\Uuid\Uuid;

class ReleaseId
{
    /**
     * @var Uuid
     */
    private $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function id() :Uuid
    {
        return $this->id;
    }

    /**
     * @todo provide unit test
     * 
     * @param Object $obj
     * @return bool
     */
    public function equals(Object $obj) :bool
    {
        if ($this == $obj) {
            return true;
        }

        if ($obj == null) {
            return false;
        }

        if (get_class($this) != get_class($obj)) {
            return false;
        }

        $other = $obj;
        if ($this->id == null) {
            if ($other->id != null) {
                return false;
            }
        } else {
            if (!$this->id->equals($other->id)) {
                return false;
            }
        }
        return true;
    }

    public function hashCode() :int
    {
        $prime = 31;
        $result = 1;
        $result = $prime * $result + (($this->id == null) ? 0 : $this->id->hashCode());
        return $result;
    }
}