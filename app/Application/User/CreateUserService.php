<?php

namespace Application\User;

use Domain\User\Entities\User;
use Domain\User\Repositories\UserRepositoryInterface;
use Domain\User\ValueObjects\Email;

class CreateUserService {
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute(string $email, string $name): User 
    {
        $user = new User($this->repo->nextIdentity(), Email::fromString($email), $name);

        $this->repo->save($user);

        return $user;
    }
}