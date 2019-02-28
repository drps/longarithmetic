<?php

class LongNumber
{
    private $base;
    private $digits = [];

    public function __construct(?string $str = null)
    {
        $this->base = 10;
        if ($str) {
            $this->digits = array_reverse(array_map('intval', str_split($str)));
        }
    }

    public function getNumber(): string
    {
        return implode('', array_reverse($this->digits));
    }

    public function getDigit(int $pos): int
    {
        return $this->digits[$pos] ?? 0;
    }

    public function length(): int
    {
        return count($this->digits);
    }

    public function addDigit(int $digit, int $position): void
    {
        $current = $this->getDigit($position);
        $newDigit = $current + $digit;

        if ($newDigit < $this->base) {
            $this->digits[$position] = $newDigit;
        } else {
            $excess = $newDigit - $this->base;
            $this->digits[$position] = $excess;
            $this->shift($position);
        }
    }

    private function shift(int $fromPosition): void
    {
        if ($this->length() > $fromPosition + 1) {
            throw new \InvalidArgumentException("There is no digits to shift");
        }

        $this->digits[$fromPosition + 1] = 1;
    }
}
