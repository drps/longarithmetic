<?php

class LongNumberSumCalculator
{
    private $a;
    private $b;

    public function __construct(string $a, string $b)
    {
        $this->a = new LongNumber($a);
        $this->b = new LongNumber($b);
    }

    public function execute(): LongNumber
    {
        $maxDegree = max($this->a->length(), $this->b->length());

        $c = new LongNumber();
        for ($pos = 0; $pos < $maxDegree; $pos++) {
            $aDigit = $this->a->getDigit($pos);
            $bDigit = $this->b->getDigit($pos);

            $c->addDigit($aDigit + $bDigit, $pos);
        }

        return $c;
    }
}
