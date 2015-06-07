<?php

namespace Workshop\Auction\Domain\Value;

abstract class Identity
{
    /**
     * @var
     */
    private $value;

    /**
     * @param $value
     */
    protected function __construct($value)
    {
        $value = trim((string) $value);

        if (empty($value)) {
            throw new \InvalidArgumentException('Invalid Id');
        }

        $this->value = (string) $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->value;
    }
}
