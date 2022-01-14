<?php

namespace App\Services;

/**
 * @author https://www.php.net/manual/en/function.session-start.php#102460
 */
class Session
{
    public const SESSION_STARTED = true;
    public const SESSION_NOT_STARTED = false;

    // The state of the session
    private bool $sessionState = self::SESSION_NOT_STARTED;

    // THE only instance of the class
    private static Session $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Session
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        self::$instance->startSession();

        return self::$instance;
    }

    public function startSession(): bool
    {
        if (self::SESSION_NOT_STARTED == $this->sessionState) {
            $this->sessionState = session_start();
        }

        return $this->sessionState;
    }

    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function &__get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return $name;
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

    public function destroy(): bool
    {
        if (self::SESSION_STARTED == $this->sessionState) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);

            return !$this->sessionState;
        }

        return false;
    }
}
