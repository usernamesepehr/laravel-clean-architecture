<?php

namespace Domain\User\Repositories;

use Domain\User\Entities\User;
use Domain\User\ValueObjects\UserId;

interface UserRepositoryInterface {
    public function nextIdentity(): UserId;
    public function save(User $user): void;
    public function ofId(UserId $id): ?User;
}