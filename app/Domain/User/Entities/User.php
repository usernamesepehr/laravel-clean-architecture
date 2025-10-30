<?php

namespace Domain\User\Entities;

use Domain\User\ValueObjects\Email;
use Domain\User\ValueObjects\UserId;

class User {
    public function __construct(
        private UserId $id,
        private Email $email,
        private string $name
    ) {}

    public function id(): UserId { return $this->id; }
    public function email(): Email { return $this->email; }
    public function name(): string { return $this->name; }

    public function changeName(String $name): void { $this->name = $name; }
}