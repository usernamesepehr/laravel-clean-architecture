<?php

namespace Domain\User\ValueObjects;

use Ramsey\Uuid\Uuid;

final class UserId {
    private function __construct(private string $value) {}

    public static function generate(): self {
        return new self(Uuid::uuid4()->toString());
    }

    public static function fromString(string $value): self 
    {
        return new self($value);
    }
    
    public function toString(): string 
    {
        return $this->value;
    }
    
    public function equals(self $other): bool 
    {
        return $this->value === $other->value;
    }
}