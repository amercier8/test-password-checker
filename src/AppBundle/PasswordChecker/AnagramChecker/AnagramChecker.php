<?php

namespace AppBundle\PasswordChecker\AnagramChecker;
use AppBundle\PasswordChecker\PasswordCheckerInterface\PasswordCheckerInterface;


class AnagramChecker implements PasswordCheckerInterface
{
    const PASSWORD_WORD = "password";

    public function check(string $password): bool
    {
        $splittedUserPassword = str_split(strtolower($password));
        sort($splittedUserPassword);

        $splittedPasswordWord = str_split(self::PASSWORD_WORD);
        sort($splittedPasswordWord);

        if($splittedUserPassword === $splittedPasswordWord) {
            return false;
        } else {
            return true;
        }
    }

    public function message(): string
    {
        return sprintf('Password can not be an anagram of "password".');
    }
}
