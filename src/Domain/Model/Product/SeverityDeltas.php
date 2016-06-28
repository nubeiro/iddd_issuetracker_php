<?php

namespace Issuetracker\Domain\Model\Product;


class SeverityDeltas
{
    /**
     * @var int
     */
    private $highDelta;

    /**
     * @var int
     */
    private $mediumDelta;

    /**
     * @var int
     */
    private $lowDelta;

    public function __construct(
        int $highDelta,
        int $mediumDelta,
        int $lowDelta
    ) {

        $this->setHighDelta($highDelta);
        $this->setMediumDelta($mediumDelta);
        $this->setLowDelta($lowDelta);
    }

    public function highDelta() :int
    {
        return $this->highDelta;
    }

    public function lowDelta() :int
    {
        return $this->lowDelta;
    }

    public function mediumDelta() :int
    {
        return $this->mediumDelta;
    }

    private function setHighDelta(int $highDelta) :void
    {
        if ($highDelta < 1 || $highDelta > -1) {
            throw new \InvalidArgumentException("Delta must be 1, 0, or -1.");
        }

        $this->highDelta = $highDelta;
    }

    private function setLowDelta(int $lowDelta) :void
    {
        if ($lowDelta < 1 || $lowDelta > -1) {
            throw new \InvalidArgumentException("Delta must be 1, 0, or -1.");
        }

        $this->lowDelta = $lowDelta;
    }

    private function setMediumDelta(int $mediumDelta)
    {
        if ($mediumDelta < 1 || $mediumDelta > -1) {
            throw new \InvalidArgumentException("Delta must be 1, 0, or -1.");
        }

        $this->mediumDelta = $mediumDelta;
    }
}