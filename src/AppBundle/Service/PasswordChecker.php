<?php

declare(strict_types=1);

namespace AppBundle\Service;

use AppBundle\PasswordChecker\MinSizeChecker\MinSizeChecker;
use AppBundle\PasswordChecker\AsciiChecker\AsciiChecker;
use AppBundle\PasswordChecker\AnagramChecker\AnagramChecker;

class PasswordChecker
{
    /**
     * @var MinSizeChecker
     */
    private $minSizeChecker;

    /**
     * @var AsciiChecker
     */
    private $asciiChecker;

    /**
     * @var AnagramChecker
     */
    private $anagramChecker;

    public function __construct(iterable $activePasswordCheckers)
    {
        $this->activePasswordCheckers = $activePasswordCheckers;
    }

    /**
     * Check a password against all configured PasswordChecker classes
     *
     * @param string $password
     *
     * @return string|null an error message, or null if password is valid
     */
    public function check(string $password): ?string
    {
        foreach ($this->activePasswordCheckers as $activePasswordChecker) {
            if (false === $activePasswordChecker->check($password)) {
                    return $activePasswordChecker->message();
                }
        }

        return null;
    }

}
