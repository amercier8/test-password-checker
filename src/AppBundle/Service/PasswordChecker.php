<?php

declare(strict_types=1);

namespace AppBundle\Service;

use AppBundle\PasswordChecker\MinSizeChecker;
use AppBundle\PasswordChecker\AsciiChecker;

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

    public function __construct(MinSizeChecker $minSizeChecker, AsciiChecker $asciiChecker)
    {
        $this->minSizeChecker = $minSizeChecker;
        $this->asciiChecker = $asciiChecker;
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
        if (false === $this->minSizeChecker->check($password)) {
            return $this->minSizeChecker->message();
        }
        elseif(false === $this->asciiChecker->check($password)) {
            return $this->asciiChecker->message();
        }

        return null;
    }
}
