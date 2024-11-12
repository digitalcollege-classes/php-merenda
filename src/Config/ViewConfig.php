<?php

declare(strict_types=1);

namespace App\Config;

class ViewConfig
{
    private static $instance = null;
    private bool $hideMenu = false;
    private bool $hideNavBar = false;

    private function __construct()
    {
    }

    public static function getInstance(): ViewConfig
    {
        if (self::$instance == null) {
            self::$instance = new ViewConfig();
        }
        return self::$instance;
    }

    public static function hideMenu(?bool $value = null): bool
    {
        if (true === isset($value))
            self::getInstance()->hideMenu = $value;

        return self::getInstance()->hideMenu;
    }

    public static function hideNavBar(?bool $value = null): bool
    {
        if (true === isset($value))
            self::getInstance()->hideNavBar = $value;

        return self::getInstance()->hideNavBar;
    }

    public static function clearConfigs(): void
    {
        self::getInstance()->hideMenu = false;
        self::getInstance()->hideNavBar = false;
    }

}