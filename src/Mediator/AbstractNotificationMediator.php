<?php

declare(strict_types=1);

namespace App\Mediator;

abstract class AbstractNotificationMediator
{
    protected string $nameSession = 'flash_message';
    
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        include "../views/notification/{$view}.php";
    }
}