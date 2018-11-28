<?php

namespace AppBundle\PasswordChecker;

//Name to be changed (but an interface can't have the same name as a class)
interface PasswordCheckerInterface
{
    public function check(string $password): bool;

    public function message(): string;
}