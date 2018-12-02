<?php

namespace AppBundle\PasswordChecker\PasswordCheckerInterface;

interface PasswordCheckerInterface
{
    public function check(string $password): bool;

    public function message(): string;
}