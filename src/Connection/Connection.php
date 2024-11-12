<?php

declare(strict_types=1);

namespace App\Connection;

use Doctrine\ORM\EntityManager;

class Connection
{
    public static function getEntityManager(): EntityManager
    {
        return require dirname(__DIR__, 2) . '/bootstrap.php';
    }
}
