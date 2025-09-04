<?php

namespace Wescley\Math;

/**
 * Cálculos precisos com BCMath.
 */
class Money
{
    private $amount;
    private $scale;

    public function __construct($amount, $scale = 2)
    {
        if (!extension_loaded('bcmath')) {
            throw new \Exception("A extensão BCMath é obrigatória.");
        }

        $this->scale  = $scale;
        $this->amount = $this->normalize($amount);
    }

    private function normalize($value)
    {
        return number_format((float) $value, $this->scale, '.', '');
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function sum(Money $other)
    {
        $this->amount = bcadd($this->amount, (string) $other->getAmount(), $this->scale);
    }

    public function subtract(Money $other)
    {
        $this->amount = bcsub($this->amount, (string) $other->getAmount(), $this->scale);
    }

    public function multiply(Money $other)
    {
        $this->amount = bcmul($this->amount, (string) $other->getAmount(), $this->scale);
    }

    public function divide(Money $other)
    {
        if ((float) $other->getAmount() == 0.0) {
            throw new \InvalidArgumentException("Divisão por zero.");
        }
        
        $this->amount = bcdiv($this->amount, (string) $other->getAmount(), $this->scale);
    }

    public function format($currency = "R$")
    {
        return $currency . " " . number_format($this->amount, $this->scale, ',', '.');
    }
}
