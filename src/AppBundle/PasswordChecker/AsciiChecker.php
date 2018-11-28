<?php

namespace AppBundle\PasswordChecker;

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

// $password= "1222@é";
// const MIN_SIZE = 6;
// // var_dump(mb_strlen($password));
// // var_dump($password[2]);
// for ($i = 0; $i<mb_strlen($password); $i++) {
//     if(ord($password[$i]) > 127) {
//         return false;
//     }
// }
// return true;