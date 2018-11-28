<?php

namespace AppBundle\PasswordChecker;

class AnagramChecker implements PasswordCheckerInterface
{
    
    public function check(string $password): bool
    {
        
    }

    public function message(): string
    {
        // return sprintf('Password contains one or more invalid characters');
    }
}

$password = "password";

$splittedPassword = str_split(strtolower($password));
// var_dump($split);
sort($splittedPassword);
// sort(str_split($password));
var_dump($splittedPassword);
// var_dump($splittedPassword);
echo("<br />");

$passwordWord = "password";
str_split($passwordWord);
// sort($passwordWord);
var_dump($passwordWord);


if($passwordWord == $splittedPassword) {
    var_dump("ko");
} else {
    var_dump("ok");
}
