<?php

namespace Infrastructure\Persistence;

use Domain\User\Entities\User;
use Domain\User\Repositories\UserRepositoryInterface;
use Domain\User\ValueObjects\Email;
use Domain\User\ValueObjects\UserId;
use Models\User as ModelsUser;

class EloquentUserRepository implements UserRepositoryInterface {
    public function nextIdentity(): UserId
    {
        return UserId::generate();
    } 

    public function save(User $user): void
    {
        ModelsUser::updateOrCreate(
            ['id' => $user->id()->toString()],
            [
                'name'  => $user->name(),
                'email' => $user->email()->toString(),
            ]
        );
    }

    public function ofId(UserId $id): User|null
    {
        $elequent = ModelsUser::find($id->toString());

        if (! $elequent) {
            return null;
        }
        
        return new User(
            $id,
            Email::fromString($elequent->email),
            $elequent->name
        );
    }
} 