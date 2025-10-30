<?php

namespace Domain\User\ValueObjects;

use InvalidArgumentException;

final class Email {
    private function __construct(private string $value) {}

    public static function fromString(string $value): self 
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException($value);
        }
        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}