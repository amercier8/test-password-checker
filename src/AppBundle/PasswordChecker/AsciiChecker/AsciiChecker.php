<?php

namespace AppBundle\PasswordChecker\AsciiChecker;
use AppBundle\PasswordChecker\PasswordCheckerInterface\PasswordCheckerInterface;


class AsciiChecker implements PasswordCheckerInterface
{
    
    public function check(string $password): bool
    {
        for ($i = 0; $i<mb_strlen($password); $i++) {
            if(ord($password[$i]) > 127) {
                return false;
            }
        }
        return true;
    }

    public function message(): string
    {
        return sprintf('Password contains one or more invalid characters');
    }
}