<?php

declare(strict_types=1);

namespace AppBundle\PasswordChecker\MinSizeChecker;
use AppBundle\PasswordChecker\PasswordCheckerInterface\PasswordCheckerInterface;


class MinSizeChecker implements PasswordCheckerInterface
{
    const MIN_SIZE = 6;

    public function check(string $password): bool
    {
        return strlen($password) >= self::MIN_SIZE;
    }

    public function message(): string
    {
        return sprintf('Password length must be at least %d', self::MIN_SIZE);
    }
}
