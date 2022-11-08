<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserPasswordHasher
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function preFlush(User $user, PreFlushEventArgs $event): void
    {
        if ($user->getPlainPassword() !== null) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setHashedPassword($hashedPassword);
        }
    }
}